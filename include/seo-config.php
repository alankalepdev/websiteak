<?php

class SEOConfig {
    private $seoData = [
        'home' => [
            'title' => 'AlanKalepDev | Desarrollo de Software y Aplicaciones Web en San Luis Potosí',
            'description' => 'Especialista en desarrollo de aplicaciones web, SaaS, ERP, sistemas con IA y bots automatizados. Más de 10 años de experiencia. Consultoría gratuita. San Luis Potosí, México.',
            'keywords' => 'desarrollo web, aplicaciones web, SaaS, ERP, inteligencia artificial, bots automatizados, programación, San Luis Potosí, México, desarrollador web, software personalizado',
            'canonical' => 'https://www.alankalepdev.com/',
            'og_type' => 'website',
            'og_image' => 'https://www.alankalepdev.com/assets/images/og-home.png'
        ],
        'about' => [
            'title' => 'Sobre Alan Kalep - Ingeniero de Software con +10 años de experiencia',
            'description' => 'Ingeniero de Software especializado en desarrollo web, administración de servidores Linux y tecnologías Open Source. Más de 10 años ayudando empresas a crecer.',
            'keywords' => 'Alan Kalep, ingeniero software, desarrollador senior, Linux, Open Source, San Luis Potosí, experiencia desarrollo web',
            'canonical' => 'https://www.alankalepdev.com/about',
            'og_type' => 'profile',
            'og_image' => 'https://www.alankalepdev.com/assets/images/page-about-3.jpeg'
        ],
        'services' => [
            'title' => 'Servicios de Desarrollo Web y Software | AlanKalepDev',
            'description' => 'Servicios profesionales: Desarrollo de aplicaciones web, SaaS, ERP, sistemas con IA, bots automatizados, migración a tecnologías Open Source y consultoría tecnológica.',
            'keywords' => 'servicios desarrollo web, aplicaciones SaaS, sistemas ERP, inteligencia artificial, bots automatizados, consultoría tecnológica, migración sistemas',
            'canonical' => 'https://www.alankalepdev.com/services',
            'og_type' => 'website',
            'og_image' => 'https://www.alankalepdev.com/assets/images/og-services.png'
        ],
        'portfolio' => [
            'title' => 'Portafolio de Proyectos - Aplicaciones Web y Sistemas | AlanKalepDev',
            'description' => 'Descubre proyectos exitosos: aplicaciones web escalables, sistemas ERP, plataformas educativas, soluciones logísticas y más. Casos de éxito reales.',
            'keywords' => 'portafolio desarrollo web, proyectos aplicaciones, casos éxito, sistemas ERP, plataformas educativas, soluciones logísticas',
            'canonical' => 'https://www.alankalepdev.com/portfolio',
            'og_type' => 'website',
            'og_image' => 'https://www.alankalepdev.com/assets/images/og-portfolio.png'
        ],
        'contact' => [
            'title' => 'Contacto - Consultoría Gratuita en Desarrollo Web | AlanKalepDev',
            'description' => 'Solicita tu consultoría gratuita. Contacta con Alan Kalep para proyectos de desarrollo web, aplicaciones personalizadas y soluciones tecnológicas. San Luis Potosí.',
            'keywords' => 'contacto desarrollador web, consultoría gratuita, presupuesto aplicaciones web, San Luis Potosí, asesoría tecnológica',
            'canonical' => 'https://www.alankalepdev.com/contact',
            'og_type' => 'website',
            'og_image' => 'https://www.alankalepdev.com/assets/images/og-contact.png'
        ],
        'blog' => [
            'title' => 'Blog de Desarrollo Web y Tecnología | AlanKalepDev',
            'description' => 'Artículos sobre desarrollo web, inteligencia artificial, tecnologías Open Source, mejores prácticas de programación y tendencias tecnológicas.',
            'keywords' => 'blog desarrollo web, artículos programación, inteligencia artificial, Open Source, tendencias tecnológicas, tutoriales',
            'canonical' => 'https://www.alankalepdev.com/blog',
            'og_type' => 'website',
            'og_image' => 'https://www.alankalepdev.com/assets/images/og-blog.png'
        ]
    ];

    public function getSEOData($page = 'home') {
        return isset($this->seoData[$page]) ? $this->seoData[$page] : $this->seoData['home'];
    }

    public function getStructuredData($page = 'home') {
        $baseStructuredData = [
            "@context" => "https://schema.org",
            "@type" => "Person",
            "name" => "Alan Kalep",
            "jobTitle" => "Ingeniero de Software",
            "description" => "Especialista en desarrollo de aplicaciones web, SaaS, ERP y sistemas con inteligencia artificial",
            "url" => "https://www.alankalepdev.com",
            "image" => "https://www.alankalepdev.com/assets/images/page-about-3.jpeg",
            "sameAs" => [
                "https://www.facebook.com/covenantsoftware",
                "https://www.linkedin.com/in/alankalep"
            ],
            "address" => [
                "@type" => "PostalAddress",
                "addressLocality" => "San Luis Potosí",
                "addressRegion" => "SLP",
                "addressCountry" => "MX"
            ],
            "knowsAbout" => [
                "Desarrollo Web",
                "Aplicaciones SaaS",
                "Sistemas ERP",
                "Inteligencia Artificial",
                "Bots Automatizados",
                "Linux",
                "Open Source"
            ]
        ];

        if ($page === 'home') {
            $baseStructuredData["@type"] = "WebSite";
            $baseStructuredData["name"] = "AlanKalepDev";
            $baseStructuredData["alternateName"] = "Alan Kalep Developer";
            $baseStructuredData["potentialAction"] = [
                "@type" => "SearchAction",
                "target" => "https://www.alankalepdev.com/?s={search_term_string}",
                "query-input" => "required name=search_term_string"
            ];
        }

        return json_encode($baseStructuredData, JSON_UNESCAPED_SLASHES);
    }
}
