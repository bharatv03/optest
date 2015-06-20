jQuery(document).ready(function(){
        jQuery('input[type=radio]').change(function(){
	    var accType = jQuery(this).val();
	    if ( accType == 0 ) {
		jQuery('#for_acc').html('Individual Student');
	    }
	    if ( accType == 1 ) {
		jQuery('#for_acc').html('Institute');
	    }
	    });
	loadcaptcha();
	jQuery('#refresh_captch').click(function(){
	    loadcaptcha();
	    });
    
    jQuery('#join-us').click(function(){
            loadcaptcha();
            jQuery('#signup_form').trigger("reset");
            jQuery('#data-not').html('').removeClass('alert-danger');
        });
	
	jQuery('#signup_form').submit(function() {
	    jQuery("#signup_form").validate({
		rules: {
		    u_e: {
			required: true,
			email: true
		    },
		    password: {
			required: true
		    },
		    cpassword: {
			required: true,
			equalTo: "#password"
		    },
		    captcha_box: {
			required: true
		    }
		},
		messages: {
		     u_e: {
			required: "Please enter your email address",
			email: "Please enter valid email address"
		    },
		    password: {
			required: "Please enter a password"
		    },
		    cpassword: {
			required: "Please enter confirm password",
			equalTo: "Please enter same password"
		    },
		    captcha_box: {
			required: "Please enter a captcha value"
		    }
		}
	    });
	    if (jQuery('#signup_form').valid()) {
		jQuery.ajax({
		    type: "post",
		    url: "users/signup",
		    data: {
			u_e: jQuery('#u_e').val(),
			user_type: jQuery('.user_type:checked').val(),
			password: jQuery('#password').val(),
			cpassword: jQuery('#cpassword').val(),
			captcha_box: jQuery('#captcha_box').val()
		    },
		    success: function(result) {
		       if (result == 'yes') {
                location.reload();
		       }
               else
               {
                jQuery("#data-not").addClass("alert-danger").html(result);
               }
		    }
		});
	    }
	    return false;
	});
	
	jQuery('#optest_form').submit(function(e) {
	    jQuery("#optest_form").validate({
		rules: {
		    u_er: {
			required: true,
			email: true
		    },
		    pass: {
			required: true
		    }
		},
		messages: {
		     u_er: {
			required: "Please enter your email address",
			email: "Please enter valid email address"
		    },
		    pass: {
			required: "Please enter a password"
		    }
		}
		
	    });
	    if (jQuery('#optest_form').valid()) {
	    return;
	    }
	    e.preventDefault();
	    
	
	});
});
    function loadcaptcha(){
       jQuery.ajax({
                    type: "post",
                    url: "/optest/optest/loadcaptcha",
                    data: false,
                    async:false,
                    success: function(result) {
                        jQuery('#captcha').html(result);
                    }
       });
    }