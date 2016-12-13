
/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @see https://codex.wordpress.org/Theme_Customization_API#Part_3:_Configure_Live_Preview_.28Optional.29
 */
( function( $ ) {

    // Update the site title in real time...
    //wp.customize( 'blogname', function( value ) {
       // value.bind( function( newval ) {
         //   console.log(newval);
          //  $( '.navbar-header a' ).html( newval );
      //  } );
   // } );




} )( jQuery );

jQuery(document).ready(function($) {
    // Header search bar DESKTOP Menu
    $('.header-icons').find(".form-control").hide();
    $('.header-icons').find("#searchsubmit").on("click", function(e) {
        console.log("this is the search in the header");
        if ( $('.header-icons').find("#s").is(":visible")) {
            if ($('.header-icons').find('#s').attr('value') == "") {
                e.preventDefault();
                $('.header-icons').find("#s").toggle();
            }
        } else {
            e.preventDefault();
            $('.header-icons').find("#s").toggle();
        }
    })

    //Header search bar MOBILE Menu
    $('#exCollapsingNavbar').find("#searchsubmit").on("click", function(e) {
        console.log("this is the search in the header");
        if ($('#exCollapsingNavbar').find('#s').attr('value') == "") {
            e.preventDefault();
        }
    })
    // Events archive - switch order of image and content on even numbered articles
    $(".upcoming-events").children("article:odd").addClass("even-article");
    $(".upcoming-events").children("article:odd").find(".content-right").addClass("push-md-6");
    $(".upcoming-events").children("article:odd").find(".pic-left").addClass("pull-md-6");

    // Ticket Price : Change $0.00 to Free
    console.log('checking price');
    if ($(".price-mem") == '$0.00') {
        console.log('member price is 0');
        $(".price-mem").text('Free');
    }
    if ($(".price-nonmem") == '$0.00') {
        console.log('non-member price is 0');
        $(".price-nonmem").text('Free');
    }



})


