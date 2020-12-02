document.addEventListener('DOMContentLoaded', function() {
    var elemsSidenav = document.querySelectorAll('.sidenav');
    var elemsScrollSpy = document.querySelectorAll('.scrollspy');
    
    var optionsSidenav  = {};
    var optionsScrollSpy = {};
    
    M.Sidenav.init(elemsSidenav, optionsSidenav);
    M.ScrollSpy.init(elemsScrollSpy, optionsScrollSpy);
});