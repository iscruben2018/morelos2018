jQuery(function ($) {
    'use strict';
    if ($.fn.themeSlider) {
        $(".art-slidecontainerDSC01891").each(function () {
            var slideContainer = $(this), tmp;
            var inner = $(".art-slider-inner", slideContainer);
            inner.children().filter("script").remove();
            var helper = null;
            
            if ($.support.themeTransition) {
                helper = new BackgroundHelper();
                helper.init("fade", "next", $(".art-slide-item", inner).first().css($.support.themeTransition.prefix + "transition-duration"));
                inner.children().each(function () {
                    helper.processSlide($(this));
                });

                
            } else if (browser.ie && browser.version <= 8) {
                var slidesInfo = {
".art-slideDSC018910": {
    "bgimage" : "url('images/slideDSC018910.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018911": {
    "bgimage" : "url('images/slideDSC018911.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018912": {
    "bgimage" : "url('images/slideDSC018912.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018913": {
    "bgimage" : "url('images/slideDSC018913.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018914": {
    "bgimage" : "url('images/slideDSC018914.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018915": {
    "bgimage" : "url('images/slideDSC018915.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018916": {
    "bgimage" : "url('images/slideDSC018916.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
},
".art-slideDSC018917": {
    "bgimage" : "url('images/slideDSC018917.png')",
    "bgposition": "0 0",
    "images": "",
    "positions": ""
}
                };
                $.each(slidesInfo, function(selector, info) {
                    processElementMultiplyBg(slideContainer.find(selector), info);
                });
            }

            inner.children().eq(0).addClass("active");
            slideContainer.themeSlider({
                pause: 2600,
                speed: 600,
                repeat: true,
                animation: "fade",
                direction: "next",
                navigator: slideContainer.siblings(".art-slidenavigatorDSC01891"),
                helper: helper
            });
            
                        
        });
    }
});
