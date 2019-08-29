<?php
$datenow = date("Y-m-d H:i:s");
?>
<div class="col-sm-10">

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="fa fa-angle-double-right "></i> Create Marital Status</h2>

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
                    <form  class="" id="maritalStatusForm" name="maritalStatusForm" autocomplete="off">
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="" class="control-label mb-1">Status Name</label>
                            <input type="text" id="statusname" name="statusname" onclick="charachters_validate('statusname')" minlength="5" maxlength="60" class="form-control" required>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <small class="errormsg_statusname"></small>
                        </div>
                        <br>
                        <div class="form-actions form-group text-right">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
<!--                    <div class="text-center notice" style="display: none;"><img src="--><?//=base_url('assets/images/hrms_loader.gif')?><!--" alt=""></div>-->
                    <br>
                    <hr>
                    <form action="">
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
                            <th>Status name</th>
                            <th>IsActive</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="load_status_names">
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
<script>
    $(function () {
        // load_status_name();
    });
    $("#maritalStatusForm").submit(function(e){
        e.preventDefault();
        var frm = $("#maritalStatusForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('MaritalStatus/create_marital_status')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                    $('#statusname').val("");
                    $(".notice").show();
                }else{
                    console.log(data);
                }
                reportFunction(1);
            }
        });
    });
    //function maritalStatusReport(id){
    //  if(id==1){
    //      $.ajax({
    //          type:'post',
    //          url:"<?//= base_url('MaritalStatus/report_marital_status')?>//",
    //          crossDomain:true,
    //          data:{onlyrecent:1},
    //          success:function(data){
    //              var jsondata = JSON.parse(data);
    //              if(data!=false){
    //                  var j=0;
    //                  var z = jsondata.length;
    //                  // alert(z);
    //                  var html = "";
    //                  for(var i=0; i<z; i++){
    //                      j++;
    //                      html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].statusname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
    //                  }
    //                  $("#load_status_names").html(html);
    //              }
    //          }
    //      });
    //  }
    //}


</script>
