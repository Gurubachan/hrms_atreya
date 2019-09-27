<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    apid=0;
    $(function () {
        load_marital_status();
        load_gender();
        load_religion();
        load_state();
        load_communicationType();
        load_experiencetype();
    });
    $('#stateid').change(function () {
        load_district($(this).val());
    });
    $("#applicantBasicDetailsForm").submit(function(e){
        e.preventDefault();
            var frm = $("#applicantBasicDetailsForm").serialize();
        if(confirm("Sure to submit?")) {
            $.ajax({
                type: 'post',
                url: "<?= base_url('Recruitment/createBasicDetails')?>",
                crossDomain: true,
                data: frm,
                success: function (data) {
                    if (data != false) {
                        var jsondata = JSON.parse(data);
                        if(jsondata.status == true){
                            alert("Create successfull, 'OK' to next page.");
                            apid = jsondata.apid;
                            if ($("#createApplicant").html() == "Update") {
                                window.location.reload();
                            } else {
                                // $('#newRecruitmentForm').trigger("reset");
                                // reportFunction(1);
                                // $("#jobpostingform").hide();
                                // $("#jobpostingreport").show();
                                // loadJobPostingReport();
                                $('#applicantBasicDetailsForm').hide();
                                $('#applicantAddressDetailsForm').show();
                            }
                        }else{
                          if(jsondata.token == 1){
                              $('#fname').focus();
                          }else if(jsondata.token == 2){
                              $('#lname').focus();
                          }else if(jsondata.token == 3){
                              $('#dob').focus();
                          }else if(jsondata.token == 4){
                              $('#genderid').focus();
                          }else if(jsondata.token == 5){
                              $('#maritalstatusid').focus();
                          }else if(jsondata.token == 6){
                              $('#religionid').focus();
                          }else if(jsondata.token == 7){
                              $('#mobile').focus();
                          }else if(jsondata.token == 8){
                              $('#whatsappnumber').focus();
                          }else if(jsondata.token == 9){
                              $('#emailid').focus();
                          }
                        }
                    } else {
                        console.log(data);
                    }
                }
            });
        }else {
            return false;
        }
    });
    $("#applicantAddressDetailsForm").submit(function(e){
        e.preventDefault();
        var frm = $("#applicantAddressDetailsForm").serialize();
        if(confirm("Sure to submit?")) {
            $.ajax({
                type: 'post',
                url: "<?= base_url('Recruitment/createAddressDetails/')?>"+apid,
                crossDomain: true,
                data: frm,
                success: function (data) {
                    if (data != false) {
                        var jsondata = JSON.parse(data);
                        if(jsondata.status == true) {
                            alert("Create successfull, 'OK' to next page.");
                            if ($("#createApplicant").html() == "Update") {
                                window.location.reload();
                            } else {
                                // $('#newRecruitmentForm').trigger("reset");
                                // reportFunction(1);
                                // $("#jobpostingform").hide();
                                // $("#jobpostingreport").show();
                                // loadJobPostingReport();
                                $('#applicantBasicDetailsForm').hide();
                                $('#applicantAddressDetailsForm').hide();
                                $('#applicantEducationalDetailsForm').show();
                            }
                        }else{
                                if(jsondata.token == 10){
                                    $('#applicantAt').focus();
                                }else if(jsondata.token == 11){
                                    $('#applicantPo').focus();
                                }else if(jsondata.token == 12){
                                    $('#applicantPs').focus();
                                }else if(jsondata.token == 13){
                                    $('#pincode').focus();
                                }
                            }

                    } else {
                        console.log(data);
                    }
                }
            });
        }else {
            return false;
        }
    });
    $("#applicantEducationalDetailsForm").submit(function(e){
        e.preventDefault();
        var frm = $("#applicantEducationalDetailsForm").serialize();
        var totalmark = $("#applicantTotalMark").val();
        var securedmark = $("#applicantSecuredMark").val();
        if(parseInt(totalmark)<parseInt(securedmark)){
            alert("Secured mark should be equall or less than total mark.");
            $("#applicantSecuredMark").val("");
        }else{
            if(confirm("Sure to submit?")) {
                $.ajax({
                    type: 'post',
                    url: "<?= base_url('Recruitment/createEducationalDetails/')?>"+apid,
                    crossDomain: true,
                    data: frm,
                    success: function (data) {
                        if (data != false) {
                            var jsondata = JSON.parse(data);
                            if(jsondata.status == true) {
                                alert("Create successfull, 'OK' to next page.");
                                if ($("#createApplicant").html() == "Update") {
                                    window.location.reload();
                                } else {
                                    // $('#newRecruitmentForm').trigger("reset");
                                    // reportFunction(1);
                                    // $("#jobpostingform").hide();
                                    // $("#jobpostingreport").show();
                                    // loadJobPostingReport();
                                    $('#applicantBasicDetailsForm').hide();
                                    $('#applicantAddressDetailsForm').hide();
                                    $('#applicantEducationalDetailsForm').hide();
                                    $('#applicantWorkingDetailsForm').show();
                                }
                            }else{
                                if(jsondata.token == 14){
                                    $('#applicantInstitue').focus();
                                }else if(jsondata.token == 15){
                                    $('#applicantBoard').focus();
                                }else if(jsondata.token == 16){
                                    $('#applicantExam').focus();
                                }else if(jsondata.token == 17){
                                    $('#applicantPassingYear').focus();
                                }else if(jsondata.token == 18){
                                    $('#applicantTotalMark').focus();
                                }else if(jsondata.token == 19){
                                    $('#applicantSecuredMark').focus();
                                }
                            }
                        } else {
                            console.log(data);
                        }
                    }
                });
            }else {
                return false;
            }
        }
    });
    $("#applicantWorkingDetailsForm").submit(function(e){

        e.preventDefault();
        var frm = $("#applicantWorkingDetailsForm").serialize();
        var doj = $("#doj").val();
        var dol = $("#dol").val();
        if(dol<doj){
            alert("Leaving date should be less than Joining date.");
            $("#applicantSecuredMark").val("");
        }else{
            if(confirm("Sure to submit?")) {
                $.ajax({
                    type: 'post',
                    url: "<?= base_url('Recruitment/createWorkExperienceDetails/')?>"+apid,
                    crossDomain: true,
                    data: frm,
                    success: function (data) {
                        if (data != false) {
                            var jsondata = JSON.parse(data);
                            if (jsondata.status == true) {
                                alert("Create successfull, 'OK' to next page.");
                                if ($("#createApplicant").html() == "Update") {
                                    window.location.reload();
                                } else {
                                    // $('#newRecruitmentForm').trigger("reset");
                                    // reportFunction(1);
                                    // $("#jobpostingform").hide();
                                    // $("#jobpostingreport").show();
                                    // loadJobPostingReport();
                                    $('#applicantBasicDetailsForm').hide();
                                    $('#applicantAddressDetailsForm').hide();
                                    $('#applicantEducationalDetailsForm').hide();
                                    $('#applicantWorkingDetailsForm').hide();
                                }
                            } else {
                                if (jsondata.token == 21) {
                                    $('#companyname').focus();
                                } else if (jsondata.token == 22) {
                                    $('#role').focus();
                                }
                            }
                        } else {
                            console.log(data);
                        }
                    }
                });
            }else {
                return false;
            }
        }

    });
    function loadAjaxForReport(id){
        $("#jobPostingReport").show();
        $.ajax({
            type:'post',
            url:"<?= base_url('JobPosting/report_jobposting')?>",
            data:{checkparams:id},
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    var j=0;
                    var z = jsondata.length;
                    var html = "";
                    var isactive='';
                    for(var i=0; i<z; i++){
                        j++;
                        var checkId = jsondata[i].id;
                        var checkIsactive = jsondata[i].isactive;
                        var editisactive = JSON.stringify(checkIsactive);
                        var companyid = jsondata[i].companyid;
                        var strCompanyname=JSON.stringify(jsondata[i].companyname);
                        var strPostname = JSON.stringify(jsondata[i].postname);
                        var designationid = jsondata[i].designationid;
                        var strDesignationname = jsondata[i].designationname;
                        var nov = jsondata[i].nov;
                        var location =JSON.stringify(jsondata[i].location);
                        var description =  JSON.stringify(jsondata[i].jobdescription);
                        var exp = JSON.stringify(jsondata[i].experience);
                        var res = JSON.stringify(jsondata[i].reponsibility);
                        var education = jsondata[i].educationid;
                        var skillid = jsondata[i].skillid;
                        var startdate = JSON.stringify(jsondata[i].startdate);
                        var enddate = JSON.stringify(jsondata[i].enddate);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].postname+"</td><td>"+ jsondata[i].companyname+"</td><td>"+ jsondata[i].designationname+"</td>" +
                            "<td>"+ jsondata[i].nov+"</td><td>"+ jsondata[i].location+"</td><td>"+ jsondata[i].experience+"</td>" +
                            "<td>"+ jsondata[i].educationname+"</td><td>"+ jsondata[i].skill+"</td><td>"+ jsondata[i].startdate+"</td>" +
                            "<td>"+ jsondata[i].enddate+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm'" +
                            " onclick='reportEditJobPosting(" +checkId+ "," +strPostname+ "," +companyid+ "," +designationid+ "," +nov+ "," +location+ "," +description+ "," +exp+ "," +res+ "," +education+ "," +skillid+ "," +startdate+ "," +enddate+ "," +editisactive+ ")'>Edit</button></td></tr>");
                    }
                    $("#load_jobposting").html(html);
                }
            }
        });
    }
    function reportEditJobPosting(id,strpostname,companyid,designationid,nov,location,description,exp,res,education,skillid,startdate,enddate,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#postname').val(strpostname);
        $('#companyid').val(companyid);
        $('#designationid').val(designationid);
        $('#vacancy').val(nov);
        $('#location').val(location);
        $('#jobdescription').val(description);
        $('#experience').val(exp);
        $('#responsibility').val(res);
        $('#educationid').val(education);
        $('#skillid').val(skillid);
        $('#jobpoststartingdate').val(startdate);
        $('#jobpostendingdate').val(enddate);
        $('#isactive').val(isactiveval);
        $('#postname').focus();
        $('#createJobPosting').html("Update");
    }
    function loadJobPostingReport() {
        $.ajax({
            type:'post',
            url:'<?=base_url('JobPosting/loadJopPostingReport')?>',
            success:function (d) {
                $("#jobpostingform").hide();
                $("#jobpostingreport").show();
                if(d!=false){
                    var jsondata = JSON.parse(d);
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    var isactive='';
                    for(var i=0; i<z; i++){
                        j++;
                        var postname = jsondata[i].postname;
                        var nov = jsondata[i].nov;
                        var cmpname = jsondata[i].companyname;
                        var desname = jsondata[i].designationname;
                        var  localtion= jsondata[i].localtion;
                        var  jobdescriptions= jsondata[i].jobdescription;
                        var  experiences= jsondata[i].experiancename;
                        var  responsibility= jsondata[i].responsibility;
                        var  startdate= jsondata[i].startdate;
                        var  enddate= jsondata[i].enddate;
                    }
                    $("#jpstname").html(postname);
                    $("#cmpid").html(cmpname);
                    $("#desid").html(desname);
                    $("#nov").html(nov);
                    $("#localtion").html(localtion);
                    $("#jobdescriptions").html(jobdescriptions);
                    $("#experiences").html(experiences);
                    $("#responsibilityreport").html(responsibility);
                    $("#startdate").html(startdate);
                    $("#enddate").html(enddate);
                }
            }
        });
    }
    $("#jobPostingForm").click(function () {
        window.location.reload();
    });
    $("#sameaswhatsappnumber").change(function () {
        var a = $("#mobile").val();
        if ($(this).prop("checked")) {
            $('#whatsappnumber').val(a);
        }else{
            $('#whatsappnumber').val('');
        }
    });
    $("#spousename").keypress(function () {
        var a = $('#spousename').val();
        $("#maritalstatusid").val(1);
    });
    $("#previous1").click(function () {
        $("#newRecruitmentForm").prop('disable',true);
        $("#newRecruitmentForm").show();
        $("#newRecruitmentForm1").hide();
    });
</script>
