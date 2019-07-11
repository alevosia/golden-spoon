<?php

// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Adds a js script to dom to log a string
function console_log($str) {
    echo "<script>console.log( '" . $str . "' );</script>";
}

function notFound() {
    header('HTTP/1.0 404 Not Found');
    require './views/404.html';
}

function checkURI($uri) {
    
    switch ($uri) {
        
        // Home page
        case '/':
            if (file_exists('./views/home.html')) {
                require './views/home.html';
            } else {
                notFound();
            }
            
            break;
            
        // About page
        case '/products':
            if (file_exists('./views/products.html')) {
                require './views/products.html';
            } else {
                notFound();
            }
            
            break;
            
        // About page
        case '/about':
            if (file_exists('./views/about.html')) {
                require './views/about.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/contact':
            if (file_exists('./views/contact.html')) {
                require './views/contact.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/contact.php':
            if (file_exists('./views/contact.php')) {
                require './views/contact.php';
            } else {
                notFound();
            }
            
            break;
            
        // Product Details
        case '/products/salabat':
            if (file_exists('./views/products/salabat.html')) {
                require './views/products/salabat.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/products/pitopito':
            if (file_exists('./views/products/pitopito.html')) {
                require './views/products/pitopito.html';
                break;
            } else {
                notFound();
            }
            
            break;
            
        case '/products/malunggay':
            if (file_exists('./views/products/malunggay.html')) {
                require './views/products/malunggay.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/products/lagundi':
            if (file_exists('./views/products/lagundi.html')) {
                require './views/products/lagundi.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/products/banaba':
            if (file_exists('./views/products/banaba.html')) {
                require './views/products/banaba.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/products/sambong':
            if (file_exists('./views/products/sambong.html')) {
                require './views/products/sambong.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/products/green-tea':
            if (file_exists('./views/products/green-tea.html')) {
                require './views/products/green-tea.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/products/guyabano':
            if (file_exists('./views/products/guyabano.html')) {
                require './views/products/guyabano.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/products/tanglad':
            if (file_exists('./views/products/tanglad.html')) {
                require './views/products/tanglad.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/products/ampalaya':
            if (file_exists('./views/products/ampalaya.html')) {
                require './views/products/ampalaya.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/products/turmeric':
            if (file_exists('./views/products/turmeric.html')) {
                require './views/products/turmeric.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/products/other':
            if (file_exists('./views/products/other.html')) {
                require './views/products/other.html';
            } else {
                notFound();
            }
            
            break;
            
        case '/index.php':
            notFound();
            break;
            
        default: 
            notFound();
    }
}

checkURI($request_uri[0]);