<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $("#periodtypeform").submit(function(e){
        e.preventDefault();
        var frm = $("#periodtypeform").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Resource/create_periodtype')?>",
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
                        $("#btnPeriodtype").html('Create');
                    $("#periodtypeform").trigger("reset");
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
            url:"<?= base_url('Resource/report_periodtype')?>",
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
                        var periodtype = jsondata[i].periodtype;
                        var strperiodtype = JSON.stringify(periodtype);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].periodtype+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditPeriodType(" +checkId+ "," +strperiodtype+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_periodtype").html(html);
                }
            }
        });
    }
    function reportEditPeriodType(id,strperiodtype,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        txtid=id;
        $('#txtid').val(id);
        $('#periodtypename').val(strperiodtype);
        $('#isactive').val(isactive);
        $('#periodtypename').focus();
        $("#btnPeriodtype").html('Update');
    }
</script>
