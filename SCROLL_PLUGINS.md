# Plugins de Scroll Dinámico - AlanKalepDev Website

## Resumen
Este documento describe los plugins y librerías utilizados para crear efectos de scroll dinámico en el sitio web.

## Plugins Instalados

### 1. **GSAP (GreenSock Animation Platform)**
- **Archivo**: `assets/js/gsap.min.js`
- **Descripción**: Librería de animación profesional de alto rendimiento
- **Uso**: Motor principal de animaciones para efectos complejos
- **Características**:
  - Animaciones suaves y optimizadas
  - Compatible con todos los navegadores
  - API potente y flexible

### 2. **ScrollTrigger (Plugin de GSAP)**
- **Archivo**: `assets/js/ScrollTrigger.min.js`
- **Descripción**: Plugin de GSAP para disparar animaciones basadas en scroll
- **Uso**: Controla cuándo se activan las animaciones mientras el usuario hace scroll
- **Características**:
  - Efectos parallax
  - Animaciones on-scroll
  - Control preciso de inicio/fin de animaciones
  - Scrubbing (animaciones vinculadas a la posición del scroll)

### 3. **SplitText (Plugin de GSAP)**
- **Archivo**: `assets/js/SplitText.js`
- **Descripción**: Divide texto en caracteres, palabras o líneas para animar
- **Uso**: Efectos de texto animados durante scroll
- **Estilos implementados**:
  - `.text-anime-style-1`: Animación por palabras
  - `.text-anime-style-2`: Animación por caracteres
  - `.text-anime-style-3`: Animación con perspectiva 3D

### 4. **SmoothScroll.js**
- **Archivo**: `assets/js/SmoothScroll.js`
- **Descripción**: Proporciona desplazamiento suave entre secciones
- **Uso**: Navegación fluida al hacer clic en enlaces de anclaje
- **Características**:
  - Scroll suave y natural
  - Compatible con navegación por hash (#)

### 5. **WOW.js**
- **Archivo**: `assets/js/wow.js`
- **CSS**: `assets/css/animate.css`
- **Descripción**: Revela elementos con animaciones CSS mientras haces scroll
- **Uso**: Activar animaciones predefinidas cuando los elementos entran en viewport
- **Características**:
  - Fácil de implementar con clases CSS
  - Compatible con Animate.css
  - Detección automática de viewport

### 6. **jQuery Waypoints**
- **Archivo**: `assets/js/jquery.waypoints.min.js`
- **Descripción**: Ejecuta funciones cuando haces scroll a un elemento específico
- **Uso**: Actualmente usado para contadores animados
- **Características**:
  - Detección precisa de posición de scroll
  - Eventos personalizables
  - Soporte para scrolling en ambas direcciones

### 7. **jQuery CounterUp**
- **Archivo**: `assets/js/jquery.counterup.min.js`
- **Descripción**: Anima números desde 0 hasta su valor final
- **Uso**: Contadores animados en estadísticas
- **Dependencia**: jQuery Waypoints
- **Configuración**: `delay: 6, time: 3000`

### 8. **Animate.css**
- **Archivo**: `assets/css/animate.css`
- **Descripción**: Librería de animaciones CSS predefinidas
- **Uso**: Trabaja con WOW.js para efectos visuales
- **Características**:
  - Múltiples efectos de entrada/salida
  - Fácil implementación con clases
  - Ligero y optimizado

## Implementaciones en function.js

### Image Reveal Animation
```javascript
// Líneas: 88-113
// Animación de revelado de imágenes con efecto de cortina
gsap.registerPlugin(ScrollTrigger);
let revealContainers = document.querySelectorAll(".reveal");
```
**Características**:
- Efecto de cortina horizontal
- Escala de imagen sincronizada
- Trigger al entrar en viewport

### Text Animation Style 1 (Por palabras)
```javascript
// Líneas: 116-128
// Animación de texto palabra por palabra
$('.text-anime-style-1')
```
**Parámetros**:
- Stagger: 0.05s entre palabras
- Delay: 0.5s
- Desplazamiento: 20px en X
- Trigger: top 85%

### Text Animation Style 2 (Por caracteres)
```javascript
// Líneas: 130-147
// Animación de texto carácter por carácter
$('.text-anime-style-2')
```
**Parámetros**:
- Stagger: 0.05s entre caracteres
- Delay: 0.5s
- Desplazamiento: 20px en X
- Easing: power2.out
- Trigger: top 85%

### Text Animation Style 3 (Con perspectiva 3D)
```javascript
// Líneas: 149-183
// Animación de texto con efecto 3D
$('.text-anime-style-3')
```
**Parámetros**:
- Perspectiva: 400px
- Desplazamiento inicial: 50px en X
- Easing: Back.easeOut
- Stagger: 0.02s
- Trigger: top 90%

### Counter Animation
```javascript
// Líneas: 85-87
// Contadores animados con Waypoints
$('.counter').counterUp({ delay: 6, time: 3000 });
```

## Orden de Carga de Scripts

Los scripts se cargan en el siguiente orden en `index.php`:

1. jQuery (base)
2. Bootstrap
3. Validator
4. SlickNav
5. Swiper
6. Waypoints
7. CounterUp
8. Isotope
9. Magnific Popup
10. **SmoothScroll** ← Scroll dinámico
11. **GSAP** ← Motor de animación
12. **MagicCursor** (GSAP)
13. **SplitText** (GSAP) ← Efectos de texto
14. **ScrollTrigger** (GSAP) ← Control de scroll
15. **WOW.js** ← Animaciones CSS
16. SweetAlert
17. WaitMe
18. jQuery Validate
19. Messages ES
20. Navigation Helper
21. Index.js
22. **function.js** ← Implementación principal

## Sticky Header con Scroll

El header tiene comportamiento dinámico basado en scroll:

```javascript
// Líneas: 28-31
$(window).on("scroll", function () {
    var fromTop = $(window).scrollTop();
    $("header .header-sticky").toggleClass("hide", (fromTop > headerHeight + 100));
    $("header .header-sticky").toggleClass("active", (fromTop > 600));
});
```

## Sistema de Routing Híbrido

Implementado en `index.php` para manejar navegación suave:

```javascript
// Scroll suave en enlaces con hash (#)
// Redirección inteligente desde páginas internas
// Compatible con URLs reales y hash navigation
```

## Configuración de Sliders

### Hero Slider
- Velocidad: 1000ms
- Autoplay: 4000ms delay
- Loop: activado
- Pagination: clickable

### Testimonial Slider
- Velocidad: 1000ms
- Autoplay: 3000ms delay
- Responsive: 1/2/3 slides según viewport

## Magnific Popup (Zoom Gallery)

Implementado para galerías de proyectos:
- Tipo: imagen
- Zoom: activado (300ms)
- Galería: habilitada
- Navegación por teclado

## Isotope (Filtrado de Proyectos)

Para proyectos con filtrado:
- Layout: masonry
- Filtrado animado
- Responsive

## Mejores Prácticas Implementadas

1. **Registro de plugins GSAP**: Se registra ScrollTrigger antes de usar
2. **Detección de elementos**: Verificación con `.length` antes de inicializar
3. **Performance**: Uso de `autoAlpha` en lugar de `opacity` para mejor rendimiento
4. **Limpieza**: Reset de animaciones cuando es necesario (text-anime-style-3)
5. **Responsive**: Todas las animaciones se adaptan al viewport
6. **Accesibilidad**: Preloader y skip-to-content implementados

## Documentación de Referencia

- **GSAP**: https://greensock.com/gsap/
- **ScrollTrigger**: https://greensock.com/scrolltrigger/
- **WOW.js**: https://wowjs.uk/
- **Animate.css**: https://animate.style/
- **Swiper**: https://swiperjs.com/
- **Magnific Popup**: https://dimsemenov.com/plugins/magnific-popup/

## Notas de Mantenimiento

- Todos los plugins están minificados para producción
- Las dependencias de GSAP deben cargarse en orden
- WOW.js requiere Animate.css para funcionar
- jQuery es dependencia de varios plugins (Waypoints, CounterUp, Validate)

---

**Última actualización**: Julio 2026  
**Versión del sitio**: Develop branch  
**Documentado por**: GitHub Copilot
