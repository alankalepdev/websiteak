/**
 * Helper de navegación para sistema híbrido de routing
 * Maneja tanto enlaces con hash (#) como URLs reales
 */

class NavigationHelper {
    constructor() {
        this.init();
    }

    init() {
        this.setupSmoothScrolling();
        this.setupNavigationHighlight();
    }

    /**
     * Configura el smooth scrolling para enlaces internos
     */
    setupSmoothScrolling() {
        // Manejar links del menú de navegación
        document.querySelectorAll('a[href^="#"]').forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                const isHomePage = window.location.pathname === '/' || window.location.pathname.includes('home');
                
                if (href.startsWith('#') && href.length > 1) {
                    if (isHomePage) {
                        e.preventDefault();
                        this.scrollToSection(href.substring(1));
                    } else {
                        // Redirigir a home con el hash
                        e.preventDefault();
                        window.location.href = `/${href}`;
                    }
                }
            });
        });
    }

    /**
     * Scroll suave a una sección específica
     * @param {string} targetId - ID del elemento destino
     */
    scrollToSection(targetId) {
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            // Calcular offset para header fijo si existe
            const headerHeight = this.getHeaderHeight();
            const elementPosition = targetElement.offsetTop;
            const offsetPosition = elementPosition - headerHeight;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });

            // Actualizar la URL sin recargar la página
            if (history.pushState) {
                history.pushState(null, null, `#${targetId}`);
            }
        }
    }

    /**
     * Obtiene la altura del header para calcular el offset
     * @returns {number} Altura del header en píxeles
     */
    getHeaderHeight() {
        const header = document.querySelector('header, .header, .navbar');
        return header ? header.offsetHeight : 0;
    }

    /**
     * Resalta el enlace activo en la navegación
     */
    setupNavigationHighlight() {
        const currentPath = window.location.pathname;
        const currentHash = window.location.hash;
        
        // Remover clases activas existentes
        document.querySelectorAll('.nav-link, .menu-link').forEach(link => {
            link.classList.remove('active');
        });

        // Resaltar enlace actual
        document.querySelectorAll('a').forEach(link => {
            const href = link.getAttribute('href');
            
            if (href === currentPath || 
                (currentHash && href === currentHash) ||
                (currentPath === '/' && href === '#home')) {
                link.classList.add('active');
            }
        });
    }

    /**
     * Crea enlaces dinámicos que manejan tanto hash como URLs
     * @param {string} target - El destino del enlace
     * @param {string} text - Texto del enlace
     * @returns {HTMLElement} Elemento de enlace creado
     */
    createSmartLink(target, text) {
        const link = document.createElement('a');
        link.textContent = text;
        
        if (target.startsWith('#')) {
            // Enlace interno
            const isHomePage = window.location.pathname === '/' || window.location.pathname.includes('home');
            link.href = isHomePage ? target : `/${target}`;
        } else {
            // Enlace externo o a página específica
            link.href = target;
        }
        
        return link;
    }

    /**
     * Actualiza todos los enlaces del menú según la página actual
     */
    updateMenuLinks() {
        const isHomePage = window.location.pathname === '/' || window.location.pathname.includes('home');
        
        document.querySelectorAll('a[href^="#"]').forEach(link => {
            const hash = link.getAttribute('href');
            if (!isHomePage && hash !== '#') {
                // Si no estamos en home, cambiar enlaces para ir a home
                link.href = `/${hash}`;
            }
        });
    }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    window.navigationHelper = new NavigationHelper();
    
    // Manejar navegación por hash al cargar la página
    if (window.location.hash) {
        setTimeout(() => {
            window.navigationHelper.scrollToSection(window.location.hash.substring(1));
        }, 500);
    }
});

// Exportar para uso en otros scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = NavigationHelper;
}
