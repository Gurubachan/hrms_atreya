<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $("#maritalStatusForm").submit(function(e){
        e.preventDefault();
        var frm = $("#maritalStatusForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('MaritalStatus/create_marital_status')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    if(jsondata.flag==0){
                        duplicate_entries();
                    }else{
                        if($('#createMaritalStatus').html()=='Create'){
                            successfull_entries();
                            reportFunction(1);
                            $("#maritalStatusForm").trigger("reset");
                        }else if($('#createMaritalStatus').html()=='Update'){
                            $('#createMaritalStatus').html('Create');
                            successfully_updates();
                            reportFunction(2);
                            $("#maritalStatusForm").trigger("reset");
                            $('#txtid').val(0);
                        }
                    }
                }else{
                    console.log(data);
                }
            }
        });
    });
    function loadAjaxForReport(id){
        $.ajax({
            type:'post',
            url:"<?= base_url('MaritalStatus/report_marital_status')?>",
            data:{checkparams:id},
            success:function(data){
                if(data!=false){
                    jsondata = JSON.parse(data);
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].statusname+"</td><td>"+ jsondata[i].statusnshortame+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditStatus(" +checkId+ "," +strmaritalstatus+ "," +strmaritalstatusShortname+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='maritalStatusViewDetails(" +checkId+ ")' data-toggle='modal' data-target='#maritalStatusDetials'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
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
    function maritalStatusViewDetails(id) {
        $.ajax({
            type:'post',
            url:'<?= base_url("MaritalStatus/maritalStatusViewDetails")?>',
            data:{id:id},
            success:function (res) {
                if(res!=false){
                    $('#loadMaritalStatusDetails').html(res);
                }
            }
        });
    }
</script>
