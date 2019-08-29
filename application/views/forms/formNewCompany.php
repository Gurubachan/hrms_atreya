<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i>Create New Company</h2>
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
                    <form  class="" id="newCompanyForm" autocomplete="off">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="companyname" class="control-label mb-1">Company Name</label>
                                    <input type="hidden" id="txtid" name="txtid" value="0">
                                    <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                                    <input id="companyname" name="companyname" type="text" onclick="charachters_validate('companyname')" class="form-control" aria-required="true" aria-invalid="false" minlength="5" maxlength="60" placeholder="Enter company name" required>
                                    <small class="errormsg_companyname"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="companytype" class="control-label mb-1">Company Type</label>
                                    <select id="companytype" name="companytype" class="select" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="companyshortname" class="control-label mb-1">Company Short Name</label>
                                    <input id="companyshortname" name="companyshortname" type="text" onclick="alfa_numeric('companyshortname')" class="form-control" minlength="2" maxlength="5" placeholder="Enter company short name" required>
                                    <small class="errormsg_companyshortname"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="establishedon" class="control-label mb-1">Established On</label>
                                    <input id="establishedon" name="establishedon" type="date" class="form-control"  required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="gstno" class="control-label mb-1">GST Number</label>
                                    <input id="gstno" name="gstno" type="text" onclick="alfa_numeric('gstno')" class="form-control text-uppercase"  minlength="15" maxlength="15" placeholder="Enter GST number.e.g: 24ABCDE5047D101" autocapitalize="characters" required>
                                    <small class="errormsg_gstno"></small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="address" class="control-label mb-1">Address</label>
                                    <textarea id="address" name="address" onclick="alfa_numeric('address')" rows="1" class="form-control textarea"  placeholder="Enter company address" required autocomplete="off" minlength="5" maxlength="60"></textarea>
                                    <small class="errormsg_address"></small>
                                </div>
                            </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="state" class="control-label mb-1">State</label>
                                    <select id="stateid"  name="stateid" class="select" required>
                                    </select>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="distid" class="control-label mb-1">District</label>
                                    <select id="distid" name="distid" class="select"  required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="pincode" class="control-label mb-1 errlable">Pincode</label>
                                    <input id="pincode" name="pincode" type="text" onclick="number_validate('pincode')" class="form-control"  minlength="6" maxlength="6"   placeholder="Enter pincode" required autocomplete="off">
                                    <small class="errormsg_pincode"></small>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="url" class="control-label mb-1">Url</label>
                                    <input id="url" name="url" type="text" onclick="url_validate('url')" class="form-control" placeholder="Enter company url" required>
                                    <small class="errormsg_url"></small>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="companyemail" class="control-label mb-1">email</label>
                                    <input id="companyemail" name="companyemail" type="email" onclick="email_validate('companyemail')" class="form-control" placeholder="Enter company email" required>
                                    <small class="errormsg_companyemail"></small>
                                </div>
                        </div>
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="mobile" class="control-label mb-1">Mobile</label>
                                    <input id="mobile" name="mobile" type="text" onclick="number_validate('mobile')" class="form-control" minlength="10" maxlength="10" placeholder="Enter company contact number" required>
                                    <small class="errormsg_mobile"></small>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-actions form-group text-right " style="margin-right: 20%;">
                            <button type="reset" class="btn btn-danger btn-sm">reset</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="createCompany">Create</button>
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
    <div class="row" id="reportCompany" style="display: none;">
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
                <div class="box-content ">
                    <div class="table-responsive">
                        <table class="table  table-striped table-bordered bootstrap-datatable datatable  table-earning">
                            <thead>
                            <tr>
                                <th>Sl#</th>
                                <th>Company Name</th>
                                <th>Company Short Name</th>
                                <th>Address</th>
                                <th>Pincode</th>
                                <th>GST Number</th>
                                <th>URL</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>IsActive</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="load_company">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(function () {
        load_company_type();
        load_state();
    });
    $('#stateid').change(function () {
        load_district();
    });
    $("#newCompanyForm").submit(function(e){
        $("#reportCompany").show();
        e.preventDefault();
        var frm = $("#newCompanyForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Company/create_company')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    if($('#createCompany').html()=='Update'){
                        window.location.reload();
                    }else{
                        reportFunction(1);
                        $('#companyname').val('');
                        $("#companyshortname").val('');
                        $("#address").val('');
                        $("#pincode").val('');
                        $("#gstno").val('');
                        $("#url").val('');
                        $("#companyemail").val('');
                        $("#mobile").val('');
                        $("#establishedon").val('');
                        $("#distname").val('');
                        $('#isactive').val('');
                        $('#companyname').focus();

                    }
                }
            }
        });
    });
    function loadAjaxForReport(data){
            var companyid = $("#companytype").val();
            if(companyid==''){
                alert('Please select company type.');
            }else{
                $("#reportCompany").show();
                $.ajax({
                    type:'post',
                    url:"<?= base_url('Company/report_company')?>",
                    data:{typeid:companyid,checkparams:data},
                    crossDomain:true,
                    success:function(data){
                        var jsondata = JSON.parse(data);
                        if(data!=false){
                            var j=0;
                            var z = jsondata.length;
                            // alert(z);
                            var html = "";
                            var isactive="";
                            for(var i=0; i<z; i++){
                                j++;
                                var checkId = jsondata[i].id;
                                var checkIsactive = jsondata[i].isactive;
                                var updatedid = '"<?= $cname ?>"';
                                var strcompanyname=JSON.stringify(jsondata[i].companyname);
                                var strcompanyshortname = JSON.stringify(jsondata[i].companyshortname);
                                var straddress= JSON.stringify(jsondata[i].address);
                                var pincode = jsondata[i].pincode;
                                var strgstno= JSON.stringify(jsondata[i].gstno);
                                var strurl= JSON.stringify(jsondata[i].url);
                                var stremailed= JSON.stringify(jsondata[i].emailid);
                                var mobile= jsondata[i].mobile;
                                var editisactive = JSON.stringify(jsondata[i].isactive);
                                var strestablishedon = JSON.stringify(jsondata[i].establishedon);
                                var district = jsondata[i].distid;
                                var urlid = '"../Common/record_active_deactive"';
                                if(checkIsactive=='t'){
                                    isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                                }else{
                                    isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                                }
                                html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyname+"</td><td>"+jsondata[i].companyshortname +"</td><td>"+jsondata[i].address+"</td><td>"+jsondata[i].pincode +"</td>" +
                                    "<td>"+jsondata[i].gstno +"</td><td>"+jsondata[i].url+"</td><td>"+jsondata[i].emailid+"</td><td>"+jsondata[i].mobile +"</td><td>"+isactive+"</td>" +
                                    "<td><button class='btn editBtn btn-sm' onclick='reportEditCompany(" +checkId+ "," +strcompanyname+ " ," +strcompanyshortname+ "," +straddress+ "," +pincode+ "," +strgstno+ "," +strurl+ "," +stremailed+ "," +mobile+ ","+strestablishedon+","+district+"," +editisactive+ ")'>Edit</button></td></tr>");
                            }
                            $("#load_company").html(html);
                        }else{
                            $("#newCompany_report").hide();
                        }
                    }
                });
            }
    }
    function reportEditCompany(id,strcompanyname,strcompanyshortname,straddress,pincode,strgstno,strurl,stremaileid,mobile,strestablishedon,disctrict,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#companyname').val(strcompanyname);
        $("#companyshortname").val(strcompanyshortname);
        $("#address").val(straddress);
        $("#pincode").val(pincode);
        $("#gstno").val(strgstno);
        $("#url").val(strurl);
        $("#companyemail").val(stremaileid);
        $("#mobile").val(mobile);
        $("#establishedon").val(strestablishedon);
        $("#distname").val(disctrict);
        $('#isactive').val(isactiveval);
        $('#companyname').focus();
        $("#createCompany").html("Update");
    }
</script>
