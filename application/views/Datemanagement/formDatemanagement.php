<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="col-sm-10">
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Create Date and Manage</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <br>
                    <form  class="" id="frmDateManagement" autocomplete="off"  style="min-height: 300px;">
                     <div class="row">
						 <div class="col-sm-6" style="display: block; margin-left: auto;margin-right: auto">
							 <div class="row">
								 <div class="col-sm-6">
									 <div class="form-group">
										 <input type="hidden" id="txtid" name="txtid" value="0">
										 <label for="" class="control-label">Manage Date<span class="red">*</span></label>
										 <input type="text" id="txtDate" name="txtDate" class="form-control">
										 <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
									 </div>
								 </div>
								 <div class="col-sm-6">
									 <div class="form-group">
<!--										 <input type="hidden" id="txtid" name="txtid" value="0">-->
										 <label for="" class="control-label">Date Assign<span class="red">*</span></label>
										 <select name="txtDateType" id="txtDateType"></select>
									 </div>
<!--									 <div class="form-group">-->

<!--									</div>-->
								 </div>
							 </div>
							 <br>
							 <div class=" form-group text-right">
								 <button type="reset" class="btn btn-danger btn-sm">Reset</button>
								 <button type="submit" class="btn btn-primary btn-sm" id="manageDate">Create</button>
							 </div>
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
<div class="modal fade" id="yearDetails">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-center" style="background-color: cornflowerblue;color: #fff;">
                <span class="modal-title ">Year Details</span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="loadYearDetailsView"></div>
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
<?php

?>

