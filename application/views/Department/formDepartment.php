<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="fa fa-angle-double-right "></i>Create Department</h2>

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
                <form  class="" id="departmentForm" autocomplete="off" >
                    <div class="form-group">
                        <input type="hidden" id="txtid" name="txtid" value="0">
                        <label for="departmentname" class="control-label mb-1">Department Name</label>
                        <input type="text" id="departmentname" name="departmentname" onclick="charachters_validate('departmentname')" minlength="3" maxlength="20"  class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter department name" required>
                        <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                        <small class="errormsg_departmentname"></small>
                    </div>
                    <div class="form-group">
                        <label for="statename" class="control-label mb-1">Shortname<span class="red">*</span></label>
                        <input type="text" id="departmentShortname" name="departmentShortname" class="form-control" aria-required="true" aria-invalid="false" onclick="charachters_validate('departmentShortname')" minlength="2" maxlength="5" required placeholder="Enter shortname">
                        <small class="errormsg_departmentShortname"></small>
                    </div>
                    <br>
                    <div class=" form-group text-right" style="margin-right: 20%;">
                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                        <button type="submit" class="btn btn-primary btn-sm" id="createDepartment">Create</button>
                    </div>
                </form>
                <br>
                <hr>
                <form action="" class="reportBtn">
                    <button type="button" class="btn  btn-sm" onclick="reportFunction(1)">Recent Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="reportFunction(2)">All Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="reportFunction(3)">Active Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="reportFunction(4)">Inactive Entries</button>
                    <button type="button" class="btn  btn-sm" onclick="reportFunction(5)">Details View</button>
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
                    <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Department name</th>
                        <th>Department Shortname</th>
                        <th>IsActive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="load_department">
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

