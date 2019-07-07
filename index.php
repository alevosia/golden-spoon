<?php
// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

function console_log($str) {
    echo "<script>console.log( '" . $str . "' );</script>";
}

// console_log($request_uri[0]);

// Route it up!
switch ($request_uri[0]) {
    
    // Home page
    case '/':
        if (file_exists('./views/home.html')) {
            require './views/home.html';
            break;
        }
        
    // About page
    case '/products':
        if (file_exists('./views/products.html')) {
            require './views/products.html';
            break;
        }
        
    // About page
    case '/about':
        if (file_exists('./views/about.html')) {
            require './views/about.html';
            break;
        }
        
    case '/contact':
        if (file_exists('./views/contact.html')) {
            require './views/contact.html';
            break;
        }
        
    // Product Details
    case '/products/salabat':
        if (file_exists('./views/products/salabat.html')) {
            require './views/products/salabat.html';
            break;
        }
        
    case '/products/pitopito':
        if (file_exists('./views/products/pitopito.html')) {
            require './views/products/pitopito.html';
            break;
        }
        
    case '/products/malunggay':
        if (file_exists('./views/products/malunggay.html')) {
            require './views/products/malunggay.html';
            break;
        }
        
    case '/products/lagundi':
        if (file_exists('./views/products/lagundi.html')) {
            require './views/products/lagundi.html';
            break;
        }
        
    case '/products/banaba':
        if (file_exists('./views/products/banaba.html')) {
            require './views/products/banaba.html';
            break;
        }
        
    case '/products/sambong':
        if (file_exists('./views/products/sambong.html')) {
            require './views/products/sambong.html';
            break;
        }
        
    case '/products/green-tea':
        if (file_exists('./views/products/green-tea.html')) {
            require './views/products/green-tea.html';
            break;
        }
        
    case '/products/guyabano':
        if (file_exists('./views/products/guyabano.html')) {
            require './views/products/guyabano.html';
            break;
        }
        
    // Everything else
    default:
        header('HTTP/1.0 404 Not Found');
        require './views/404.html';
}