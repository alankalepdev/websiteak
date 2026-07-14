<?php
header('Content-Type: application/xml; charset=utf-8');

$baseUrl = 'https://www.alankalepdev.com';
$pages = [
    '' => [
        'priority' => '1.0',
        'changefreq' => 'weekly',
        'lastmod' => date('Y-m-d')
    ],
    'about' => [
        'priority' => '0.8',
        'changefreq' => 'monthly',
        'lastmod' => date('Y-m-d')
    ],
    'services' => [
        'priority' => '0.9',
        'changefreq' => 'weekly',
        'lastmod' => date('Y-m-d')
    ],
    'portfolio' => [
        'priority' => '0.8',
        'changefreq' => 'weekly',
        'lastmod' => date('Y-m-d')
    ],
    'contact' => [
        'priority' => '0.7',
        'changefreq' => 'monthly',
        'lastmod' => date('Y-m-d')
    ],
    'blog' => [
        'priority' => '0.6',
        'changefreq' => 'weekly',
        'lastmod' => date('Y-m-d')
    ],
    '?route=service-rag' => [
        'priority' => '0.9',
        'changefreq' => 'monthly',
        'lastmod' => '2025-06-01'
    ],
    '?route=service-software' => [
        'priority' => '0.8',
        'changefreq' => 'monthly',
        'lastmod' => '2025-06-01'
    ]
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    
<?php foreach ($pages as $page => $config): ?>
    <url>
        <loc><?php echo $baseUrl . ($page ? '/' . $page : '/'); ?></loc>
        <lastmod><?php echo $config['lastmod']; ?></lastmod>
        <changefreq><?php echo $config['changefreq']; ?></changefreq>
        <priority><?php echo $config['priority']; ?></priority>
        <?php if ($page === ''): ?>
        <image:image>
            <image:loc><?php echo $baseUrl; ?>/assets/images/logodeveloper-chico.png</image:loc>
            <image:title>AlanKalepDev - Desarrollo de Software</image:title>
            <image:caption>Logo de AlanKalepDev, especialista en desarrollo web y aplicaciones</image:caption>
        </image:image>
        <?php endif; ?>
    </url>
<?php endforeach; ?>

</urlset>
