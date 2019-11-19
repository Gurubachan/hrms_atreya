<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
    <div class="box col-md-10">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="fa fa-angle-double-right "></i>Resource Form</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form  class="" id="resourceform" autocomplete="off" >
                   <div class="row">
                       <div class="col-sm-3" >
                           <div class="form-group">
                               <input type="hidden" id="txtid" name="txtid" value="0">
                               <label for="departmentname" class="control-label mb-1">Resource Type:</label>
                               <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                               <select name="resourcetype" id="resourcetype"></select>
                           </div>
                       </div>
                       <div class="col-sm-3" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Company Name<span class="red">*</span></label>
                               <select name="resourcecompany" id="resourcecompany"></select>
                           </div>
                       </div>
                       <div class="col-sm-3" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Model Number<span class="red">*</span></label>
                               <input type="text" id="modelnumber" name="modelnumber" class="form-control" aria-required="true" aria-invalid="false" onclick="alfa_numeric('modelnumber')"  required placeholder="Enter Model Number">
                               <small class="errormsg_modelnumber"></small>
                           </div>
                       </div>
                       <div class="col-sm-3" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Serial Number<span class="red">*</span></label>
                               <input type="text" id="serialnumber" name="serialnumber" class="form-control" aria-required="true" aria-invalid="false" onclick="alfa_numeric('serialnumber')"  required placeholder="Enter Model Number">
                               <small class="errormsg_serialnumber"></small>
                           </div>
                       </div>
                       <div class="col-sm-3" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Purchasing date<span class="red">*</span></label>
                               <input type="text" id="purchasingdate" name="purchasingdate" class="form-control" aria-required="true" aria-invalid="false" onclick="dateValidate('purchasingdate')" required placeholder="Purchasing Date">
                               <small class="errormsg_purchasingdate"></small>
                           </div>
                       </div>
                       <div class="col-sm-3" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Service center Address<span class="red">*</span></label>
                               <textarea rows="1" id="servicecenteraddress" name="servicecenteraddress" class="form-control textarea" aria-required="true" aria-invalid="false" onclick="alfa_numeric('servicecenteraddress')"  required placeholder="Enter Service center address" ></textarea>
                               <small class="errormsg_servicecenteraddress"></small>
                           </div>
                       </div>
                       <div class="col-sm-3" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Service center Number<span class="red">*</span></label>
                               <input type="text" id="servicecenternumber" name="servicecenternumber" class="form-control" aria-required="true" aria-invalid="false" onclick="number_validate('servicecenternumber')" pattern="[6-9]{1}[0-9]{9}"  maxlength="10" minlength="10" required placeholder="Enter Service center mobile">
                               <small class="errormsg_servicecenternumber"></small>
                           </div>
                       </div>
                       <div class="col-sm-3" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Assurance Type<span class="red">*</span></label>
                               <select name="assurancetype" id="assurancetype"></select>
                           </div>
                       </div>
                       <div class="col-sm-3" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Assurance Period<span class="red">*</span></label>
                               <input type="text" id="assuranceperiod" name="assuranceperiod" class="form-control" aria-required="true" aria-invalid="false" onclick="number_validate('assuranceperiod')" required placeholder="Assurance Period i.e: 1,2,3 etc.">
                               <small class="errormsg_assuranceperiod"></small>
                           </div>
                       </div>
                       <div class="col-sm-3" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Type<span class="red">*</span></label>
                               <select name="assuranceperiodtype" id="assuranceperiodtype"></select>
                           </div>
                       </div>
                       <div class="col-sm-3" >
                           <div class="form-group">
                               <label for="statename" class="control-label mb-1">Expiring date<span class="red">*</span></label>
                               <input type="text" id="expiringdate" name="expiringdate" class="form-control expiringdate"  aria-required="true" aria-invalid="false" required placeholder="Assurance expiring Date ">
                               <small class="errormsg_expiringdate"></small>
                           </div>
                       </div>
                   </div>
                    <hr>
                       <br>
                       <div class=" form-group text-right mr-5 ">
                           <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                           <button type="submit" class="btn btn-primary btn-sm" id="createResource">Create</button>
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
                       <th>Resource Type</th>
                       <th>Company Name</th>
                       <th>Model Number</th>
                       <th>Serial Number</th>
                       <th>Purchasing Date</th>
                       <th>IsActive</th>
                       <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="load_resources">
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="resource">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: cornflowerblue;">
                <h3 class="modal-title text-white" style="">Resource Details</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div id="loadResourceDetails"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right btn-sm" data-dismiss="modal">Edit</button>
                <button type="button" class="btn btn-danger pull-right btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
