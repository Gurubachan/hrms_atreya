<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        load_user_type();
        load_userid();
    });
    function load_user_type(){
        $.ajax({
            type:'post',
            url: "<?= base_url('User/load_user_type')?>",
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#usertypeid").html(data);
                }
            }
        });
    }
    function load_userid(){
        $.ajax({
            type:'post',
            url: "<?= base_url('User/load_userid')?>",
            crossDomain:true,
            success:function(data){
                var data = JSON.parse(data);
                if(data!=false){
                    $("#userid").html(data);
                }
            }
        });
    }
    $("#newUserForm").submit(function(e){
        $('#toggle_new_user').show();
        e.preventDefault();
        var frm = $("#newUserForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('User/create_user')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var josndata = JSON.parse(data);
                    reportFunction(1);
                    $("#newUserForm").trigger('reset');
                }
            }
        });
    });
    function loadAjaxForReport(id){
        $('#toggle_new_user').show();
        $.ajax({
            type:'post',
            url:"<?= base_url('User/report_user')?>",
            data:{checkparams:id},
            crossDomain:true,
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    var j=0;
                    var z = jsondata.length;
                    var html = "";
                    var isactive='';
                    for(var i=0; i<z; i++){
                        j++;
                        var checkId = jsondata[i].id;
                        var checkIsactive = jsondata[i].isactive;
                        var editisactive = JSON.stringify(checkIsactive);
                        var mname = jsondata[i].mname;
                        var lname = jsondata[i].lname;
                        var strfname = JSON.stringify(jsondata[i].fname);
                        var strmname = JSON.stringify(mname);
                        var strlname = JSON.stringify(lname);
                        var strusername = JSON.stringify(jsondata[i].username);
                        var stremail = JSON.stringify(jsondata[i].emailid);
                        var strdob = JSON.stringify(jsondata[i].dob);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].usertypeid+"</td><td>"+jsondata[i].username+"</td><td>"+ jsondata[i].fname+" "+mname+" "+lname+"</td>" +
                            "<td>"+ jsondata[i].emailid+"</td><td>"+ jsondata[i].mobile+"</td><td>"+ jsondata[i].dob+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditUsertype(" +checkId+ "," +jsondata[i].usertypeid+ "," +jsondata[i].mobile+ "," +strfname+ ","+strmname+","+strlname+","+strusername+","+stremail+","+strdob+"," +editisactive+ ")'>Edit</button></td></tr>");
                    }
                    $("#load_user").html(html);

                }
            }
        });
    }
    function reportEditUsertype(id,usertype,mobile,strfname,strmname,strlname,strusername,stremail,strdob,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#usertypeid').val(usertype);
        $('#mobile').val(mobile);
        $('#fname').val(strfname);
        $('#mname').val(strmname);
        $('#lname').val(strlname);
        $('#username').val(strusername);
        $('#emailid').val(stremail);
        $('#dob').val(strdob);
        $('#isactive').val(isactiveval);
        $('#fname').focus();
        $("#createUserType").html("Update");
    }
</script>
