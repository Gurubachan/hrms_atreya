<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="fa fa-angle-double-right "></i>Create New User</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="fa fa-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="fa fa-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="fa fa-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form  class="" id="newUserForm" action="<?= base_url('Forms/formUser') ?>" method="post" name="newUserForm" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="" class="control-label mb-1">User Type<span style="color:red;">*</span></label>
                                <select id="usertypeid" name="usertypeid" class="select" required>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="hidden" id="txtid" name="txtid" value="0">
                                <input type="hidden" id="isactive" name="isactive" value="1">
                                <label for="" class="control-label mb-1">First Name<span style="color:red;">*</span></label>
                                <input id="fname" name="fname" type="text" class="form-control"  minlength="2" maxlength="50" placeholder="Enter first name" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="" class="control-label mb-1">Middle Name</label>
                                <input id="mname" name="mname" type="text" class="form-control " minlength="0"  maxlength="50" placeholder="Enter middle name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="" class="control-label mb-1">Last Name</label>
                                <input id="lname" name="lname" type="text" class="form-control " minlength="0"  maxlength="50" placeholder="Enter last name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="employeedob" class="control-label mb-1">Date of Birth<span style="color:red;">*</span></label>
                                <input type="date" id="dob" name="dob" minlength="10" maxlength="10"  class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="" class="control-label mb-1">Email</label>
                                <input id="emailid" name="emailid" type="email" class="form-control" placeholder="Enter email id.">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="" class="control-label mb-1">Mobile<span style="color:red;">*</span></label>
                                <input id="mobile" name="mobile" type="text" class="form-control"  minlength="10" maxlength="10" placeholder="Enter mobile number" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="" class="control-label mb-1">User Name</label>
                                <input id="username" name="username" type="text" class="form-control"  maxlength="50" placeholder="Enter username for login" title="Enter username for login">
                            </div>
                        </div>
<!--                        <div class="col-sm-3">-->
<!--                            <div class="form-group">-->
<!--                                <label for="" class="control-label mb-1">Password</label>-->
<!--                                <input id="userpassword" name="userpassword" type="text" class="form-control" minlength="5"  maxlength="16" onclick="password_validate('userpassword')" placeholder="Enter Password" title="Enter username for login" required>-->
<!--                                <small class="errormsg_userpassword"></small>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-sm-3">-->
<!--                            <div class="form-group">-->
<!--                                <label for="" class="control-label mb-1">Re-Enter Password </label>-->
<!--                                <input id="reenteruserpassword" name="reenteruserpassword" type="text" class="form-control" minlength="5" onclick="password_validate('reenteruserpassword')"  maxlength="16" placeholder="Enter Password" title="Enter username for login" required>-->
<!--                                <small class="errormsg_reenteruserpassword"></small>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <br>
                    <div class=" text-right" style="margin-right: 20%;">
                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                        <button type="submit" class="btn btn-primary btn-sm" id="createUser">Create</button>
<!--                        <button type="submit" class="btn btn-primary btn-sm" id="createUserPassword" style="display: none;">Create Password</button>-->
                    </div>
                </form>
                <br>
                <hr>
                <form action="" class="reportBtn">
                    <button type="button" class="btn  btn-sm" onclick="reportFunction(1)">Recent Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="reportFunction(2)">All Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="reportFunction(3)">Active Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="reportFunction(4)">Inactive Entries</button>
                    <button type="button" class="btn btn-sm" onclick="reportFunction(5)">Details View</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row" id="toggle_new_user" style="display: none;">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="fa fa-angle-double-right "></i> Report</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="fa fa-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="fa fa-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="fa fa-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="table-responsive">
                    <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-earning">
                        <thead style="font-size: 10px;">
                        <tr>
                            <th>Sl#</th>
                            <th>User Type</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Date of birth</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_user">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        load_user_type();
        load_userid();
    });
    function load_user_type(){
        $.ajax({
            type:'post',
            url: "<?= base_url('User/load_user_type')?>",
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#usertypeid").html(data);
                }
            }
        });
    }
    function load_userid(){
        $.ajax({
            type:'post',
            url: "<?= base_url('User/load_userid')?>",
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#userid").html(data);
                }
            }
        });
    }
    $("#newUserForm").submit(function(e){
        $('#toggle_new_user').show();
        e.preventDefault();
        var frm = $("#newUserForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('User/create_user')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var josndata = JSON.parse(data);
                    reportFunction(1);
                    $("#usertypeid").val("");
                    $("#username").val("");
                    $("#fname").val("");
                    $("#mname").val("");
                    $("#lname").val("");
                    $("#dob").val("");
                    $("#emailid").val("");
                    $("#mobile").val("");
                    $("#userpassword").val("");
                    $("#reenteruserpassword").val("");
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
