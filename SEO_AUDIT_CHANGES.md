# Auditoría SEO y Arquitectura de Rutas - AlanKalepDev Website

## Resumen
Este documento describe la auditoría de SEO/indexación realizada sobre el sitio en producción (`alankalepdev.com`) y los cambios de arquitectura aplicados como resultado.

## Diagnóstico inicial

Se probó en vivo `robots.txt`, `sitemap.xml`, `llms.txt` y el HTML servido (títulos, canonical, Open Graph, JSON-LD) contra `https://alankalepdev.com` y `https://www.alankalepdev.com`.

**Funcionaba correctamente:**
- `robots.txt`, `sitemap.xml`, `llms.txt` servidos y accesibles para bots de buscadores e IA (Googlebot, Bingbot, GPTBot, ClaudeBot, PerplexityBot, etc.)
- JSON-LD válido en home (`WebSite` + `ProfessionalService`, `BreadcrumbList`) y en `?route=service-rag` (`Person`, `Service`, `FAQPage`)

**Problemas encontrados:**
1. **URLs rotas en producción**: `/about`, `/services`, `/portfolio`, `/contact`, `/blog` — listadas en el sitemap, `llms.txt` y como `canonical`/`og:url` — devolvían **404** reales. Causa: `views/about.php`, `services.php`, `portfolio.php`, `blog.php` existían vacíos (0 bytes) y `views/contact.php` ni siquiera existía; el enrutador (`controllers/routesController.php`) solo funciona vía `index.php?route=X`, y la regla de "pretty URLs" en `.htaccess` reescribía `/about` → `/about.php` (archivo inexistente).
2. **Mezcla www / no-www**: `.htaccess` redirige `www.alankalepdev.com` → `alankalepdev.com` (301), pero todas las URLs canónicas, sitemap y `llms.txt` apuntaban a la versión **con www** — señal contradictoria para buscadores. *(Pendiente de aplicar — no se modificó en esta sesión.)*
3. El sitio en realidad es un **onepage** (`views/home.php` incluye todos los partials como secciones ancla: `#about`, `#services`, `#portfolio`, `#contact`), pero la capa de SEO estaba escrita como si fueran páginas independientes — de ahí la contradicción con el punto 1.
4. `?route=service-software` no tenía entrada propia en `include/seo-config.php`, por lo que heredaba por error el title/canonical/OG del home.

## Decisión de arquitectura

Tras discutirlo, se definió el modelo final:
- **Onepage** para `about`, `portfolio`, `contact` (siguen siendo anclas del home, no páginas propias) — no aportan intención de búsqueda distinta al home.
- **Páginas propias** para cada servicio en detalle (`service-rag`, `service-software`, futuros) — cada uno targetea una búsqueda específica.
- **Página propia** para el listado general de `services` (enlaza a los detalles) y para `blog` (por naturaleza necesita URLs propias por post).

## Cambios aplicados

### Routing
- `controllers/routesController.php`: `about`, `portfolio`, `contact` ahora responden con **301** a `/#about`, `/#portfolio`, `/#contact` en vez de intentar incluir vistas vacías/inexistentes.
- `.htaccess`: nueva regla de reescritura para rutas limpias (`about|services|portfolio|contact|blog` → `index.php?route=$1`) **antes** de la regla genérica `.php`, que era la que causaba el 404.
- `views/about.php`, `views/portfolio.php`: eliminados (vacíos, ya inalcanzables).
- `views/services.php`: nueva página real (header + breadcrumb + grid de servicios vía `partials/services.php`).
- `views/blog.php`: nueva página real con estado "próximamente" honesto (sin inventar posts falsos) — ya no 404.
- `partials/header.php`: se agregó "Blog" al menú principal (antes comentado, la página quedaba huérfana sin enlaces internos).
- `partials/services.php`: se activó el botón "Ver todos los servicios" → enlaza a `/services`.

### SEO
- `include/seo-config.php`: se quitaron las entradas `about`/`portfolio`/`contact` (ya no son páginas indexables por separado); se agregó la entrada faltante de `service-software`; se corrigió el link de contacto en el schema de `service-rag` (`/contact` → `/#contact`).
- `include/breadcrumb-generator.php`: mismo ajuste de páginas válidas.
- `sitemap.xml.php`: ya no lista `/about`, `/portfolio`, `/contact` — solo home, `/services`, `/blog`, `?route=service-rag`, `?route=service-software`.
- `llms.txt`, `robots.txt`: actualizados para reflejar la misma estructura (about/portfolio/contact como secciones del home, no páginas).

### Verificación
Probado localmente con `php -S` (el `.htaccess` no aplica en el servidor de desarrollo, así que se probó vía `index.php?route=X`):
- `?route=about|portfolio|contact` → 301 a `/#about` etc. ✅
- `?route=services|blog` → 200, con título y H1 propios ✅
- `?route=service-software` → ahora con canonical y title propios ✅
- `sitemap.xml.php` → ya no incluye las rutas fantasma ✅

## Pendiente
- Desplegar estos cambios al hosting de producción y reprobar `/services`, `/blog`, `/about`, `/portfolio`, `/contact` en vivo.
- Resolver la mezcla www / no-www en `canonical`, `og:url`, `sitemap.xml` y `llms.txt` (hoy todo apunta a `www`, pero `.htaccess` redirige a la versión sin `www`).
- ~~`views/service-software.php` conserva texto de relleno tipo "Lorem ipsum"~~ — **resuelto**, ver sección "Reescritura de `service-software.php`" más abajo.
- `feed.xml.php` anuncia 3 posts de ejemplo (`/blog/ia-desarrollo-web`, etc.) que no existen como páginas reales — revisar cuando se publique contenido real de blog.

## Actualización — SEO alineado al cambio de propuesta de valor (ver `PROPUESTA_VALOR_CHANGES.md`)

Tras consolidar Servicios (9→4) en "Soluciones", reescribir el portafolio como casos de estudio y reposicionar el mensaje ("Transformo procesos de tu empresa con software e IA"), se actualizó la capa SEO para que coincida con el contenido visible — sin tocar `title`, `canonical` del home ni las URLs/rutas ya indexadas.

### `include/seo-config.php`
- `services`: `title`, `description` y `keywords` reescritos para reflejar las 4 categorías (Software empresarial, Automatización e IA, Integración de sistemas, Infraestructura y seguridad); se quitó la mención a "ciberseguridad" (servicio eliminado del sitio).
- `service-software`: `title`/`description`/`keywords` alineados a "Software Empresarial a Medida" (nombre de la nueva tarjeta 01).
- Schema `Person`: `jobTitle` de "Ingeniero de Software Full Stack" → "Ingeniero de Software"; `description` reescrita con foco en transformación de procesos en vez de listado de skills.
- `knowsAbout`: se agregaron "Software Empresarial a Medida", "Automatización de Procesos" e "Integración de Sistemas (ERP, CRM, Facturación)" (aditivo, no se quitó nada).
- `speakable.cssSelector` (home): se agregaron `.why-choose-us-item` y `.works-content` para cubrir las nuevas secciones "¿Dónde está el problema?", "Cómo trabajo" y los casos de estudio del portafolio.
- Schema `ItemList` de `services`: los 4 `ListItem` ahora son Software Empresarial a Medida, Automatización e IA, Integración de Sistemas e Infraestructura y Seguridad (antes listaba RAG, Desarrollo de Software, Infraestructura On-Premise y Diseño Web — desalineado con las tarjetas reales de la página).

### Breadcrumbs
- `include/breadcrumb-generator.php`: label `'services' => 'Servicios'` → `'Soluciones'` (solo texto visible/schema, la URL sigue siendo `/services`).
- `views/services.php`: H1 y breadcrumb actualizados a "Soluciones".
- `views/service-rag.php`: texto del breadcrumb "Servicios" → "Soluciones" (el link sigue apuntando a `/#services`).
- `views/service-software.php`: se corrigió el H1, que tenía el placeholder del template en inglés (**"Web Development"** → "Software Empresarial a Medida"), y el breadcrumb, que tenía enlaces rotos `href="#"` y las etiquetas "home"/"services" sin traducir → ahora usa `Inicio / Soluciones / Software Empresarial a Medida` con enlaces reales. El cuerpo de la página (sidebar, secciones internas) sigue con lorem ipsum — no se tocó en esta pasada, ver pendientes arriba.

### `llms.txt`
- Reescrito por completo: antes describía al sitio como "Ingeniero de Software Full Stack" con una lista de servicios y proyectos; ahora abre con la propuesta de valor ("Transformo procesos de empresas con software, automatización e IA"), documenta el proceso de trabajo en 4 pasos (Diagnóstico → Propuesta → Implementación → Soporte), las 4 soluciones consolidadas, y los 5 casos reales en formato problema/solución/resultado — mismo contenido que ahora ve un visitante humano en el home.

### No modificado (a propósito)
- `title` y `canonical` del home, y las rutas/slugs de `service-rag`, `service-software`, `services` y `blog` — se dejaron intactos para no arriesgar el posicionamiento ya indexado.
- `sitemap.xml.php`: no requirió cambios — `/`, `/services` y `/blog` ya usan `lastmod` dinámico (`date('Y-m-d')`), así que reflejan la fecha de esta actualización automáticamente.
- `robots.txt` y `feed.xml.php`: sin cambios, no relacionados con este contenido.

### Verificación
- `php -l` sin errores en todos los archivos tocados.
- Servidor local: `/`, `?route=services`, `?route=service-rag`, `?route=service-software` responden `200` con los nuevos `<title>` y `<meta description>`.
- Los 2 bloques JSON-LD del home (`Person`/`ProfessionalService` + `BreadcrumbList`) validan como JSON correcto.

## Reescritura de `service-software.php` — de plantilla lorem ipsum a contenido real

La página `?route=service-software` (ahora enlazada de forma prominente desde la tarjeta 01 "Software empresarial" en Soluciones) seguía siendo, en el cuerpo, la plantilla original en inglés sin traducir ni adaptar: párrafos de relleno lorem ipsum, sección "Select engagement models" (Fixed Price / Time & Material / Dedicated Team) tipo agencia, sidebar "website development" con bullets de WordPress, servicios relacionados genéricos ("Digital Marketing", "Game Development") y FAQ sobre frontend vs. backend sin relación con el negocio. Las imágenes apuntaban a `images/...` (ruta inexistente, sin el prefijo `assets/`) y varios enlaces eran `href="#"` muertos.

### Contenido nuevo
- **Cuerpo principal**, mismo patrón editorial que `service-rag.php`: *¿Qué es el software empresarial a medida?* → *¿Cómo lo implementamos?* → *Casos de uso reales* (logística/3PL, instituciones educativas, ERP a medida, migraciones), todo en español y basado en el trabajo real ya documentado en el portafolio.
- **Sidebar "¿Qué incluye?"**: lista real del proceso (análisis, arquitectura, desarrollo con Laravel/Python/FastAPI, integración con ERP/CRM/facturación, despliegue, documentación) + CTA a WhatsApp con mensaje específico del servicio.
- **Sección "Ventajas"**: 3 razones reales (se adapta a tu proceso, escala contigo, tus datos bajo tu control) reemplazando el "why i circle" del template.
- **Se eliminó** la sección de modalidades de contratación tipo agencia (Fixed Price / Time & Material / Dedicated Team) — no refleja el modelo real del sitio (trato directo, sin intermediarios, ya comunicado en `partials/why-choice.php`).
- **"Otras soluciones"**: reemplaza el bloque genérico de servicios inventados por enlaces reales a las otras 3 categorías (Automatización e IA → `?route=service-rag`, Integración de sistemas → `#contact`, Infraestructura y seguridad → `#contact`), sumando enlazado interno real entre páginas de Soluciones.
- **FAQ**: 5 preguntas reales y relevantes (tiempos de desarrollo, cambios de alcance a mitad de proyecto, integración con ERP/CRM/facturación, propiedad del código entregado, soporte post-entrega) en vez de las genéricas de frontend/backend del template.
- **CTA final**: mismo formato que el de `service-rag.php`, adaptado al mensaje de software a medida.
- Rutas de imágenes corregidas (`images/...` → `assets/images/...`, reutilizando assets ya usados en `services.php`) y todos los `href="#"` muertos reemplazados por enlaces reales.

### Schema (`include/seo-config.php`)
- Se agregó el bloque `if ($page === 'service-software')`, que antes no existía — la página solo heredaba el `Person` base sin `Service` ni `FAQPage`, inconsistente con `service-rag`.
- Nuevo schema `Service` ("Software Empresarial a Medida") con `hasOfferCatalog` listando los 6 componentes del servicio (análisis, arquitectura, desarrollo, integración, despliegue, documentación).
- Nuevo schema `FAQPage` con las mismas 5 preguntas visibles en la página — elegible para rich snippets de FAQ en buscadores.

### Verificación
- `php -l` sin errores en `views/service-software.php` e `include/seo-config.php`.
- `?route=service-software` responde `200`; sin restos de "lorem ipsum", "Web Development", "i circle", "Dedicated Team" ni `domainname.com`.
- Los 3 objetos del bloque JSON-LD (`Person`, `Service`, `FAQPage`) parsean como JSON válido.
