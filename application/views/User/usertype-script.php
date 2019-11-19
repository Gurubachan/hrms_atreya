<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        // load_gender();
    });
    $("#userTypeForm").submit(function(e){
        e.preventDefault();
        var frm = $("#userTypeForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('User/create_user_type')?>",
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
                    if($("#createUserType").html()=="Update"){
                        window.location.reload();
                    }else {
                        $('#usertypename').val("");
                        $('#usertypeshortname').val("");
                        $('#usertypereport').show();
                        reportFunction(1);
                    }
                }else{
                    console.log(data);
                }
            }
        });
    });
    function loadAjaxForReport(data){
        $('#usertypereport').show();
        $.ajax({
            type:'post',
            url:"<?= base_url('User/report_user_type')?>",
            crossDomain:true,
            data:{checkparams:data},
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
                        var usertype = jsondata[i].usertypename;
                        var strusertype = JSON.stringify(usertype);
                        var usertypeshortname = jsondata[i].usertypeshortname;
                        var strshortname = JSON.stringify((usertypeshortname));
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].usertypename+"</td><td>"+ jsondata[i].usertypeshortname+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditUsertype(" +checkId+ "," +strusertype+ ","+strshortname+"," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_usertype").html(html);
                }
            }
        });
    }
    function reportEditUsertype(id,strusertype,strshortname,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#usertypename').val(strusertype);
        $('#usertypeshortname').val(strshortname);
        $('#isactive').val(isactiveval);
        $('#usertypename').focus();
        $("#createUserType").html("Update");
    }
</script>
