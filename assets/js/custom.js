$( function() {
    $( document ).tooltip({
        // track: true
    });

} );
function number_validate(id) {
    $("#"+id).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) || e.which.length >6) {
            $(".errormsg_"+id).html("Digits Only").css({'color':'red'}).show().fadeOut(2000);
            return false;
        }
    })
}
function float_validate(id) {
    $("#"+id).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57) || e.which.length >6) {
            $(".errormsg_"+id).html("Digits Only").css({'color':'red'}).show().fadeOut(2000);
            return false;
        }
    })
}
function alfa_numeric(id) {
    $("#"+id).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 65 || e.which > 90) && (e.which < 97 || e.which > 122)&& (e.which < 48 || e.which > 57) && e.which != 32 && e.which != 38 && e.which != 40 && e.which != 41 && e.which != 45 && e.which != 47 && e.which != 46 ) {
            $(".errormsg_"+id).html("Alphanumeric Only").css({'color':'red'}).show().fadeOut(2000);
            return false;
        }
    });
}
function only_characters_numbers_dot_highfen_slash(id) {
    $("#"+id).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 65 || e.which > 90) && (e.which < 97 || e.which > 122)&& (e.which < 48 || e.which > 57) && e.which != 32 && e.which != 45 && e.which != 47 ) {
            $(".errormsg_"+id).html("Alphanumeric Only").css({'color':'red'}).show().fadeOut(2000);
            return false;
        }
    });
}
function alfa_numeric_capital(id) {
    $("#"+id).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 65 || e.which > 90)&& (e.which < 48 || e.which > 57) && e.which != 32 && e.which != 38 && e.which != 40 && e.which != 41 && e.which != 45 && e.which != 47 && e.which != 46 ) {
            $(".errormsg_"+id).html("Alphanumeric Only").css({'color':'red'}).show().fadeOut(2000);
            return false;
        }
    });
}
function charachters_validate(id) {
    $("#"+id).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != 32 && e.which != 13 &&(e.which < 65 || e.which > 90 ) && (e.which < 97 || e.which > 122)) {
            $(".errormsg_"+id).html("Characters Only").css({'color':'red'}).show().fadeOut(2000);
            return false;
        }
    });
}
function url_validate(id) {
    $("#"+id).keypress(function (e) {
        if (e.which != 8 && e.which != 0  && (e.which < 65 || e.which > 90) && (e.which < 97 || e.which > 122)&& (e.which < 48 || e.which > 57) && e.which != 32 && e.which != 38 && e.which != 40 && e.which != 41 && e.which != 47 && e.which != 46 && e.which != 58) {
            $(".errormsg_"+id).html("Only : , / and . are allowed").css({'color':'red'}).show().fadeOut(2000);
            return false;
        }
    });
}
function email_validate(id) {
    $("#"+id).keypress(function (e) {
        if (e.which != 8 && e.which != 0  && (e.which < 64 || e.which > 90) && (e.which < 97 || e.which > 122)&& (e.which < 48 || e.which > 57) && e.which != 32 && e.which != 38 && e.which != 40 && e.which != 41 && e.which != 46){
            $(".errormsg_"+id).html("Only @ and . are allowed").css({'color':'red'}).show().fadeOut(2000);
            return false;
        }
    });
}
function epf_number_validate(id) {
    $("#"+id).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 65 || e.which > 90) && (e.which < 97 || e.which > 122)&& (e.which < 47 || e.which > 57) && e.which != 32 && e.which != 38 && e.which != 40 && e.which != 41 && e.which != 45 && e.which != 47 && e.which != 46 ) {
            $(".errormsg_"+id).html("Alphanumeric Only").css({'color':'red'}).show().fadeOut(2000);
            return false;
        }
    });
}
function password_validate(id) {
    $("#"+id).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 64 || e.which > 90) && (e.which < 97 || e.which > 122)&& (e.which < 44 || e.which > 57) && e.which != 32 && e.which != 38 && e.which != 40 && e.which != 41 &&  e.which != 47 &&  e.which != 95 ) {
            $(".errormsg_"+id).html("Alphanumeric Only").css({'color':'red'}).show().fadeOut(2000);
            return false;
        }
    });
}
function custom_datepicker(id){
	$("#"+id).datepicker({
		dateFormat:'dd-mm-yy',
		changeMonth: true,
		changeYear:true,
		numberOfMonths: 1,
		showAnim: "slideDown",
		// yearRange: '1980:2002'
		yearRange: "-35:+0"
	});
}
function duplicate_entries() {
    toastr.options.rtl = true;
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.error("Duplicate Entries");
    toastr.options.showMethod = 'slideDown';
}
function successfull_entries() {
    toastr.options.rtl = true;
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.success("Record Inserted Successfully");
    toastr.options.showMethod = 'slideDown';
}
function successfully_updates() {
    toastr.options.rtl = true;
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.success("Record Updated Successfully");
    toastr.options.showMethod = 'slideDown';
}
function mytoast(res) {
    var msg = res.message;
    var title = res.data;
    if(res.status== true){
        toastr.options.rtl = true;
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.success(title,msg);
        toastr.options.showMethod = 'slideDown';
    }else {
        toastr.options.rtl = true;
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.error(title,msg);
        toastr.options.showMethod = 'slideDown';
    }
}
function custome_range_datepicker(fromdate, todate){
    var dateFormat = "yy-mm-dd",
        from = $( "#"+fromdate ).datepicker({
            //defaultDate: "+1w",
            // dateFormat:'dd-mm-yy',
            dateFormat:'dd-mm-yy',
            changeMonth: true,
            changeYear:true,
            numberOfMonths: 1,
            showAnim: "slideDown"
        }).on( "change", function() {
            to.datepicker( "option", "minDate", getDate( this ) );
        }),
        to = $( "#"+todate ).datepicker({
            //defaultDate: "+1w",
            dateFormat:'dd-mm-yy',
            changeMonth: true,
            changeYear:true,
            numberOfMonths: 1,
            showAnim: "slideDown"
        }).on( "change", function() {
            from.datepicker( "option", "maxDate", getDate( this ) );
        });

    function getDate( element ) {
        var date;
        try {
            date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
            date = null;
        }

        return date;
    }
}
function datepicker(id){
	var dateFormat = "dd-mm-yy",
		from = $( "#"+id ).datepicker({
			//defaultDate: "+1w",
			dateFormat:'dd-mm-yy',
			changeMonth: true,
			changeYear:true,
			numberOfMonths: 1,
			showAnim: "slideDown"
		}).on( "change", function() {
			to.datepicker( "option", "minDate", getDate( this ) );
		})
}

function getDate( element ) {
	var date;
	try {
		date = $.datepicker.parseDate( dateFormat, element.value );
	} catch( error ) {
		date = null;
	}

	return date;
}
function lowerToUpper(id){
    $('#'+id).keyup(function(){
       var v =  $('#'+id).val().toUpperCase();
        $('#'+id).val(v);
    });
}


