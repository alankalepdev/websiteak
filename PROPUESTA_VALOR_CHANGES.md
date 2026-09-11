# Cambio de propuesta de valor y estructura del home — AlanKalepDev

## Resumen

Rediseño del mensaje comercial del sitio: de "Ingeniero de Software / Full Stack Developer" (propuesta centrada en la profesión) a "Transformo procesos de tu empresa con software e IA" (propuesta centrada en el problema del cliente). Incluye reordenamiento de secciones del home, dos secciones nuevas, consolidación de servicios, reescritura del portafolio como casos de estudio y ajustes menores de SEO. Basado en una revisión de copy aportada por el usuario.

## Objetivo del mensaje

Que un visitante entienda en 5–10 segundos: *"Este tipo entiende problemas de empresas y puede encontrar una solución tecnológica completa para mi negocio."*

## Cambios aplicados

### Hero (`partials/hero.php`)
- Antes: `Ingeniero de Software & Full Stack Developer` / `Software a medida, Asistentes IA y servidores propios para tu empresa`.
- Ahora: nombre y rol como texto pequeño (`Alan Gutiérrez — Ingeniero de Software`) y titular grande orientado a resultado: `Transformo procesos de tu empresa con software e inteligencia artificial`.
- Nuevo párrafo de apertura centrado en el problema (procesos manuales, sistemas desconectados, tareas repetitivas) en vez de listar tecnologías.
- Línea de categorías: `Software a medida · Automatización · IA · Integraciones`.
- CTAs: `Asesoría gratuita` → **Diagnóstico inicial**; `Ver portafolio` → **Ver casos**.

### Nueva sección "¿Dónde está el problema?" (`partials/problems.php`)
- Sección nueva justo después del hero, antes de Soluciones.
- 4 tarjetas en formato pregunta → respuesta: procesos manuales, sistemas desconectados, información difícil de consultar, infraestructura sin mantenimiento.
- Reutiliza el componente visual `why-choose-us-item` ya existente en el tema (sin CSS nuevo).

### Servicios → Soluciones (`partials/services.php`)
- De **9 tarjetas** a **4**, agrupadas por categoría:
  1. Software empresarial
  2. Automatización e IA
  3. Integración de sistemas
  4. Infraestructura y seguridad
- Eliminada la tarjeta placeholder "Ciberseguridad — Próximamente, espera nuestro nuevo servicio."
- Título de sección: `Servicios / Que podemos ofrecerte hoy` → `Soluciones / ¿Cómo puedo ayudar a tu empresa?`
- Esta misma vista alimenta la página `/services`, así que el cambio aplica automáticamente ahí también.

### Portafolio → Casos reales (`partials/portfolio.php`)
- Título de sección: `Proyectos recientes` → `Casos reales`.
- Los 5 proyectos con más sustancia técnica se reescribieron en formato **Problema → Solución → Resultado → Tecnología**: ERP Grupo MOC, Sistema de gestión de proveedores, Integración EDI (logística 3PL), Servidor On-Premise + Cloudflare Tunnel, Migración OJS.
- El resto de sitios web entregados (LALTO, Fick Llantas, Voiito, ZE Real Estate, FluidtecMX) se movieron a un bloque secundario "Otros proyectos" con el formato simple original — no se perdió ninguno.

### Sobre mí (`partials/about.php`)
- Encabezado: `Alan Gutiérrez — Ingeniero de Software Full Stack` → **Experiencia que se traduce en resultados**.
- Se agregó un bloque de 4 estadísticas (`counter-box`, componente ya existente en el tema pero sin usar hasta ahora): años de experiencia, % de mejora en tiempos de respuesta, sistemas internos desarrollados, experiencia en sistemas empresariales (3PL/ERP/SaaS).
- Se quitó la lista final de bullets (redundante con las estadísticas) y se añadió el párrafo: *"No me limito a desarrollar aplicaciones. También entiendo servidores, bases de datos, integraciones y despliegues..."*.

### Nueva sección "Cómo trabajo" (`partials/how-we-work.php`)
- Sección nueva entre "Sobre mí" y "¿Por qué elegirnos?".
- 4 pasos del proceso: Diagnóstico → Propuesta de solución → Implementación → Soporte y evolución.
- Mismo componente visual reutilizado (`why-choose-us-item`), sin CSS nuevo.

### Orden del home (`views/home.php`)
Antes: Hero → Sobre mí → Servicios → Portafolio → Por qué elegirnos → Clientes → Contacto.

Ahora: **Hero → ¿Dónde está el problema? → Soluciones → Casos reales → Sobre mí → Cómo trabajo → Por qué elegirnos → Clientes → Contacto.**

### Navegación (`partials/header.php`, `partials/footer.php`)
- Menú: `Inicio | Sobre mí | Servicios | Portafolio | SedeDigital | Blog | Contacto` → `Inicio | Soluciones | Cómo trabajo | Casos | Sobre mí | Recursos | Contacto`.
- "SedeDigital" bajó del menú principal al footer (sigue siendo accesible en `/sededigital`, pero ya no compite con la propuesta de valor principal).
- "Blog" se etiqueta como "Recursos" en el menú (la ruta interna sigue siendo `blog`, sin cambios de URL).
- CTA destacado: `Consultoría gratis` / `Asesoria gratuita` → **Diagnóstico inicial** (también en el mensaje de WhatsApp).

### Contacto (`partials/contact.php`)
- Título: `Ponte en contacto conmigo hoy` → **Solicita tu diagnóstico inicial**, para cerrar el embudo con el mismo concepto introducido en el hero.

### SEO (`include/seo-config.php`) — cambios aditivos, sin tocar rutas ni títulos indexados
- `description` y `keywords` del home actualizados para incluir "automatización de procesos" e "integración de sistemas".
- `serviceType` del schema `ProfessionalService` actualizado de `["Desarrollo de Software", "Asistentes con IA", "Infraestructura On-Premise", "Diseño Web", "DevOps"]` a `["Desarrollo de Software a Medida", "Automatización e IA", "Integración de Sistemas", "Infraestructura y Seguridad"]`, alineado con las 4 categorías nuevas de Soluciones.
- No se modificaron `title`, `canonical` ni las rutas de `service-rag` / `service-software` — esas quedaron intactas para no arriesgar el posicionamiento ya logrado (ver `SEO_AUDIT_CHANGES.md`).

## Verificación

- `php -l` sin errores en todos los archivos modificados.
- Servidor local (`php -S`): `/`, `?route=services`, `?route=service-rag`, `?route=service-software`, `?route=blog` responden `200`.
- Confirmado que no queda texto "Ciberseguridad — Próximamente" en el home renderizado.
- Confirmado que "Casos reales", "Diagnóstico inicial" y "Transformo procesos" aparecen en el HTML generado.

## Pendiente / sugerido

- Revisar visualmente en navegador (colores, espaciados, comportamiento responsive) antes de publicar — no se hizo una revisión visual en Chrome en esta sesión.
- `views/service-software.php` sigue con texto de relleno tipo "Lorem ipsum" (pendiente ya identificado en `SEO_AUDIT_CHANGES.md`), no se tocó en esta pasada.
- Considerar crear una página propia para "Integración de sistemas" (hoy enlaza a `#contact` por no tener página dedicada), dado que el usuario la señaló como la categoría con más potencial.
