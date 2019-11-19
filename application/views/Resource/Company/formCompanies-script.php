<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $("#resourceCompanyForm").submit(function(e){
        e.preventDefault();
        var frm = $("#resourceCompanyForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Resource/create_resourcecompany')?>",
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
                        $("#btnCompanies").html('Create');
                    $("#resourceCompanyForm").trigger("reset");
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
            url:"<?= base_url('Resource/report_resourcecompany')?>",
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
                        var resourcecompanyname = jsondata[i].companyname;
                        var strresourcecompanyname = JSON.stringify(resourcecompanyname);
                        var resourcecompanyshortname = jsondata[i].companyshortname;
                        var strresourcecompanyshortname = JSON.stringify(resourcecompanyshortname);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyname+"</td><td>"+ resourcecompanyshortname +"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditResourceCompanies(" +checkId+ "," +strresourcecompanyname+ ","+ strresourcecompanyshortname +"," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_resource_companies").html(html);
                }
            }
        });
    }

    function reportEditResourceCompanies(id,strattendancetype,strresourcecompanyshortname,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        txtid=id;
        $('#txtid').val(id);
        $('#resourcecompanyname').val(strattendancetype);
        $('#resourcecompanyshortname').val(strresourcecompanyshortname);
        $('#isactive').val(isactive);
        $('#attendancetypename').focus();
        $("#btnCompanies").html('Update');
    }
</script>
