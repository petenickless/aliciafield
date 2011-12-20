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

function getPosition(){
	current_page_id = $("#post_content").attr("class");
	return pos = $("#"+current_page_id).position();
}

function getWidth(){
	current_page_id = $("#post_content").attr("class");
	return width = $("#"+current_page_id).width();
}

function positionNavId(){
	getPosition();
	getWidth();
	console.log(width);
	left = pos.left;
	$("#marker").animate({
		"left": left
	});
}

jQuery(document).ready(function($) {
	load_scroller();
    var $mainContent = $("#content_wrap"),
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
			positionNavId();
			load_scroller();
        });
    });

    $(window).trigger('hashchange');

	$("#contact_submit").live("click", function(e){
		e.preventDefault();
		var contact_name = $('#contact_name').attr('value');
		var contact_email = $('#contact_email').attr('value');
		var contact_query = $('#contact_query').attr('value');
		var botcha = $('#botcha').attr('value');
		var query_sent = $('#query_sent').attr('value');
		
		$.ajax({
			type: "POST",
			url: blog_details + "/assets/php/contact_submit.php",
			data: "contact_name="+ contact_name +"&contact_email="+ contact_email +"&contact_query="+ contact_query+"&botcha="+botcha+"&query_sent="+query_sent,
			dataType: "html",
			success: function(){ 
				$("#contact_form").fadeOut(function(){
					$("#contact_thanks").fadeIn();
				});
				
			},
		});
	});
});