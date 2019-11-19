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
                    <h4 class="tagcolor text-center"><span class="tagcolor" id="basic" style="color: #00aced;">Basic Details -></span><span class="tagcolor" id="address" style="color: grey;"> Address Details-></span><span class="tagcolor" id="qualification" style="color: grey;"> Qualification Details-></span> <span class="tagcolor" id="workexperience" style="color: grey;">Work Experience</span></h4>
                    <form  class="" id="applicantBasicDetailsForm"  name="applicantBasicDetailsForm" autocomplete="off">
                        <br>
                        <div class="form-group">
                            <fieldset class="the-fieldset">
                                <legend class="the-legend"><b>Basic Details</b></legend>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="hidden" id="txtid" name="txtid" value="0">
                                        <input type="hidden" id="isactive" name="isactive" value="1">
                                        <div class="form-group">
                                            <label for="employeefirstname" class="control-label mb-1">First Name<span style="color:red;">*</span></label>
                                            <input  type="text" id="fname" name="fname" class="form-control" onclick="charachters_validate('fname')"  minlength="1" maxlength="50" placeholder="Enter first name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeemiddlename" class="control-label mb-1">Middle Name</label>
                                            <input type="text" id="mname" name="mname"  class="form-control" onclick="charachters_validate('mname')" maxlength="50" placeholder="Enter middle name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeelastname" class="control-label mb-1">Last Name <span class="red">*</span> </label>
                                            <input type="text" id="lname" name="lname" class="form-control" onclick="charachters_validate('lname')"  maxlength="50" placeholder="Enter last name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeedob" class="control-label mb-1">Date of Birth<span style="color:red;">*</span></label>
                                            <input id="dob" name="dob" type="date" class="form-control" placeholder="dd-mm-yyyy" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeefathername" class="control-label mb-1">Father Name</label>
                                            <input type="text"  id="fathername" name="fathername" onclick="charachters_validate('fathername')" class="form-control" maxlength="20" placeholder="Enter father name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeemothername" class="control-label mb-1">Mother Name</label>
                                            <input type="text"  id="mothername" name="mothername" onclick="charachters_validate('mothername')" class="form-control" placeholder="Enter mother name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeespoucename" class="control-label mb-1">Spouse Name</label>
                                            <input type="text"  id="spousename" name="spousename" onclick="charachters_validate('spousename')" class="form-control" placeholder="Enter spouse name">
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
                                <legend class="the-legend"><b>Contact Details</b></legend>
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeemobile" class="control-label mb-1">Mobile Number<span style="color:red;">*</span> &nbsp;&nbsp;&nbsp;<span class="red">Whatsapp No.?</span>
                                                <input type="checkbox" id="sameaswhatsappnumber"> </label>
                                            <input  type="text" id="mobile" name="mobile"  class="form-control"  onclick="number_validate('mobile')" minlength="10" maxlength="10" placeholder="Enter mobile number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeemobile" class="control-label mb-1">Alternative Mobile</label>
                                            <input type="text" id="altmobile" name="altmobile"  class="form-control" onclick="number_validate('altmobile')"  minlength="10" maxlength="10" placeholder="Enter alternate mobile number">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeeemail" class="control-label mb-1">Whatsapp Number<span style="color:red;">*</span></label>
                                            <input  type="text"  id="whatsappnumber" name="whatsappnumber" class="form-control" onclick="number_validate('whatsappnumber')"  minlength="10" maxlength="10" placeholder="Enter whatsapp number." required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeeemail" class="control-label mb-1">Email<span style="color:red;">*</span></label>
                                            <input type="email" id="emailid" name="emailid"  class="form-control" placeholder="Enter email id." required>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <br>
                        <div class=" text-right" style="margin-right: 20%;">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="applicantBasicDetails">Save & Next</button>
                        </div>
                    </form>
                    <br>
                    <form  class="" id="applicantAddressDetailsForm"  name="applicantAddressDetailsForm" autocomplete="off" style="display: none;">
                        <div class="form-group">
                            <fieldset class="the-fieldset">
                                <legend class="the-legend"><b>Address Details</b></legend>
                                <div class="row">
                                    <div class="col-sm-3">
<!--                                        <input type="hidden" id="txtid" name="txtid" value="">-->
                                        <input type="hidden" id="isactive" name="isactive" value="1">
                                        <div class="form-group">
                                            <label for="employeeaddress" class="control-label mb-1">At/Street/Plot.No.<span style="color:red;">*</span></label>
                                            <input type="text" id="applicantAt" name="applicantAt"  class="form-control" placeholder="Enter village/street/plot number.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeeaddress" class="control-label mb-1">Po<span style="color:red;">*</span></label>
                                            <input type="text" id="applicantPo" name="applicantPo" onclick="charachters_validate('applicantPo')"  class="form-control" placeholder="Enter postal address.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeeaddress" class="control-label mb-1">Ps<span style="color:red;">*</span></label>
                                            <input type="text" id="applicantPs" name="applicantPs" onclick="charachters_validate('applicantPs')"  class="form-control" placeholder="Enter police station.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeeaddress" class="control-label mb-1">Land mark<span style="color:red;">*</span></label>
                                            <input type="text" id="applicantLandmark" name="applicantLandmark" onclick="charachters_validate('applicantLandmark')"  class="form-control" placeholder="Enter land mark.">
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
                                            <label for="district" class="control-label mb-1">District<span style="color:red;">*</span></label>
                                            <select id="distid" name="distid" class="select" required>
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="distid" class="control-label mb-1">Pin Code<span style="color:red;">*</span></label>
                                            <input type="text" id="applicantPincode" name="applicantPincode" onclick="number_validate('applicantPincode')" maxlength="6" minlength="6"  class="form-control" placeholder="Enter six digit pincode.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="communicationtype" class="control-label mb-1">Communicaton Type<span style="color:red;">*</span></label>
                                            <select id="communicationtypeid" name="communicationtypeid" class="select" required>
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <br>
                        <div class=" text-right" style="margin-right: 20%;">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
<!--                            <button type="button" class="btn btn-success btn-sm" id="basicDetails">Previous</button>-->
                            <button type="submit" class="btn btn-primary btn-sm" id="applicantCommunication">Save</button>
                        </div>
                    </form>

                    <form  class="" id="applicantEducationalDetailsForm"  name="applicantEducationalDetailsForm" autocomplete="off" style="display: none;">
                        <div class="form-group">
                            <fieldset class="the-fieldset">
<!--                                <input type="hidden" id="txtid" name="txtid" value="">-->
                                <input type="hidden" id="isactive" name="isactive" value="1">
                                <legend class="the-legend"><b>Educational Details</b></legend>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Institute/Organization<span style="color:red;">*</span></label>
                                            <input type="text" id="applicantInstitue" name="applicantInstitue" onclick="charachters_validate('applicantInstitue')"  class="form-control"  minlength="0" maxlength="60" placeholder="Enter institue name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Board<span style="color:red;">*</span></label>
                                            <input type="text" id="applicantBoard" name="applicantBoard" onclick="charachters_validate('applicantBoard')"  class="form-control"  minlength="0" maxlength="30" placeholder="Enter board name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Exam<span style="color:red;">*</span></label>
                                            <input type="text" id="applicantExam" name="applicantExam"  class="form-control" onclick="alfa_numeric('applicantExam')"  minlength="0" maxlength="20" placeholder="Enter exam name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Passing Year<span style="color:red;">*</span></label>
                                            <input type="text" id="applicantPassingYear" name="applicantPassingYear" onclick="number_validate('applicantPassingYear')" class="form-control"  minlength="4" maxlength="4" placeholder="Enter passing year" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Total Mark<span style="color:red;">*</span></label>
                                            <input type="text" id="applicantTotalMark" name="applicantTotalMark" onclick="number_validate('applicantTotalMark')"  class="form-control"  minlength="0" maxlength="4" placeholder="Enter total mark" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Secured Mark<span style="color:red;">*</span></label>
                                            <input type="text" id="applicantSecuredMark" name="applicantSecuredMark" onclick="number_validate('applicantSecuredMark')"  class="form-control"  minlength="0" maxlength="4" placeholder="Enter secured mark" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <br>
                        <div class=" text-right" style="margin-right: 20%;">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
<!--                            <button type="button" class="btn btn-success btn-sm">Previous</button>-->
                            <button type="submit" class="btn btn-primary btn-sm" id="applicantEducation">Save</button>
                        </div>
                    </form>
                    <form  class="" id="applicantWorkingDetailsForm"  name="applicantWorkingDetailsForm" autocomplete="off" style="display: none;">
                        <div class="form-group">
<!--                            <input type="hidden" id="txtid" name="txtid" value="">-->
                            <input type="hidden" id="isactive" name="isactive" value="1">
                            <fieldset class="the-fieldset">
                                <legend class="the-legend"><b>Working Details</b></legend>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Experience Type<span style="color:red;">*</span></label>
                                            <select id="experiencetypeid" name="experiencetypeid" class="select" required>
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Company Name</label>
                                            <input type="text" id="companyname" name="companyname" onclick="charachters_validate('companyname')"  class="form-control" placeholder="Enter provider name.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Role</label>
                                            <input type="text" id="role" name="role"  class="form-control" onclick="charachters_validate('role')" maxlength="20" placeholder="Enter Role at there.">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Date of Joining<span style="color:red;">*</span></label>
                                            <input type="date" id="doj" name="doj" minlength="10" maxlength="10" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="employeedoj" class="control-label mb-1">Date of Leaving</label>
                                            <input type="date" id="dol" name="dol" minlength="10" maxlength="10" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Remark</label>
                                            <input type="text" id="remark" name="remark" onclick="charachters_validate('remark')"  class="form-control" maxlength="255" placeholder="Enter remarks">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <br>
                        <div class=" text-right" style="margin-right: 20%;">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
<!--                            <button type="button" class="btn btn-success btn-sm">Previous</button>-->
                            <button type="submit" class="btn btn-primary btn-sm" id="applicantWorkExperience">Save</button>
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
                                <th>Name</th>
<!--                                <th>Father name</th>-->
                                <th>Dob</th>
                                <th>Gender</th>
                                <th>Mobile</th>
                                <th>Whatsapp</th>
                                <th>Email</th>
                                <th>IsActive</th>
<!--                                <th>Details View</th>-->
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
<!--    <div id="loadRecordDetails"></div>-->
<!--    <a href="" target="_blank" id="loadRecordDetails"></a>-->
<!--    <a id="loadRecordDetails" href=""></a>-->
</div>
</div>
</div>
<div class="modal fade" id="recruitment">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: cornflowerblue;">
                <h3 class="modal-title text-white" style="">Application Details</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                   <div id="loadRecordDetails"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right btn-sm" data-dismiss="modal">Edit</button>
                <button type="button" class="btn btn-danger pull-right btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


