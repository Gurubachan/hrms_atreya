<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
$(document).ready(function(){
});

$('#frmPurpose').submit(function(e){
    e.preventDefault();
    var frm=$('#frmPurpose').serialize();
    $.ajax({
        type:"post",
        crossDomain:true,
        // url:'http://192.168.0.14/hrms_atreya/Purpose/create_purpose',
        url:'<?=base_url("Visitors/create_purpose")?>',
        data:frm,
        success:function(res) {
            if (res != false) {
                var jsondata = JSON.parse(res);
                mytoast(jsondata);
                if (jsondata.status == true) {
                    $(this).trigger('reset');
                }
            } else {
                console.log(data);
            }
        }
    });
});
function loadAjaxForReport(data) {
    $.ajax({
        type: 'post',
        url: "<?= base_url('Visitors/report_purpose_details')?>",
        crossDomain: true,
        data: {checkparams: data},
        success: function (data) {
            var jsondata = JSON.parse(data);
            console.log(data);
            if (data != false) {
                var j = 0;
                var z = jsondata.length;
                // alert(z);
                var html = "";
                var isactive = "";
                for (var i = 0; i < z; i++) {
                    j++;
                    var checkId = jsondata[i].id;
                    var checkIsactive = jsondata[i].isactive;
                    var editisactive = JSON.stringify(checkIsactive);
                    var purpose = jsondata[i].purpose;
                    var strpurpose = JSON.stringify(purpose);
                    var updatedid = '"<?= $cname ?>"';
                    var urlid = '"../Common/record_active_deactive"';
                    if (checkIsactive == 't') {
                        isactive = "<button id='action" + checkId + "' onclick='editIsactive(1," + checkId + "," + updatedid + "," + urlid + ")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                    } else {
                        isactive = "<button id='action" + checkId + "' onclick='editIsactive(0," + checkId + "," + updatedid + "," + urlid + ")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                    }
                    html += ("<tr> <td>" + j + "</td><td>" + purpose + "</td><td>" + isactive + "</td><td><button class='btn editBtn btn-sm' onclick='reportEditPurpose(" +checkId+ "," +strpurpose+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")' data-toggle='modal' data-target='#purposeDetials'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                }
                $("#load_purpose").html(html);
            }
        }
    });
}
function reportEditPurpose(id,strpurpose,isactive) {
   if(isactive=='t'){
       var isactiveval=1;
   }else{
       isactiveval=0;
   }
   $('#txtid').val(id);
   $('#txtPurpose').val(strpurpose);
   $('#isactive').val(isactiveval);
   $('#txtPurpose').focus();
   $('#createPurpose').html('Update');
}
//function detailsView(id) {
//    $.ajax({
//        type:'post',
//        url:'<?//= base_url("State/stateViewDetails/")?>//',
//        data:{id:id},
//        success:function (res) {
//            if(res!=false){
//                $('#loadStateDetails').html(res);
//            }
//        }
//    });
//}
</script>