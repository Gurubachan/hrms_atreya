<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="col-sm-10">
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Create State</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form  class="" id="stateForm" autocomplete="off">
                        <br>
                        <div class="col-sm-6" style="display: block; margin-left: auto;margin-right: auto">
                            <div class="form-group">
                                <input type="hidden" id="txtid" name="txtid" value="0">
                                <label for="statename" class="control-label mb-1">State name<span class="red">*</span></label>
                                <input type="text" id="statename" name="statename" class="form-control" aria-required="true" aria-invalid="false" onclick="charachters_validate('statename')" minlength="3" maxlength="20" required placeholder="Enter state name">
                                <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                                <small class="errormsg_statename"></small>
                            </div>
                            <div class="form-group">
                                <label for="statename" class="control-label mb-1">State's short name<span class="red">*</span></label>
                                <input type="text" id="stateShortname" name="stateShortname" class="form-control" aria-required="true" aria-invalid="false" onclick="charachters_validate('stateShortname')" minlength="2" maxlength="5" required placeholder="Enter shortname">
                                <small class="errormsg_stateShortname"></small>
                            </div>
                        <br>
                        <div class="text-right form-group">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="createState">Create</button>
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
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="table-responsive">
                        <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-earning"  id="stateTable">
                        <thead>
                        <tr>
                            <th>Sl#</th>
                            <th>State name</th>
                            <th>State Shortname name</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_state">
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="stateDetials">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header red" style="background-color: cornflowerblue;">
                <h3 class="text-white" style="">State Details</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="loadStateDetails"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
<!--                <button type="button" class="btn btn-danger pull-right btn-sm" data-dismiss="modal">Edit</button>-->
                <button type="button" class="btn btn-danger pull-right btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>

