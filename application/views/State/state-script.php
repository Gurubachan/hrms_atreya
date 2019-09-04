<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $("#stateForm").submit(function(e){
        e.preventDefault();
        var x = location.hostname;
        var frm = $("#stateForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('State/create_state')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){

                    if($("#createState").html()=='Update'){
                        window.location.reload();
                        $("#statename").val("");
                    }else{
                        $("#stateForm").trigger("reset");
                        reportFunction(1);
                    }

                }else{
                    console.log(data);
                }

            }
        });
    });
    function loadAjaxForReport(data) {
        $.ajax({
            type: 'post',
            url: "<?= base_url('State/report_state')?>",
            crossDomain: true,
            data: {checkparams: data},
            success: function (data) {
                var jsondata = JSON.parse(data);
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
                        var state = jsondata[i].statename;
                        var strState = JSON.stringify(state);
                        var strStateShortName = JSON.stringify(jsondata[i].stateshortname);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if (checkIsactive == 't') {
                            isactive = "<button id='action" + checkId + "' onclick='editIsactive(1," + checkId + "," + updatedid + "," + urlid + ")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        } else {
                            isactive = "<button id='action" + checkId + "' onclick='editIsactive(0," + checkId + "," + updatedid + "," + urlid + ")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html += ("<tr> <td>" + j + "</td><td>" + jsondata[i].statename + "</td><td>" + jsondata[i].stateshortname + "</td><td>" + isactive + "</td><td><button class='btn editBtn btn-sm' onclick='reportEditState(" +checkId+ "," +strState+ "," +strStateShortName+ "," +editisactive+ ")'>Edit</button></td></tr>");
                    }
                    $("#load_state").html(html);
                }
            }
        });
    }
    function reportEditState(id,strstate,strStateShortName,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#statename').val(strstate);
        $('#stateShortname').val(strStateShortName);
        $('#isactive').val(isactiveval);
        $('#statename').focus();
        $('#createState').html('Update');
    }
</script>
