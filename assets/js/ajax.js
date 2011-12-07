jQuery(document).ready(function($) {
    var $mainContent = $("#post_content"),
        siteUrl = "http://" + top.location.host.toString(),
        url = ''; 

    $(document).delegate("a[href^='"+siteUrl+"']:not([href*=/wp-admin/]):not([href*=/wp-login.php]):not([href$=/feed/])", "click", function() {
        location.hash = this.pathname;
        return false;
    }); 

    $(window).bind('hashchange', function(){
        url = window.location.hash.substring(1); 

        if (!url) {
            return;
        } 

        url = url + " #content_wrap"; 
		console.log(url);
        $mainContent.animate({opacity: "0.1"}).html('<p>Please wait...</>').load(url, function() {
            $mainContent.animate({opacity: "1"});
        });
    });

    $(window).trigger('hashchange');
});