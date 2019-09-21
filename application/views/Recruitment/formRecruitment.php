<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="col-sm-10">
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> New Recruitment</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form  class="" id="newRecruitmentForm"  name="newRecruitmentForm" autocomplete="off">
                        <br>
                        <div class="form-group">
                            <fieldset class="the-fieldset">
                                <legend class="the-legend"><span class="blue">Basic Details</span></legend>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="hidden" id="txtid" name="txtid" value="0">
                                        <input type="hidden" id="isactive" name="isactive" value="1">
                                        <div class="form-group">
                                            <label for="employeefirstname" class="control-label mb-1">First Name<span style="color:red;">*</span></label>
                                            <input id="fname" name="fname" type="text" class="form-control"  minlength="1" maxlength="50" placeholder="Enter first name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeemiddlename" class="control-label mb-1">Middle Name</label>
                                            <input id="mname" name="mname" type="text" class="form-control" maxlength="50" placeholder="Enter middle name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeelastname" class="control-label mb-1">Last Name</label>
                                            <input id="lname" name="lname" type="text" class="form-control"  maxlength="50" placeholder="Enter last name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeedob" class="control-label mb-1">Date of Birth<span style="color:red;">*</span></label>
                                            <input id="dob" name="dob" type="date" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeefathername" class="control-label mb-1">Father Name</label>
                                            <input id="fathername" name="fathername" type="text" class="form-control" maxlength="20" placeholder="Enter father name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeemothername" class="control-label mb-1">Mother Name</label>
                                            <input id="mothername" name="mothername" type="text" class="form-control" placeholder="Enter mother name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeespoucename" class="control-label mb-1">Spouse Name</label>
                                            <input id="spousename" name="spousename" type="text" class="form-control" placeholder="Enter spouse name">
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="employeegender" class="control-label mb-1">Gender<span style="color:red;">*</span></label>
                                        <select id="genderid" name="genderid" class="select" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="employeegender" class="control-label mb-1">Marital Status</label>
                                        <select id="maritalstatusid" name="maritalstatusid" class="select" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="employeegender" class="control-label mb-1">Religion</label>
                                        <select id="religionid" name="religionid" class="select" required>
                                        </select>
                                    </div>
                                </div>
                                </div>
                            </fieldset>
                        </div>
                        <br>
                        <div class="form-group">
                            <fieldset class="the-fieldset">
                                <legend class="the-legend"><span class="blue">Contact Details</span></legend>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeemobile" class="control-label mb-1">Mobile Number<span style="color:red;">*</span> &nbsp;&nbsp;&nbsp;<span class="red">Whatsapp No.?</span>
                                                <input type="checkbox" id="sameaswhatsappnumber"> </label>
                                            <input id="mobile" name="mobile" type="text" class="form-control"  onclick="number_validate('mobile')" minlength="10" maxlength="10" placeholder="Enter mobile number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeemobile" class="control-label mb-1">Alternative Mobile</label>
                                            <input id="altmobile" name="altmobile" type="text" class="form-control" onclick="number_validate('altmobile')"  minlength="10" maxlength="10" placeholder="Enter mobile number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeeemail" class="control-label mb-1">Whatsapp Number<span style="color:red;">*</span></label>
                                            <input id="whatsappnumber" name="whatsappnumber" type="text" class="form-control" onclick="number_validate('whatsappnumber')"  minlength="10" maxlength="10" placeholder="Enter email id.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeeemail" class="control-label mb-1">Email<span style="color:red;">*</span></label>
                                            <input type="email" id="emailid" name="emailid"  class="form-control" placeholder="Enter email id.">
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <br>
                        <div class=" text-right" style="margin-right: 20%;">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="createNewEmployee">Save & Next</button>
                        </div>


                    </form>
                    <br>
                    <form  class="" id="newRecruitmentForm2"  name="newRecruitmentForm2" autocomplete="off" style="display: none">
                        <div class="form-group">
                            <fieldset class="the-fieldset">
                                <legend class="the-legend"><span class="blue">Address Details</span></legend>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeeaddress" class="control-label mb-1">At/Street/Plot.No.<span style="color:red;">*</span></label>
                                            <input id="emailid" name="emailid" type="email" class="form-control" placeholder="Enter email id.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeeaddress" class="control-label mb-1">Po<span style="color:red;">*</span></label>
                                            <input id="emailid" name="emailid" type="email" class="form-control" placeholder="Enter email id.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeeaddress" class="control-label mb-1">Ps<span style="color:red;">*</span></label>
                                            <input id="emailid" name="emailid" type="email" class="form-control" placeholder="Enter email id.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeeaddress" class="control-label mb-1">Land mark<span style="color:red;">*</span></label>
                                            <input id="emailid" name="emailid" type="email" class="form-control" placeholder="Enter email id.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="stateid" class="control-label mb-1"><span style="color:red;">*</span>State</label>
                                            <select id="stateid" name="stateid" class="select" required></select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="distid" class="control-label mb-1">District<span style="color:red;">*</span></label>
                                            <select id="distid" name="distid" class="select" required>
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="distid" class="control-label mb-1">Pin Code<span style="color:red;">*</span></label>
                                            <input id="emailid" name="emailid" type="email" class="form-control" placeholder="Enter email id.">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <br>
                        <div class=" text-right" style="margin-right: 20%;">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="button" class="btn btn-success btn-sm">Previous</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="createNewEmployee">Save</button>
                        </div>
                    </form>
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
    <div class="row" id="report_newRecruitment" style="display: none;">
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
                            <thead>
                            <tr>
                                <th>Sl#</th>
                                <th>Gender name</th>
                                <th>Gender Shortname</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="load_newRecruitment">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


