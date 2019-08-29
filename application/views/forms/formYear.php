<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<div class="col-sm-10">
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Create Year</h2>
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
                    <br>
                    <form  class="" id="yearForm" autocomplete="off">
                        <div class="form-group wow flash">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="yearname" class="control-label mb-1">Add New Year<span class="red">*</span></label>
                            <input type="text" id="year" name="year" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter year.">
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                        </div>
                        <br>
                        <div class=" form-group text-right" style="margin-right: 20%;">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="createYear">Create</button>
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
</div>
</div>
<?php

?>
<script>
    $("#yearForm").submit(function(e){
        e.preventDefault();
        var frm = $("#yearForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Year/action/')?>",
            data:frm,
            success:function(data){
               if(data!=false){
                   if($('#createYear').html()=='Update'){
                       window.location.reload();
                   }else{
                        $('#yearname').val('');
                       reportFunction(1);
                   }
               }
            }
        });
    });
    function loadAjaxForReport(id){
        $.ajax({
            type:'post',
            url:"<?= base_url('Year/report_year')?>",
            data:{checkparams:id},
            success:function(data){
                if(data!=false){
                    jsondata = JSON.parse(data);
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    var isactive='';
                    for(var i=0; i<z; i++){
                        j++;
                        var checkId = jsondata[i].id;
                        var checkIsactive = jsondata[i].isactive;
                        var editisactive = JSON.stringify(checkIsactive);
                        var year = jsondata[i].year;
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].year+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditYear(" +checkId+ "," +year+ "," +editisactive+ ")'>Edit</button></td></tr>");
                    }
                    $("#load_year").html(html);
                }
            }
        });
     }
    function reportEditYear(id,year,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#year').val(year);
        $('#isactive').val(isactiveval);
        $('#year').focus();
        $("#createYear").html('Update');
    }
</script>
