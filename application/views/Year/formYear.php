<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="col-sm-10">
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Create Year</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <br>

                    <form  class="" id="yearForm" autocomplete="off">
                        <div class="col-sm-6" style="display: block; margin-left: auto;margin-right: auto">
                        <div class="form-group wow flash">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="yearname" class="control-label mb-1">Add New Year<span class="red">*</span></label>
                            <input type="text" id="year" name="year" class="form-control" pattern="[1-2]{1}[0-9]{3}" aria-required="true" aria-invalid="false" maxlength="4" minlength="4" placeholder="Enter year. i.e 1987,2019 etc">
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                        </div>
                        <br>
                        <div class=" form-group text-right">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="createYear">Create</button>
                        </div>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <form action="" class="reportBtn">
                        <button type="button" class="btn  btn-sm " onclick="reportFunction(1)">Recent Entries</button>
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
                        <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-earning">
                        <thead>
                        <tr>
                            <th>Sl#</th>
                            <th>Department name</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_year">
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
<?php

?>

