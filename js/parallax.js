 // ------------- VARIABLES ------------- //
var ticking = false;
var isFirefox = (/Firefox/i.test(navigator.userAgent));
var isIe = (/MSIE/i.test(navigator.userAgent)) || (/Trident.*rv\:11\./i.test(navigator.userAgent));
var scrollSensitivitySetting = 30; //Increase/decrease this number to change sensitivity to trackpad gestures (up = less sensitive; down = more sensitive) 
var slideDurationSetting = 600; //Amount of time for which slide is "locked"
var currentSlideNumber = 0;
var totalSlideNumber = $(".background").length;

// ------------- DETERMINE DELTA/SCROLL DIRECTION ------------- //
function parallaxScroll(evt) {
  if (isFirefox) {
    //Set delta for Firefox
    delta = evt.detail * (-120);
  } else if (isIe) {
    //Set delta for IE
    delta = -evt.deltaY;
  } else {
    //Set delta for all other browsers
    delta = evt.wheelDelta;
  }

  if (ticking != true) {
    if (delta <= -scrollSensitivitySetting) {
      //Down scroll
      ticking = true;
      if (currentSlideNumber !== totalSlideNumber - 1) {
        currentSlideNumber++;
        nextItem();
      }
      slideDurationTimeout(slideDurationSetting);
    }
    if (delta >= scrollSensitivitySetting) {
      //Up scroll
      ticking = true;
      if (currentSlideNumber !== 0) {
        currentSlideNumber--;
      }
      previousItem();
      slideDurationTimeout(slideDurationSetting);
    }
    update_navBullets();
    localStorage.setItem("storedSlideNumber", currentSlideNumber);
  }
}

function jumpToItem(slideNumber) {
     $(".background").each( function(index){
         if (index<slideNumber) {
             $(this).addClass("down-scroll").removeClass("up-scroll");
         }
         else if (index==slideNumber) {
             $(this).addClass("up-scroll").removeClass("down-scroll");
         }
         else {
             $(this).removeClass("up-scroll").removeClass("up-scroll");
         }
     });
     currentSlideNumber = slideNumber;
     localStorage.setItem("storedSlideNumber", currentSlideNumber);
     update_navBullets();
}

$( ".navBarItem" ).click(function() {
    var index = $( ".navBarItem" ).index( this );
    jumpToItem(index);
});

$( ".navBullet" ).click(function() {
    var index = $( ".navBullet" ).index( this );
    jumpToItem(index);
});

$( "div.top-down" ).click(function() {
    jumpToItem(1);
});

$( document ).ready(function() {
   index = localStorage.getItem("storedSlideNumber"); 
   jumpToItem(index);
}); 

// ------------- SET TIMEOUT TO TEMPORARILY "LOCK" SLIDES ------------- //
function slideDurationTimeout(slideDuration) {
  setTimeout(function() {
    ticking = false;
  }, slideDuration);
}

// ------------- ADD EVENT LISTENER ------------- //
var mousewheelEvent = isFirefox ? "DOMMouseScroll" : "wheel";
window.addEventListener(mousewheelEvent, _.throttle(parallaxScroll, 60), false);

// ------------- SLIDE MOTION ------------- //
function nextItem() {
  var $previousSlide = $(".background").eq(currentSlideNumber - 1);
  $previousSlide.removeClass("up-scroll").addClass("down-scroll");
}

function previousItem() {
  var $currentSlide = $(".background").eq(currentSlideNumber);
  $currentSlide.removeClass("down-scroll").addClass("up-scroll");
}

function update_navBullets() {
  $(".navBullet").removeClass("active");
  $(".navBullet").eq(currentSlideNumber).addClass("active");
var $nextNavBullet = $(".navBullet").eq(currentSlideNumber);
}