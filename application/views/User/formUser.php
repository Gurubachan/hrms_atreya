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
                    <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form  class="" id="newUserForm" action="<?= base_url('Forms/formUser') ?>" method="post" name="newUserForm" autocomplete="off">
                    <div class="col-sm-8 ml-auto mr-auto d-block">
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
                                    <input id="fname" name="fname" type="text" class="form-control" onclick="charachters_validate('fname')"  minlength="2" maxlength="50" placeholder="Enter first name" required>
                                    <small id="" class="errormsg_fname"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Middle Name</label>
                                    <input id="mname" name="mname" type="text" class="form-control " onclick="charachters_validate('mname')" minlength="0"  maxlength="50" placeholder="Enter middle name">
                                    <small id="" class="errormsg_mname"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Last Name</label>
                                    <input id="lname" name="lname" type="text" class="form-control" onclick="charachters_validate('lname')" minlength="0"  maxlength="50" placeholder="Enter last name">
                                    <small id="" class="errormsg_lname"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeedob" class="control-label mb-1">Date of Birth<span style="color:red;">*</span></label>
                                    <input type="text" id="dob" name="dob" minlength="10" maxlength="10"  class="form-control" required placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Email</label>
                                    <input id="emailid" name="emailid" type="email" onclick="email_validate('emailid')" class="form-control" placeholder="Enter email id.">
                                    <small id="" class="errormsg_emailid"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Mobile<span style="color:red;">*</span></label>
                                    <input id="mobile" name="mobile" type="text" class="form-control"  minlength="10" onclick="number_validate('mobile')" maxlength="10" placeholder="Enter mobile number" required>
                                    <small id="" class="errormsg_mobile"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">User Name</label>
                                    <input id="username" name="username" type="text" class="form-control" onclick="password_validate('username')" minlength="6"  maxlength="18" placeholder="Enter username for login ,only @-_./ allowed."" title="Enter username for login,only @-_./ allowed.">
                                    <small id="" class="errormsg_username"></small>
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
                    <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
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

