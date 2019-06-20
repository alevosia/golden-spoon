$(document).ready(function() {
    //fitty('#salabat-heading');
});

// Smooth Scroll
$('a.nav-link').click(function(e) {
    if (this.hash) {
        e.preventDefault();
        
        const hash = this.hash;
        
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 800);
    }
});

$('#bestseller-button').click(function(e) {
    $('html, body').animate({
        scrollTop: $('#products-section').offset().top + 1
    }, 800);
    
    $(this).animate({
        top: '100%'
    }, 800);
    
    setTimeout(function() {
        const button = document.getElementById('bestseller-button');
        button.blur();
        console.log('Blurred!');
    }, 800);
});

/*
window.onscroll = function() {
    const navbar = document.getElementById('main-navbar')
    const scrollTop = document.documentElement ? document.documentElement.scrollTop : document.body.scrollTop;

    console.log(scrollTop);
    
    if (scrollTop > navbar.clientHeight) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
}
*/

