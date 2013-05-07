;(function($) { 

    $(document).ready(function() {

        // Toggle the display of FAQ's'
        $("dt a").click(function(e) {
            $(e.target).parent().next().toggle();
            return false;
        });

        // Toggle the display of FAQ's'
        $(".more a").click(function(e) {
            $(e.target).parent().parent().next().toggle();
            return false;
        });

    });

})(jQuery);