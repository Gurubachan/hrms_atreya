<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        // load_gender();
    });
    $("#experienceTypeForm").submit(function(e){
        e.preventDefault();
        var frm = $("#experienceTypeForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('ExperienceType/create_experience_type')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    if($("#createExperienceType").html()=="Update"){
                        window.location.reload();
                    }else {
                        $('#experienceTypeForm').trigger("reset");
                        reportFunction(1);
                    }
                }else{
                    console.log(data);
                }
            }
        });
    });
    function loadAjaxForReport(data){
        $.ajax({
            type:'post',
            url:"<?= base_url('ExperienceType/report_experience_type')?>",
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
                        var experienceType = jsondata[i].type;
                        var strexperiencetype = JSON.stringify(experienceType);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ experienceType+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditExperienceType(" +checkId+ "," +strexperiencetype+ "," +editisactive+ ")'>Edit</button></td></tr>");
                    }
                    $("#load_experiencetype").html(html);
                }
            }
        });
    }
    function reportEditExperienceType(id,strexperiencetype,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#experiencetypename').val(strexperiencetype);
        $('#isactive').val(isactiveval);
        $('#experiencetypename').focus();
        $("#createExperienceType").html("Update");
    }
</script>

