<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="col-sm-12">
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Create User Type</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form  class="" id="userTypeForm" name="userTypeForm" autocomplete="off">
                        <div class="col-sm-6" style="display: block; margin-left: auto;margin-right: auto">
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="" class="control-label mb-1">Name</label>
                            <input type="text" id="usertypename" name="usertypename" onclick="charachters_validate('usertypename')" minlength="3" maxlength="20" class="form-control" placeholder="Enter user type name" required>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <small class="errormsg_usertypename"></small>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label mb-1">Short Name</label>
                            <input type="text" id="usertypeshortname" name="usertypeshortname" onclick="charachters_validate('usertypeshortname')" minlength="2" maxlength="5" class="form-control" placeholder="Enter user type name" required>
                            <small class="errormsg_usertypeshortname"></small>
                        </div>
                        <br>
                        <div class="form-actions form-group text-right">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="createUserType">Create</button>
                        </div>
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
    <div class="row" id="usertypereport" style="display: none;">
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
                                <th>Name</th>
                                <th>Short Name</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="load_usertype">
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


