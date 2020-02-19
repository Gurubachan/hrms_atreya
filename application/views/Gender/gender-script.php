<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(document).ready(function() {
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
                        if($('#createGender').html()=='Create'){
                            successfull_entries();
                            reportFunction(1);
                            $("#genderForm").trigger("reset");
                        }else if($('#createGender').html()=='Update'){
                            $('#createGender').html('Create');
                            successfully_updates();
                            reportFunction(2);
                            $("#genderForm").trigger("reset");
                            $('#txtid').val(0);
                        }
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].gendername+"</td><td>"+ jsondata[i].gendernshortame+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditGender(" +checkId+ "," +strgender+ "," +strgendershortname+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='genderViewDetails(" +checkId+ ")' data-toggle='modal' data-target='#genderDetials'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
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
    function genderViewDetails(id) {
        $.ajax({
            type:'post',
            url:'<?= base_url("Gender/genderViewDetails")?>',
            data:{id:id},
            success:function (res) {
                if(res!=false){
                    $('#loadGenderDetails').html(res);
                }
            }
        });
    }
</script>
