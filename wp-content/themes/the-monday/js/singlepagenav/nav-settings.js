/*
 * Settings of the sticky menu
 */

jQuery(document).ready(function($){
    $(window).load(function(){
        var headerHeight = $('.tm-header-container').outerHeight();
        $('.primary-menu-container').onePageNav({
            currentClass: 'current',
            changeHash: false,
            scrollSpeed: 750,
            scrollOffset: headerHeight,
            scrollThreshold: 0.5
        });
    });
});