<?php
// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

function console_log($str) {
    echo "<script>console.log( '" . $str . "' );</script>";
}

console_log($request_uri[0]);

// Route it up!
switch ($request_uri[0]) {
    
    // Home page
    case '/':
        if (file_exists('./views/home.html')) {
            require './views/home.html';
            break;
        }
        
    // About page
    case '/about':
        if (file_exists('./views/about.html')) {
            require './views/about.html';
            break;
        }
        
    // Everything else
    default:
        header('HTTP/1.0 404 Not Found');
        require './views/404.html';
}