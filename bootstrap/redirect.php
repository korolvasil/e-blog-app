<?php

$uri = $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
$url = explode('?',$uri)[0];
$url_segments = explode('/', trim($url, '/'));

// Redirect if index.php in url
if($url == "/index.php") {
    header("Location: /".$query,TRUE,301);
    exit();
}

// Two reasons to use code below:
// 1) redirect from mirror
// 2) avoid redirection to public when append with trailing slash (see also public/.htaccess)

if($url_segments[0] == "public") {
    array_shift($url_segments);
    header("Location: /".implode('/',$url_segments).$query,TRUE,301);
    exit();
}
