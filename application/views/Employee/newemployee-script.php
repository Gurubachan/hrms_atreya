<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        load_employee_type();
        load_education();
        load_department();
        load_designation();
        load_marital_status();
        load_gender();
        load_state();
    });

    $('#stateid').change(function () {
        load_district($(this).val());
    });

    $("#newEmployeeForm").submit(function(e){
        $('#toggle_new_employee').show();
        e.preventDefault();
        var frm = $("#newEmployeeForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/create_employee')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var josndata = JSON.parse(data);
                    if($('#createNewEmployee').html()=='Update'){
                        window.location.reload();
                    }else{
                        reportFunction(1);
                        $('#newEmployeeForm').trigger('reset');
                    }
                }
            }
        });
    });
    function loadAjaxForReport(id){
        $('#toggle_new_employee').show();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_temp_employee')?>",
            data:{checkparams:id},
            crossDomain:true,
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
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        var strfname =  JSON.stringify(jsondata[i].fname);
                        var strmname =  JSON.stringify(jsondata[i].mname);
                        var strlname =  JSON.stringify(jsondata[i].lname);
                        var stremailid =  JSON.stringify(jsondata[i].emailid);
                        var strfathername =  JSON.stringify(jsondata[i].fathername);
                        var strmothername =  JSON.stringify(jsondata[i].mothername);
                        var strspoucsename =  JSON.stringify(jsondata[i].spousename);
                        var straddress =  JSON.stringify(jsondata[i].address);
                        var strepf = JSON.stringify(jsondata[i].epfno);
                        var strpan = JSON.stringify(jsondata[i].panno);
                        var strempid = JSON.stringify(jsondata[i].empid);
                        var strdoj = JSON.stringify(jsondata[i].doj);
                        var strdol = JSON.stringify(jsondata[i].dol);
                        var strdob = JSON.stringify(jsondata[i].dob);
                        var stateid = jsondata[i].stateid;
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].slno+"</td><td>"+ jsondata[i].empid+"</td><td>"+ jsondata[i].designationname+"</td><td>"+ jsondata[i].fname+" "+jsondata[i].mname+" "+jsondata[i].lname+"</td>" +
                            "<td>"+ jsondata[i].gendername+"</td><td>"+ jsondata[i].dob+"</td><td>"+ jsondata[i].maritalstatusname+"</td><td>"+ jsondata[i].doj+"</td><td>"+ jsondata[i].dol+"</td><td>"+ jsondata[i].fathername+"</td><td>"+ jsondata[i].mothername+"</td>" +
                            "<td>"+ jsondata[i].spousename+"</td><td>"+ jsondata[i].address+"</td><td>"+ jsondata[i].emailid+"</td><td>"+ jsondata[i].mobile+"</td><td>"+ jsondata[i].statename+"</td><td>"+ jsondata[i].distname+"</td><td>"+ jsondata[i].educationname+"</td>" +
                            "<td>"+ jsondata[i].epfno+"</td><td>"+ jsondata[i].esifno+"</td><td>"+ jsondata[i].aadharno+"</td><td>"+ jsondata[i].panno+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' " +
                            "onclick='reportEditEmployee(" +checkId+ ","+jsondata[i].slno+","+strempid+","+jsondata[i].departmentmappingid+","+jsondata[i].designationid+","+strdoj+","+strdol+","+strfname+","+strmname+","+strlname+","+jsondata[i].genderid+","+jsondata[i].mobile+"," +
                            ""+stremailid+","+strfathername+","+strmothername+","+jsondata[i].maritalstatusid+","+strspoucsename+","+jsondata[i].educationid+","+straddress+","+strdob+","+strepf+","+jsondata[i].esifno+","+jsondata[i].aadharno+","+strpan+","+jsondata[i].distid+","+stateid+","+editisactive+ ")'>Edit</button></td></tr>");
                    }
                    $("#load_employeess").html(html);
                }
            }
        });
    }
    function reportEditEmployee(id,slno,strempid,departmentmappingid,designationid,strdoj,strdol,strfname,strmname,strlname,
                                genderid,mobile,stremailid,strfathername,strmothername,maritalstatusid,
                                strspoucsename,educationid,straddress,strdob,strepf,esifno,aadharno,strpan,distid,stateid,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#slno').val(slno);
        $('#empid').val(strempid);
        $('#departmentmappingid').val(departmentmappingid);
        $('#designationid').val(designationid);
        $('#doj').val(strdoj);
        $('#dol').val(strdol);
        $('#fname').val(strfname);
        $('#mname').val(strmname);
        $('#lname').val(strlname);
        $('#genderid').val(genderid);
        $('#mobile').val(mobile);
        $('#emailid').val(stremailid);
        $('#fathername').val(strfathername);
        $('#mothername').val(strmothername);
        $('#maritalstatusid').val(maritalstatusid);
        $('#spousename').val(strspoucsename);
        $('#educationid').val(educationid);
        $('#address').val(straddress);
        $('#dob').val(strdob);
        $('#epfno').val(strepf);
        $('#esifno').val(esifno);
        $('#aadharno').val(aadharno);
        $('#panno').val(strpan);
        $('#distid').val(distid);
        $("#stateid").val(stateid).change();
        dist=distid;
        $('#isactive').val(isactiveval);
        $('#slno').focus();
        $("#createNewEmployee").html("Update");

    }
</script>
