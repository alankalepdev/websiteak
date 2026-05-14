<?php
/**
 * Helper para generar enlaces inteligentes en el menú de navegación
 */
class MenuHelper {
    private $currentPage;
    
    public function __construct($currentPage) {
        $this->currentPage = $currentPage;
    }
    
    /**
     * Genera un enlace inteligente que maneja hash routing y páginas reales
     * @param string $target - El destino (ej: "#about", "sededigital", "contact")
     * @param string $text - Texto del enlace
     * @param array $options - Opciones adicionales (class, id, etc.)
     * @return string HTML del enlace
     */
    public function createSmartLink($target, $text, $options = []) {
        $classes = ['nav-link', 'smart-link'];
        if (isset($options['class'])) {
            $classes[] = $options['class'];
        }
        
        // Determinar si el enlace está activo
        $isActive = $this->isLinkActive($target);
        if ($isActive) {
            $classes[] = 'active';
        }
        
        // Determinar la URL correcta
        $href = $this->getSmartHref($target);
        
        // Construir atributos
        $attributes = [
            'href' => $href,
            'class' => implode(' ', $classes),
            'role' => 'menuitem'
        ];
        
        // Agregar atributos adicionales
        foreach ($options as $key => $value) {
            if ($key !== 'class') {
                $attributes[$key] = $value;
            }
        }
        
        // Construir el HTML
        $attrString = '';
        foreach ($attributes as $key => $value) {
            $attrString .= sprintf(' %s="%s"', $key, htmlspecialchars($value));
        }
        
        return sprintf('<a%s>%s</a>', $attrString, htmlspecialchars($text));
    }
    
    /**
     * Determina la URL correcta según el contexto
     * @param string $target
     * @return string
     */
    private function getSmartHref($target) {
        // Si es un enlace con hash
        if (strpos($target, '#') === 0) {
            // Si estamos en home, usar el hash directamente
            if ($this->currentPage === 'home') {
                return $target;
            } else {
                // Si no estamos en home, ir a home con el hash
                return '/' . $target;
            }
        }
        
        // Si es una página específica, usar routing normal
        return $target;
    }
    
    /**
     * Determina si un enlace está activo
     * @param string $target
     * @return bool
     */
    private function isLinkActive($target) {
        // Para enlaces con hash
        if (strpos($target, '#') === 0) {
            $section = substr($target, 1);
            // Activo si estamos en home y es la sección home, o si coincide con la página actual
            return ($this->currentPage === 'home' && $section === 'home') || 
                   ($this->currentPage === $section);
        }
        
        // Para páginas específicas
        return $this->currentPage === $target;
    }
    
    /**
     * Genera el menú completo de navegación
     * @return string HTML del menú
     */
    public function generateNavigationMenu() {
        $menuItems = [
            ['target' => '#home', 'text' => 'Inicio'],
            ['target' => '#about', 'text' => 'Sobre mí'],
            ['target' => '#services', 'text' => 'Servicios'],
            ['target' => '#portfolio', 'text' => 'Portafolio'],
            ['target' => 'sededigital', 'text' => 'SedeDigital'],
            ['target' => '#contact', 'text' => 'Contacto']
        ];
        
        $html = '<ul class="navbar-nav mr-auto" id="menu" role="menubar">';
        
        foreach ($menuItems as $item) {
            $html .= '<li class="nav-item" role="none">';
            $html .= $this->createSmartLink($item['target'], $item['text']);
            $html .= '</li>';
        }
        
        // Agregar enlace destacado
        $html .= '<li class="nav-item highlighted-menu" role="none">';
        $html .= $this->createSmartLink('contact', 'Free Consultation', ['class' => 'highlighted']);
        $html .= '</li>';
        
        $html .= '</ul>';
        
        return $html;
    }
}
?>
