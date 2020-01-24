<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="fa fa-angle-double-right "></i>Create New Employee</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="" id="newEmployeeForm" name="newEmployeeForm" autocomplete="off">
                    <div class="form-group">
                        <fieldset class="the-fieldset">
                            <legend class="the-legend">Description</legend>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="hidden" id="txtid" name="txtid" value="0">
                                        <input type="hidden" id="isactive" name="isactive" value="1">
                                        <input type="hidden" id="isattendance" name="isattendance" value="0">
                                        <label for="slno" class="control-label mb-1">#Slno<span style="color:red;">*</span>.</label>
                                        <input type="text" id="txtSlno" name="txtSlno" class="form-control" onclick="alfa_numeric('slno')" maxlength="8" placeholder="Enter serial number" required>
                                        <small class="errormsg_slno"></small>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="" class="control-label mb-1">Department<span
                                                style="color:red;">*</span></label>
                                        <select id="cboDepartmentmappingid" name="cboDepartmentmappingid" class="select" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="" class="control-label mb-1">Designation<span
                                                style="color:red;">*</span></label>
                                        <select id="cboDesignationid" name="cboDesignationid" class="select" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <div class="form-group">
                            <fieldset class="the-fieldset">
                                <legend class="the-legend">Basic Information</legend>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeefirstname" class="control-label mb-1">First Name<span
                                                    style="color:red;">*</span></label>
                                            <input type="text" id="txtFname" name="txtFname" class="form-control" onclick=" charachters_validate('txtFname')"
                                                   minlength="1" maxlength="50" placeholder="Enter first name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeemiddlename" class="control-label mb-1">Middle
                                                Name</label>
                                            <input type="text" id="txtMname" name="txtMname" class="form-control"
                                                   onclick=" charachters_validate('txtMname')" maxlength="50" placeholder="Enter middle name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeelastname" class="control-label mb-1">Last Name</label>
                                            <input type="text" id="txtLname" name="txtLname" class="form-control" onclick=" charachters_validate('txtLname')"
                                                   maxlength="50" placeholder="Enter last name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeegender" class="control-label mb-1">Gender<span
                                                    style="color:red;">*</span></label>
                                            <select id="cboGenderid" name="cboGenderid" class="select" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="employeedob" class="control-label mb-1">Date of Birth<span
                                                    style="color:red;">*</span></label>
                                            <input type="text" id="txtDob" name="txtDob" class="form-control" required
                                                 placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="employeedoj" class="control-label mb-1">Date of Join<span
                                                        style="color:red;">*</span></label>
                                            <input type="text" id="txtDoj" name="txtDoj" class="form-control" required
                                                   placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="employeegender" class="control-label mb-1">Marital
                                                Status</label>
                                            <select id="cboMaritalstatusid" name="cboMaritalstatusid" class="select" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeefathername" class="control-label mb-1">Father
                                                Name</label>
                                            <input type="text" id="txtFathername" name="txtFathername" class="form-control"
                                                   onclick=" charachters_validate('txtFathername')" maxlength="20" placeholder="Enter father name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeemothername" class="control-label mb-1">Mother
                                                Name</label>
                                            <input type="text" id="txtMothername" name="txtMothername" class="form-control" maxlength="20"
                                                   onclick=" charachters_validate('txtMothername')" placeholder="Enter mother name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeespoucename" class="control-label mb-1">Spouse
                                                Name</label>
                                            <input type="text" id="txtSpousename" name="txtSpousename" class="form-control" maxlength="20"
                                                   onclick=" charachters_validate('txtSpousename')" placeholder="Enter spouse name" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <div class="form-group">
                                <fieldset class="the-fieldset">
                                    <legend class="the-legend">Communication Details</legend>
                                    <h4>Permanent Address:</h4><br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="employeepermenentVillage/Street/PlotNo." class="control-label mb-1">Village/Street/PlotNo.<span
                                                            style="color:red;">*</span></label>
                                                <textarea id="txtPermanentaddress" name="txtPermanentaddress" class="form-control textarea"
                                                          minlength="5" maxlength="60" required
                                                          placeholder="Enter Village/Street/PlotNo"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="permenentstateid" class="control-label mb-1"><span
                                                            style="color:red;">*</span>State</label>
                                                <select id="cboPermanentstateid" name="cboPermanentstateid" class="select" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="permenentdistid" class="control-label mb-1">District<span
                                                            style="color:red;">*</span></label>
                                                <select id="cboPermanentdistid" name="cboPermanentdistid" class="select" required>
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="permenentpincode" class="control-label mb-1">Pincode<span
                                                            style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="txtPermanentpincode" name="txtPermanentpincode"
                                                       minlength="6" maxlength="6" pattern="[0-9]{6}" placeholder="enter pincode" required>
                                            </div>
                                        </div>
                                    </div><br>
                                    <input type="checkbox" id="chkAddress" name="chkAddress">&nbsp;&nbsp;Same as permanent address
                                    <br><br>
                                    <h4>Present Address:</h4><br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="employeeVillage/Street/PlotNo." class="control-label mb-1">Village/Street/PlotNo.<span
                                                        style="color:red;">*</span></label>
                                                <textarea id="txtAddress" name="txtAddress" class="form-control textarea"
                                                          minlength="5" maxlength="60"
                                                          placeholder="Enter Village/Street/PlotNo."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="stateid" class="control-label mb-1"><span
                                                        style="color:red;">*</span>State</label>
                                                <select id="cboStateid" name="cboStateid" class="select" >
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="distid" class="control-label mb-1">District<span
                                                        style="color:red;">*</span></label>
                                                <select id="cboDistid" name="cboDistid" class="select" >
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="pincode" class="control-label mb-1">Pincode<span
                                                            style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="txtPincode" name="txtPincode"
                                                       minlength="6" maxlength="6" pattern="[0-9]{6}" placeholder="enter pincode" >
                                            </div>
                                        </div>
                                    </div><br>
                                        <h4>Contact Details:</h4><br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="employeeemail" class="control-label mb-1">Email</label>
                                                <input type="email" id="txtEmailid" name="txtEmailid" class="form-control" onclick="email_validate('txtEmailid')"
                                                       placeholder="Enter email id." required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="employeemobile" class="control-label mb-1">Mobile<span
                                                            style="color:red;">*</span></label>
                                                <input type="text" id="txtMobile" name="txtMobile" class="form-control" onclick="number_validate('txtMobile')"
                                                       minlength="10" maxlength="10" placeholder="Enter mobile number" pattern="[6-9]{1}[0-9]{9}"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="employeealternatemobile" class="control-label mb-1">Alternate Mobile<span
                                                            style="color:red;">*</span></label>
                                                <input type="text" id="txtAltermobile" name="txtAltermobile" class="form-control"
                                                       minlength="10" maxlength="10" placeholder="Enter alter mobile number" onclick="number_validate('txtAltermobile')"
                                                       pattern="[6-9]{1}[0-9]{9}" required>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <br>
                                <div class="form-group">
                                    <fieldset class="the-fieldset">
                                        <legend class="the-legend">Experience</legend>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for=""
                                                           class="control-label mb-1">Company Name<span style="color:red;">*</span></label>
                                                    <input type="text" id="cboCompanyname" name="cboCompanyname" class="form-control" required
                                                           onclick=" alfa_numeric('cboCompanyname')" placeholder="enter previous company name">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for=""
                                                           class="control-label mb-1">Designation<span style="color:red;">*</span></label>
                                                    <select id="cboJobdesignation" name="cboJobdesignation" class="select" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="employeejobrole"
                                                           class="control-label mb-1">Role<span style="color:red;">*</span></label>
                                                    <input type="text" id="txtJobrole" name="txtJobrole" class="form-control" required
                                                        onclick=" alfa_numeric('txtJobrole')" placeholder="enter job role">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="employeeeducation"
                                                           class="control-label mb-1">From Date<span style="color:red;">*</span></label>
                                                    <input type="text" id="txtFromdate" name="txtFromdate" class="form-control" required
                                                           placeholder="dd-mm-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="employeeeducation"
                                                           class="control-label mb-1">To Date<span style="color:red;">*</span></label>
                                                    <input type="text" id="txtTodate" name="txtTodate" class="form-control" required
                                                            placeholder="dd-mm-yyyy">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <br>
                                    <div class="form-group">
                                        <fieldset class="the-fieldset">
                                            <legend class="the-legend">Qualification</legend>
                                          <div class="col-sm-12" >
                                              <div class="row" id="addrow">
                                                  <div class="col-sm-2">
                                                      <div class="form-group">
                                                          <label for="employeeeducation"
                                                                 class="control-label mb-1">Education<span style="color:red;">*</span></label>
                                                          <select id="cboEducationid0" name="cboEducationid[]" class="select" required>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-3">
                                                      <div class="form-group">
                                                          <label for="employeeeducationstream"
                                                                 class="control-label mb-1">Education Stream<span style="color:red;">*</span></label>
                                                          <input type="text" id="txtEducationstream0" name="txtEducationstream[]" class="form-control"
                                                                 onclick=" alfa_numeric('txtEducationstream0')" placeholder="Enter education stream"  required>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-3">
                                                      <div class="form-group">
                                                          <label for="employeeboard" class="control-label mb-1">Board</label>
                                                          <input type="text" id="txtBoard0" name="txtBoard[]" class="form-control"
                                                                 onclick=" alfa_numeric('txtBoard0')" placeholder="enter Board">
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <div class="form-group">
                                                          <label for="employeeregdno" class="control-label mb-1">Regd.No</label>
                                                          <input type="text" id="txtRegdno0" name="txtRegdno[]" class="form-control"
                                                                 onclick=" alfa_numeric('txtRegdno0')" placeholder="enter Regd.No" required>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <div class="form-group">
                                                          <label for="employeepercentage" class="control-label mb-1">Percentage/CGPA</label>
                                                          <input type="text" id="txtPercentage0" name="txtPercentage[]" class="form-control"
                                                                 placeholder="enter percentage" required>
                                                      </div>
                                                  </div>

                                              </div>
                                              <div class="col-sm-1">
                                                  <div class="form-group">
                                                      <button type="button" id="btnAdd" name="btnAdd" class="btn btn-primary btn-sm" style="border-radius: 50%;background-color: #fff"><i class="fa fa-plus fa-2x"></i></button>
                                                  </div>
                                              </div>
                                          </div>
                                        </fieldset>
                                        <br>
                                        <div class=" text-right" style="margin-right: 20%;">
                                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                            <button type="submit" class="btn btn-primary btn-sm" id="createNewEmployee">
                                                Create
                                            </button>
                                        </div>

                </form>
                <br>
                <hr>
                <form action="" class="reportBtn">
                    <button type="button" class="btn  btn-sm" onclick="employee_report(1)">Recent Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="employee_report(2)">All Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="employee_report(3)">Active Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="employee_report(4)">Inactive Entries</button>
                    <button type="button" class="btn btn-sm" onclick="employee_report(5)">Allow Attendance</button>
                    <button type="button" class="btn btn-sm" onclick="employee_report(6)">Not Allowed Attendance</button>
                    <button type="button" class="btn btn-sm" onclick="employee_report(7)">Details View</button>
                </form>
            </div>
        </div>
    </div>
<div class="row" id="toggle_new_employee" style="display: none;">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="fa fa-angle-double-right "></i> Report</h2>
                <div class="box-icon">
                    <!--                    <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>-->
                    <!--                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>-->
                    <!--                    <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>-->
                </div>
            </div>
            <div class="box-content">
                <div class="table-responsive">
                    <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-earning">
                        <thead style="font-size: 10px;">
                        <tr>
                            <th>Sl#</th>
                            <th>Form Slno</th>
                            <th>ICard Number</th>
                            <th>Designation</th>
                            <th>Employee Name</th>
                            <th>Gender</th>
                            <th>Date of birth</th>
                            <th>Marital Status</th>
                            <th>Joining Date</th>
                            <th>leaving Date</th>
                            <th>Father Name</th>
                            <th>Mother Name</th>
                            <th>Spouse Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Education</th>
                            <th>Epf Number</th>
                            <th>Esi Number</th>
                            <th>Aadhar Number</th>
                            <th>Pan Number</th>
                            <th>IsActive</th>
                            <th>IsAttendance</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_employeess">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>