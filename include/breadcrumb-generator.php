<?php
class BreadcrumbGenerator {
    private $pages = [
        'home' => 'Inicio',
        'services' => 'Servicios',
        'blog' => 'Blog'
    ];

    public function generateBreadcrumb($currentPage = 'home') {
        $breadcrumb = '<nav aria-label="Breadcrumb" role="navigation">';
        $breadcrumb .= '<ol itemscope itemtype="https://schema.org/BreadcrumbList" class="breadcrumb">';
        
        // Home sempre é o primeiro
        $breadcrumb .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb-item">';
        $breadcrumb .= '<a itemprop="item" href="/"><span itemprop="name">Inicio</span></a>';
        $breadcrumb .= '<meta itemprop="position" content="1" />';
        $breadcrumb .= '</li>';
        
        // Se não for home, adiciona a página atual
        if ($currentPage !== 'home' && isset($this->pages[$currentPage])) {
            $breadcrumb .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb-item active" aria-current="page">';
            $breadcrumb .= '<span itemprop="name">' . $this->pages[$currentPage] . '</span>';
            $breadcrumb .= '<meta itemprop="position" content="2" />';
            $breadcrumb .= '</li>';
        }
        
        $breadcrumb .= '</ol>';
        $breadcrumb .= '</nav>';
        
        return $breadcrumb;
    }

    public function generateStructuredDataBreadcrumb($currentPage = 'home') {
        $items = [
            [
                "@type" => "ListItem",
                "position" => 1,
                "name" => "Inicio",
                "item" => "https://www.alankalepdev.com/"
            ]
        ];

        if ($currentPage !== 'home' && isset($this->pages[$currentPage])) {
            $items[] = [
                "@type" => "ListItem", 
                "position" => 2,
                "name" => $this->pages[$currentPage],
                "item" => "https://www.alankalepdev.com/" . $currentPage
            ];
        }

        $structuredData = [
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => $items
        ];

        return json_encode($structuredData, JSON_UNESCAPED_SLASHES);
    }
}
