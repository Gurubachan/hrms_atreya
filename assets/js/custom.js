function number_validate(id) {
    $("#"+id).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) || e.which.length >6) {
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
