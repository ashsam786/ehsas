
/*
* project : Ehsas | Ek zindagi bachane ka
* Author: Amir Samad Hanga
*/

function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 0);
	}
}

function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data('number-of-steps');
    var now_value = progress_line_object.data('now-value');
    var new_value = 0;
    if(direction == 'right') {
        new_value = now_value + ( 100 / number_of_steps );
    }
    else if(direction == 'left') {
        new_value = now_value - ( 100 / number_of_steps );
    }
    progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}

function validateFormData(self, next_step) {
    
    if( ($(self).val() == "" || $(self).val() == null) && $(self).hasClass('required')) {
        $(self).addClass('input-error');
        next_step = false;
    } else if(self.name == 'f1-contact-number' || self.name =='f1-alternate-number'){
        //if(!/\d{10}/.test($(self).val()) && $(self).val() != ''){
        if(!/^(\+91-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/.test($(self).val()) && $(self).val() != ''){
            $(self).addClass('input-error');
            next_step = false;            
        }
    } else if(self.name == 'f1-password' || self.name =='f1-repeat-password'){
        if($('input[name="f1-repeat-password"]').val() != $('input[name="f1-password"]').val()){
            $(self).addClass('input-error');
            next_step = false;            
        }
    } else {
        $(self).removeClass('input-error');
    }

    return next_step;
}

jQuery(document).ready(function() {
	var base_dir = 'ehsas.in';
    var base_url = location.protocol+'//'+location.host+'/'+base_dir;
    /*
        Fullscreen background
    */
    var backstretchImg = base_url+"/assets/img/backgrounds/1.jpg";
    $.backstretch(backstretchImg);
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
    	$.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
    	$.backstretch("resize");
    });
    
    /*
        Form
    */
    $('.f1 fieldset:first').fadeIn('slow');
    
    $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    // next step
    $('.f1 .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
    	var progress_line = $(this).parents('.f1').find('.f1-progress-line');
    	
    	// fields validation
        //parent_fieldset.find('input[type="text"], input[type="date"], select, input[type="password"], textarea').each(function() {
    	parent_fieldset.find('input, select, input, textarea').each(function() {
           next_step = validateFormData(this, next_step);
    	});
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
    			// change icons
    			current_active_step.removeClass('active').addClass('activated').next().addClass('active');
    			// progress bar
    			bar_progress(progress_line, 'right');
    			// show next step
	    		$(this).next().fadeIn();
	    		// scroll window to beginning of the form
    			scroll_to_class( $('.f1'), 20 );
	    	});
    	}
    	
    });
    
    // previous step
    $('.f1 .btn-previous').on('click', function() {
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
    	var progress_line = $(this).parents('.f1').find('.f1-progress-line');
    	
    	$(this).parents('fieldset').fadeOut(400, function() {
    		// change icons
    		current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
    		// progress bar
    		bar_progress(progress_line, 'left');
    		// show previous step
    		$(this).prev().fadeIn();
    		// scroll window to beginning of the form
			scroll_to_class( $('.f1'), 20 );
    	});
    });
    
    // submit
    $('.f1').on('submit', function(e) {
        $('#form-errors').removeClass('alert alert-danger');
        $('#form-errors').html('');
    	e.preventDefault();
    	// fields validation
        var data = $(this).serializeArray();
        var url = 'process_form';

        $.ajax({
            method: 'post',
            url: url,
            data: data,
            dataType: 'json',  
            success: function(res){
              if(res.result){
                var html = '<div class="alert alert-success"><div><button class="center"><a href="home">HOME</a></button></div>'+ res.msg +'</div>';
                $('form').closest('div').html(html);
              } else{
                $('#form-errors').addClass('alert alert-danger');
                $.each(res.msg, function(i, v){
                    if(i == 'required'){
                        $('.f1').find('.required').addClass('input-error');
                    }
                    $('#form-errors').append('<p>'+v+'</p>');
                });
              }
            }
        });
    	return false;
    });
    
    // enable tooltip
    $('[data-toggle="popover"]').popover();
});
