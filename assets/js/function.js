
//editIsactive function is for used for active/deactive
// of all the records which are retrived from database and print on the report part.

var dist=null;
function editIsactive(isactive,checkid,updatedid,urlid){
    $.ajax({
        type:'post',
        url:urlid,
        data:{txtid:checkid,isactive:isactive,tableid:updatedid},
        success:function (res) {
            if(res!=false){
                if(isactive==1){
                    $('#action'+checkid).html('<i class="fa fa-toggle-off fa-2x"></i>');
                    $('#action'+checkid).attr("onclick","editIsactive(0,"+checkid+",'"+updatedid+"','"+urlid+"')");
                }else{
                    $('#action'+checkid).html('<i class="fa fa-toggle-on fa-2x"></i>');
                    $('#action'+checkid).attr("onclick","editIsactive(1,"+checkid+",'"+updatedid+"','"+urlid+"')");
                }
            }
        }
    });
}
function editIsattendance(isattendance,checkid,updatedid,urlid){
    $.ajax({
        type:'post',
        url:urlid,
        data:{txtid:checkid,isattendance:isattendance,tableid:updatedid},
        success:function (res) {
            if(res!=false){
                if(isactive==1){
                    $('#action'+checkid).html('<i class="fa fa-toggle-off fa-2x"></i>');
                    $('#action'+checkid).attr("onclick","editIsattendance(0,"+checkid+",'"+updatedid+"','"+urlid+"')");
                }else{
                    $('#action'+checkid).html('<i class="fa fa-toggle-on fa-2x"></i>');
                    $('#action'+checkid).attr("onclick","editIsattendance(1,"+checkid+",'"+updatedid+"','"+urlid+"')");
                }
            }
        }
    });
}
// report function for
function reportFunction(id) {
    var data = '';
    if(id==1){
        data= '1';
    }else if(id==2){
        data= '2';
    }else if(id==3){
        data= '3';
    }else if(id==4){
        data = '4';
    }
    loadAjaxForReport(data);
}

function checkIsactiveForEdit(checkIsactive,editisactiveval) {
    if(checkIsactive=='t'){
        return  editisactiveval=1;
    }else{
      return   editisactiveval=0;
    }
}
function loadUserType() {
    $.ajax({
        url:"../Forms/formUsertype",
        type:"post",
        success:function (d) {
            $("#load_pages").html(d);
        }
    });
}
function loadNewUser() {
    $.ajax({
        url:"../Forms/formUser",
        type:"post",
        success:function (d) {
            $("#load_pages").html(d);
        }
    });
}
function loadUserAuthentication() {
    $.ajax({
        url:"../Forms/formUserAuthentication",
        type:"post",
        success:function (d) {
            $("#load_pages").html(d);
        }
    });

}

function loadCompanyType() {

    //window.location.href="<?//= base_url('Forms/loadCompanyType')?>//";
    $.ajax({
        url:"../Forms/loadCompanyType",
        type:"post",
        success:function (d) {
            // if(d!=false){
            $("#load_pages").html(d);
            // }
        }
    });
}
function loadNewCompany() {
    //window.location.href="<?//= base_url('Forms/loadNewCompany')?>//"
    $.ajax({
        url:"../Forms/loadNewCompany",
        type:"post",
        success:function (d) {
            // if(d!=false){
            $("#load_pages").html(d);
            // }
        }
    });
}
function loadOnlyCompany(id) {
    //window.location.href="<?//= base_url('Forms/loadNewCompany')?>//"
    $.ajax({
        url:"../Company/load_company",
        type:"post",
        success:function (d) {
            // if(d!=false){
            $("#"+id).html(d);
            // }
        }
    });
}
function loadDepartment() {
    //window.location.href="<?//= base_url('Forms/loadDepartment')?>//";
    $.ajax({
        url:"../Forms/loadDepartment",
        type:"post",
        success:function (d) {
            // if(d!=false){
            $("#load_pages").html(d);
            // }
        }
    });
}
function loadDesignation() {
    //window.location.href="<?//= base_url('Forms/loadDesignation')?>//";
    $.ajax({
        url:"../Forms/loadDesignation",
        type:"post",
        success:function (d) {
            // if(d!=false){
            $("#load_pages").html(d);
            // }
        }
    });
}
function loadDepartmentMapping() {
    $.ajax({
        url:"../Forms/mapping_company_department",
        type:"post",
        success:function (d) {
            // if(d!=false){
            $("#load_pages").html(d);
            // }
        }
    });
}

function loadEmployeeType() {
    $.ajax({
        url:"../Forms/formEmployeeType",
        type:"post",
        success:function (d) {
            $("#load_employee_pages").html(d);
        }
    });
}
function loadNewEmployee() {
    $.ajax({
        url:"../Forms/formNewEmployee",
        type:"post",
        success:function (d) {
            $("#load_employee_pages").html(d);
        }
    });
}
function loadEmployeeBankDetails() {
    $.ajax({
        url:"../Forms/formEmployeeBankDetails",
        type:"post",
        success:function (d) {
            $("#load_employee_pages").html(d);
        }
    });
}
function employeeAttendance() {
    $.ajax({
        url:"../Forms/employeeAttendance",
        type:"post",
        success:function (d) {
            $("#load_employee_pages").html(d);
        }
    });
}

function load_company_type(){
    $.ajax({
        type:'post',
        url: "../Company/load_company_type",
        crossDomain:true,
        success:function(data){
            var data = JSON.parse(data);
            if(data!=false){
                $("#companytype").html(data);
            }
        }
    });
}

// function loadcompany(){
//     // var companytype=$("#cboCompanyType").val();
//     $.ajax({
//         type:'post',
//         url: "../Company/load_company",
//         // crossDomain:true,
//         success:function(data){
//             var data = JSON.parse(data);
//             if(data!=false){
//                 $("#cboCompany").html(data);
//             }
//         }
//     });
// }
function load_state(){

    $.ajax({
        type:'post',
        url: "../State/load_state",
        crossDomain:true,
        success:function(data){
            var data = JSON.parse(data);
            if(data!=false){
                $("#stateid").html(data);
            }
        }
    });
}
function load_district(id=null){
    var stateid = id;
    $.ajax({
        type:'post',
        url: "../District/load_district",
        data:{stateid:stateid},
        crossDomain:true,
        success:function(data){
            var data = JSON.parse(data);
            if(data!=false){
                $("#distid").html(data);
                if(dist!=null){
                    $("#distid").val(dist);
                }
            }
        }
    });
}
function load_employee_type(){
    $.ajax({
        type:'post',
        url: "../Employee/load_employee_type",
        crossDomain:true,
        success:function(data){
            var data = JSON.parse(data);
            if(data!=false){
                $("#empid").html(data);
            }
        }

    });
}
function load_education(){
    $.ajax({
        type:'post',
        url: "../Education/load_education",
        crossDomain:true,
        success:function(data){
            var data = JSON.parse(data);
            if(data!=false){
                $("#educationid").html(data);
            }
        }
    });
}
function load_department() {
    $.ajax({
        type: 'post',
        url: "../Department/load_department_mapping",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#departmentmappingid").html(data);
            }
        }
    });
}
function load_designation() {
    $.ajax({
        type: 'post',
        url: "../Designation/load_designation",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#designationid").html(data);
            }
        }
    });
}
function load_gender() {
    $.ajax({
        type: 'post',
        url: "../Gender/load_gender",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#genderid").html(data);
                $("#cboGender").html(data);
            }
        }
    });
}
function loadgender(id) {
    $.ajax({
        type: 'post',
        url: "../Gender/load_gender",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#"+id).html(data);
            }
        }
    });
}
function load_marital_status() {
    $.ajax({
        type: 'post',
        url: "../MaritalStatus/load_marital_status",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#maritalstatusid").html(data);
            }
        }
    });
}
function load_user_type(){
    $.ajax({
        type:'post',
        url: "../User/load_user_type",
        crossDomain:true,
        success:function(data){
            var data = JSON.parse(data);
            if(data!=false){
                $("#usertypeid").html(data);
            }
        }
    });
}
function load_userid(){
    $.ajax({
        type:'post',
        url: "../User/load_userid",
        crossDomain:true,
        success:function(data){
            var data = JSON.parse(data);
            if(data!=false){
                $("#userid").html(data);
            }
        }
    });
}
function load_company(){
    var companytype=$("#companytype").val();
    $.ajax({
        type:'post',
        url: "../Company/load_company",
        crossDomain:true,
        data:{typeid:companytype},
        success:function(data){
            var data = JSON.parse(data);
            if(data!=false){
                $("#companyid").html(data);
            }
        }
    });
}
function load_skill(){
    $.ajax({
        type:'post',
        url: "../Skill/load_skill",
        crossDomain:true,
        success:function(data){
            var data = JSON.parse(data);
            if(data!=false){
                $("#skillid").html(data);
            }
        }
    });
}
function load_experiencetype(){
    $.ajax({
        type:'post',
        url: "../ExperienceType/load_experience_type",
        crossDomain:true,
        success:function(data){
            var data = JSON.parse(data);
            if(data!=false){
                $("#experiencetypeid").html(data);
            }
        }
    });
}
function loadOnlyCompany(){
    $.ajax({
        type:'post',
        url: "../Company/load_company/1",
        crossDomain:true,
        success:function(data){
            var data = JSON.parse(data);
            if(data!=false){
                $("#companyid").html(data);
                $("#cboCompany").html(data);
            }
        }
    });
}
function load_religion() {
    $.ajax({
        type: 'post',
        url: "../Religion/load_religion",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#religionid").html(data);
            }
        }
    });
}
function load_communicationType() {
    $.ajax({
        type: 'post',
        url: "../CommunicationType/load_communication_type",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#communicationtypeid").html(data);
            }
        }
    });
}
function load_emp(id) {
    $.ajax({
        type: 'post',
        url: "../Employee/load_employee",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#"+id).html(data);
            }
        }
    });
}
function load_attendance_type(id) {
    $.ajax({
        type: 'post',
        url: "../Attendance/load_attendance_type",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#"+id).html(data);
            }
        }
    });
}
function load_resourcetype(id) {
    $.ajax({
        type: 'post',
        url: "../Resource/load_resourcetype",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#"+id).html(data);
            }
        }
    });
}
function load_resourcecompanyname(id) {
    $.ajax({
        type: 'post',
        url: "../Resource/load_resourcecompany",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#"+id).html(data);
            }
        }
    });
}
function load_assurancetype(id) {
    $.ajax({
        type: 'post',
        url: "../Resource/load_assurance",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#"+id).html(data);
            }
        }
    });
}function load_assuranceperiodtype(id) {
    $.ajax({
        type: 'post',
        url: "../Resource/load_periodtype",
        crossDomain: true,
        success: function (data) {
            var data = JSON.parse(data);
            if (data != false) {
                $("#"+id).html(data);
            }
        }
    });
}
$('input[type=text],input[type=email],input[type=password],input[type=number]').keypress(function() {
    $(this).css("border-color","black");
});
// $('#dob').pignoseCalendar({
//     format:"dd-mm-yyyy"
// });


