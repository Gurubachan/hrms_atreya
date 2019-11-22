<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        // load_company_type();
    });
    $("#employeeTypeForm").submit(function(e){
        $('#toggle_employee_type').show();
        e.preventDefault();
        var frm = $("#employeeTypeForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Employee/create_employee_type')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    if(jsondata.flag==0){
                        duplicate_entries();
                    }else{
                        if($('#createEmployeeType').html()=='Create'){
                            successfull_entries();
                            reportFunction(1);
                            $("#employeeTypeForm").trigger("reset");
                        }else if($('#createEmployeeType').html()=='Update'){
                            $('#createEmployeeType').html('Create');
                            successfully_updates();
                            reportFunction(2);
                            $("#employeeTypeForm").trigger("reset");
                            $('#txtid').val(0);
                        }
                    }
                }
            }
        });
    });
    function loadAjaxForReport(id){
        $('#toggle_employee_type').show();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_type')?>",
            crossDomain:true,
            data:{checkparams:id},
            // data:{creatdate:datenow},
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
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
                        var employeetype = jsondata[i].typename;
                        var stremployeetype = JSON.stringify(employeetype);
                        var stremployeetypeshortname = JSON.stringify(jsondata[i].typeshortname)
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].typename+"</td><td>"+ jsondata[i].typeshortname+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditEmployeeType(" +checkId+ "," +stremployeetype+ "," +stremployeetypeshortname+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_employee_type").html(html);
                }
            }
        });
    }
    function reportEditEmployeeType(id,stremployeetype,stremployeetypeshortname,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#typename').val(stremployeetype);
        $('#employeeTypeShortname').val(stremployeetypeshortname);
        $('#isactive').val(isactiveval);
        $('#typename').focus();
        $("#createEmployeeType").html('Update');
    }
</script>
