<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        load_resourcetype('resourcetype');
        load_resourcecompanyname('resourcecompany');
        load_assurancetype('assurancetype');
        load_assuranceperiodtype('assuranceperiodtype');
    });
    // $('#expiringdate').pignoseCalendar({
    // });
        $('#expiringdate').pignoseCalendar({
            // theme:'dark'
            format:"DD-MM-YYYY"
        });
        $('#purchasingdate').pignoseCalendar({
            format:"DD-MM-YYYY"
        });
    $("#resourceform").submit(function(e){
        e.preventDefault();
        var frm = $("#resourceform").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Resource/create_resource')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    if(jsondata.flag==0){
                        duplicate_entries();
                    }else{
                        successfull_entries();
                    }
                        $("#createResource").html('Create');
                    $("#resourceform").trigger("reset");
                    reportFunction(1);
                }else{
                    console.log(data);
                }
            }
        });
    });
    function loadAjaxForReport(data){

        $.ajax({
            type:'post',
            url:"<?= base_url('Resource/report_resource')?>",
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
                        var attendancetype = jsondata[i].typename;
                        var strattendancetype = JSON.stringify(attendancetype);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].resourcetypeid+"</td><td>"+ jsondata[i].companyid+"</td><td>"+ jsondata[i].modelnumber+"</td><td>"+ jsondata[i].serialnumber+"</td><td>"+ jsondata[i].purchangingdate+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditAttendanceType(" +checkId+ "," +strattendancetype+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsViewResource(" +checkId+ ")' data-toggle='modal' data-target='#resource'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_resources").html(html);
                }
            }
        });
    }
    function reportEditAttendanceType(id,strattendancetype,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        txtid=id;
        $('#txtid').val(id);
        $('#attendancetypename').val(strattendancetype);
        $('#isactive').val(isactive);
        $('#attendancetypename').focus();
        $("#createResource").html('Update');
    }
    function loadResourceDetails(id) {  //Resource Dialogue for details view
        $.ajax({
            type:'post',
            url:'<?= base_url("Resource/resourceViewDetails")?>',
            data:{id:id},
            success:function (res) {
                if(res!=false){
                    $('#loadResourceDetails').html(res);
                }
            }
        });
    }
</script>
