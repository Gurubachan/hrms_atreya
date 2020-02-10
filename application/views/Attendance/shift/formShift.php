<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
//echo $cname;
?>
<div class="box col-md-10">
    <div class="box-inner">
        <div class="box-header well">
            <h2><i class="fa fa-angle-double-right "></i>Shift Form</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
            </div>
        </div>
        <div class="box-content" >
            <form  class="" id="frmShift" name="frmShift" autocomplete="off">
                <input type="hidden" id="txtid" name="txtid" value="0">
                <div class="col-sm-6" style="display: block; margin-left: auto;margin-right: auto">
<!--                    <div class="form-group">-->
<!--                        <label for="" class="control-label mb-1">Company Type</label>-->
<!--                        <select id="cboCompanyType" name="cboCompanyType" required>-->
<!--                        </select>-->
<!--                    </div>-->
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Company Name</label>
                        <select id="cboCompany" name="cboCompany" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Shift Type</label>
                        <select id="cboShift" name="cboShift" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="shiftname" class="control-label mb-1">Shift Name<span class="red">*</span></label>
                        <input type="text" id="txtShiftname" name="txtShiftname" class="form-control" aria-required="true" required placeholder="Enter Shift Name">
                    </div>
                    <div class="form-group">
                        <label for="shiftshortname" class="control-label mb-1">Shift Short Name<span class="red">*</span></label>
                        <input type="text" id="txtShiftshortname" name="txtShiftshortname" class="form-control" aria-required="true" required placeholder="Enter Shift short Name">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="intime" class="control-label mb-1">In Time<span class="red">*</span></label>
                                <input type="text" id="txtIntime" name="txtIntime" class="form-control" onclick="" pattern="[0-9:]{8}"  placeholder="Enter In time" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="outtime" class="control-label mb-1">Out Time<span class="red">*</span></label>
                                <input type="text" id="txtOuttime" name="txtOuttime" class="form-control" aria-required="true" onclick="" pattern="[0-9:]{8}" placeholder="Enter Out time">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="effectfrom" class="control-label mb-1">Effect From<span class="red">*</span></label>
                        <input type="date" id="txtEffectFrom" name="txtEffectFrom" class="form-control" aria-required="true" required placeholder="Effect From">
                    </div>
                    <div class="form-group">
                        <label for="isdatechange" class="control-label mb-1">Is Date Change<span class="red">*</span></label><br>
                        <input type="radio" id="" name="rdoIsdatechange" value="1">Yes &nbsp;&nbsp;
                        <input type="radio" id="" name="rdoIsdatechange" value="0">No
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
                            <th>Shift name</th>
                            <th style="max-width: 5%;">Shift Shortname</th>
                            <th style="max-width: 10%;">Company Id</th>
                            <th style="max-width: 5%;">Intime</th>
                            <th style="max-width: 5%;">Outtime</th>
                            <th style="max-width: 5%;">Effect From</th>
                            <th style="max-width: 5%;">IsActive</th>
                            <th style="width: 5%;">Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_shift">
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



