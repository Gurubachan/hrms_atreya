<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="col-sm-10">
    <div class="row" id="jobpostingform">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Job Posting</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form  class="" id="newJobPostingForm"  name="newJobPostingForm" autocomplete="off">
                        <div class="row">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <input type="hidden" id="isactive" name="isactive" value="1">
                            <div class="col-sm-5 text-right"><label for="" class="control-label mb-1">For which post ? &nbsp;<span style="color:red;">*</span>&nbsp;:</label></div>
                            <div class="col-sm-3">
                                <input type="text" id="postname" name="postname" class="form-control text-uppercase" maxlength="20" placeholder="Enter post name"  required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <label for="" class="control-label mb-1">For which Company ?&nbsp;<span style="color:red;">*</span>&nbsp;:</label>
                            </div>
                            <div class="col-sm-3">
                                <select id="companyid" name="companyid" class="select" required>
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <label for="" class="control-label mb-1">For which designation ?&nbsp;<span style="color:red;">*</span>&nbsp;:</label>
                            </div>
                            <div class="col-sm-3">
                                <select id="designationid" name="designationid" class="select" required></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <label for="" class="control-label mb-1">Number of vacancy <span style="color:red;">*</span>&nbsp;:</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="vacancy" name="vacancy" class="form-control" maxlength="20" placeholder="Enter Vacancy" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <label for="" class="control-label mb-1">Whether to work ?&nbsp;<span style="color:red;">*</span>&nbsp;:</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" id="location" name="location" class="form-control" maxlength="20" placeholder="Job location" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <label for="" class="control-label mb-1">Job Description &nbsp;<span style="color:red;">*</span>&nbsp;:</label>
                            </div>
                            <div class="col-sm-3">
                                <textarea id="jobdescription" name="jobdescription"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Job Description"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <label for="" class="control-label mb-1">Experience required &nbsp;<span style="color:red;">*</span>&nbsp;:</label>
                            </div>
                            <div class="col-sm-3">
                                <select id="experience" name="experience"  class="select" required></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <label for="" class="control-label mb-1">Job Responsibility &nbsp;<span style="color:red;">*</span>&nbsp;:</label>
                            </div>
                            <div class="col-sm-3">
                                <textarea id="responsibility" name="responsibility"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Job Responsibility"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <label for="" class="control-label mb-1">Necessary qualifications &nbsp;<span style="color:red;">*</span>&nbsp;:</label>
                            </div>
                            <div class="col-sm-3">
                                <select id="educationid" name="educationid"  class="select" required></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <label for="" class="control-label mb-1">Required skill &nbsp;<span style="color:red;">*</span>&nbsp;:</label>
                            </div>
                            <div class="col-sm-3">
                                <select id="skillid" name="skillid"  class="select" required></select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <label for="" class="control-label mb-1">Application publish time &nbsp;<span style="color:red;">*</span>&nbsp;:</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="date" id="jobpoststartingdate" name="jobpoststartingdate"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Valid From">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-5 text-right">
                                <label for="" class="control-label mb-1">Application closing time &nbsp;<span style="color:red;">*</span>&nbsp;:</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="date" id="jobpostendingdate" name="jobpostendingdate"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Valid To">
                            </div>
                        </div>
                        <br>
                        <div class="row">
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <input type="hidden" id="txtid" name="txtid" value="0">-->
<!--                                    <input type="hidden" id="isactive" name="isactive" value="1">-->
<!--                                    <label for="" class="control-label mb-1">Post Name<span style="color:red;">*</span></label>-->
<!--                                    <input type="text" id="postname" name="postname" class="form-control text-uppercase" maxlength="20" placeholder="Enter post name"  required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="companytype" class="control-label mb-1">Company Type</label>-->
<!--                                    <select id="companytype" name="companytype" class="select" required>-->
<!--                                        <option value="">Select</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="" class="control-label mb-1">Company<span style="color:red;">*</span></label>-->
<!--                                    <select id="companyid" name="companyid" class="select" required>-->
<!--                                        <option value="">Select</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="" class="control-label mb-1">Designation<span style="color:red;">*</span></label>-->
<!--                                    <select id="designationid" name="designationid" class="select" required></select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="" class="control-label mb-1">Number of vacancy<span style="color:red;">*</span></label>-->
<!--                                    <input type="text" id="vacancy" name="vacancy" class="form-control" maxlength="20" placeholder="Enter Vacancy" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="" class="control-label mb-1">Location<span style="color:red;">*</span></label>-->
<!--                                    <input type="text" id="location" name="location" class="form-control" maxlength="20" placeholder="Job location" required>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="" class="control-label mb-1">Description<span style="color:red;">*</span></label>-->
<!--                                    <textarea id="jobdescription" name="jobdescription"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Job Description"></textarea>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="" class="control-label mb-1">Experience<span style="color:red;">*</span></label>-->
<!--                                    <textarea id="experience" name="experience"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Job Experience"></textarea>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="" class="control-label mb-1">Responsibility<span style="color:red;">*</span></label>-->
<!--                                    <textarea id="responsibility" name="responsibility"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Job Responsibility"></textarea>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="" class="control-label mb-1">Start<span style="color:red;">*</span></label>-->
<!--                                    <input type="date" id="jobpoststartingdate" name="jobpoststartingdate"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Valid From">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="" class="control-label mb-1">End<span style="color:red;">*</span></label>-->
<!--                                    <input type="date" id="jobpostendingdate" name="jobpostendingdate"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Valid To">-->
<!--                                </div>-->
<!--                            </div>-->

                        </div>
                        <div class="row">
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group" id="qualificationadd">-->
<!--                                    <label for="" class="control-label mb-1">Qualifications<span style="color:red;">*</span></label>-->
<!--                                    <select id="educationid" name="educationid"  class="select" required></select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-sm-3">-->
<!--                                <div class="form-group">-->
<!--                                    <label for="" class="control-label mb-1">Skill<span style="color:red;">*</span></label>-->
<!--                                    <select id="skillid" name="skillid"  class="select" required></select>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                        <br>
                        <div class=" text-right" style="margin-right: 20%;">
                            <button type="button" class="btn btn-success btn-sm">Preview</button>
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="createJobPosting">Create</button>
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
<div class="row" style="display: none" id="jobpostingreport">
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
                <div class="row">
                    <div class="col-sm-4">
                        Job Post Name
                    </div>
                    <div class="col-sm-8">
                        <span id="jpstname"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Company Id
                    </div>
                    <div class="col-sm-8">
                        <span id="cmpid"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Designation Id
                    </div>
                    <div class="col-sm-8">
                        <span id="desid"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Number of Vacancy
                    </div>
                    <div class="col-sm-8">
                        <span id="nov"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        Location
                    </div>
                    <div class="col-sm-8">
                        <span id="localtion"></span>
                    </div>
                </div><div class="row">
                    <div class="col-sm-4">
                        Job Description
                    </div>
                    <div class="col-sm-8">
                        <span id="jobdescriptiom"></span>
                    </div>
                </div>
            <div class="row">
                <div class="col-sm-4">
                    Experience
                </div>
                <div class="col-sm-8">
                    <span id="experiance"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    Responsibility
                </div>
                <div class="col-sm-8">
                    <span id="responsibility"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    Start Date
                </div>
                <div class="col-sm-8">
                    <span id="startdate"></span>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-4">
                End Date
            </div>
            <div class="col-sm-8">
                <span id="enddate"></span>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


