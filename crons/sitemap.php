<?php
include "cron_init.php";

$servers = Servers::orderBy("id", "ASC")->get();

$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";
$xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\r\n";

foreach ($servers as $server) {
   $seo_url = Functions::friendlyTitle($server->id.'-'.$server->title);
   $xml .= "<url>\r\n";
   $xml .= "<loc>https://rune-nexus.com/details/{$seo_url}</loc>\r\n";
   $xml .= "<lastmod>".date("Y-m-d")."</lastmod>\r\n";
   $xml .= "</url>\r\n";
}

$xml .= "</urlset>";

file_put_contents(DOC_ROOT.'/../servers-sitemap.xml', $xml);