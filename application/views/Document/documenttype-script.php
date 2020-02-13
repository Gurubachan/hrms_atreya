<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $("#frmDocumenttype").submit(function (e) {
        e.preventDefault();
        let frm = $(this).serialize();
        $.ajax({
            type:'post',
            url:'<?=base_url("Document/create_document_type")?>',
            data:frm,
            success:function (res) {
                if(res!=false){
                    var jsondata= JSON.parse(res);
                    mytoast(jsondata);
                    if(jsondata.status == true){
                        $("#frmDocumenttype").trigger('reset');
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
            url:"<?= base_url('Document/report_documenttype_details')?>",
            data:{checkparams:data},
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                   var j=0;
                   var z = jsondata.length;
                   var html = "";
                   var isactive='';
                   for(var i=0; i<z; i++){
                       j++;
                       var checkId = jsondata[i].id;
                       var checkIsactive = jsondata[i].isactive;
                       var editisactive = JSON.stringify(checkIsactive);
                       var dname = jsondata[i].documenttypename;
                       var strdname = JSON.stringify(dname);
                        var updatedid = '"<?=$cname?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                       html +="<tr> <td>"+j+"</td><td>"+ jsondata[i].documenttypename+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditdoctype(" +checkId+ "," +strdname+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button></td></tr>";
                   }
                   $("#load_documenttype_report").html(html);
                }
            }
        });
    }
function reportEditdoctype(id,strdtype,isactive) {
    // alert(strdtype);
    if(isactive=='t'){
        var isactiveval=1;
    }else{
        isactiveval=0;
    }
    $('#txtid').val(id);
    $('#txtDocumentname').val(strdtype);
    $('#isactive').val(isactiveval);
    $('#txtDocumentname').focus();
    $('#createRecordDtype').html('Update');
}

</script>