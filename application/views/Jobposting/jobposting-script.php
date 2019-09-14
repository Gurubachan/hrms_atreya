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
        load_experience();


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
                            loadJobPostingReport();
                        }
                    }else{
                        console.log(data);
                    }
                }
            });
        }
    });

    function loadAjaxForReport(id){
        $.ajax({
            type:'post',
            url:"<?= base_url('MaritalStatus/report_marital_status')?>",
            data:{checkparams:id},
            success:function(data){
                if(data!=false){
                   var jsondata = JSON.parse(data);
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    var isactive='';
                    for(var i=0; i<z; i++){
                        j++;
                        var checkId = jsondata[i].id;
                        var checkIsactive = jsondata[i].isactive;
                        var editisactive = JSON.stringify(checkIsactive);
                        var maritalstatus = jsondata[i].statusname;
                        var strmaritalstatusShortname = JSON.stringify(jsondata[i].statusnshortame);
                        var strmaritalstatus = JSON.stringify(maritalstatus);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].statusname+"</td><td>"+ jsondata[i].statusnshortame+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditStatus(" +checkId+ "," +strmaritalstatus+ "," +strmaritalstatusShortname+ "," +editisactive+ ")'>Edit</button></td></tr>");
                    }
                    $("#load_status_names").html(html);
                }
            }
        });
    }
    function reportEditStatus(id,strmaritalstatus,strmaritalstatusShortname,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#statusname').val(strmaritalstatus);
        $('#maritalStatusShortname').val(strmaritalstatusShortname);
        $('#isactive').val(isactiveval);
        $('#statusname').focus();
        $('#createMaritalStatus').html("Update");
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
                        var cmpid = jsondata[i].companyid;
                        var desid = jsondata[i].designationid;
                        var  localtion= jsondata[i].localtion;
                        var  jobdescriptiom= jsondata[i].jobdescriptiom;
                        var  experiance= jsondata[i].experiance;
                        var  responsibility= jsondata[i].responsibility;
                        var  startdate= jsondata[i].startdate;
                        var  enddate= jsondata[i].enddate;
                    }
                    $("#jpstname").html(postname);
                    $("#cmpid").html(cmpid);
                    $("#desid").html(desid);
                    $("#nov").html(nov);
                    $("#localtion").html(localtion);
                    $("#jobdescriptiom").html(jobdescriptiom);
                    $("#experiance").html(experiance);
                    $("#responsibility").html(responsibility);
                    $("#startdate").html(startdate);
                    $("#enddate").html(enddate);
                }
            }
        });
    }
</script>
