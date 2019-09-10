<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="col-sm-10">
    <div class="row">
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
                    <form  class="" id="newEmployeeForm"  name="newEmployeeForm" autocomplete="off">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="hidden" id="txtid" name="txtid" value="0">
                                    <input type="hidden" id="isactive" name="isactive" value="1">
                                    <label for="employeetype" class="control-label mb-1">Post Name<span style="color:red;">*</span></label>
                                    <input type="text" id="postname" name="postname" class="form-control text-uppercase" maxlength="20" placeholder="Enter post name"  required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Company<span style="color:red;">*</span></label>
                                    <select id="companyid" name="companyid" class="select" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Designation<span style="color:red;">*</span></label>
                                    <select id="designationid" name="designationid" class="select" required></select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Number of vacancy<span style="color:red;">*</span></label>
                                    <input type="text" id="nov" name="nov" class="form-control" maxlength="20" placeholder="Enter Vacancy" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Location<span style="color:red;">*</span></label>
                                    <input type="text" id="location" name="location" class="form-control" maxlength="20" placeholder="Enter location" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Description<span style="color:red;">*</span></label>
                                    <textarea id="description" name="description"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Enter address"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Experience<span style="color:red;">*</span></label>
                                    <textarea id="description" name="description"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Enter address"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Responsibility<span style="color:red;">*</span></label>
                                    <textarea id="description" name="description"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Enter address"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Start<span style="color:red;">*</span></label>
                                    <input type="date" id="description" name="description"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Enter address">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">End<span style="color:red;">*</span></label>
                                    <input type="date" id="description" name="description"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Enter address">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class=" text-right" style="margin-right: 20%;">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="createNewEmployee">Create</button>

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
                            <th>Post name</th>
                            <th>Company</th>
                            <th>Designation</th>
                            <th>Vacancy</th>
                            <th>Description</th>
                            <th>Experience</th>
                            <th>Responsibility</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_status_names">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

