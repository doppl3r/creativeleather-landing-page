'use strict';

//resize any element with the given class
function fullscreen(name) {
    $(name).addClass('fullscreen');
    $('.fullscreen').css({
        width: $(window).width(),
        height: $(window).height()
    });
}

//Listen to Window Resize
var $resize = $(window).resize(function () { if (!isMobile()) fullscreen(null); });

function isMobile() {return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)); }
function isIE(){ return (navigator.userAgent.indexOf("MSIE") != -1); }
function isSafari(){ return (navigator.userAgent.indexOf("Safari") > -1); }

//slice off the 'html' extra for the website
sliceExtension();
function sliceExtension(){
    var myURL=window.location.href;
    if (myURL.lastIndexOf(".html") > 0 && myURL.indexOf('127.0.0.1') < 0){
        //remove fragment as much as it can go without adding an entry in browser history:
        window.location.replace("#");
        //slice off the remaining '#' in HTML5:    
        if (typeof window.history.replaceState == 'function') {
            history.replaceState({}, '', window.location.href.slice(0, myURL.lastIndexOf(".")));
        }
        if (myURL.lastIndexOf("index") > 0){
            history.replaceState({}, '', window.location.href.slice(0, myURL.lastIndexOf("index")));
        }
    }
}

//Google Analytics
var script1 = document.createElement( 'script' );
script1.type = 'text/javascript';
script1.src = 'js/custom-GA.js';
$("body").append( script1 );

//Google Analytics for Creative Leather
/*var script1_2 = document.createElement( 'script' );
script1_2.type = 'text/javascript';
script1_2.src = 'js/custom-GA2.js';
$("body").append( script1_2 );*/

//AdRoll Pixel
var script2 = document.createElement( 'script' );
script2.type = 'text/javascript';
script2.src = 'js/adroll-pixel.js';
$("body").append( script2 );

//Facebook Pixel
var script3 = document.createElement( 'script' );
script3.type = 'text/javascript';
script3.src = 'js/facebook-pixel.js';
$("body").append( script3 );
