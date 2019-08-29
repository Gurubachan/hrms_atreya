<div class="col-sm-12">
    <div class="row" style="margin-top: 6%;">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">District</div>
                <div class="card-body card-block">
                    <form  class="" id="districtname" >
                        <div class="form-group">
                            <input type="hidden" id="txtid" name="txtid" value="0">
                            <label for="stateid" class="control-label mb-1">State Name</label>
                            <input type="hidden" id="isactive" name="isactive" value='1' class="form-control">
                            <select name="stateid" id="stateid"  class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label mb-1">District Name</label>
                            <input type="text" id="distname" name="distname" class="form-control" onclick="charachters_validate('distname')" minlength="3" maxlength="20" required>
                            <small class="errormsg_distname"></small>
                        </div>
                        <div class="form-actions form-group">
                            <button type="reset" class="btn btn-danger btn-sm">reset</button>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">Report</div>
                    <div class="card-body">
                        <div class="table table-responsive" >
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Sl#</th>
                                    <th>District name</th>
                                    <th>IsActive</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="load_district">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(function () {
        load_state();
    });
    $("#districtname").submit(function(e){
        e.preventDefault();
        var frm = $("#districtname").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('District/create_district')?>",
            data:frm,
            success:function(data){
                if(data!=false){
                    console.log(data);
                    $("#districtname").val('');
                }else{
                    console.log(data);
                }
                load_district();
            }
        });
    });
    function load_state(){
        $.ajax({
            type:'post',
            url:"<?= base_url('State/load_state')?>",
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#stateid").html(data);
                }
            }
        });
    }
    $("#stateid").change(function () {
        load_district();
    });
    function load_district(){
        var stateid = $('#stateid').val();
        $.ajax({
            type:'post',
            url:"<?= base_url('District/report_district')?>",
            data:{stateid:stateid},
            crossDomain:true,
            success:function(data){
                var jsondata = JSON.parse(data);
                if(data!=false){
                    var j=0;
                    var z = jsondata.length;
                    // alert(z);
                    var html = "";
                    for(var i=0; i<z; i++){
                        j++;
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].distname+"</td><td>"+jsondata[i].isactive+"</td><td>Edit</td></tr>");
                    }
                    $("#load_district").html(html);
                }
            }
        });
    }

</script>
