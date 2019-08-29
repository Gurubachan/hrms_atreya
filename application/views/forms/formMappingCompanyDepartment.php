<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="fa fa-angle-double-right "></i> Department Mapping</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="fa fa-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="fa fa-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="fa fa-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form  class="" id="departmentMappingForm" >
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="companytype" class="control-label mb-1">Company Type</label>
                                    <select name="companytype" id="companytype" class="select"></select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="hidden" id="txtid" name="txtid" value="0">
                                    <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                                    <label for="companyid" class="control-label mb-1">Company</label>
                                    <select name="companyid" id="companyid" class="select">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="departmentname" class="control-label mb-1">Department</label>
                                    <select name="departmentid" id="departmentid" class="select"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class=" form-group text-right" style="margin-right: 20%;">
                        <button type="reset" class="btn btn-danger btn-sm" >Reset</button>
                        <button type="submit" class="btn btn-primary btn-sm" id="createDepartmentMapping">Create</button>
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
    </div>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="fa fa-angle-double-right "></i> Report</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="fa fa-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="fa fa-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="fa fa-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="table-responsive">
                    <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-earning">
                    <thead>
                    <tr>
                        <th>Sl#</th>
                        <th>Company name</th>
                        <th>Department name</th>
                        <th>IsActive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="load_department_mapping">
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        load_department();
        load_companytype();
    });
    $("#departmentMappingForm").submit(function(e){
        $("#department_mapping_report").show();
        e.preventDefault();
        var frm = $("#departmentMappingForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Department/create_department_mapping')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                }else{
                    console.log(data);
                }
                reportFunction(1);
            }
        });
    });

    function load_department(){
        $.ajax({
            type:'post',
            url: "<?= base_url('Department/load_department')?>",
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#departmentid").html(data);
                }
            }
        });
    }
    function load_companytype(){
        $.ajax({
            type:'post',
            url: "<?= base_url('Company/load_company_type')?>",
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#companytype").html(data);

                }
            }
        });
    }
    function load_company(){
        var companytype=$("#companytype").val();
        $.ajax({
            type:'post',
            url: "<?= base_url('Company/load_company')?>",
            crossDomain:true,
            data:{typeid:companytype},
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#companyid").html(data);
                }
            }
        });
    }
    $("#companytype").change(function () {
        load_company();
    });
    function loadAjaxForReport(data) {
        $.ajax({
            type: 'post',
            url: "<?= base_url('Department/report_department_mapping')?>",
            crossDomain: true,
            data: {checkparams:data},
            success: function (data) {
                var jsondata = JSON.parse(data);
                if (data != false) {
                    var j = 0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    var isactive = "";
                    for (var i = 0; i < z; i++) {
                        j++;
                        var checkId = jsondata[i].id;
                        var checkIsactive = jsondata[i].isactive;
                        var editisactive = JSON.stringify(checkIsactive);
                        var company = jsondata[i].companyid;
                        var department = jsondata[i].departmentid;
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if (checkIsactive == 't') {
                            isactive = "<button id='action" + checkId + "' onclick='editIsactive(1," + checkId + "," + updatedid + "," + urlid + ")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        } else {
                            isactive = "<button id='action" + checkId + "' onclick='editIsactive(0," + checkId + "," + updatedid + "," + urlid + ")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html += ("<tr> <td>" + j + "</td><td>" + jsondata[i].companyname + "</td><td>" + jsondata[i].departmentname + "</td><td>" + isactive + "</td><td><button class='btn editBtn btn-sm' onclick='reportEditDepartmentMapping("+checkId+","+company+","+department+","+editisactive+")'>Edit</button></td></tr>");
                    }
                    $("#load_department_mapping").html(html);
                }
            }
        });
    }
    function reportEditDepartmentMapping(id,company,department,isactive) {
            if(isactive=='t'){
                var isactiveval=1;
            }else{
                isactiveval=0;
            }
            $('#txtid').val(id);
            $('#companyname option[value = 18]').attr('selected','selected');
            $('#departmentname').val(department);
            $('#isactive').val(isactiveval);
            $('#createDepartmentMapping').html('Update');
        }
</script>
