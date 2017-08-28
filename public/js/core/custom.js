$(function() {
    /* DinamicMenu()
     * dinamic activate menu
     */
    $.AdminLTE.dynamicMenu = function() {
        var url = window.location;
        // Will only work if string in href matches with location
        $('.treeview-menu li a[href="' + url + '"]').parent().addClass('active');
        // Will also work for relative and absolute hrefs
        $('.treeview-menu li a').filter(function() {
            return this.href == url;
        }).parent().parent().parent().addClass('active');
    };

     // Enable smooth scroll for internal links
    $('a[href^="#"]').on('click',function (e) {
            e.preventDefault();

            var target = this.hash;
            var $target = $(target);

            $('html, body').stop().animate({
                 'scrollTop': $target.offset().top
            }, 900, 'swing');
    });

});