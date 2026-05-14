<?php
class AnalyticsConfig {
    // Google Analytics 4 ID - Reemplaza con tu ID real
    private $ga4Id = 'G-XXXXXXXXXX'; 
    
    // Google Tag Manager ID - Reemplaza con tu ID real si usas GTM
    private $gtmId = 'GTM-XXXXXXX';
    
    public function getGA4Script() {
        if (empty($this->ga4Id) || $this->ga4Id === 'G-XXXXXXXXXX') {
            return '<!-- Google Analytics: Configura tu ID en include/analytics-config.php -->';
        }
        
        return "
        <!-- Google Analytics 4 -->
        <script async src=\"https://www.googletagmanager.com/gtag/js?id={$this->ga4Id}\"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{$this->ga4Id}', {
                page_title: document.title,
                page_location: window.location.href,
                send_page_view: true,
                anonymize_ip: true,
                cookie_flags: 'secure;samesite=strict'
            });
            
            // Track outbound links
            document.addEventListener('click', function(e) {
                if (e.target.tagName === 'A' && e.target.hostname !== window.location.hostname) {
                    gtag('event', 'click', {
                        event_category: 'outbound',
                        event_label: e.target.href,
                        transport_type: 'beacon'
                    });
                }
            });
            
            // Track WhatsApp clicks
            document.addEventListener('click', function(e) {
                if (e.target.href && e.target.href.includes('wa.me')) {
                    gtag('event', 'contact', {
                        event_category: 'engagement',
                        event_label: 'whatsapp_click',
                        transport_type: 'beacon'
                    });
                }
            });
        </script>";
    }
    
    public function getGTMHeadScript() {
        if (empty($this->gtmId) || $this->gtmId === 'GTM-XXXXXXX') {
            return '<!-- Google Tag Manager: Configura tu ID en include/analytics-config.php -->';
        }
        
        return "
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{$this->gtmId}');</script>
        <!-- End Google Tag Manager -->";
    }
    
    public function getGTMBodyScript() {
        if (empty($this->gtmId) || $this->gtmId === 'GTM-XXXXXXX') {
            return '<!-- Google Tag Manager (noscript): Configura tu ID en include/analytics-config.php -->';
        }
        
        return "
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id={$this->gtmId}\"
        height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->";
    }
    
    public function getStructuredDataForAnalytics($currentPage) {
        return [
            "@context" => "https://schema.org",
            "@type" => "WebPage",
            "name" => "AlanKalepDev - " . ucfirst($currentPage),
            "description" => "Página de " . $currentPage . " - Desarrollo de software y aplicaciones web",
            "url" => "https://www.alankalepdev.com/" . ($currentPage !== 'home' ? $currentPage : ''),
            "author" => [
                "@type" => "Person",
                "name" => "Alan Kalep"
            ],
            "publisher" => [
                "@type" => "Organization",
                "name" => "AlanKalepDev",
                "logo" => [
                    "@type" => "ImageObject",
                    "url" => "https://www.alankalepdev.com/assets/images/logodeveloper-chico.png"
                ]
            ]
        ];
    }
}
