<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
            <div class="box col-md-10">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="fa fa-angle-double-right "></i>Resource Type</h2>
                        <div class="box-icon">
                            <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <form  class="" id="resourceTypeForm" autocomplete="off">
                            <div class="col-sm-6" style="display: block; margin-left: auto;margin-right: auto">
                                <div class="form-group">
                                    <input type="hidden" id="txtid" name="txtid" value="0">
                                    <label for="" class="control-label mb-1">Type Name</label>
                                    <input type="text" id="resourcetype" name="resourcetype" onclick="charachters_validate('resourcetype')" minlength="2" maxlength="20" class="form-control" placeholder="Enter type name, Only charachters and space are allowed." required>
                                    <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                                    <small class="errormsg_resourcetype"></small>
                                </div>
                                <div class="form-group">
                                    <label for="statename" class="control-label mb-1">Shortname<span class="red">*</span></label>
                                    <input type="text" id="resourceTypeShortname" name="resourceTypeShortname" class="form-control" aria-required="true" aria-invalid="false" onclick="charachters_validate('resourceTypeShortname')" minlength="2" maxlength="5" required placeholder="Enter shortname">
                                    <small class="errormsg_resourceTypeShortname"></small>
                                </div>
                                <br>
                                <div class="form-actions form-group text-right">
                                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                    <button type="submit" class="btn btn-primary btn-sm" id="btnResourceType">Create</button>
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
                <br>
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
                                    <th>Type Name</th>
                                    <th>Short Name</th>
                                    <th>IsActive</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="load_resource_type">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
