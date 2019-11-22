<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $("#resourceTypeForm").submit(function(e){
        e.preventDefault();
        var frm = $("#resourceTypeForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Resource/create_resourcetype')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    if(jsondata.flag==0){
                        duplicate_entries();
                    }else{
                        if($('#btnResourceType').html()=='Create'){
                            successfull_entries();
                            reportFunction(1);
                            $("#resourceTypeForm").trigger("reset");
                        }else{
                            if($('#btnResourceType').html()=='Update'){
                                $('#btnResourceType').html('Create');
                                successfully_updates();
                                reportFunction(2);
                                $("#resourceTypeForm").trigger("reset");
                                $('#txtid').val(0);
                            }
                        }
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
            url:"<?= base_url('Resource/report_resourcetype')?>",
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
                        var resorucetype = jsondata[i].typename;
                        var strresorucetype = JSON.stringify(resorucetype);
                        var resoruceshorttype = jsondata[i].typeshortname;
                        var strresoruceshorttype = JSON.stringify(resoruceshorttype);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].typename+"</td><td>"+resoruceshorttype+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditResourceType(" +checkId+ "," +strresorucetype+ ","+ strresoruceshorttype +"," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_resource_type").html(html);
                }
            }
        });
    }
    function reportEditResourceType(id,strresorucetype,strresoruceshorttype,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        txtid=id;
        $('#txtid').val(id);
        $('#resourcetype').val(strresorucetype);
        $('#resourceTypeShortname').val(strresoruceshorttype);
        $('#isactive').val(isactiveval);
        $('#resourcetype').focus();
        $("#btnResourceType").html('Update');
    }
</script>
