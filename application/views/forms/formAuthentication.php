<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<form  class="" id="newUserFormPasswrod"  name="newUserFormPasswrod" autocomplete="off" style="display: none;">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <input type="hidden" id="txtid" name="txtid" value="0">
                <input type="hidden" id="isactive" name="isactive" value="1">
                <label for="" class="control-label mb-1">User ID<span style="color:red;">*</span></label>
                <select id="userid" name="userid" class="select" required>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="" class="control-label mb-1">Password</label>
                <input id="userpassword" name="userpassword" type="text" class="form-control" minlength="5"  maxlength="16" placeholder="Enter Password" title="Enter username for login" required>
            </div>
        </div>
    </div>
    <br>
    <div class=" text-right" style="margin-right: 20%;">
        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
        <button type="submit" class="btn btn-primary btn-sm" id="createUser">Create Password</button>
    </div>

</form>
<script>
    $("#newUserFormPasswrod").submit(function(e){
        $('#toggle_new_user').show();
        e.preventDefault();
        var frm = $("#newUserFormPasswrod").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('User/create_user_authentication')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var josndata = JSON.parse(data);
                    reportFunction(1);
                }
            }
        });
    });
    function loadAjaxForReport(id){
        $('#toggle_new_user').show();
        $.ajax({
            type:'post',
            url:"<?= base_url('User/report_user')?>",
            data:{checkparams:id},
            crossDomain:true,
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    var j=0;
                    var z = jsondata.length;
                    var html = "";
                    var isactive='';
                    for(var i=0; i<z; i++){
                        j++;
                        var checkId = jsondata[i].id;
                        var checkIsactive = jsondata[i].isactive;
                        var mname = jsondata[i].mname;
                        var lname = jsondata[i].lname;
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].usertypeid+"</td><td>"+jsondata[i].username+"</td><td>"+ jsondata[i].fname+" "+mname+" "+lname+"</td>" +
                            "<td>"+ jsondata[i].emailid+"</td><td>"+ jsondata[i].mobile+"</td><td>"+ jsondata[i].dob+"</td><td>"+isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_user").html(html);

                }
            }
        });
    }
</script>
