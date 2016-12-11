
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
    // Header search bar
    $("#s").hide();
    $("#searchsubmit").on("click", function(e) {
        console.log("this is the search in the header");
        if ( $("#s").is(":visible")) {
            if ($('#s').attr('value') == "") {
                e.preventDefault();
                $("#s").toggle();
            }
        } else {
            e.preventDefault();
            $("#s").toggle();
        }
    })

    // Events archive - switch order of image and content on even numbered articles
    $("article:odd").addClass("even-article");
    $("article:odd").find(".content-right").addClass("push-md-6");
    $("article:odd").find(".pic-left").addClass("pull-md-6");



})


