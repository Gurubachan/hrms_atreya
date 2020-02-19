<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(1);
?>
<script>
    $("#designationForm").submit(function(e){
        // $("#designation_report").show();
        e.preventDefault();
        var frm = $("#designationForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Designation/create_designation')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    if(jsondata.flag==0){
                        duplicate_entries();
                    }else{
                        if($('#crateDesignation').html()=='Create'){
                            successfull_entries();
                            reportFunction(1);
                            $("#designationForm").trigger("reset");
                        }else if($('#crateDesignation').html()=='Update'){
                            $('#crateDesignation').html('Create');
                            successfully_updates();
                            reportFunction(2);
                            $("#designationForm").trigger("reset");
                            $('#txtid').val(0);
                        }
                    }
                }
            }
        });
    });
    function loadAjaxForReport(data) {
        $.ajax({
            type: 'post',
            url: "<?= base_url('Designation/report_designation')?>",
            // crossDomain: true,
            data: {checkparams:data},
            success: function (data) {
                var jsondata = JSON.parse(data);
                if (data != false) {
                    var j = 0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    var isactive="";
                    for (var i = 0; i < z; i++) {
                        j++;
                        var checkId = jsondata[i].id;
                        var designationname = jsondata[i].designationname;
                        var strdesignationname = JSON.stringify(designationname);
                        var strdesignationshortname =JSON.stringify(jsondata[i].designationshortname);
                        var checkIsactive = jsondata[i].isactive;
                        var editisactive = JSON.stringify(checkIsactive);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html += ("<tr> <td>" + j + "</td><td>" + jsondata[i].designationname + "</td><td>" + jsondata[i].designationshortname + "</td><td>" +isactive + "</td>" +
                            "<td><button class='btn editBtn btn-sm' onclick='reportEditDesignation(" +checkId+ "," +strdesignationname+ "," +strdesignationshortname+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='designationDetailsView(" +checkId+ ")'  data-toggle='modal' data-target='#desginationDetials'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_designation").html(html);
                }
            }
        });
    }
    function reportEditDesignation(id,strdesignationname,strdesignationshortname,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#designationname').val(strdesignationname);
        $('#designationShortname').val(strdesignationshortname);
        $('#isactive').val(isactiveval);
        $('#designationname').focus();
        $('#crateDesignation').html('Update');
    }
    function designationDetailsView(id) {
        $.ajax({
            type:'post',
            url:'<?= base_url("Designation/designationViewDetails")?>',
            data:{id:id},
            success:function (res) {
                if(res!=false){
                    $('#loadDesignationDetails').html(res);
                }
            }
        });
    }
</script>
