<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="col-sm-10">
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Generate Offer Latter</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <br>
                    <form id="frmOfferLetter">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="" style="color:">Brand:</label>
                                    <div class="card text-center" id=Brand style="height:100px;width:100px;"></div>
                                    <input type="file" class="filBrand" name="filBrand">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Logo:</label>
                                    <div class="card text-center" id=Logo style="height:100px;width:100px;"></div>
                                    <input type="file" class="filLogo" name="filLogo">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Letter No:</label>
                                    <input type="text" class="form-control" id="txtLetterNo" name="txtLetterNo" placeholder="Type Letter No:">
                                </div>
                                    <div class="col-sm-6">
                                        <label for="">Date:</label>
                                        <input type="text" class="form-control" id="dtDate" name="dtDate">
                                    </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class=col-sm-6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="">Candidate First Name:</label>
                                            <input type="text" class="form-control" id="txtFirstName" name="txtFirstName" placeholder=" Type first Name:">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">Candidate Last Name:</label>
                                            <input type="text" class="form-control" id="txtLastName" name="txtLastName" placeholder=" Type Last Name:">
                                        </div>
                                    </div>
                                </div>
                                <div class=col-sm-6>
                                    <label for="">Probation Period:</label>
                                    <input type="text" class="form-control" name="txtProbationperiod" id="txtProbationperiod" placeholder="Probation Period:">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class=col-sm-6>
                                    <label for="">Company Name:</label>
                                    <input type="text" class="form-control" id="txtCompanyName" name="txtCompanyName" placeholder=" Type Company Name:">
                                </div>
                                <div class=col-sm-6>
                                    <label for="">Sallary:</label>
                                    <input type="text" class="form-control" name="txtSallary" id="txtSallary" placeholder="Sallary Per Annum">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Designation:</label>
                                    <input type="text" class="form-control" name="txtDesignation" id="txtDesignation">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Joining On:</label>
                                    <input type="date" class="form-control" name="dtJoiningDate" id="dtJoiningDate">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="text-align: center;margin-top: 20px">
                            <button type="submit" class="btn btn-danger" id="btnReset" name="btnReset">Reset</button>
                            <button type="submit" class="btn btn-success" id="btnSubmit" name="btnSubmit">Submit</button>
                            <button type="button" class="btn btn-primary" id="btnSubmit" name="btnSubmit" onclick="loadReport()">Report</button>
                        </div>
                    </form>
                    <div class="table wy-table-responsive" style="display: none;" id="showTableReport">
                        <table class="table wy-table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Brand</th>
                                <th>Logo</th>
                                <th>Letter No</th>
                                <th>Date</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company Name</th>
                                <th>Salary</th>
                                <th>Designation</th>
                                <th>Joining Date</th>
                                <th>Probation Period</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="letterid"></tbody>
                        </table>
                    </div>
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
                        <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-earning">
                        <thead>
                        <tr>
                            <th>Sl#</th>
                            <th>Bank name</th>
                            <th>Shortname</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_bank_names">
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="bankDetails">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-center" style="background-color: cornflowerblue;color: #fff;">
                <span class="modal-title ">Bank Details</span>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="loadBankDetailsView"></div>
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

