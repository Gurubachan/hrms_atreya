<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        load_education();
    });
    $("#educationForm").submit(function(e){
        e.preventDefault();
        var frm = $("#educationForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Education/create_education')?>",
            data:frm,
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    if(jsondata.flag==0){
                        duplicate_entries();
                    }else{
                        if($('#createEducation').html()=='Create'){
                            successfull_entries();
                            reportFunction(1);
                            $("#educationForm").trigger("reset");
                        }else if($('#createEducation').html()=='Update'){
                            $('#createEducation').html('Create');
                            successfully_updates();
                            reportFunction(2);
                            $("#educationForm").trigger("reset");
                            $('#txtid').val(0);
                        }
                    }
                }else{
                    console.log(data);
                }
            }

        });
    });
    function loadAjaxForReport(data){
        $("#reportEducation").show();
        $.ajax({
            type:'post',
            url:"<?= base_url('Education/report_education')?>",
            crossDomain:true,
            data:{checkparams:data},
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    var isactive="";
                    for(var i=0; i<z; i++){
                        j++;
                        var checkId = jsondata[i].id;
                        var checkIsactive = jsondata[i].isactive;
                        var editisactive = JSON.stringify(checkIsactive);
                        var education = jsondata[i].educationname;
                        var strEducationShortname= JSON.stringify(jsondata[i].educationshortname);
                        var streducation = JSON.stringify(education);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].educationname+"</td><td>"+ jsondata[i].educationshortname+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditEducation(" +checkId+ "," +streducation+ "," +strEducationShortname+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='educationDetailsView(" +checkId+ ")' data-toggle='modal' data-target='#educationDetails'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_education").html(html);
                }
            }
        });
    }
    function reportEditEducation(id,streducation,strEducationShortname,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#educationname').val(streducation);
        $('#educationShortname').val(strEducationShortname);
        $('#isactive').val(isactiveval);
        $('#educationname').focus();
        $("#createEducation").html('Update');

    }
    function educationDetailsView(id) {
        $.ajax({
            type:'post',
            url:'<?= base_url("Education/educationViewDetails")?>',
            data:{id:id},
            success:function (res) {
                if(res!=false){
                    $('#loadEducationDetailsView').html(res);
                    // $("#dname").html(res.distname);
                }
            }
        });
    }

</script>
