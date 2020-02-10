<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well">
                        <h2><i class="fa fa-angle-double-right "></i> Create document type</h2>
                        <div class="box-icon">
                            <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <form  class="" id="frmDocumenttype" name="frmDocumenttype" autocomplete="off">
                            <div class="col-sm-6" style="display: block; margin-left: auto;margin-right: auto">
                                <input type="hidden" id="txtid" name="txtid" value="0">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Document Type :</label>
                                    <input type="text" id="txtDocumentname" name="txtDocumentname" class="form-control" onclick="charachters_validate('txtDocumentname')" placeholder="Enter your document type name" required>
                                </div>
                                <div class=" text-right">
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
        <!--    <div class="row">-->
        <!--        <div class="box col-md-12">-->
        <!--            <div class="box-inner">-->
        <!--                <div class="box-header well">-->
        <!--                    <h2><i class="fa fa-angle-double-right "></i> Report</h2>-->
        <!---->
        <!--                    <div class="box-icon">-->
        <!--                        <a href="#" class="btn btn-setting btn-round btn-default"><i-->
        <!--                                    class="fa fa-cog"></i></a>-->
        <!--                        <a href="#" class="btn btn-minimize btn-round btn-default"><i-->
        <!--                                    class="fa fa-chevron-up"></i></a>-->
        <!--                        <a href="#" class="btn btn-close btn-round btn-default"><i-->
        <!--                                    class="fa fa-remove"></i></a>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="box-content">-->
        <!--                    <div class="table-responsive">-->
        <!--                        <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-earning">-->
        <!--                            <thead>-->
        <!--                            <tr>-->
        <!--                                <th>Sl#</th>-->
        <!--                                <th>Gender name</th>-->
        <!--                                <th>Gender Shortname</th>-->
        <!--                                <th>IsActive</th>-->
        <!--                                <th>Action</th>-->
        <!--                            </tr>-->
        <!--                            </thead>-->
        <!--                            <tbody id="load_gendername">-->
        <!--                            </tbody>-->
        <!--                        </table>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
    </div>
</div>
</div>

</div>




