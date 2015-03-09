/*!
 * Custom Javascript for HMS Research Computing @ rc.hms.harvard.edu
 * originally by: Nam Pho - April 28, 2014
 * last updated: Nam Pho - May 6, 2014
 */

$(document).ready(function(){
    // rotating menu
    $('.carousel').carousel();

    console.log("hello jQuery world");
/*
    $(window).bind('scroll', function() {
        if ($(window).scrollTop() > 125) {
            $('.navbar').addClass('fixed');
        }
        else {
            $('.navbar').removeClass('fixed');
        }
    });
*/
    // all client side form checks below
    $('input[type=text][class=form-control]').keyup(notBlank);
    $('textarea').keyup(notBlank);

    $('#form_register_ecommons').keyup(validateEC);
    $('input[name=form_support_email]').keyup(validateEmail);
    $('input[name=form_register_email]').keyup(validateEmail);
});

$(function() {
    $('button#form_support_submit').click(function() {
        // validate form first
        console.log("the support submit button works");

	if (1) {
	  // now send using ajax
	  $.ajax({
	    type: 'POST',
            url: '/form.php',
            data: $('#form_support_form').serialize(),
            success: function(resp) {
		$('#form_support_div').modal('hide');
		$('#form_ok').modal('show');
		console.log(resp);
            }
          });
	}
    });
});

$(function() {
    $('button#form_register_submit').click(function() {
        // validate form first
        console.log("the register submit button works");

	if (1) {
	  // now send using ajax
	  $.ajax({
	    type: 'POST',
            url: '/form.php',
            data: $('#form_register_form').serialize(),
            success: function(resp) {
		$('#form_register_div').modal('hide');
		$('#form_ok').modal('show');
		console.log(resp);
            }
          });
	}
    });
});

$(function() {
    $('button#form_storage_submit').click(function() {
        // validate form first
        var item1 = document.getElementById('form_storage_first_name').value;
        var item2 = document.getElementById('form_storage_last_name').value;
        var item3 = document.getElementById('form_storage_ecommons').value;
        var item4 = document.getElementById('form_storage_email').value;
        var item5 = document.getElementById('form_storage_group').value;
        var item6 = document.getElementById('form_storage_pi').value;
        var item7 = document.getElementById('form_storage_xstorage').value;
        var item8 = document.getElementById('form_storage_xtrastorage-growth').value;

        var itemlist = [item1, item2, item3, item4, item5, item6, item7, item8]

        for(i = 0; i < itemlist.length; i++) {
            if (itemlist[i] == "") {
                document.getElementById('form_storage_form').reset();

            } else {
              // now send using ajax  
                $.ajax({
            		type: 'POST',
            		url: '/form.php',
            		data: $('#form_storage_form').serialize(),
            		success: function(resp) {
                                $('#form_storage_div').modal('hide');
                                $('#form_ok').modal('show');
                                console.log(resp);
        		                }
                });
            }
        }
    });
});


function scrollToElement( target ) {
    var topoffset = 30;
    var speed = 800;
    var destination = jQuery( target ).offset().top - topoffset;

    jQuery( 'html:not(:animated),body:not(:animated)' ).animate( { scrollTop: destination}, speed, function() {
        window.location.hash = target;
    });

    return false;
}
      
function notBlank() {
    // checks the field if blank
    var field = $(this).val().toString();

    if(field.length > 0) {
        $(this).parents('div.form-group').attr("class", "form-group has-success has-feedback");
        $(this).next('.form-control-feedback').attr("class", "glyphicon form-control-feedback glyphicon-ok");

        return true;
    } else {
        $(this).parents('div.form-group').attr("class", "form-group has-warning has-feedback");
        $(this).next('.form-control-feedback').attr("class", "glyphicon form-control-feedback glyphicon-warning-sign");

        return false;
    }
}

function validateEC() {
    // validates ecommons
    var ec = $(this).val().toString();

    if(ec.length > 0) {
        var re = /[A-Za-z]+\d+/;

        if(!re.test(ec)) {
            $(this).parents('div.form-group').attr("class", "form-group has-error has-feedback");
            $(this).next('.form-control-feedback').attr("class", "glyphicon form-control-feedback glyphicon-remove");
        } else {
            $(this).parents('div.form-group').attr("class", "form-group has-success has-feedback");
            $(this).next('.form-control-feedback').attr("class", "glyphicon form-control-feedback glyphicon-ok");
           
            return true;
        }
    } else {
        $(this).parents('div.form-group').attr("class", "form-group has-warning has-feedback");
        $(this).next('.form-control-feedback').attr("class", "glyphicon form-control-feedback glyphicon-warning-sign");
    }

    return false;
}

function validateEmail() {
    // validates e-mail
    var email = $(this).val().toString();

    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");

    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        $(this).parents('div.form-group').attr("class", "form-group has-error has-feedback");
	$(this).next('.form-control-feedback').attr("class", "glyphicon form-control-feedback glyphicon-remove");
    } else {    
        $(this).parents('div.form-group').attr("class", "form-group has-success has-feedback");
        $(this).next('.form-control-feedback').attr("class", "glyphicon form-control-feedback glyphicon-ok");

	return true;
    }

    return false;
}
