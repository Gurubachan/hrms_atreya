<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i>Create Company Type</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="fa fa-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="fa fa-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form  class="" id="companyTypeForm" autocomplete="off">
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="" class="control-label mb-1">Company Type Name</label>
                            <input type="text" id="companytypename" name="companytypename" onclick="charachters_validate('companytypename')" minlength="5" maxlength="60" class="form-control" placeholder="Enter company name, Only charachters and space are allowed." required>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <small class="errormsg_companytypename"></small>
                        </div>
                        <br>
                        <div class="form-actions form-group text-right" style="margin-right: 20%;">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="createCompanyType">Create</button>
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
                        <th>Company type name</th>
                        <th>IsActive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="load_company_type">
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#companyTypeForm").submit(function(e){
        e.preventDefault();
        var frm = $("#companyTypeForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Company/create_company_type')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    if($("#createCompanyType").html()=="Update"){
                        window.location.reload();
                    }else{
                        $('#companytypename').val("");
                        reportFunction(1);
                    }
                }else{
                    console.log(data);
                }
            }
        });
    });
    function loadAjaxForReport(data){
            $.ajax({
                type:'post',
                url:"<?= base_url('Company/report_company_type')?>",
                crossDomain:true,
                data:{checkparams:data},
                // data:{onlyactive:1},
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
                            var editisactive = JSON.stringify(checkIsactive);
                            var companytype = jsondata[i].typename;
                            var strcompanytype = JSON.stringify(companytype)
                            var updatedid = '"<?= $cname ?>"';
                            var urlid = '"../Common/record_active_deactive"';
                            if(checkIsactive=='t'){
                                isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                            }else{
                                isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                            }
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].typename+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditCompanyType(" +checkId+ "," +strcompanytype+ "," +editisactive+ ")'>Edit</button></td></tr>");
                        }
                        $("#load_company_type").html(html);
                    }
                }
            });
        }
    function reportEditCompanyType(id,strcompanytype,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#companytypename').val(strcompanytype);
        $('#isactive').val(isactiveval);
        $('#designationname').focus();
        $("#createCompanyType").html('Update');
    }
</script>
