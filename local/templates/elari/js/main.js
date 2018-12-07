// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

(function($) {
    $(document).ready(function() {

      $('[name="select_color"]').on('change', function(){
        var checked_color = $(this).val();
        $('#pa_colors option').removeAttr('selected').removeProp('selected');
        $('#pa_colors option[value="' + checked_color + '"]').attr('selected', 'selected').prop('selected', true);
        $('#pa_colors').trigger('change');
      });

      $('[name="select_memory"]').on('change', function(){
        var checked_memory = $(this).val();
        $('#pa_mem option').removeAttr('selected').removeProp('selected');
        $('#pa_mem option[value="' + checked_memory + '"]').attr('selected', 'selected').prop('selected', true);
        $('#pa_mem').trigger('change');
      });

      $('.color-select [value="' + $('#pa_colors').val() + '"]').attr('checked', 'checked').prop('checked', true);
      $('.memory-select [value="' + $('#pa_mem').val() + '"]').attr('checked', 'checked').prop('checked', true);

      $('#contactform input[name=txtphone]').mask('+38 (000) 000-00-00', {
        clearIfNotMatch: true
    });


    });
})(jQuery);