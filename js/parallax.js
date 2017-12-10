/*****************************************
 **  Simple fullpage Parallax Scroll Effect
 **  with touch support
 **  https://codepen.io/franzk/pen/aNxQxP
 **
 **  based on work by Emily Hayman
 **  https://codepen.io/eehayman/pen/qdGZJr
 **
 **  Further extended by Bram De Jaegher
 *****************************************/

// ------------- VARIABLES ------------- //
var ticking = false;
var isFirefox = (/Firefox/i.test(navigator.userAgent));
var isIe = (/MSIE/i.test(navigator.userAgent)) || (/Trident.*rv\:11\./i.test(navigator.userAgent));
var scrollSensitivitySetting = 30; //Increase/decrease this number to change sensitivity to trackpad gestures (up = less sensitive; down = more sensitive)
var slideDurationSetting = 600; //Amount of time for which slide is "locked"
var currentSlideNumber = 0;
var totalSlideNumber = $(".background").length;

// ------------- Remove URL bar ----------------//
window.addEventListener("load", function() { window. scrollTo(0, 0); });

// ------------- DETERMINE DELTA/SCROLL DIRECTION ------------- //
function wheelScroll(evt) {
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

function touchScroll(ts, te) {
  delta = te - ts;
  console.log('para');
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
   //var height = window.innerHeight;
   //var width = window.innerWidth;
   //$(".background").height(height).width(width);
});

// ------------- SET TIMEOUT TO TEMPORARILY "LOCK" SLIDES ------------- //
function slideDurationTimeout(slideDuration) {
  setTimeout(function() {
    ticking = false;
  }, slideDuration);
}

// ------------- ADD EVENT LISTENER ------------- //
var mousewheelEvent = isFirefox ? "DOMMouseScroll" : "wheel";
var ts;

//window.addEventListener(mousewheelEvent, _.throttle(wheelScroll, 60), false);
window.addEventListener(mousewheelEvent, $.throttle(60, wheelScroll), false);
window.addEventListener("touchstart", function(e) {
  ts = e.touches[0].clientY;
}, false);
window.addEventListener("touchend", function(e) {
  var te = e.changedTouches[0].clientY;
  touchScroll(ts, te);
}, false);

// ------------- SLIDE MOTION ------------- //
function nextItem() {
  var $previousSlide = $(".background").eq(currentSlideNumber - 1);
  $previousSlide.removeClass("up-scroll").addClass("down-scroll");
}

function previousItem() {
  var $currentSlide = $(".background").eq(currentSlideNumber);
  $currentSlide.removeClass("down-scroll").addClass("up-scroll");
}

// ------------- Navigation Bullets ------------- //
function update_navBullets() {
  $(".navBullet").removeClass("active");
  $(".navBullet").eq(currentSlideNumber).addClass("active");
var $nextNavBullet = $(".navBullet").eq(currentSlideNumber);
}
