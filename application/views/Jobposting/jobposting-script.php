<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        loadOnlyCompany();
        load_designation();
        load_education();
        load_skill();
        // $("#educationid").select2();
        // load_experience();
        $("#jobpoststartingdate").datepicker();
        $("#jobpostendingdate").datepicker();
    });

    $("#companytype").change(function () {
        load_company();
    });
    $("#newJobPostingForm").submit(function(e){
        e.preventDefault();
        var starttime = new Date($("#jobpoststartingdate").val());
        var endtime = new Date($("#jobpostendingdate").val());
        if(starttime>endtime){
            alert('Closing time should not lesser than start time');
            toastr.wartning
            $('#jobpostendingdate').focus();
        }else{
            var frm = $("#newJobPostingForm").serialize();
            $.ajax({
                type:'post',
                url: "<?= base_url('JobPosting/create_jobposting')?>",
                crossDomain:true,
                data:frm,
                success:function(data){
                    if(data!=false){
                        if($("#createJobPosting").html()=="Update"){
                            window.location.reload();
                        }else {
                            $('#newJobPostingForm').trigger("reset");
                            reportFunction(1);
                            // $("#jobpostingform").hide();
                            // $("#jobpostingreport").show();
                            // loadJobPostingReport();
                        }
                    }else{
                        console.log(data);
                    }
                }
            });
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
                            " onclick='reportEditJobPosting(" +checkId+ "," +strPostname+ "," +companyid+ "," +designationid+ "," +nov+ "," +location+ "," +description+ "," +exp+ "," +res+ "," +education+ "," +skillid+ "," +startdate+ "," +enddate+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
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
</script>
