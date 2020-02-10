<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $('#frmShifttype').submit(function(e){
        e.preventDefault();
        var frm=$('#frmShifttype').serialize();
        $.ajax({
            type:"post",
            url:'<?=base_url("Attendance/create_shifttype")?>',
            data:frm,
            success:function(res){
                if(res!=false){
                    var jsondata = JSON.parse(res);
                    mytoast(jsondata);
                    reportFunction(1);
                    if(jsondata.status==true){
                        $('#frmShifttype').trigger('reset');
                    }
                }else{
                    console.log(data);
                    mytoast(jsondata);

                }
            }
        });
    });
    function loadAjaxForReport(data){
        $.ajax({
            type:'post',
            url:"<?= base_url('Attendance/report_shift_type')?>",
            crossDomain:true,
            data:{checkparams:data},
            success:function(data){
                var jsondata = JSON.parse(data);
                console.log(data);
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
                        var shifttype = jsondata[i].shifttypename;
                        var strshifttype = JSON.stringify(shifttype);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+shifttype+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditBank(" +checkId+ "," + + ","+ +"," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='BankDetailsView(" +checkId+ ")' data-toggle='modal' data-target='#bankDetails'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_shifttype").html(html);
                }
            }
        });
    }
    //function reportEditBank(id,strbank,strbankshortname,isactive) {
    //    if(isactive=='t'){
    //        var isactiveval=1;
    //    }else{
    //        isactiveval=0;
    //    }
    //    $('#txtid').val(id);
    //    $('#bankname').val(strbank);
    //    $("#bankShortname").val(strbankshortname);
    //    $('#isactive').val(isactiveval);
    //    $('#bankname').focus();
    //    $("#createBank").html('Update');
    //}
    //function BankDetailsView(id) {
    //    $.ajax({
    //        type:'post',
    //        url:'<?//= base_url("Bank/bankViewDetails")?>//',
    //        data:{id:id},
    //        success:function (res) {
    //            if(res!=false){
    //                $('#loadBankDetailsView').html(res);
    //                // $("#dname").html(res.distname);
    //            }
    //        }
    //    });
    //}
</script>