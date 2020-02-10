<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
    <div class="col-sm-10">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="fa fa-angle-double-right "></i> Create Visitors Record</h2>
                        <div class="box-icon">
                            <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <form  class="" id="frmVisitorsrecord" name="frmVisitorsrecord" autocomplete="off">
                            <div class="col-sm-6" style="display: block; margin-left: auto;margin-right: auto">
<!--                                <input type="hidden" id="txtid" name="txtid" value="0">-->
                                <input type="hidden" id="isPresent" name="isPresent" value="1">
                               <div class="row">
                                   <div class="col-sm-12">
                                       <div class="form-group">
                                           <label for="" class="control-label mb-1">Name:</label>
                                           <input type="text" id="txtName" name="txtName" class="form-control" style="display: none">
                                           <div id="txtSelect">
                                               <select id="cboName" name="cboName" class="js-example-templating" >
<!--                                                   <option value="1">shubham</option>-->
<!--                                                   <option value="2">Dibya</option>-->
                                               </select>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Address:</label>
                                    <textarea id="txtAddress" name="txtAddress" class="form-control" rows="2" style="border: none;border-bottom: 1px solid red" placeholder="Enter your address" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Contact:</label>
                                    <input type="text" id="txtContact" name="txtContact" class="form-control" maxlength="10" minlength="10" pattern="[6-9]{1}[0-9]{9}" onclick="number_validate('txtContact')" placeholder="Enter your contact number" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Email:</label>
                                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Enter your email" onclick="email_validate('txtEmail')">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Gender:</label><br>
                                    <select id="cboGender" name="cboGender"  required>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Company:</label>
                                    <select id="cboCompany" name="cboCompany" required>
<!--                                        <option></option>-->
<!--                                        <option value="1">atreya</option>-->
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Visit Date:</label>
                                            <input type="date" class="form-control" id="txtVisitdate" name="txtVisitdate" placeholder="Enter visit date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1">Visit Time:</label>
                                            <input type="text" class="form-control" id="txtVisittime" name="txtVisittime" pattern="[0-9:]{8}" placeholder="Enter visit time">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Purpose:</label>
                                    <select id="cboPurpose" name="cboPurpose" required>
<!--                                        <option></option>-->
<!--                                        <option value="1">to meet</option>-->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Contact Person:</label>
                                    <select id="cboContactperson" name="cboContactperson" required>
                                        <option></option>
<!--                                        <option value="1">Guru</option>-->
                                    </select>
                                </div>
                                <div class="form-actions form-group text-right">
                                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                    <button type="submit" class="btn btn-primary btn-sm" id="createRecord">Create</button>
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
                                        <th>Gender name</th>
                                        <th>Gender Shortname</th>
                                        <th>IsActive</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="load_gendername">
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




