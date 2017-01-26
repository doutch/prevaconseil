//Animation du slideshow de la page d'accueil


jQuery(document).ready(function ($) {
            //Reference http://www.jssor.com/development/slider-with-slideshow-jquery.html
            //Reference http://www.jssor.com/development/tool-slideshow-transition-viewer.html

            var _SlideshowTransitions = [
            //Fade
            { $Duration: 1200, $Opacity: 2 }
            ];

            var options = {
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $DragOrientation: 3,  
                $PauseOnHover : 0,                              //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
            },
                
            $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
	            $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
	            $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
	            $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
	            $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
	            $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
	            $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
	            $SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
	            $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
	        },

	        $ArrowNavigatorOptions: {
	            $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
	            $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
	            $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
	            $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
	        }
                
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

	
	//code pour l'adaptation responsive
	var jssor_slider1 = new $JssorSlider$("slider1_container", options);
	//responsive code begin
        //you can remove responsive code if you don't want the slider scales
        //while window resizes
        function ScaleSlider() {
            var parentWidth = $('#slider1_container').parent().width();
            if (parentWidth) {
                 jssor_slider1.$ScaleWidth(Math.min(parentWidth, 1920));
            }
            else
                window.setTimeout(ScaleSlider, 30);
        }
        //Scale slider after document ready
        ScaleSlider();
                                        
        //Scale slider while window load/resize/orientationchange.
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
	
	
});
	

