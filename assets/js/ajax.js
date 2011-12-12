function load_scroller(){
	jQuery('#slider_wrap').cycle({ 
        fx:     'scrollRight', 
        speed:  'slow', 
        timeout: 5000, 
        pager:  '#slider_nav', 

        // callback fn that creates a thumbnail to use as pager anchor 
        pagerAnchorBuilder: function(idx, slide) { 
            return '<div class="thumb"><a href="#"><img src="' + slide.src + '" height="43" /></a></div>'; 
        } 
    });
}

jQuery(document).ready(function($) {
    var $mainContent = $("#post_content"),
        siteUrl = "http://" + top.location.host.toString(),
        url = ''; 

    $(document).delegate("a[href^='"+siteUrl+"']:not([href*=/wp-admin/]):not([href*=/wp-login.php]):not([href$=/feed/])", "click", function() {
        location.hash = this.pathname;
        return false;
    }); 

    $("#searchform").submit(function(e) {
        location.hash = '?s=' + $("#s").val();
        e.preventDefault();
    }); 

    $(window).bind('hashchange', function(){
        url = window.location.hash.substring(1); 

        if (!url) {
            return;
        } 

        url = url + " #content_wrap"; 

        $mainContent.css("opacity", "0").load(url, function() {
            $mainContent.animate({opacity: "1"});
			load_scroller();
        });
    });

    $(window).trigger('hashchange');
});