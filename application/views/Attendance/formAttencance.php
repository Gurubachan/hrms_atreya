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
                <form  class="" id="departmentForm" autocomplete="off" >
                   <div class="row">
                       <div class="col-sm-2" >
                           <div class="form-group">
                               <input type="hidden" id="txtid" name="txtid" value="0">
                               <label for="departmentname" class="control-label mb-1">Employee Name</label>
                               <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                               <select name="employeename" id="employeename"></select>
                           </div>
                       </div>
                       <div class="col-sm-2" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Status<span class="red">*</span></label>
                               <select name="attendancetype" id="attendancetype"></select>
                           </div>
                       </div>
                       <div class="col-sm-2" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">In Time<span class="red">*</span></label>
                               <input type="text" id="intime" name="intime" class="form-control" aria-required="true" aria-invalid="false" onclick="dateValidate('intime')"  required placeholder="in time">
                               <small class="errormsg_intime"></small>

                           </div>
                       </div>
                       <div class="col-sm-1" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Set Time</label>
                               <button type="button" class="btn btn-sm" id="setInTimeButton" name="setInTimeButton" ><i class="fa fa-clock"></i></button>
                           </div>
                       </div>
                       <div class="col-sm-2" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Out Time<span class="red">*</span></label>
                               <input type="text" id="outtime" name="outtime" class="form-control" aria-required="true" aria-invalid="false" onclick="dateValidate('outtime')" required placeholder="out time">
                               <small class="errormsg_outtime"></small>
                           </div>
                       </div>
                       <div class="col-sm-1" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Set Time</label>
                               <button type="button" class="btn btn-sm " id="setOutTimeButton" name="setOutTimeButton"><i class="fa fa-clock"></i></button>
                           </div>
                       </div>
                       <div class="col-sm-2" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Total Hour<span class="red">*</span></label>
                               <input type="time" id="outtime" name="outtime" class="form-control" aria-required="true" aria-invalid="false" onclick="dateValidate('outtime')" disabled>
                               <small class="errormsg_outtime"></small>
                           </div>
                       </div>
                   </div>
                    <hr>
                       <br>
                       <div class=" form-group text-right mr-5">
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
</div>

