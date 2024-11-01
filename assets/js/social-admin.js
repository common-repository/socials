	window.onload = function() {
		jQuery('#publish-test-post').on("click",function(e){
			if (jQuery(".rapiddev-alert-danger").is(":visible")) {jQuery(".rapiddev-alert-danger").slideToggle();}
			if (jQuery(".rapiddev-alert-success").is(":visible")) {jQuery(".rapiddev-alert-success").slideToggle();}
			jQuery("#alert-saving-header").html("Look out!");jQuery("#alert-saving-message").html("Test post being published");
			if (jQuery(".rapiddev-alert-saving").is(":hidden")) {jQuery(".rapiddev-alert-saving").slideToggle();}
			e.preventDefault();
			jQuery.ajax({
				type:"POST",
				url:"https://graph.facebook.com/"+social_sharing.page_id+"/feed",
				data:{access_token:social_sharing.page_token,link:social_sharing.site_url,message:"This is a test post sent using Social Sharing"},
				success:function(d) {
					if (jQuery(".rapiddev-alert-saving").is(":visible")) {jQuery(".rapiddev-alert-saving").slideToggle();}
					console.log(d);
				},
				error: function(d){
					var response = jQuery.parseJSON(d.responseText);
					if (jQuery(".rapiddev-alert-saving").is(":visible")) {jQuery(".rapiddev-alert-saving").slideToggle();}
					jQuery("#alert-danger-header").html("Error!");jQuery("#alert-danger-message").html(response.error.message+", ERROR CODE: "+response.error.code);
					if (jQuery(".rapiddev-alert-danger").is(":hidden")) {jQuery(".rapiddev-alert-danger").slideToggle();}
				}
			});
		});
		jQuery("#social-save-options:not(:disabled)").on("click",function(e){
			if (jQuery(".rapiddev-alert-danger").is(":visible")) {jQuery(".rapiddev-alert-danger").slideToggle();}
			if (jQuery(".rapiddev-alert-success").is(":visible")) {jQuery(".rapiddev-alert-success").slideToggle();}
			jQuery("#alert-saving-header").html("Look out!");jQuery("#alert-saving-message").html("Changes are being saved");
			if (jQuery(".rapiddev-alert-saving").is(":hidden")) {jQuery(".rapiddev-alert-saving").slideToggle();}

			var formData = {action:"rapiddev_socials",security: social_sharing.nonce};
			jQuery.each(jQuery('#rapiddev-form-social-settings').serializeArray(), function(_, kv) {
				formData[kv.name] = kv.value;
			});
			e.preventDefault(),jQuery(this).attr("disabled",!0),jQuery.ajax({
				url:social_sharing.admin_url,
				type:"POST",
				data:formData,
				success:function(d){
					console.log(d);
					if (jQuery(".rapiddev-alert-saving").is(":visible")) {jQuery(".rapiddev-alert-saving").slideToggle();}
					jQuery("#alert-success-header").html("Yep!");jQuery("#alert-success-message").html("Changes are saved");
					if (jQuery(".rapiddev-alert-success").is(":hidden")) {jQuery(".rapiddev-alert-success").slideToggle();}
					jQuery(".rapiddev-alert-saved").slideToggle();
					jQuery('#social-save-options').attr("disabled",!1);
				}
			});
		});
	};