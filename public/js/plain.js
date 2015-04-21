jQuery.noConflict();
//show/hide docked nav
jQuery(window).scroll(function(e){
    if(jQuery(this).scrollTop() >=125){
        if(!jQuery("#docked-nav").hasClass('active')){
            jQuery("#docked-nav").addClass('active').stop().slideDown(100);
        }
    } else {
        if(jQuery("#docked-nav").hasClass('active')){
            jQuery("#docked-nav").removeClass('active').stop().slideUp(100);


            //reset hamburger menu
            jQuery("#screenWrapper").animate({
                marginLeft: "0px",
                duration: 200
            });
            jQuery("#hamburger-menu").animate({
                width: 'hide',
                duration: 200
            });
        }
    };
});
// ------------------------------------------------------------------------ //
// -- A function that sets the login link based on the WatersLoginCookie -- //
// ------------------------------------------------------------------------ //
setLoginLink = function()
{
    var loggedIn = document.cookie.match ( 'WatersLoginCookie=(.*?)(;|$)' );

    if(typeof(loggedIn)=='undefined'){
        loggedIn = false;
    }
    //alert("After get loginIn cookie");
    if (! loggedIn )
    {
        if (window.location.href.indexOf('login.htm') != -1)
        {
            var redirectUrl = '/waters/home.htm';
        }
        else
        {
            var redirectUrl = escape(window.location.href);
        }
        try{
            $('loginLink').href = 'https://www.waters.com/waters/login.htm?redirectUrl=' + redirectUrl + '';
            $('loginLink').innerHTML = "Login" + "/" + "Register";
        }
        catch(e){
            var logIn = document.getElementById("loginLink");
            logIn.href = 'https://www.waters.com/waters/login.htm?redirectUrl=' + redirectUrl + '';
            logIn.innerHTML = "Login" + "/" + "Register";
        }
    }
};


var $j = jQuery.noConflict();
$j(document).ready(function(){
    $j('.topNav li').hoverIntent(showMM,hideMM);
    $j('.megaMenuNav .topMenuSecondary').hover(showMMSecondary,hideMMSecondary);
    function showMM(){
        var megamenu = $j(this).children('.megaMenu');
        megamenu.addClass('hover');
        megamenu.children('.megaMenuNav').children().removeClass('hover');
        megamenu.children('.megaMenuNav').children('.topMenuSecondary:first-child').addClass('hover');
    }
    function hideMM(){
        var megamenu = $j(this).children('.megaMenu');
        megamenu.removeClass('hover');
    }
    function showMMSecondary(){
        var parentUL = $j(this).parents('.megaMenuNav');
        parentUL.children('.topMenuSecondary').removeClass('hover');
        $j(this).addClass('hover');
    }
    function hideMMSecondary(){
        if(!$j(this).parents('.megaMenuNav').children().last()) {
            $j(this).removeClass('hover');
        }
    }
    $j('#loginRegisterLI').bind('mouseenter mouseleave', function() {
        $j('#loginDD').toggle();
    });


    //extend left column border if it's on the page
    var pageHeight = $j("#LeftNav").parentsUntil("row").next().height()+40;
    if($j("#LeftNav").height() < pageHeight) {
        $j("#LeftNav").height(pageHeight);
    };


    // 3 column layout fix
    var cBody = $j("#ContentBody");
    if ($j("#LeftNav").is(':visible') && $j("#RightNav").is(':visible') && $j("#ContentBody").length ){
        cBody.hasClass('twoColLayout')?cBody.removeClass('twoColLayout'):'';
        cBody.addClass('centerColumn');
    }
    /*if(cBody.is(':visible') && cBody.hasClass('centerColumn')){
     cBody.removeClass('centerColumn');
     }*/

    if ($j("#LeftNav").is(':hidden') && $j("#RightNav").is(':visible')){
        //old hack for IE6....
        //if ($j.browser.msie && $j.browser.version.substr(0,1)<7) {return;} //do not size if in IE
        cBody.addClass('auto');
    }
});

// JavaScript Document

if (typeof soliloquy_slider === 'undefined' || false === soliloquy_slider) {
    soliloquy_slider = {};
}
jQuery('#soliloquy-container-383').css('height', Math.round(jQuery('#soliloquy-container-383').width() / (1180 / 426)));
jQuery(window).load(function () {
    var $ = jQuery;
    var soliloquy_container_383 = $('#soliloquy-container-383'), soliloquy_383 = $('#soliloquy-383');
    soliloquy_slider['383'] = soliloquy_383.soliloquy({
        slideSelector: '.soliloquy-item',
        speed: 600,
        pause: 5000,
        auto: 1,
        useCSS: 0,
        keyboard: true,
        adaptiveHeight: 1,
        adaptiveHeightSpeed: 400,
        infiniteLoop: 1,
        mode: 'fade',
        pager: 1,
        controls: 1,
        nextText: '',
        prevText: '',
        startText: '',
        stopText: '',
        onSliderLoad: function (currentIndex) {
            soliloquy_container_383.find('.soliloquy-active-slide').removeClass('soliloquy-active-slide');
            soliloquy_container_383.css({'height': 'auto', 'background-image': 'none'});
            if (soliloquy_container_383.find('.soliloquy-slider li').size() > 1) {
                soliloquy_container_383.find('.soliloquy-controls').fadeTo(300, 1);
            }
            soliloquy_383.find('.soliloquy-item:not(.soliloquy-clone):eq(' + currentIndex + ')').addClass('soliloquy-active-slide');
            soliloquy_container_383.find('.soliloquy-clone').find('*').removeAttr('id');
        },
        onSlideBefore: function (element, oldIndex, newIndex) {
            soliloquy_container_383.find('.soliloquy-active-slide').removeClass('soliloquy-active-slide');
            $(element).addClass('soliloquy-active-slide');
        },
        onSlideAfter: function (element, oldIndex, newIndex) {
        },
    });
});


