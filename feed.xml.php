<?php
header('Content-Type: application/rss+xml; charset=utf-8');

$baseUrl = 'https://www.alankalepdev.com';
$siteName = 'AlanKalepDev - Desarrollo de Software';
$siteDescription = 'Blog sobre desarrollo web, inteligencia artificial, tecnologías Open Source y soluciones tecnológicas empresariales';

// Aquí podrías conectar con tu base de datos para obtener posts reales
$posts = [
    [
        'title' => 'Cómo la Inteligencia Artificial está Revolucionando el Desarrollo Web',
        'description' => 'Descubre las últimas tendencias en IA aplicada al desarrollo web y cómo pueden beneficiar a tu negocio.',
        'link' => $baseUrl . '/blog/ia-desarrollo-web',
        'pubDate' => date('r', strtotime('-7 days')),
        'guid' => $baseUrl . '/blog/ia-desarrollo-web'
    ],
    [
        'title' => 'Migración a Tecnologías Open Source: Guía Completa',
        'description' => 'Todo lo que necesitas saber sobre migrar tu empresa a tecnologías de código abierto.',
        'link' => $baseUrl . '/blog/migracion-open-source',
        'pubDate' => date('r', strtotime('-14 days')),
        'guid' => $baseUrl . '/blog/migracion-open-source'
    ],
    [
        'title' => 'Desarrollo de Aplicaciones SaaS: Mejores Prácticas 2025',
        'description' => 'Las mejores prácticas para desarrollar aplicaciones SaaS escalables y seguras.',
        'link' => $baseUrl . '/blog/desarrollo-saas-2025',
        'pubDate' => date('r', strtotime('-21 days')),
        'guid' => $baseUrl . '/blog/desarrollo-saas-2025'
    ]
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<rss version="2.0" 
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:wfw="http://wellformedweb.org/CommentAPI/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:slash="http://purl.org/rss/1.0/modules/slash/">

<channel>
    <title><?php echo htmlspecialchars($siteName); ?></title>
    <atom:link href="<?php echo $baseUrl; ?>/feed.xml" rel="self" type="application/rss+xml" />
    <link><?php echo $baseUrl; ?></link>
    <description><?php echo htmlspecialchars($siteDescription); ?></description>
    <lastBuildDate><?php echo date('r'); ?></lastBuildDate>
    <language>es-MX</language>
    <sy:updatePeriod>weekly</sy:updatePeriod>
    <sy:updateFrequency>1</sy:updateFrequency>
    <generator>AlanKalepDev Custom RSS Generator</generator>
    <image>
        <url><?php echo $baseUrl; ?>/assets/images/logodeveloper-chico.png</url>
        <title><?php echo htmlspecialchars($siteName); ?></title>
        <link><?php echo $baseUrl; ?></link>
        <width>45</width>
        <height>48</height>
    </image>

    <?php foreach ($posts as $post): ?>
    <item>
        <title><?php echo htmlspecialchars($post['title']); ?></title>
        <link><?php echo htmlspecialchars($post['link']); ?></link>
        <comments><?php echo htmlspecialchars($post['link']); ?>#comments</comments>
        <pubDate><?php echo $post['pubDate']; ?></pubDate>
        <dc:creator><![CDATA[Alan Kalep]]></dc:creator>
        <category><![CDATA[Desarrollo Web]]></category>
        <category><![CDATA[Tecnología]]></category>
        
        <guid isPermaLink="true"><?php echo htmlspecialchars($post['guid']); ?></guid>
        <description><![CDATA[<?php echo $post['description']; ?>]]></description>
        <content:encoded><![CDATA[<?php echo $post['description']; ?>]]></content:encoded>
        <wfw:commentRss><?php echo htmlspecialchars($post['link']); ?>/feed/</wfw:commentRss>
        <slash:comments>0</slash:comments>
    </item>
    <?php endforeach; ?>

</channel>
</rss>
