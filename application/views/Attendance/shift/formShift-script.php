<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(document).ready(function () {
        // timepicker('txtShiftname');
        time_picker('txtIntime');
        time_picker('txtOuttime');
        loadOnlyCompany();
        load_Shifttype();
    });
    function time_picker(id) {
        $('#'+id).timepicker({
            'timeFormat':'H:i:s'
        });
    }

    $('#frmShift').submit(function(e){
        e.preventDefault();
        var frm = $("#frmShift").serialize();
        $.ajax({
            type:"post",
            crossDomain:true,
            // url:'http://192.168.1.3/hrms_atreya/Attendance/create_shift',
            url:'<?=base_url("Attendance/create_shift")?>',
            data:frm,
            success:function(res){
                if(res!=false){
                    var jsondata = JSON.parse(res);
                    mytoast(jsondata);
                    if(jsondata.status==true){
                        $("#frmShift").trigger('reset');
                    }
                }else{
                    console.log(data);
                }
            }
        });
    });

    function load_Shifttype() {
        $.ajax({
            type: "post",
            crossDomain: true,
            // url:"http://192.168.0.14/hrms_atreya/Shifttype/load_shifttype",
            url:'<?=base_url("Attendance/load_shifttype")?>',
            success:function (res){
                if(res!=false){
                    var jsondata= JSON.parse(res);
                    $("#cboShift").html(jsondata.data);
                }
            }
        })
    }
    function loadAjaxForReport(data){
        $.ajax({
            type:'post',
            url:"<?= base_url('Attendance/report_shifts')?>",
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
                        var shift = jsondata[i].shiftname;
                        var strshiftshortname = JSON.stringify(jsondata[i].shiftshortname);
                        var strshift = JSON.stringify(shift);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+jsondata[i].shiftname+"</td><td>"+jsondata[i].shiftshortname+"</td><td>"+jsondata[i].companyid+"</td><td>"+jsondata[i].shiftintime+"</td><td>"+jsondata[i].shiftouttime+"</td><td>"+jsondata[i].shiftwef+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditShift(" +checkId+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='BankDetailsView(" +checkId+ ")' data-toggle='modal' data-target='#bankDetails'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_shift").html(html);
                }
            }
        });
    }
    function reportEditShift(id) {
        alert(id);
       // if(isactive=='t'){
       //     var isactiveval=1;
       // }else{
       //     isactiveval=0;
       // }
       // $('#txtid').val(id);
       // $('#bankname').val(strbank);
       // $("#bankShortname").val(strbankshortname);
       // $('#isactive').val(isactiveval);
       // $('#bankname').focus();
       // $("#createBank").html('Update');
    }
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
