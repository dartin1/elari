$(document).ready(function () {
    var masterslider_fb6f = new MasterSlider();

    // slider controls
    masterslider_fb6f.control('arrows', {autohide: false, overVideo: true});
    // slider setup
    masterslider_fb6f.setup("masterslider", {
        width: 1920,
        height: 614,
        minHeight: 0,
        space: 0,
        start: 1,
        grabCursor: true,
        swipe: true,
        mouse: true,
        keyboard: false,
        layout: "boxed",
        wheel: false,
        autoplay: true,
        instantStartLayers: false,
        loop: false,
        shuffle: false,
        preload: 0,
        heightLimit: true,
        autoHeight: false,
        smoothHeight: true,
        endPause: false,
        overPause: true,
        fillMode: "fill",
        centerControls: true,
        startOnAppear: false,
        layersMode: "center",
        autofillTarget: "",
        hideLayers: false,
        fullscreenMargin: 0,
        speed: 15,
        dir: "h",
        parallaxMode: 'swipe',
        view: "basic"
    });
});


jQuery(window).load(function() {

    var isTouchAnimation = themo_is_touch_device(false);

    if(!isTouchAnimation){

        themo_animate_scrolled_into_view(jQuery('#themo_service_block_1 .service-block-0'),'slideUp','0');
        themo_animate_scrolled_into_view(jQuery('#themo_service_block_1 .service-block-1'),'slideUp','100');
        themo_animate_scrolled_into_view(jQuery('#themo_service_block_1 .service-block-2'),'slideUp','200');
        themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .blockquote-1'),'slideUp','0');
        themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .circle-1'),'slideUp','100');
        themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .figcaption-1'),'slideUp','200');
        themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .blockquote-2'),'slideUp','300');
        themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .circle-2'),'slideUp','400');
        themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .figcaption-2'),'slideUp','500');
        themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .blockquote-3'),'slideUp','600');
        themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .circle-3'),'slideUp','700');
        themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .figcaption-3'),'slideUp','800');
        themo_animate_scrolled_into_view(jQuery('#themo_call_to_action_1 .themo-action-text'),'slideUp','0');

        var scrollTimeout;  // global for any pending scrollTimeout

        jQuery(window).scroll(function() {
            if (scrollTimeout) {
                // clear the timeout, if one is pending
                clearTimeout(scrollTimeout);
                scrollTimeout = null;
            }
            scrollTimeout = setTimeout(scrollHandler, 0);
        });

        scrollHandler = function () {
            if(!themo_is_touch_device(false)){ // Disable for Mobile
                themo_animate_scrolled_into_view(jQuery('#themo_service_block_1 .service-block-0'),'slideUp','0');
                themo_animate_scrolled_into_view(jQuery('#themo_service_block_1 .service-block-1'),'slideUp','100');
                themo_animate_scrolled_into_view(jQuery('#themo_service_block_1 .service-block-2'),'slideUp','200');
                themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .blockquote-1'),'slideUp','0');
                themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .circle-1'),'slideUp','100');
                themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .figcaption-1'),'slideUp','200');
                themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .blockquote-2'),'slideUp','300');
                themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .circle-2'),'slideUp','400');
                themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .figcaption-2'),'slideUp','500');
                themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .blockquote-3'),'slideUp','600');
                themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .circle-3'),'slideUp','700');
                themo_animate_scrolled_into_view(jQuery('#themo_testimonials_1 .figcaption-3'),'slideUp','800');
                themo_animate_scrolled_into_view(jQuery('#themo_call_to_action_1 .themo-action-text'),'slideUp','0');
            }
        };
    };

});

jQuery(function(a){a(".woocommerce-ordering").on("change","select.orderby",function(){a(this).closest("form").submit()}),a("input.qty:not(.product-quantity input.qty)").each(function(){var b=parseFloat(a(this).attr("min"));b>=0&&parseFloat(a(this).val())<b&&a(this).val(b)})});
