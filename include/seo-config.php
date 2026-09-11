<?php

class SEOConfig {
    private $seoData = [
        'home' => [
            'title' => 'AlanKalepDev | Desarrollo de Software, Asistentes IA e Infraestructura en San Luis Potosí',
            'description' => 'Transformo procesos de empresas con software, automatización e IA. Desarrollo aplicaciones a medida, integro sistemas (ERP, CRM, facturación), asistentes con IA y administro infraestructura on-premise. San Luis Potosí, México.',
            'keywords' => 'automatización de procesos, integración de sistemas, desarrollo web, aplicaciones web, SaaS, ERP, inteligencia artificial, asistentes IA WhatsApp, asistentes IA Telegram, infraestructura on-premise, Docker, Laravel, Python, programación, San Luis Potosí, México, desarrollador full stack, software a medida',
            'canonical' => 'https://www.alankalepdev.com/',
            'og_type' => 'website',
            'og_image' => 'https://www.alankalepdev.com/assets/images/og-home.png'
        ],
        'services' => [
            'title' => 'Soluciones: Software Empresarial, Automatización e IA, Integración de Sistemas | AlanKalepDev',
            'description' => 'Software empresarial a medida, automatización de procesos con IA, integración de ERP/CRM/facturación/bancos e infraestructura on-premise. Soluciones digitales para transformar la operación de tu empresa. San Luis Potosí.',
            'keywords' => 'soluciones digitales empresa, software empresarial a medida, automatización de procesos con IA, integración de sistemas ERP CRM, asistentes RAG documentos empresa, asistentes WhatsApp Telegram, infraestructura on-premise Docker, hardening servidores Linux, transformación digital PyMEs, San Luis Potosí',
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
            'title' => 'Software Empresarial a Medida — Aplicaciones Web, SaaS y ERP | AlanKalepDev',
            'description' => 'Desarrollo software empresarial a medida: aplicaciones web, sistemas internos, plataformas SaaS multi-tenant y ERP personalizados con Laravel, Python y FastAPI. San Luis Potosí, México.',
            'keywords' => 'software empresarial a medida, desarrollo de sistemas internos, aplicaciones web personalizadas, SaaS multi-tenant, sistemas ERP, CRM a medida, Laravel, Python, FastAPI, San Luis Potosí',
            'canonical' => 'https://www.alankalepdev.com/?route=service-software',
            'og_type' => 'website',
            'og_image' => 'https://www.alankalepdev.com/assets/images/service-img-1-1.png'
        ],
        'blog' => [            'title' => 'Blog — Desarrollo Web, IA, DevOps y Open Source | AlanKalepDev',
            'description' => 'Artículos prácticos sobre desarrollo web, inteligencia artificial aplicada a empresas, DevOps, infraestructura Linux, Docker y tecnologías Open Source.',
            'keywords' => 'blog desarrollo web, inteligencia artificial empresas, DevOps Linux, Docker, Open Source, Laravel, Python, asistentes IA, tendencias tecnológicas 2026',
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
            "jobTitle" => "Ingeniero de Software",
            "description" => "Ingeniero de Software con +10 años de experiencia transformando procesos de empresas con software a medida, automatización, IA e infraestructura propia. Especialista en Laravel, Python, Docker e integración de sistemas (ERP, CRM, facturación).",
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
                "Software Empresarial a Medida",
                "Automatización de Procesos",
                "Integración de Sistemas (ERP, CRM, Facturación)",
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
                "Desarrollo de Software a Medida",
                "Automatización e IA",
                "Integración de Sistemas",
                "Infraestructura y Seguridad"
            ];
            $baseStructuredData["potentialAction"] = [
                "@type" => "SearchAction",
                "target" => "https://www.alankalepdev.com/?s={search_term_string}",
                "query-input" => "required name=search_term_string"
            ];
            // Speakable para búsquedas por voz e IA
            $baseStructuredData["speakable"] = [
                "@type" => "SpeakableSpecification",
                "cssSelector" => [".hero-content", ".about-content", ".service-item", ".why-choose-us-item", ".works-content"]
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

        if ($page === 'service-software') {
            // Schema Service específico para Software Empresarial a Medida
            $serviceSchema = [
                "@context" => "https://schema.org",
                "@type" => "Service",
                "name" => "Software Empresarial a Medida",
                "alternateName" => "Desarrollo de software a medida para empresas",
                "description" => "Desarrollo de aplicaciones web, sistemas internos, CRM y ERP a medida, diseñados alrededor de los procesos reales de la empresa. Integración con sistemas existentes. Con Laravel, Python y FastAPI.",
                "url" => "https://www.alankalepdev.com/?route=service-software",
                "image" => "https://www.alankalepdev.com/assets/images/service-img-1-1.png",
                "provider" => [
                    "@type" => "Person",
                    "name" => "Alan Gutiérrez",
                    "url" => "https://www.alankalepdev.com"
                ],
                "areaServed" => [
                    ["@type" => "Country", "name" => "México"],
                    ["@type" => "Country", "name" => "Latinoamérica"]
                ],
                "serviceType" => "Desarrollo de Software Empresarial",
                "category" => "Software Development",
                "offers" => [
                    "@type" => "Offer",
                    "priceCurrency" => "MXN",
                    "availability" => "https://schema.org/InStock",
                    "url" => "https://www.alankalepdev.com/#contact"
                ],
                "hasOfferCatalog" => [
                    "@type" => "OfferCatalog",
                    "name" => "Componentes del servicio de software a medida",
                    "itemListElement" => [
                        ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Análisis de proceso y requerimientos"]],
                        ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Diseño de arquitectura y base de datos"]],
                        ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Desarrollo con Laravel, Python o FastAPI"]],
                        ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Integración con ERP, CRM y facturación"]],
                        ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Despliegue en servidor propio o en la nube"]],
                        ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Documentación y capacitación"]]
                    ]
                ]
            ];

            $faqSchema = [
                "@context" => "https://schema.org",
                "@type" => "FAQPage",
                "mainEntity" => [
                    [
                        "@type" => "Question",
                        "name" => "¿Cuánto tiempo toma desarrollar un sistema a medida?",
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => "Depende del alcance. Un sistema básico, con un módulo y pocos usuarios, puede estar listo en 4 a 6 semanas. Un ERP o plataforma con varios módulos e integraciones puede tomar de 2 a 4 meses. Siempre empezamos con un diagnóstico que da un rango de tiempo real antes de comenzar."
                        ]
                    ],
                    [
                        "@type" => "Question",
                        "name" => "¿Qué pasa si mis requerimientos cambian a mitad del proyecto?",
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => "Es normal. El desarrollo se hace con entregas incrementales, no con un solo entregable al final, lo que permite ajustar el rumbo del proyecto conforme se valida cada parte."
                        ]
                    ],
                    [
                        "@type" => "Question",
                        "name" => "¿El sistema se integra con mi ERP, CRM o facturación actual?",
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => "Sí. Gran parte del trabajo consiste en conectar sistemas que hoy no se comunican entre sí, vía API, base de datos o archivos EDI, según la tecnología existente."
                        ]
                    ],
                    [
                        "@type" => "Question",
                        "name" => "¿Quién es dueño del código al terminar el proyecto?",
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => "El cliente. Se entrega el código fuente completo, con documentación, sin dependencias de licencias que lo aten a un único proveedor."
                        ]
                    ],
                    [
                        "@type" => "Question",
                        "name" => "¿Dan soporte después de entregar el sistema?",
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => "Sí. Se ofrece soporte y evolución continua: corrección de errores, nuevas funciones y mantenimiento de la infraestructura conforme crece la empresa."
                        ]
                    ]
                ]
            ];

            return json_encode([$baseStructuredData, $serviceSchema, $faqSchema], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        if ($page === 'services') {
            // Schema ItemList con las 4 soluciones principales
            $servicesListSchema = [
                "@context" => "https://schema.org",
                "@type" => "ItemList",
                "name" => "Soluciones de Software, Automatización e IA — AlanKalepDev",
                "description" => "Software empresarial, automatización e IA, integración de sistemas e infraestructura para transformar la operación de tu empresa",
                "url" => "https://www.alankalepdev.com/services",
                "itemListElement" => [
                    [
                        "@type" => "ListItem",
                        "position" => 1,
                        "item" => [
                            "@type" => "Service",
                            "name" => "Software Empresarial a Medida",
                            "description" => "Aplicaciones web, sistemas internos, CRM, ERP y plataformas hechas alrededor de tus procesos.",
                            "url" => "https://www.alankalepdev.com/?route=service-software"
                        ]
                    ],
                    [
                        "@type" => "ListItem",
                        "position" => 2,
                        "item" => [
                            "@type" => "Service",
                            "name" => "Automatización e IA",
                            "description" => "Automatización de procesos, asistentes con IA (RAG), agentes y procesamiento inteligente de documentos.",
                            "url" => "https://www.alankalepdev.com/?route=service-rag"
                        ]
                    ],
                    [
                        "@type" => "ListItem",
                        "position" => 3,
                        "item" => [
                            "@type" => "Service",
                            "name" => "Integración de Sistemas",
                            "description" => "Conectamos ERP, CRM, facturación, bancos, APIs y WhatsApp para que la información fluya automáticamente.",
                            "url" => "https://www.alankalepdev.com/services"
                        ]
                    ],
                    [
                        "@type" => "ListItem",
                        "position" => 4,
                        "item" => [
                            "@type" => "Service",
                            "name" => "Infraestructura y Seguridad",
                            "description" => "Servidores propios con Docker y Linux, hardening, backups y despliegues. Alternativa a la nube pública.",
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
