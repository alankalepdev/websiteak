<?php

class SEOConfig {
    private $seoData = [
        'home' => [
            'title' => 'AlanKalepDev | Desarrollo de Software, Asistentes IA e Infraestructura en San Luis Potosí',
            'description' => 'Ingeniero de Software Full Stack con +10 años de experiencia. Desarrollo aplicaciones web, SaaS, ERP, asistentes con IA para WhatsApp y Telegram, e infraestructura on-premise sin la nube. San Luis Potosí, México.',
            'keywords' => 'desarrollo web, aplicaciones web, SaaS, ERP, inteligencia artificial, asistentes IA WhatsApp, asistentes IA Telegram, infraestructura on-premise, Docker, Laravel, Python, programación, San Luis Potosí, México, desarrollador full stack, software a medida',
            'canonical' => 'https://www.alankalepdev.com/',
            'og_type' => 'website',
            'og_image' => 'https://www.alankalepdev.com/assets/images/og-home.png'
        ],
        'services' => [
            'title' => 'Servicios: Desarrollo Web, Asistentes IA, Infraestructura On-Premise | AlanKalepDev',
            'description' => 'Desarrollo de software a medida, aplicaciones SaaS, ERP, asistentes con IA para WhatsApp y Telegram, diseño web profesional, infraestructura on-premise con Docker y ciberseguridad. San Luis Potosí.',
            'keywords' => 'servicios desarrollo software, aplicaciones SaaS, sistemas ERP, asistentes IA empresas, asistentes RAG documentos empresa, asistentes WhatsApp Telegram, infraestructura on-premise Docker, self-hosted SaaS n8n Nextcloud, auditoría servidores Linux, diseño web, ciberseguridad, San Luis Potosí',
            'canonical' => 'https://www.alankalepdev.com/services',
            'og_type' => 'website',
            'og_image' => 'https://www.alankalepdev.com/assets/images/og-services.png'
        ],
        'service-rag' => [
            'title' => 'Asistente RAG con IA para Empresas — Responde con tus Documentos | AlanKalepDev',
            'description' => 'Implementamos asistentes con IA que responden usando los documentos, manuales y datos reales de tu empresa. Disponible en WhatsApp, Telegram o web. Tus datos en tu servidor. San Luis Potosí.',
            'keywords' => 'asistente RAG empresa, chatbot con documentos propios, IA con base de conocimiento, RAG WhatsApp empresa, asistente inteligente ERP, LLM documentos empresa, inteligencia artificial logística, asistente IA San Luis Potosí',
            'canonical' => 'https://www.alankalepdev.com/?route=service-rag',
            'og_type' => 'website',
            'og_image' => 'https://www.alankalepdev.com/assets/images/service-img-4-1.png'
        ],
        'service-software' => [
            'title' => 'Desarrollo de Software a Medida — Aplicaciones Web, SaaS y ERP | AlanKalepDev',
            'description' => 'Desarrollo aplicaciones web, plataformas SaaS multi-tenant y sistemas ERP personalizados con Laravel, Python y FastAPI. Software a medida para tu negocio en San Luis Potosí, México.',
            'keywords' => 'desarrollo software a medida, aplicaciones web personalizadas, SaaS multi-tenant, sistemas ERP, Laravel, Python, FastAPI, software empresarial San Luis Potosí',
            'canonical' => 'https://www.alankalepdev.com/?route=service-software',
            'og_type' => 'website',
            'og_image' => 'https://www.alankalepdev.com/assets/images/service-img-1-1.png'
        ],
        'blog' => [            'title' => 'Blog — Desarrollo Web, IA, DevOps y Open Source | AlanKalepDev',
            'description' => 'Artículos prácticos sobre desarrollo web, inteligencia artificial aplicada a empresas, DevOps, infraestructura Linux, Docker y tecnologías Open Source.',
            'keywords' => 'blog desarrollo web, inteligencia artificial empresas, DevOps Linux, Docker, Open Source, Laravel, Python, asistentes IA, tendencias tecnológicas 2025',
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
            "name" => "Alan Gutiérrez",
            "alternateName" => "Alan Kalep",
            "jobTitle" => "Ingeniero de Software Full Stack",
            "description" => "Ingeniero en Sistemas Computacionales con +10 años de experiencia en desarrollo web, administración Linux, asistentes con IA y DevOps. Especialista en Laravel, Python, Docker e infraestructura on-premise.",
            "url" => "https://www.alankalepdev.com",
            "image" => "https://www.alankalepdev.com/assets/images/page-about-3.jpeg",
            "sameAs" => [
                "https://www.facebook.com/alankalepdev",
                "https://www.instagram.com/alankalepdev",
                "https://www.linkedin.com/in/alan-gutierrez-6a2388129/",
                "https://www.tiktok.com/@alankalepdev",
                "https://github.com/alankalepdev"
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
                "Asistentes IA para WhatsApp y Telegram",
                "Laravel",
                "Python",
                "FastAPI",
                "Docker",
                "Linux",
                "DevOps",
                "Infraestructura On-Premise",
                "Ciberseguridad",
                "Open Source",
                "LEMP Stack",
                "TALL Stack",
                "CI/CD"
            ]
        ];

        if ($page === 'home') {
            $baseStructuredData["@type"] = ["WebSite", "ProfessionalService"];
            $baseStructuredData["name"] = "AlanKalepDev";
            $baseStructuredData["alternateName"] = "Alan Kalep Developer";
            $baseStructuredData["priceRange"] = "$$";
            $baseStructuredData["telephone"] = "+52-444-124-0916";
            $baseStructuredData["email"] = "alan_isgure@hotmail.com";
            $baseStructuredData["areaServed"] = [
                ["@type" => "City", "name" => "San Luis Potosí"],
                ["@type" => "Country", "name" => "México"]
            ];
            $baseStructuredData["serviceType"] = [
                "Desarrollo de Software",
                "Asistentes con IA",
                "Infraestructura On-Premise",
                "Diseño Web",
                "DevOps"
            ];
            $baseStructuredData["potentialAction"] = [
                "@type" => "SearchAction",
                "target" => "https://www.alankalepdev.com/?s={search_term_string}",
                "query-input" => "required name=search_term_string"
            ];
            // Speakable para búsquedas por voz e IA
            $baseStructuredData["speakable"] = [
                "@type" => "SpeakableSpecification",
                "cssSelector" => [".hero-content", ".about-content", ".service-item"]
            ];
        }

        if ($page === 'service-rag') {
            // Schema Service específico para el servicio RAG/IA
            $serviceSchema = [
                "@context" => "https://schema.org",
                "@type" => "Service",
                "name" => "Asistente RAG con IA para Empresas",
                "alternateName" => "Chatbot con IA y documentos propios",
                "description" => "Implementación de asistentes inteligentes que responden usando los documentos, manuales, bases de datos y conocimiento interno de tu empresa. Tecnología RAG (Retrieval-Augmented Generation) con LLM. Disponible en WhatsApp, Telegram o web. Tus datos en tu servidor.",
                "url" => "https://www.alankalepdev.com/?route=service-rag",
                "image" => "https://www.alankalepdev.com/assets/images/service-img-4-1.png",
                "provider" => [
                    "@type" => "Person",
                    "name" => "Alan Gutiérrez",
                    "url" => "https://www.alankalepdev.com"
                ],
                "areaServed" => [
                    ["@type" => "Country", "name" => "México"],
                    ["@type" => "Country", "name" => "Latinoamérica"]
                ],
                "serviceType" => "Inteligencia Artificial para Empresas",
                "category" => "AI Consulting",
                "offers" => [
                    "@type" => "Offer",
                    "priceCurrency" => "MXN",
                    "availability" => "https://schema.org/InStock",
                    "url" => "https://www.alankalepdev.com/#contact"
                ],
                "hasOfferCatalog" => [
                    "@type" => "OfferCatalog",
                    "name" => "Componentes del servicio RAG",
                    "itemListElement" => [
                        ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Análisis de fuentes de datos de la empresa"]],
                        ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Indexación segura de documentos PDF, bases de datos y ERP"]],
                        ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Integración con WhatsApp y Telegram"]],
                        ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Despliegue en infraestructura propia (on-premise)"]],
                        ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Capacitación y soporte técnico"]]
                    ]
                ]
            ];

            // FAQ Schema para aparecer en Google AI Overviews, ChatGPT y Perplexity
            $faqSchema = [
                "@context" => "https://schema.org",
                "@type" => "FAQPage",
                "mainEntity" => [
                    [
                        "@type" => "Question",
                        "name" => "¿Qué es un asistente RAG con IA?",
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => "RAG (Retrieval-Augmented Generation) es una tecnología que conecta la inteligencia artificial directamente con los documentos, manuales, bases de datos y conocimiento interno de tu empresa. El resultado es un asistente que responde preguntas con información real, actualizada y verificable, no con datos genéricos de internet."
                        ]
                    ],
                    [
                        "@type" => "Question",
                        "name" => "¿Mis datos están seguros con un asistente IA on-premise?",
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => "Sí. Todo el sistema se despliega en tu propio servidor o infraestructura. Tus documentos y datos nunca salen de tu entorno. No se envía nada a servidores externos de terceros, garantizando total privacidad y control sobre tu información empresarial."
                        ]
                    ],
                    [
                        "@type" => "Question",
                        "name" => "¿En qué canales puede funcionar el asistente IA?",
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => "El asistente puede integrarse en WhatsApp Business, Telegram, o como widget en tu sitio web. También puede conectarse a sistemas internos como ERP, CRM o portales de empleados mediante API."
                        ]
                    ],
                    [
                        "@type" => "Question",
                        "name" => "¿Qué tipos de documentos puede procesar el asistente RAG?",
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => "El asistente puede procesar PDFs, documentos Word, hojas de cálculo Excel, bases de datos SQL, contenido de sistemas ERP, manuales de operación, contratos, políticas internas y cualquier fuente de conocimiento estructurado o no estructurado de tu empresa."
                        ]
                    ],
                    [
                        "@type" => "Question",
                        "name" => "¿Cuánto tiempo toma implementar un asistente IA para mi empresa?",
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => "El tiempo de implementación varía según la complejidad y el volumen de datos, pero típicamente un asistente RAG básico puede estar operativo en 2 a 4 semanas. Incluye análisis de fuentes de datos, indexación, configuración del modelo de lenguaje, integración con canales de comunicación y capacitación del equipo."
                        ]
                    ],
                    [
                        "@type" => "Question",
                        "name" => "¿Qué diferencia hay entre ChatGPT y un asistente RAG para mi empresa?",
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => "ChatGPT responde con conocimiento general de internet, no conoce tu empresa ni tus procesos internos. Un asistente RAG está entrenado específicamente con TU información: tus manuales, tus contratos, tu inventario, tus políticas. Las respuestas son precisas, verificables y privadas."
                        ]
                    ]
                ]
            ];

            return json_encode([$baseStructuredData, $serviceSchema, $faqSchema], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        if ($page === 'services') {
            // Schema ItemList con todos los servicios
            $servicesListSchema = [
                "@context" => "https://schema.org",
                "@type" => "ItemList",
                "name" => "Servicios de Desarrollo de Software — AlanKalepDev",
                "description" => "Listado de servicios profesionales de desarrollo de software, IA e infraestructura",
                "url" => "https://www.alankalepdev.com/services",
                "itemListElement" => [
                    [
                        "@type" => "ListItem",
                        "position" => 1,
                        "item" => [
                            "@type" => "Service",
                            "name" => "Asistente RAG con IA para Empresas",
                            "description" => "Chatbots inteligentes con tus documentos propios. WhatsApp, Telegram, web. On-premise.",
                            "url" => "https://www.alankalepdev.com/?route=service-rag"
                        ]
                    ],
                    [
                        "@type" => "ListItem",
                        "position" => 2,
                        "item" => [
                            "@type" => "Service",
                            "name" => "Desarrollo de Software a Medida",
                            "description" => "Aplicaciones web, SaaS multi-tenant y sistemas ERP personalizados con Laravel y Python.",
                            "url" => "https://www.alankalepdev.com/services"
                        ]
                    ],
                    [
                        "@type" => "ListItem",
                        "position" => 3,
                        "item" => [
                            "@type" => "Service",
                            "name" => "Infraestructura On-Premise con Docker",
                            "description" => "Servidores propios con Docker, Nginx y Cloudflare Tunnel. Alternativa a la nube pública.",
                            "url" => "https://www.alankalepdev.com/services"
                        ]
                    ],
                    [
                        "@type" => "ListItem",
                        "position" => 4,
                        "item" => [
                            "@type" => "Service",
                            "name" => "Diseño y Desarrollo Web",
                            "description" => "Sitios web profesionales con enfoque en SEO, conversión y rendimiento.",
                            "url" => "https://www.alankalepdev.com/services"
                        ]
                    ]
                ]
            ];
            return json_encode([$baseStructuredData, $servicesListSchema], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        return json_encode($baseStructuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
