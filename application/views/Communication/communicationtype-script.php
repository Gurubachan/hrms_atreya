<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        // load_gender();
    });
    $("#communicationTypeForm").submit(function(e){
        e.preventDefault();
        var frm = $("#communicationTypeForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('CommunicationType/create_communication_type')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    if($("#createCommunicationType").html()=="Update"){
                        window.location.reload();
                    }else {
                        $('#communicationTypeForm').trigger("reset");
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
            url:"<?= base_url('CommunicationType/report_communication_type')?>",
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
                        var ctype = jsondata[i].type;
                        var strctype = JSON.stringify(ctype);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ ctype+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditCommunicatonTYpe(" +checkId+ "," +strctype+ "," +editisactive+ ")'>Edit</button></td></tr>");
                    }
                    $("#load_communicationtype").html(html);
                }
            }
        });
    }
    function reportEditCommunicatonTYpe(id,strctype,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#communicationtypename').val(strctype);
        $('#isactive').val(isactiveval);
        $('#communicationtypename').focus();
        $("#createCommunicationType").html("Update");
    }
</script>

