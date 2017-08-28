$(document).ready(function() {
    //jQuery.scrollSpeed(100, 800);

    // Enable smooth scroll for internal links
    $('a[href^="#"]').on('click',function (e) {
            e.preventDefault();

            var target = this.hash;
            var $target = $(target);

            $('html, body').stop().animate({
                 'scrollTop': $target.offset().top
            }, 900, 'swing');
    });

    // Add slideDown animation to Bootstrap dropdown on hover.
    $('.navbar .dropdown').hover(function() {
      $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
    }, function() {
      $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp()
    });
});