<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        // load_gender();
    });
    $("#religionForm").submit(function(e){
        e.preventDefault();
        var frm = $("#religionForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Religion/create_religion')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    if($("#createReligion").html()=="Update"){
                        window.location.reload();
                    }else {
                        $('#religionForm').trigger("reset");
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
            url:"<?= base_url('Religion/report_religion')?>",
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
                        var religion = jsondata[i].religion;
                        var strreligion = JSON.stringify(religion);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ religion+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditReligion(" +checkId+ "," +strreligion+ "," +editisactive+ ")'>Edit</button></td></tr>");
                    }
                    $("#load_religon").html(html);
                }
            }
        });
    }
    function reportEditReligion(id,strreligion,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#religionname').val(strreligion);
        $('#isactive').val(isactiveval);
        $('#religionname').focus();
        $("#createReligion").html("Update");
    }
</script>
