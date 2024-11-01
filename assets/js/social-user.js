	function rapiddev_error(id=null){jQuery('.rapiddev-alert:visible').slideToggle(500);if(id!=null){jQuery(id).delay(500).slideToggle(500);}}
	window.onload = function() {
		jQuery("#rd_facebook_share:not(:disabled)").on("click",function(e){
			rapiddev_error("#fb-sharing");
			var post_id = jQuery(this).attr("post-id");
			e.preventDefault(),jQuery(this).attr("disabled",!0);
			jQuery.ajax({
				url:social_sharing.admin_url,
				type:"post",
				data:{
					action:"rapiddev_socials",
					security: social_sharing.nonce,
					post_id: post_id
				},success:function(d){
					var r = jQuery.parseJSON(d);
					if(typeof r =='object')
					{
						if (typeof r.error !== 'undefined') {
							var fb_error_result = document.getElementById('fb_response');
							if (typeof(fb_error_result) != 'undefined' && fb_error_result != null)
							{
								fb_error_result.innerHTML = r.error.message;
							}
							rapiddev_error("#fb-error");
						}
					}else{
						rapiddev_error("#fb-success");
						console.log(d);
					}
					jQuery('#rd_facebook_share').attr("disabled",!1);
				}
			});
		});
	};