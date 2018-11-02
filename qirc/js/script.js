/**
 * @file
 * A JavaScript file for the theme.

 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
//Drupal.behaviors.mainMenuTinyNav = {

//  attach: function(context, settings) {
//    $(".region-navigation .block__content > .menu").tinyNav({
//      active: 'active-trail:last'
//    });
//    $('select.tinynav').prepend('<option value="#">Menu</option>');
//  }
// };

// Drupal.behaviors.mainMenuSuperfish = {
//  attach: function(context, settings) {

//    var superfish_menu = $(".region-navigation .block__content > .menu");
//
//    superfish_menu.addClass('sf-menu');
//    superfish_menu.superfish({
//      autoArrows:  false
//    });
//  }
// };


// Drupal.behaviors.responsiveSlides = {
//    attach: function(context, settings) {
//
//        $(".view-slideshow ul:not(.contextual-links)").responsiveSlides({
//            "auto": false,
//            "pager": true,         // Boolean: Show pager, true or false
//            "pauseButton": false   // Boolean: Create Pause Button
//        });

//    }
// };

  $(document).ready(function($) {
        
        $("h3.ui-accordion-header:odd").css( "background-color", "#fff" );
	  
	var headers = $('#accordion .accordion-header');
        var contentAreas = $('#accordion .ui-accordion-content ').hide();
        var expandLink = $('.accordion-expand-all');

// add the accordion functionality
headers.click(function() {
    var panel = $(this).next();
    var isOpen = panel.is(':visible');
 
    // open or close as necessary
    panel[isOpen? 'slideUp': 'slideDown']()
        // trigger the correct custom event
        .trigger(isOpen? 'hide': 'show');

    // stop the link from causing a pagescroll
    return false;
});

// hook up the expand/collapse all
expandLink.click(function(){
    alert('triggered expand all');	
    var isAllOpen = $(this).data('isAllOpen');
    
    contentAreas[isAllOpen? 'hide': 'show']()
        .trigger(isAllOpen? 'hide': 'show');
});

// when panels open or close, check to see if they're all open
contentAreas.on({
    // whenever we open a panel, check to see if they're all open
    // if all open, swap the button to collapser
    show: function(){
        var isAllOpen = !contentAreas.is(':hidden');   
        if(isAllOpen){
            expandLink.text('Collapse All')
                .data('isAllOpen', true);
        }
    },
    // whenever we close a panel, check to see if they're all open
    // if not all open, swap the button to expander
    hide: function(){
        var isAllOpen = !contentAreas.is(':hidden');
        if(!isAllOpen){
            expandLink.text('Expand all')
            .data('isAllOpen', false);
        } 
    }
});  
	  
	  
	  
	  
	  
	  
	  
        
    });	// end document ready
	


})(jQuery, Drupal, this, this.document);




function printPage(){
	
	window.print();
}


