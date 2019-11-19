<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 1500; // 1.5s
        toastr.info('Page Loaded!');
    });
    $("#genderForm").submit(function(e){
        e.preventDefault();
        var frm = $("#genderForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Gender/create_gender')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    if(jsondata.flag==0){
                        duplicate_entries();
                    }else{
                        successfull_entries();
                    }
                    if($("#createGender").html()=="Update"){
                        window.location.reload();
                    }else {
                        // var toast = new iqwerty.toast.Toast();
                        // toast.setText('This is a basic toast message!')
                        //     .setDuration(5000)
                        //     .show();
                        $('#genderForm').trigger("reset");
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
            url:"<?= base_url('Gender/report_gender')?>",
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
                        var gender = jsondata[i].gendername;
                        var strgender = JSON.stringify(gender);
                        var strgendershortname = JSON.stringify(jsondata[i].gendernshortame);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].gendername+"</td><td>"+ jsondata[i].gendernshortame+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditGender(" +checkId+ "," +strgender+ "," +strgendershortname+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_gendername").html(html);
                }
            }
        });
    }
    function reportEditGender(id,strgender,strgendershortname,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#gendername').val(strgender);
        $('#genderShortname').val(strgendershortname);
        $('#isactive').val(isactiveval);
        $('#gendername').focus();
        $("#createGender").html("Update");
    }
</script>
