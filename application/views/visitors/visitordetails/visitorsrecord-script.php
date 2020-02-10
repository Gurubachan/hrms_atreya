<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(document).ready(function(){
        time_picker('txtVisittime');
        loadName();
        loadPurpose();
        loadOnlyCompany('cboCompany');
        loadContactperson();
        loadgender('cboGender');
    });
    $('#cboName').select2({
        allowClear: true,
        language: {
            noResults: function() {
                return '<table width="98%" style="padding: 0;margin: 0;text-align: center;" id="addButtonTable"><tr><td class="row"><button class="btn btn-block btn-default btn-xs" id="addButton" onclick="keepRecord()">Add new</button></td></tr></table>';
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });
    //new visitors name set to text field
    function keepRecord() {
        var searchvalue = $('.select2-search__field').val();
        $("#cboName").select2('data', {id: null, text: null});
        $("#txtSelect").html("");
        $(".select2-container").remove();
        $("#txtName").show().val(searchvalue);
        $("#isPresent").val(0);
        $("#txtAddress").val('');
        $("#txtContact").val('');
        $("#txtEmail").val('');
        $("#cboGender").val('');
    }
    function time_picker(id) {
        $('#' + id).timepicker({
            'timeFormat': 'H:i:s'
        });
    }


    $('#frmVisitorsrecord').submit(function(e){
        e.preventDefault();
        var frm=$('#frmVisitorsrecord').serialize();
        $.ajax({
            type:"post",
            // crossDomain:true,
            // url:'http://192.168.0.14/hrms_atreya/Visitors/create_visitorsrecord',
            url:'<?=base_url("Visitors/create_visitorsrecord")?>',
            data:frm,
            success:function(res){
                if(res!=false){
                   var jsondata= JSON.parse(res);
                    mytoast(jsondata);
                    if(jsondata.status == true){
                        $(this).trigger('reset');
                    }
                }else{
                    console.log(data);
                }
            }
        });
    });
    $("#cboName").change(function () {
        var id = $(this).val();
        $.ajax({
            type:"post",
            // crossDomain:true,
            // url:'http://192.168.0.14/hrms_atreya/Visitorsrecord/visitors_details',
            url:'<?=base_url("Visitors/visitors_details")?>',
            data:{id:id},
            success:function(res){
                if(res!=false){
                   var jsondata = JSON.parse(res);
                       $("#txtAddress").val(jsondata.address);
                       $("#txtContact").val(jsondata.contact_no);
                       $("#txtEmail").val(jsondata.email);
                       $("#cboGender").val(jsondata.gender);
                       // $("#cboCompanyid").val(jsondata.company);
                   console.log(res);

                }
            }
        });
    });


    function loadName() {
        $.ajax({
            type: "post",
            // crossDomain: true,
            // url:"http://192.168.0.14/hrms_atreya/Visitorsrecord/load_visitorsname",
            url:'<?=base_url("Visitors/load_visitorsname")?>',
            success:function (res){
                if(res!=false){
                    var jsondata= JSON.parse(res);
                    $("#cboName").html(jsondata.data);
                }
            }
        })
    }

    //function loadGender() {
    //    $.ajax({
    //        type: "post",
    //        crossDomain: true,
    //        // url:"http://192.168.0.14/hrms_atreya/Visitorsrecord/load_gender",
    //        url:'<?//=base_url("Gender/load_gender")?>//',
    //        success:function (res){
    //            if(res!=false){
    //                var jsondata= JSON.parse(res);
    //                $("#cboGender").html(jsondata.data);
    //            }
    //        }
    //    })
    //}

    function loadPurpose() {
        $.ajax({
            type: "post",
            // crossDomain: true,
            // url:"http://192.168.0.14/hrms_atreya/Purpose/load_purpose",
            url:'<?=base_url("Visitors/load_purpose")?>',
            success:function (res){
                if(res!=false){
                    var jsondata= JSON.parse(res);
                    $("#cboPurpose").html(jsondata.data);
                }
            }
        })
    }

    //function loadCompany() {
    //    $.ajax({
    //        type: "post",
    //        crossDomain: true,
    //        // url:"http://192.168.0.14/hrms_atreya/Company/load_company",
    //        url:'<?//=base_url("Company/load_company")?>//',
    //        success:function (res){
    //            if(res!=false){
    //                var jsondata= JSON.parse(res);
    //                $("#cboCompany").html(jsondata.data);
    //            }
    //        }
    //    })
    //}

    function loadContactperson() {
        $.ajax({
            type: "post",
            // crossDomain: true,
            // url:"http://192.168.0.14/hrms_atreya/Visitorsrecord/load_contactperson",
            url:'<?=base_url("Visitors/load_contactperson")?>',
            success:function (res){
                if(res!=false){
                    var jsondata= JSON.parse(res);
                    $("#cboContactperson").html(jsondata.data);
                }
            }
        })
    }
    function loadAjaxForReport(data) {
        $.ajax({
            type: 'post',
            url: "<?= base_url('Visitors/report_purpose_details')?>",
            // crossDomain: true,
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