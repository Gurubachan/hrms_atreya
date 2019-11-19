<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    apid=0;
    txtid=0;
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
    // $('#dob').pignoseCalendar({
    //     format:"DD-MM-YYYY",
    //     modal:false
    // });
    $("#applicantBasicDetailsForm").submit(function(e){
        // $("#txtid").val(txtid);
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
                            txtid = jsondata.txtid;
                            // alert(data);
                            $(".tagcolor").css('color','gray');
                            $("#address").css('color','blue');
                            $("#report_newRecruitment").show();
                            if ($("#createApplicant").html() == "Update") {
                                window.location.reload();
                                $("#report_newRecruitment").show();
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
        var frm = $("#applicantAddressDetailsForm").serialize()+'&'+$.param({ 'txtid': txtid });
        // $("#txtid").val(txtid);
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
                            $(".tagcolor").css('color','gray');
                            $("#qualification").css('color','blue');
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
        // $("#txtid").val(1);
        e.preventDefault();
        var frm = $("#applicantEducationalDetailsForm").serialize()+'&'+$.param({ 'txtid': txtid });;
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
                                $(".tagcolor").css('color','gray');
                                $("#workexperience").css('color','blue');
                                if ($("#createApplicant").html() == "Update") {
                                    // window.location.reload();
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
        // $("#txtid").val(1);
        e.preventDefault();
        var frm = $("#applicantWorkingDetailsForm").serialize()+'&'+$.param({ 'txtid': txtid });
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
                                $(".tagcolor").css('color','gray');
                                $("#basic").css('color','blue');
                                if ($("#createApplicant").html() == "Update") {
                                    // window.location.reload();
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
        $("#report_newRecruitment").show();
        $.ajax({
            type:'post',
            url:"<?= base_url('Recruitment/report_recruitment')?>",
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
                        checkId = jsondata[i].id;
                        var checkIsactive = jsondata[i].isactive;
                        var editisactive = JSON.stringify(checkIsactive);
                        var strfname = JSON.stringify(jsondata[i].fname);
                        var strmname = JSON.stringify(jsondata[i].mname);
                        var strlname = JSON.stringify(jsondata[i].lname);
                        var strmother = JSON.stringify(jsondata[i].mothername);
                        var strfather = JSON.stringify(jsondata[i].fathername);
                        var strspouse = JSON.stringify(jsondata[i].spousename);
                        var dob = JSON.stringify(jsondata[i].dob);
                        var maritalstatusid = jsondata[i].maritalstatus;
                        var genderid = jsondata[i].genderid;
                        var religionid=jsondata[i].religionid;
                        var contact = jsondata[i].contact;
                        var altcontact = jsondata[i].altcontact;
                        var whatsapp = jsondata[i].whatsapp;
                        var email = JSON.stringify(jsondata[i].email);
                        var at =JSON.stringify(jsondata[i].at);
                        var po =JSON.stringify(jsondata[i].po);
                        var ps =JSON.stringify(jsondata[i].ps);
                        var landmark = JSON.stringify(jsondata[i].landmark);
                        var pincode =jsondata[i].pincode;
                        var commitid =jsondata[i].commitid;
                        var stateid =jsondata[i].stateid;
                        var orgname = JSON.stringify(jsondata[i].orgname);
                        var board= JSON.stringify(jsondata[i].boad);
                        var examname= JSON.stringify(jsondata[i].examname);
                        var yop= JSON.stringify(jsondata[i].yop);
                        var totalmark =jsondata[i].totalmark;
                        var securedmark =jsondata[i].securedmark;
                        var etid=jsondata[i].exetypeid;
                        var providedby= JSON.stringify(jsondata[i].providedby);
                        var startdate = JSON.stringify(jsondata[i].doj);
                        var enddate = JSON.stringify(jsondata[i].dol);
                        var role= JSON.stringify(jsondata[i].role);
                        var remark= JSON.stringify(jsondata[i].remark);
                        var distid =jsondata[i].distid;
                        var ctype = JSON.stringify(jsondata[i].ctype);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].fname+" "+jsondata[i].mname+ " "+jsondata[i].lname+"</td>"+
                            "<td>"+ jsondata[i].dob+"</td>"+
                            "<td>"+ jsondata[i].gendername+"</td><td>"+ jsondata[i].contact+"</td><td>"+ jsondata[i].whatsapp+"</td>" +
                            "<td>"+ jsondata[i].email+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='loadRecruitmentDetails(" +checkId+ ")' data-toggle='modal' data-target='#recruitment'><i class='fa fa-check'></i>" +
                            " </button><button class='btn editBtn btn-sm'" +
                            " onclick='reportEditRecruitment(" +checkId+ "," +strfname+ "," +strmname+ "," +strlname+ "," +strfather+ "," +strmother+ "," +strspouse+ "," +dob+ "," +maritalstatusid+ "," +genderid+ "," +religionid+ "," +contact+ "," +altcontact+ "," +
                        "" +whatsapp+ "," +email+ "," +at+ "," +po+ "," +ps+ "," +landmark+ "," +pincode+ "," +commitid+ "," +stateid+ "," +orgname+ "," +board+ "," +examname+ "," +yop+ "," +totalmark+ "," +securedmark+ "," +etid+ "," +providedby+ "," +
                            "" +startdate+ "," +enddate+ "," +role+ "," +remark+ "," +distid+ "," +ctype+ "," +editisactive+ ")'><i class='fa fa-edit fa-2x></i>' </button></td></tr>");
                    }
                    $("#load_newRecruitment").html(html);
                }
            }
        });
    }
    function reportEditRecruitment(id,strfname,strmname,strlname,strfather,
                                   strmother,strspouse,dob,maritalstatusid,genderid,
                                   religionid,contact,altcontact,whatsapp,
                                   email,at,po,ps,landmark,pincode,commitid,
                                   stateid,orgname,boad,examname,yop,totalmark,
                                   securedmark,etid,providedby,startdate,enddate,
                                   roll,remark,distid,ctype,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#fname').val(strfname);
        $('#mname').val(strmname);
        $('#lname').val(strlname);
        $('#dob').val(dob);
        $('#fathername').val(strfather);
        $('#mothername').val(strmother);
        $('#spousename').val(strspouse);
        $('#genderid').val(genderid);
        $('#maritalstatusid').val(maritalstatusid);
        $('#religionid').val(religionid);
        $('#mobile').val(contact);
        $('#altmobile').val(altcontact);
        $('#whatsappnumber').val(whatsapp);
        $('#emailid').val(email);
        $('#applicantAt').val(at);
        $('#applicantPo').val(po);
        $('#applicantPs').val(ps);
        $('#applicantLandmark').val(landmark);
        $('#stateid').val(stateid);
        $('#distid').val(distid);
        $('#applicantPincode').val(pincode);
        $('#communicationtypeid').val(commitid);
        $('#applicantInstitue').val(orgname);
        $('#applicantBoard').val(boad);
        $('#applicantExam').val(examname);
        $('#applicantPassingYear').val(yop);
        $('#applicantTotalMark').val(totalmark);
        $('#applicantSecuredMark').val(securedmark);
        $('#experiencetypeid').val(etid);
        $('#companyname').val(providedby);
        $('#role').val(roll);
        $('#doj').val(startdate);
        $('#dol').val(enddate);
        $('#remark').val(remark);
        $('#isactive').val(isactiveval);
        $('#fname').focus();
        $('#applicantBasicDetails').html("Update and Next");
        $('#applicantCommunication').html("Update and Next");
        $('#applicantEducation').html("Update and Next");
        $('#applicantWorkExperience').html("Update and Next");
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
    function recruitmentViewDetails() {

    }
    // $("#basicDetails").click(function () {
    //     $("#applicantBasicDetails").show();
    //     $("#applicantAddressDetailsForm").hide();
    //
    // });
    function loadRecruitmentDetails(id) {
        $.ajax({
            type:'post',
            url:'<?= base_url("Recruitment/recruitmentViewDetails/")?>',
            data:{id:id},
            success:function (res) {
                if(res!=false){
                    $('#loadRecordDetails').html(res);
                    // $('#loadRecordDetails').attr('href').attr('target','_blank').html(res);
                    // var url = $('#loadRecordDetails').html(res);
                }
            }
        });
    }
</script>
