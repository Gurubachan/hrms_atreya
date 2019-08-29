<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i>Create New Employee</h2>

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
                    <form  class="" id="newEmployeeForm"  name="newEmployeeForm" autocomplete="off">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="slno" class="control-label mb-1">#Slno<span style="color:red;">*</span>.</label>
                                    <input id="slno" name="slno" type="text" class="form-control" onclick="alfa_numeric('slno')" maxlength="20" placeholder="Enter serial number" required>
                                    <small class="errormsg_slno"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeetype" class="control-label mb-1">Employee ICard Number<span style="color:red;">*</span></label>
                                    <input type="text" id="empid" name="empid" class="form-control text-uppercase" maxlength="20" placeholder="Enter ICard Number"  required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeedepartment" class="control-label mb-1">Department<span style="color:red;">*</span></label>
                                    <select id="departmentmappingid" name="departmentmappingid" class="select" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeepostion" class="control-label mb-1">Designation<span style="color:red;">*</span></label>
                                    <select id="designationid" name="designationid" class="select" required></select>
                                </div>
                            </div>
                           <div class="col-sm-3">
                               <div class="form-group">
                                   <label for="employeefirstname" class="control-label mb-1">First Name<span style="color:red;">*</span></label>
                                   <input type="hidden" id="txtid" name="txtid" value="0">
                                   <input type="hidden" id="isactive" name="isactive" value="1">
                                   <input id="fname" name="fname" type="text" class="form-control"  minlength="1" maxlength="50" placeholder="Enter first name" required>
                               </div>
                           </div>
                           <div class="col-sm-3">
                               <div class="form-group">
                                   <label for="employeemiddlename" class="control-label mb-1">Middle Name</label>
                                   <input id="mname" name="mname" type="text" class="form-control" maxlength="50" placeholder="Enter middle name">
                               </div>
                           </div>
                           <div class="col-sm-3">
                               <div class="form-group">
                                   <label for="employeelastname" class="control-label mb-1">Last Name</label>
                                   <input id="lname" name="lname" type="text" class="form-control"  maxlength="50" placeholder="Enter last name">
                               </div>
                           </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeegender" class="control-label mb-1">Gender<span style="color:red;">*</span></label>
                                    <select id="genderid" name="genderid" class="select" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeedob" class="control-label mb-1">Date of Birth<span style="color:red;">*</span></label>
                                    <input id="dob" name="dob" type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeegender" class="control-label mb-1">Marital Status</label>
                                    <select id="maritalstatusid" name="maritalstatusid" class="select" >
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeedoj" class="control-label mb-1">Date of Joining<span style="color:red;">*</span></label>
                                    <input id="doj" name="doj" type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeedoj" class="control-label mb-1">Date of Leaving</label>
                                    <input id="dol" name="dol" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeefathername" class="control-label mb-1">Father Name</label>
                                    <input id="fathername" name="fathername" type="text" class="form-control" maxlength="20" placeholder="Enter father name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeemothername" class="control-label mb-1">Mother Name</label>
                                    <input id="mothername" name="mothername" type="text" class="form-control" placeholder="Enter mother name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeespoucename" class="control-label mb-1">Spouse Name</label>
                                    <input id="spousename" name="spousename" type="text" class="form-control" placeholder="Enter spouse name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeeaddress" class="control-label mb-1">Address<span style="color:red;">*</span></label>
                                    <textarea id="address" name="address"  class="form-control textarea"  minlength="5" maxlength="60" required placeholder="Enter address"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeeemail" class="control-label mb-1">Email</label>
                                    <input id="emailid" name="emailid" type="email" class="form-control" placeholder="Enter email id.">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeemobile" class="control-label mb-1">Mobile<span style="color:red;">*</span></label>
                                    <input id="mobile" name="mobile" type="text" class="form-control"  minlength="10" maxlength="10" placeholder="Enter mobile number" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="stateid" class="control-label mb-1"><span style="color:red;">*</span>State</label>
                                    <select id="stateid" name="stateid" class="select" required></select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="distid" class="control-label mb-1">District<span style="color:red;">*</span></label>
                                    <select id="distid" name="distid" class="select" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeeeducation" class="control-label mb-1">Education<span style="color:red;">*</span></label>
                                    <select id="educationid" name="educationid" class="select" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeeepfnumber" class="control-label mb-1">EPF Number</label>
                                    <input id="epfno" name="epfno" type="text" class="form-control text-uppercase" placeholder="Enter epf number. e.g:KN/KRP/0054055/0000250" minlength="21" maxlength="21" onclick="epf_number_validate('epfno')">
                                    <small class="errormsg_epfno"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeeesinumber" class="control-label mb-1">ESI Number</label>
                                    <input id="esifno" name="esifno" type="text" class="form-control" onclick="number_validate('esifno')" placeholder="Enter esi number e.g. 31001234560000001" maxlength="17" minlength="17">
                                    <small class="errormsg_esifno"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeeaadharnumber" class="control-label mb-1">Aadhar Number</label>
                                    <input id="aadharno" name="aadharno" type="text" class="form-control" onclick="number_validate('aadharno')" placeholder="Enter aadhar number"  maxlength="12" minlength="12" >
                                    <small class="errormsg_aadharno"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="employeepannumber" class="control-label mb-1">PAN Number</label>
                                    <input id="panno" name="panno" type="text" class="form-control text-uppercase" onclick="alfa_numeric('panno')" maxlength="10" minlength="10" placeholder="Enter pan number" autocapitalize="on">
                                    <small class="errormsg_panno"></small>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class=" text-right" style="margin-right: 20%;">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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
    <div class="row" id="toggle_new_employee" style="display: none;">
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
                        <thead style="font-size: 10px;">
                        <tr>
                            <th>Sl#</th>
                            <th>Form Slno</th>
                            <th>ICard Number</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Employee Name</th>
                            <th>Gender</th>
                            <th>Date of birth</th>
                            <th>Marital Status</th>
                            <th>Joining Date</th>
                            <th>leaving Date</th>
                            <th>Father Name</th>
                            <th>Mother Name</th>
                            <th>Spouse Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>District</th>
                            <th>Education</th>
                            <th>Epf Number</th>
                            <th>Esi Number</th>
                            <th>Aadhar Number</th>
                            <th>Pan Number</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_employeess">
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(function () {
        load_employee_type();
        load_education();
        load_department();
        load_designation();
        load_marital_status();
        load_gender();
        load_state();
    });

    $('#stateid').change(function () {
        load_district();
    });

    $("#newEmployeeForm").submit(function(e){
        $('#toggle_new_employee').show();
        e.preventDefault();
        var frm = $("#newEmployeeForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/create_employee')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var josndata = JSON.parse(data);
                    reportFunction(1);
                }
            }
        });
    });
    function loadAjaxForReport(id){
        $('#toggle_new_employee').show();
                $.ajax({
                    type:'post',
                    url:"<?= base_url('Employee/report_temp_employee')?>",
                    data:{checkparams:id},
                    crossDomain:true,
                    success:function(data){
                        if(data!=false){
                            var jsondata = JSON.parse(data);
                            var j=0;
                            var z = jsondata.length;
                            var html = "";
                            var isactive='';
                            for(var i=0; i<z; i++){
                                j++;
                                var checkId = jsondata[i].id;
                                var checkIsactive = jsondata[i].isactive;
                                var updatedid = '"<?= $cname ?>"';
                                var urlid = '"../Common/record_active_deactive"';
                                if(checkIsactive=='t'){
                                    isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                                }else{
                                    isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                                }
                                html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].slno+"</td><td>"+ jsondata[i].empid+"</td><td>"+ jsondata[i].departmentname+"</td><td>"+ jsondata[i].designationname+"</td><td>"+ jsondata[i].fname+" "+jsondata[i].mname+" "+jsondata[i].lname+"</td>" +
                                    "<td>"+ jsondata[i].gendername+"</td><td>"+ jsondata[i].dob+"</td><td>"+ jsondata[i].maritalstatusname+"</td><td>"+ jsondata[i].doj+"</td><td>"+ jsondata[i].dol+"</td><td>"+ jsondata[i].fathername+"</td><td>"+ jsondata[i].mothername+"</td>" +
                                    "<td>"+ jsondata[i].spousename+"</td><td>"+ jsondata[i].address+"</td><td>"+ jsondata[i].emailid+"</td><td>"+ jsondata[i].mobile+"</td><td>"+ jsondata[i].distname+"</td><td>"+ jsondata[i].educationname+"</td>" +
                                    "<td>"+ jsondata[i].epfno+"</td><td>"+ jsondata[i].esifno+"</td><td>"+ jsondata[i].aadharno+"</td><td>"+ jsondata[i].panno+"</td><td>"+isactive+"</td><td>Edit</td></tr>");
                            }
                            $("#load_employeess").html(html);
                        }
                    }
                });
            }
</script>
