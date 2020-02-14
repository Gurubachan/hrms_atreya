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
                 <div class="col-xs-12 ">
                     <nav>
                         <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                             <a class="nav-item nav-link tab-contents active" id="basictabbar" data-toggle="tab" href="#basictab" role="tab" aria-controls="nav-home" aria-selected="true" style="color: #00b5e9;font-weight: bold">Basic Information</a>
                             <a class="nav-item nav-link  tab-contents disabled" id="communicationtabbar" data-toggle="tab" href="#communicationtab" role="tab" aria-controls="nav-profile" aria-selected="false">Communication Details</a>
                             <a class="nav-item nav-link  tab-contents disabled" id="experiencetabbar" data-toggle="tab" href="#experiencetab" role="tab" aria-controls="nav-contact" aria-selected="false">Experience</a>
                             <a class="nav-item nav-link  tab-contents disabled" id="qualificationtabbar" data-toggle="tab" href="#qualificationtab" role="tab" aria-controls="nav-about" aria-selected="false">Qualification</a>
                             <a class="nav-item nav-link  tab-contents disabled" id="documentationtabbar" data-toggle="tab" href="#documentationtab" role="tab" aria-controls="nav-about" aria-selected="false">Documents Upload</a>
                             <a class="nav-item nav-link  tab-contents disabled" id="bankdetailstabbar" data-toggle="tab" href="#bankdetailstab" role="tab" aria-controls="nav-about" aria-selected="false">Bank Details</a>
                         </div>
                     </nav>
                     <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                         <div class="tab-pane  show active" id="basictab" role="tabpanel" aria-labelledby="basictab">
                                 <form class="" id="basic" name="basic" autocomplete="off">
                                     <fieldset class="the-fieldset">
                                         <legend class="the-legend">Description</legend>
                                         <br>
                                         <div class="row p-5" id="#empdesc">
                                             <div class="col-lg-3 col-md-3 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="slno" class="control-label mb-1">Application Number<span style="color:red;">*</span>.</label>
                                                     <input type="text" id="txtSlno" name="txtSlno" class="form-control" onclick="alfa_numeric('txtSlno')"  maxlength="20" minlength="2" placeholder="Enter serial number" title="Only numbers and characters are allowed">
                                                     <small class="errormsg_slno"></small>
                                                 </div>
                                             </div>
                                             <div class="col-sm-3">
                                                 <div class="form-group">
                                                     <label for="" class="control-label mb-1">Department<span style="color:red;">*</span></label>
                                                     <select id="cboDepartmentmappingid" name="cboDepartmentmappingid" class="select" title="Select a department.">
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col-sm-3">
                                                 <div class="form-group">
                                                     <label for="" class="control-label mb-1">Designation<span
                                                                 style="color:red;">*</span></label>
                                                     <select id="cboDesignationid" name="cboDesignationid" class="select" title="Select a designation.">
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col-sm-3">
                                                 <div class="form-group">
                                                     <label for="employeedoj" class="control-label mb-1">Date of Join<span
                                                                 style="color:red;">*</span></label>
                                                     <input type="text" id="txtDoj" name="txtDoj" class="form-control" placeholder="dd-mm-yyyy" title="Select joining date">
                                                 </div>
                                             </div>
                                         </div>
                                     </fieldset>
                                     <br>
                                     <fieldset class="the-fieldset">
                                         <legend class="the-legend">Basic Information</legend>
                                         <br>
                                         <div class="row p-5">
                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label for="employeefirstname" class="control-label mb-1">First Name<span
                                                                 style="color:red;">*</span></label>
                                                     <input type="text" id="txtFname" name="txtFname" class="form-control" onclick=" charachters_validate('txtFname')"
                                                            minlength="1" maxlength="50" placeholder="Enter first name" title="Only characters and space are allowed">
                                                 </div>
                                             </div>
                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label for="employeemiddlename" class="control-label mb-1">Middle
                                                         Name</label>
                                                     <input type="text" id="txtMname" name="txtMname" class="form-control"
                                                            onclick=" charachters_validate('txtMname')" maxlength="50" placeholder="Enter middle name" title="Only characters and space are allowed">
                                                 </div>
                                             </div>
                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label for="employeelastname" class="control-label mb-1">Last Name</label>
                                                     <input type="text" id="txtLname" name="txtLname" class="form-control" onclick=" charachters_validate('txtLname')" title="Only characters and space are allowed"
                                                            maxlength="50" placeholder="Enter last name" >
                                                 </div>
                                             </div>
                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label for="employeegender" class="control-label mb-1">Gender<span
                                                                 style="color:red;">*</span></label>
                                                     <select id="cboGenderid" name="cboGenderid" class="select" title="Select gender">
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label for="employeedob" class="control-label mb-1">Date of Birth<span
                                                                 style="color:red;">*</span></label>
                                                     <input type="text" id="txtDob" name="txtDob" class="form-control"
                                                            placeholder="dd-mm-yyyy" title="Select date of birth">
                                                 </div>
                                             </div>

                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label for="employeegender" class="control-label mb-1">Marital
                                                         Status<span style="color:red;">*</span></label>
                                                     <select id="cboMaritalstatusid" name="cboMaritalstatusid" class="select" title="Select marital status" required>
                                                     </select>
                                                 </div>
                                             </div>

                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label for="employeegender" class="control-label mb-1">Religion <span style="color:red;">*</span></label>
                                                     <select id="cboreligionid" name="cboreligionid" class="select" title="Select marital status" required>
                                                     </select>
                                                 </div>
                                             </div>

                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label for="employeefathername" class="control-label mb-1">Father Name <span style="color:red;">*</span></label>
                                                     <input type="text" id="txtFathername" name="txtFathername" class="form-control"
                                                            onclick=" charachters_validate('txtFathername')" maxlength="20" placeholder="Enter father name" title="Only characters and space are allowed" required>
                                                 </div>
                                             </div>
                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label for="employeemothername" class="control-label mb-1">Mother Name <span style="color:red;">*</span></label>
                                                     <input type="text" id="txtMothername" name="txtMothername" class="form-control" maxlength="20"
                                                            onclick=" charachters_validate('txtMothername')" placeholder="Enter mother name" title="Only characters and space are allowed" required>
                                                 </div>
                                             </div>
                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label for="employeespoucename" class="control-label mb-1">Spouse
                                                         Name</label>
                                                     <input type="text" id="txtSpousename" name="txtSpousename" class="form-control" maxlength="20"
                                                            onclick=" charachters_validate('txtSpousename')" placeholder="Enter spouse name" title="Only characters and space are allowed">
                                                 </div>
                                             </div>
                                         </div>
                                     </fieldset>
                                     <br>
                                     <div class=" text-right" style="margin-right: 20%;">
                                         <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                         <button type="submit" class="btn btn-primary btn-sm" id="createBasicDetails">
                                             Save and Next
                                         </button>
                                     </div>
                                 </form>
                             <br>
                             <hr>
                             <form action="" class="reportBtn">
                                 <button type="button" class="btn  btn-sm" onclick="employee_report(1,1)">Recent Entries</button>
                                 <button type="button" class="btn  btn-sm" onclick="employee_report(2,1)">All Entries</button>
                                 <button type="button" class="btn  btn-sm" onclick="employee_report(3,1)">Active Entries</button>
                                 <button type="button" class="btn  btn-sm" onclick="employee_report(4,1)">Inactive Entries</button>
                             </form>
                             <br>
                             <div class="row">
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
                                         <div class="box-content" style="width: 100%;min-height:0px; max-height: 500px;overflow-y: scroll;">
                                             <div class="table-responsive">
                                                 <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-earning">
                                                     <thead>
                                                     <tr>
                                                         <th>Sl#</th>
                                                         <th>Application No.</th>
                                                         <th>Name</th>
                                                         <th>Gender</th>
                                                         <th>Date of birth</th>
                                                         <th>Joining Date</th>
                                                         <th>Company</th>
                                                         <th>Department</th>
                                                         <th>Designation</th>
                                                         <th>Action</th>
                                                     </tr>
                                                     </thead>
                                                     <tbody id="load_emp_basic_details">
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane" id="communicationtab" role="tabpanel" aria-labelledby="communicationtab">
                             <form class="" id="communication" name="communication" autocomplete="off">
                                 <fieldset class="the-fieldset">
                                     <legend class="the-legend">Communication Details</legend>
                                     <h5><b>Permanent Address:</b></h5>
                                     <div class="row p-5">
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="employeepermenentVillage/Street/PlotNo." class="control-lapg_toastbel mb-1">Village/Street/PlotNo.<span
                                                             style="color:red;">*</span></label>
                                                 <textarea id="txtPermanentAddress" name="txtPermanentAddress" class="form-control textarea" minlength="3" maxlength="60"
                                                          onclick="alfa_numeric('txtPermanentAddress')" placeholder="Enter Village/Street/PlotNo" title="Put address like at-/po-/ps- and only back slash(/),highfen(-)and dot(.) are allowed." required></textarea>
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="permenentstateid" class="control-label mb-1"><span
                                                             style="color:red;">*</span>State</label>
                                                 <select id="cboPermanentStateid" name="cboPermanentStateid" class="select" title="Select State" required>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="permenentdistid" class="control-label mb-1">District<span
                                                             style="color:red;">*</span></label>
                                                 <select id="cboPermanentDistid" name="cboPermanentDistid" class="select" title="Select district only after select state" required>
                                                     <option value="">Select</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="permenentpincode" class="control-label mb-1">Pincode<span
                                                             style="color:red;">*</span></label>
                                                 <input type="text" class="form-control" id="txtPermanentPincode" name="txtPermanentPincode"
                                                        minlength="6" maxlength="6" pattern="[0-9]{6}" placeholder="enter pincode" title="Only numbers are allowed where length is 6" required onclick="number_validate('txtPermanentPincode')">
                                             </div>
                                         </div>
                                     </div>
                                     <h5><b><input type="checkbox" id="chkAddress" name="chkAddress">&nbsp;&nbsp;Present Address <small  style="color: red;">(Same as permanent address)</small></b></h5>
                                     <div class="row p-5">
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="employeeVillage/Street/PlotNo." class="control-label mb-1">Village/Street/PlotNo.<span
                                                             style="color:red;">*</span></label>
                                                 <textarea id="txtPresentAddress" name="txtPresentAddress" class="form-control textarea"
                                                           minlength="3" maxlength="60" onclick="alfa_numeric('txtPresentAddress')"
                                                           placeholder="Enter Village/Street/PlotNo." title="Put address like at-/po-/ps- and only back slash(/),highfen(-)and dot(.) are allowed."></textarea>
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="stateid" class="control-label mb-1"><span
                                                             style="color:red;">*</span>State</label>
                                                 <select id="cboPresentStateid" name="cboPresentStateid" class="select" title="Select State">
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="distid" class="control-label mb-1">District<span
                                                             style="color:red;">*</span></label>
                                                 <select id="cboPresentDistid" name="cboPresentDistid" class="select" title="Select district only after select state">
                                                     <option value="">Select</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="pincode" class="control-label mb-1">Pincode<span
                                                             style="color:red;">*</span></label>
                                                 <input type="text" class="form-control" id="txtPresentPincode" name="txtPresentPincode"
                                                      onclick="number_validate('txtPresentPincode')"  minlength="6" maxlength="6" pattern="[0-9]{6}" placeholder="enter pincode" title="Only numbers are allowed where length is 6">
                                             </div>
                                         </div>
                                     </div><br>
                                     <h5><b>Contact Details:</b></h5>
                                     <div class="row p-5">
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="employeeemail" class="control-label mb-1">Email</label>
                                                 <input type="email" id="txtEmailid" name="txtEmailid" class="form-control" onclick="email_validate('txtEmailid')" placeholder="Enter email id." required>
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="employeemobile" class="control-label mb-1">Mobile<span style="color:red;">*</span></label>
                                                 <input type="text" id="txtMobile" name="txtMobile" class="form-control" onclick="number_validate('txtMobile')" minlength="10" maxlength="10" placeholder="Enter mobile number" pattern="[6-9]{1}[0-9]{9}" required>
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="employeealternatemobile" class="control-label mb-1">Alternate Mobile</label>
                                                 <input type="text" id="txtAltermobile" name="txtAltermobile" class="form-control" minlength="10" maxlength="10" placeholder="Enter alter mobile number" onclick="number_validate('txtAltermobile')"
                                                        pattern="[6-9]{1}[0-9]{9}">
                                             </div>
                                         </div>
                                     </div>
                                 </fieldset>
                                 <br>
                                 <div class=" text-right" style="margin-right: 20%;">
                                     <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                     <button type="submit" class="btn btn-primary btn-sm" id="createCommunicationDetails">
                                         Save and Next
                                     </button>
                                 </div>
                             </form>
                             <br>
                             <hr>
                             <br>
                             <div class="row">
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
                                                         <th>Permanent Address</th>
                                                         <th>Present Address</th>
                                                         <th>phone no.</th>
                                                         <th>Alternate no.</th>
                                                         <th>Email Id</th>
                                                     </tr>
                                                     </thead>
                                                     <tbody id="load_emp_communication_details" style="width: 100%;min-height:0px; max-height: 500px;overflow-y: scroll;">
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane" id="experiencetab" role="tabpanel" aria-labelledby="experiencetab">
                             <form class="" id="experience" name="experience" autocomplete="off" >
                                 <fieldset class="the-fieldset">
                                     <legend class="the-legend">Experience</legend>
                                     <br>
                                     <div class="row p-5" id="addExperience">
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="" class="control-label mb-1">Company Name<span style="color:red;">*</span></label>
                                                 <input type="text" id="cboCompanyname0" name="cboCompanyname[]" class="form-control" onclick="only_characters_numbers_dot_highfen_slash('cboCompanyname0')" placeholder="enter previous company name" title="Only characters and numbers are allowed" required>
                                             </div>
                                         </div>
                                         <div class="col-sm-2">
                                             <div class="form-group">
                                                 <label for="" class="control-label mb-1">Designation<span style="color:red;">*</span></label>
                                                 <select id="cboJobdesignation0" name="cboJobdesignation[]" class="select" title="Select a designation" required>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="col-sm-3">
                                             <div class="form-group">
                                                 <label for="employeejobrole" class="control-label mb-1">Role<span style="color:red;">*</span></label>
                                                 <input type="text" id="txtJobrole0" name="txtJobrole[]" class="form-control" onclick=" only_characters_numbers_dot_highfen_slash('txtJobrole0')" placeholder="enter job role" title="Only characters and numbers allowed" required>
                                             </div>
                                         </div>
                                         <div class="col-sm-2">
                                             <div class="form-group">
                                                 <label for="employeeeducation" class="control-label mb-1">From Date<span style="color:red;">*</span></label>
                                                 <input type="text" id="txtFromdate0" name="txtFromdate[]" class="form-control" placeholder="dd-mm-yyyy" title="Select joining date" required>
                                             </div>
                                         </div>
                                         <div class="col-sm-2">
                                             <div class="form-group">
                                                 <label for="employeeeducation" class="control-label mb-1">To Date</label>
                                                 <input type="text" id="txtTodate0" name="txtTodate[]" class="form-control" placeholder="dd-mm-yyyy" title="Select leaving date">
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-sm-2">
                                         <div class="form-group">
                                             <button type="button" id="btnAddExperience" name="btnAddExperience" class="btn btn-primary btn-sm" style="border-radius: 50%;background-color: #fff"><i class="fa fa-plus fa-2x"></i></button>
                                         </div>
                                     </div>
                                 </fieldset>
                                 <br>
                                 <div class=" text-right" style="margin-right: 20%;">
                                     <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                     <button type="submit" class="btn btn-primary btn-sm" id="createExperienceDetails">
                                         Save and Next
                                     </button>
                                 </div>
                             </form>

                             <br>
                             <hr>
                             <br>
                             <div class="row">
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
                                                         <th>Companty</th>
                                                         <th>Designation</th>
                                                         <th>Job Role</th>
                                                         <th>From date</th>
                                                         <th>To date</th>
                                                     </tr>
                                                     </thead>
                                                     <tbody id="load_emp_experience_details" style="width: 100%;min-height:0px; max-height: 500px;overflow-y: scroll;">
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane" id="qualificationtab" role="tabpanel" aria-labelledby="qualificationtab">
                             <form class="" id="qualification" name="qualification" autocomplete="off" enctype="multipart/form-data">
                                 <fieldset class="the-fieldset">
                                     <legend class="the-legend">Qualification</legend>
                                     <br>
                                     <div class="col-sm-12" >
                                         <div class="row p-5" id="addrow">
                                             <div class="col-lg-2 col-md-2 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="employeeeducation"
                                                            class="control-label mb-1">Education<span style="color:red;">*</span></label>
                                                     <select id="cboEducationid0" name="cboEducationid[]" class="select" title="Select education" required>
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col-lg-2 col-md-2 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="employeeeducationstream"
                                                            class="control-label">Stream<span style="color:red;">*</span></label>
                                                     <input type="text" id="txtEducationstream0" name="txtEducationstream[]" class="form-control"
                                                            onclick="charachters_validate('txtEducationstream0')" placeholder="Enter education stream" title="only charachters are allowed" required>
                                                 </div>
                                             </div>
                                             <div class="col-lg-2 col-md-2 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="employeeboard" class="control-label mb-1">Board</label>
                                                     <input type="text" id="txtBoard0" name="txtBoard[]" class="form-control"
                                                            onclick=" charachters_validate('txtBoard0')" placeholder="enter Board" title="only characters are allowed" required>
                                                 </div>
                                             </div>
                                             <div class="col-lg-2 col-md-2 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="employeeregdno" class="control-label mb-1">Regd.No</label>
                                                     <input type="text" id="txtRegdno0" name="txtRegdno[]" class="form-control"
                                                            onclick=" alfa_numeric('txtRegdno0')" placeholder="enter Regd.No" title="only characters and numbers are allowed" required>
                                                 </div>
                                             </div>
                                             <div class="col-lg-2 col-md-2 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="employeepercentage" class="control-label mb-1">Percentage/CGPA</label>
                                                     <input type="text" id="txtPercentage0" name="txtPercentage[]" class="form-control"
                                                            placeholder="enter percentage" onclick="float_validate('txtPercentage0')" title="only numbers are allowed" required>
                                                 </div>
                                             </div>
                                             <div class="col-lg-2 col-md-2 col-sm-12">
                                                 <div class="form-group">
                                                     <label for="employeeeducationstream"
                                                            class="control-label mb-1">Upload Doc's<span style="color:red;">*</span></label>
                                                     <input type="file" id="fileCertificate0" name="fileCertificate0" class="form-control" placeholder="Enter education stream" title="only pdf format allowed and  max size 1mb" required>
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
                                     <button type="submit" class="btn btn-primary btn-sm" id="createQualificationDetails">
                                         Save and Next
                                     </button>
                                 </div>
                             </form>

                             <br>
                             <hr>
                             <br>
                             <div class="row">
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
                                                         <th>Qualificaton</th>
                                                         <th>Stream</th>
                                                         <th>Board</th>
                                                         <th>Resigtration no.</th>
                                                         <th>Percentage</th>
                                                         <th>Document Upload</th>
                                                     </tr>
                                                     </thead>
                                                     <tbody id="load_emp_qualification_details" style="width: 100%;min-height:0px; max-height: 500px;overflow-y: scroll;">
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane" id="documentationtab" role="tabpanel" aria-labelledby="documentationtab">
                             <form class="" id="upload_document_details" name="upload_document_details" enctype="multipart/form-data" autocomplete="off">
                                 <fieldset class="the-fieldset">
                                     <legend class="the-legend">Identification Documents</legend>
                                     <br>
                                     <div class="col-sm-12">
                                        <div class="row p-5" id="addMoreDocuments">
                                                <div class="offset-1 col-sm-3">
                                                    <div class="form-group">
                                                        <label for="emploayee_identification_details" class="control-label mb-1">Document Type</label>
                                                        <select id="cboDocumentTypes0" name="cboDocumentType[]" class="select" title="select document type" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="cirtificate_number" class="control-label mb-1">Document Number</label>
                                                        <input type="text" id="txtDocIdentificationNumber0" name="txtDocIdentificationNumber[]" class="form-control"
                                                               onclick=" alfa_numeric('txtDocNumber0')"   placeholder="Enter Number"  title="only numbers are allowed" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="employeeeBeneficiaryName"
                                                               class="control-label mb-1">Upload Documents<span style="color:red;">*</span></label>
                                                        <input type="file" id="fileUploadIdentification0" name="fileUploadIdentification0" class="form-control" required
                                                               placeholder="Enter Benificiary name"  title="only pdf format is allowed">
                                                    </div>
                                                </div>
                                        </div>
                                         <div class="col-sm-1">
                                             <div class="form-group">
                                                 <button type="button" id="btnADocdd" name="btnADocdd" class="btn btn-primary btn-sm" style="border-radius: 50%;background-color: #fff"><i class="fa fa-plus fa-2x"></i></button>
                                             </div>
                                         </div>
                                     </div>
                                 </fieldset>
                                 <br>
                                 <div class=" text-right" style="margin-right: 20%;">
                                     <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                     <button type="submit" class="btn btn-primary btn-sm" id="createDocumentDetails">Save and Next</button>
                                 </div>
                             </form>

                             <br>
                             <hr>
                             <br>
                             <div class="row">
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
                                                         <th>Document Name</th>
                                                         <th>Number</th>
                                                         <th>Upload</th>
                                                     </tr>
                                                     </thead>
                                                     <tbody id="load_emp_identification_details" style="width: 100%;min-height:0px; max-height: 500px;overflow-y: scroll;">
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane" id="bankdetailstab" role="tabpanel" aria-labelledby="bankdetailstab">
                             <form class="" id="upload_bank_details" name="upload_bank_details" enctype="multipart/form-data" autocomplete="off">
                                 <fieldset class="the-fieldset">
                                     <legend class="the-legend">Bank A/C Information</legend>
                                     <br>
                                     <div class="col-sm-12">
                                         <div class="row p-5" id="">
                                             <div class="col-sm-2">
                                                 <div class="form-group">
                                                     <label for="emploayee_bank_details"
                                                            class="control-label mb-1">Bank</label>
                                                     <select id="cboUploadBankid" name="cboUploadBankid" class="select" title="Select a bank" required>
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col-sm-3">
                                                 <div class="form-group">
                                                     <label for="employeee_ac_number"
                                                            class="control-label mb-1">A/c Number</label>
                                                     <input type="text" id="txtAcNumber" name="txtAcNumber" class="form-control" title="Only numbers are allowed."
                                                            onclick=" number_validate('txtAcNumber')" placeholder="Enter Bank Account Number"  required>
                                                 </div>
                                             </div>
                                             <div class="col-sm-3">
                                                 <div class="form-group">
                                                     <label for="cirtificate_number" class="control-label mb-1">IFSC Code</label>
                                                     <input type="text" id="txtIFSCCode" name="txtIFSCCode" class="form-control"
                                                            onclick=" alfa_numeric('txtIFSCCode')"  maxlength="11" minlength="11"  placeholder="Enter IFSC Code" title="Only Capital letter and numbers are allowed" required>
                                                 </div>
                                             </div>

                                             <br>
                                             <div class="col-sm-3">
                                                 <div class="form-group">
                                                     <label for="employeeeBeneficiaryName" class="control-label mb-1">Upload Documents<span style="color:red;">*</span></label>
                                                     <input type="file" id="fileUploadBank" name="fileUploadBank" class="form-control"  onchange="showMyImage(this)" placeholder="Enter Benificiary name" title="file size should be less than 2mb"  required>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </fieldset>
                                 <br>
                                 <br>
                                 <div class=" text-right" style="margin-right: 20%;">
                                     <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                     <button type="submit" class="btn btn-primary btn-sm" id="creatBankDetails">
                                         Submit
                                     </button>
                                 </div>
                             </form>

                             <br>
                             <hr>
                             <br>
                             <div class="row">
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
                                                         <th>Bank Name</th>
                                                         <th>Account Number</th>
                                                         <th>IFSC Code</th>
                                                         <th>Upload Doc</th>
                                                     </tr>
                                                     </thead>
                                                     <tbody id="load_emp_bank_details" style="width: 100%;min-height:0px; max-height: 500px;overflow-y: scroll;">
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
             </div>
         </div>
     </div>
