<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        // load_department();
    });
    $("#departmentForm").submit(function(e){
        $("#department_report").show();
        e.preventDefault();
        var frm = $("#departmentForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Department/create_department')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    if(jsondata.flag==0){
                        duplicate_entries();
                    }else{
                        successfull_entries();
                    }
                    if($("#createDepartment").html()=='Update'){
                        window.location.reload();
                    }else{
                        reportFunction(1);
                        $('#departmentname').val("");
                        $('#departmentShortname').val("");
                    }
                }else{
                    console.log(data);
                }
            }
        });
    });
    function loadAjaxForReport(data){
        $("#department_report").show();
        $.ajax({
            type:'post',
            url:"<?= base_url('Department/report_department')?>",
            data:{checkparams:data},
            crossDomain:true,
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    var isactive = "";
                    for(var i=0; i<z; i++){
                        j++;
                        var checkId = jsondata[i].id;
                        var checkIsactive = jsondata[i].isactive;
                        var departmentname = jsondata[i].departmentname;
                        var strdepartmentname = JSON.stringify(departmentname);
                        var strdepartmentshortname = JSON.stringify(jsondata[i].departmentshortname);
                        var editisactive = JSON.stringify(checkIsactive);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].departmentname+"</td><td>"+ jsondata[i].departmentshortname+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditDepartment(" +checkId+ "," +strdepartmentname+ "," +strdepartmentshortname+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_department").html(html);
                }
            }
        });
    }
    function reportEditDepartment(id,strdepartmentname,strdepartmentshortname,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#departmentname').val(strdepartmentname);
        $('#departmentShortname').val(strdepartmentshortname);
        $('#isactive').val(isactiveval);
        $('#departmentname').focus();
        $("#createDepartment").html('Update');
    }
</script>
