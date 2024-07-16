function lms_education_courses_menu_open_nav() {
	window.lms_education_courses_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function lms_education_courses_menu_close_nav() {
	window.lms_education_courses_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},
		speed: 'fast'
 	});
});

jQuery(document).ready(function () {
	window.lms_education_courses_currentfocus=null;
  	lms_education_courses_checkfocusdElement();
	var lms_education_courses_body = document.querySelector('body');
	lms_education_courses_body.addEventListener('keyup', lms_education_courses_check_tab_press);
	var lms_education_courses_gotoHome = false;
	var lms_education_courses_gotoClose = false;
	window.lms_education_courses_responsiveMenu=false;
 	function lms_education_courses_checkfocusdElement(){
	 	if(window.lms_education_courses_currentfocus=document.activeElement.className){
		 	window.lms_education_courses_currentfocus=document.activeElement.className;
	 	}
 	}
 	function lms_education_courses_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.lms_education_courses_responsiveMenu){
			if (!e.shiftKey) {
				if(lms_education_courses_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				lms_education_courses_gotoHome = true;
			} else {
				lms_education_courses_gotoHome = false;
			}

		}else{

			if(window.lms_education_courses_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.lms_education_courses_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.lms_education_courses_responsiveMenu){
				if(lms_education_courses_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					lms_education_courses_gotoClose = true;
				} else {
					lms_education_courses_gotoClose = false;
				}

			}else{

			if(window.lms_education_courses_responsiveMenu){
			}}}}
		}
	 	lms_education_courses_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});

jQuery(document).ready(function () {
  function lms_education_courses_search_loop_focus(element) {
	  var lms_education_courses_focus = element.find('select, input, textarea, button, a[href]');
	  var lms_education_courses_firstFocus = lms_education_courses_focus[0];
	  var lms_education_courses_lastFocus = lms_education_courses_focus[lms_education_courses_focus.length - 1];
	  var KEYCODE_TAB = 9;

	  element.on('keydown', function lms_education_courses_search_loop_focus(e) {
	    var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

	    if (!isTabPressed) {
	      return;
	    }

	    if ( e.shiftKey ) /* shift + tab */ {
	      if (document.activeElement === lms_education_courses_firstFocus) {
	        lms_education_courses_lastFocus.focus();
	          e.preventDefault();
	        }
	      } else /* tab */ {
	      if (document.activeElement === lms_education_courses_lastFocus) {
	        lms_education_courses_firstFocus.focus();
	          e.preventDefault();
	        }
	      }
	  });
	}
	jQuery('.search-box span a').click(function(){
    jQuery(".serach_outer").slideDown(1000);
  	lms_education_courses_search_loop_focus(jQuery('.serach_outer'));
  });
  jQuery('.closepop a').click(function(){
    jQuery(".serach_outer").slideUp(1000);
  });
});




