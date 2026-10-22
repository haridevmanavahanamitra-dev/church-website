<?php
// convert.php - generate static HTML from PHP pages

$pages = [
    'index', 'about', 'bishop-message', 'contact', 'counselling',
    'courses', 'events', 'faq', 'gallery', 'locations', 'members',
    'ministries', 'pastors', 'primates-global', 'primates-india',
    'resources', 'watch-online'
];

$outDir = __DIR__ . '/public';
if (!is_dir($outDir)) mkdir($outDir, 0755, true);

foreach ($pages as $page) {
    $phpFile = __DIR__ . "/{$page}.php";
    if (!file_exists($phpFile)) {
        echo "Skipped (missing): {$page}.php\n";
        continue;
    }

    ob_start();
    include $phpFile;
    $html = ob_get_clean();

    // Convert internal .php links to .html
    $html = preg_replace('/\.php(["\'#?])/i', '.html$1', $html);

    file_put_contents("{$outDir}/{$page}.html", $html);
    echo "Generated: public/{$page}.html\n";
}
echo "\nDone.\n";