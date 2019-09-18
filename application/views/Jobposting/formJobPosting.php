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
                                <input type="text" id="postname" name="postname" class="form-control" maxlength="50" placeholder="Enter post name"  required>
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
                                <textarea id="jobdescription" name="jobdescription"  class="form-control textarea"  maxlength="120" required placeholder="Job Description"></textarea>
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
                                <textarea id="responsibility" name="responsibility"  class="form-control textarea" maxlength="120" required placeholder="Job Responsibility"></textarea>
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
                        <div class=" text-right" style="margin-right: 20%;">
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
                                <th>Post Name</th>
                                <th>Company Name</th>
                                <th>Designation</th>
                                <th>Vacancy</th>
                                <th>Working Place</th>
<!--                                <th>Job Description</th>-->
                                <th>Experience</th>
<!--                                <th>Responsibility</th>-->
                                <th>Qualifications</th>
                                <th>Skill</th>
                                <th>Publish Date</th>
                                <th>Closing Date</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="load_jobposting">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row" style="display: none; color:black;" id="jobpostingreport">
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
                <div class="row" style="padding: 20px 20px">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3 cornflowerblue"><i class="fa fa-long-arrow-alt-right"></i>&nbsp;Post Name :</div>
                            <div class="col-sm-9"><span id="jpstname"></span></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3 cornflowerblue"><i class="fa fa-long-arrow-alt-right"></i>&nbsp;Company :</div>
                            <div class="col-sm-9"><span id="cmpid"></span></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3 cornflowerblue"><i class="fa fa-long-arrow-alt-right"></i>&nbsp;Designation :</div>
                            <div class="col-sm-9"><span id="desid"></span></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3 cornflowerblue"><i class="fa fa-long-arrow-alt-right"></i>&nbsp;Number of Vacancy :</div>
                            <div class="col-sm-9"><span id="nov"></span></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3 cornflowerblue"><i class="fa fa-long-arrow-alt-right"></i>&nbsp;Location :</div>
                            <div class="col-sm-9"><span id="localtion"></span></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3 cornflowerblue"><i class="fa fa-long-arrow-alt-right"></i>&nbsp;Job Description :</div>
                            <div class="col-sm-9"><span id="jobdescriptiom"></span></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3 cornflowerblue"><i class="fa fa-long-arrow-alt-right"></i>&nbsp;Experience :</div>
                            <div class="col-sm-9"><span id="experiance"></span></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3 cornflowerblue"><i class="fa fa-long-arrow-alt-right"></i>&nbsp;Responsibility :</div>
                            <div class="col-sm-9"><span id="responsibilityreport"></span></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3 cornflowerblue"><i class="fa fa-long-arrow-alt-right"></i>&nbsp;Publish Date :</div>
                            <div class="col-sm-9"><span id="startdate"></span></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3 cornflowerblue"><i class="fa fa-long-arrow-alt-right"></i>&nbsp;Last Date :</div>
                            <div class="col-sm-9"><span id="enddate"></span></div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class=" text-right" style="margin-right: 20%;">
                    <button type="reset" class="btn btn-danger btn-sm">Edit</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="jobPostingForm">New</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


