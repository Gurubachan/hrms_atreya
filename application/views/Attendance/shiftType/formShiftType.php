<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="box col-md-10">
    <div class="box-inner">
        <div class="box-header well">
            <h2><i class="fa fa-angle-double-right "></i>Attendance Form</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form  class="" id="frmShifttype" name="frmShifttype" autocomplete="off">
                <div class="col-sm-6" style="display: block; margin-left: auto;margin-right: auto">
                    <div class="form-group">
                        <input type="hidden" id="txtid" name="txtid" value="0">
                        <label for="" class="control-label mb-1">Shift Type</label>
                        <input type="text" id="txtShifttype" name="txtShifttype" onclick="charachters_validate('txtShifttype')" minlength="3" maxlength="20" class="form-control" placeholder="Enter Shift Type" required>
                        <!--                                <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">-->
                        <!--                                <small class="errormsg_gendername"></small>-->
                    </div>
                    <br>
                    <div class="form-actions form-group text-right">
                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                        <button type="submit" class="btn btn-primary btn-sm" id="createGender">Create</button>
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
            <br>
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
            <div class="box-content" style="width: 100%;min-height:0px; max-height: 500px;overflow-y: scroll;">
                <div class="table-responsive">
                    <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-earning">
                        <thead>
                        <tr>
                            <th style="width: 5%;">Sl#</th>
                            <th>Shift type name</th>
                            <th style="width: 5%;">IsActive</th>
                            <th style="width: 5%;">Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_shifttype">
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


