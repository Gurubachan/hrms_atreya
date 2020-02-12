<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        load_company_type();
        load_state();
		custom_datepicker('establishedon');
    });
    $('#stateid').change(function () {
       load_district($(this).val());
        //alert($(this).val());
    });
    $("#newCompanyForm").submit(function(e){
        e.preventDefault();
        var frm = $("#newCompanyForm").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Company/create_company')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    if($('#createCompany').html()=='Update'){
                        window.location.reload();
                    }else{
                        $("#reportCompany").show();
                        reportFunction(1);
                        $("#newCompanyForm").trigger('reset');
                        $('#companyname').focus();
                    }
                }
            }
        });
    });
    function loadAjaxForReport(data){
        var companyid = $("#companytype").val();
        if(companyid==''){
            alert('Please select company type.');
        }else{
            $("#reportCompany").show();
            $.ajax({
                type:'post',
                url:"<?= base_url('Company/report_company')?>",
                data:{typeid:companyid,checkparams:data},
                crossDomain:true,
                success:function(data){
                    var jsondata = JSON.parse(data);
                    // alert(data);
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
                            var updatedid = '"<?= $cname ?>"';
                            var strcompanyname=JSON.stringify(jsondata[i].companyname);
                            var strcompanyshortname = JSON.stringify(jsondata[i].companyshortname);
                            var straddress= JSON.stringify(jsondata[i].address);
                            var pincode = jsondata[i].pincode;
                            var strgstno= JSON.stringify(jsondata[i].gstno);
                            var strurl= JSON.stringify(jsondata[i].url);
                            var stremailed= JSON.stringify(jsondata[i].emailid);
                            var mobile= jsondata[i].mobile;
                            var editisactive = JSON.stringify(jsondata[i].isactive);
                            var strestablishedon = JSON.stringify(jsondata[i].establishedon);
                            var distid = jsondata[i].distid;
                            var stateid = jsondata[i].stateid;
                            // var state = $('#stateid').val();
                            var urlid = '"../Common/record_active_deactive"';
                            if(checkIsactive=='t'){
                                isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                            }else{
                                isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                            }
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].companyname+"</td><td>"+jsondata[i].companyshortname +"</td><td>"+jsondata[i].companytypename +"</td><td>"+jsondata[i].address+"</td><td>"+jsondata[i].statename+"</td><td>"+jsondata[i].distname+"</td><td>"+jsondata[i].pincode +"</td>" +
                                "<td>"+jsondata[i].gstno +"</td><td>"+jsondata[i].url+"</td><td>"+jsondata[i].emailid+"</td><td>"+jsondata[i].mobile +"</td><td>"+isactive+"</td>" +
                                "<td><button class='btn editBtn btn-sm' onclick='reportEditCompany(" +checkId+ "," +strcompanyname+ " ," +strcompanyshortname+ "," +straddress+ "," +pincode+ "," +strgstno+ "," +strurl+ "," +stremailed+ "," +mobile+ ","+strestablishedon+","+stateid+","+distid+"," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='newCompanyTypeDetailsView(" +checkId+ ")' data-toggle='modal' data-target='#'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                        }
                        $("#load_company").html(html);
                    }else{
                        $("#newCompany_report").hide();
                    }
                }
            });
        }
    }

    function reportEditCompany(id,strcompanyname,strcompanyshortname,straddress,pincode,strgstno,strurl,stremaileid,mobile,strestablishedon,stateid,distid,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
       // alert(distid);
        // loadDistWiseState(disctrict);
        $('#txtid').val(id);
        $('#companyname').val(strcompanyname);
        $("#companyshortname").val(strcompanyshortname);
        $("#address").val(straddress);
        $("#pincode").val(pincode);
        $("#gstno").val(strgstno);
        $("#url").val(strurl);
        $("#companyemail").val(stremaileid);
        $("#mobile").val(mobile);
        $("#establishedon").val(strestablishedon);
        $("#stateid").val(stateid).change();
        dist=distid;
        $('#isactive').val(isactiveval);
        $('#companyname').focus();
        $("#createCompany").html("Update");

    }
    // function loadDistWiseState(district) {
    //    $.ajax({
    //        type:'post',
    //        url:'../State/load_districtwise_state',
    //        data:{distid:district},
    //        success:function (d) {
    //            if(d!=false){
    //              var data = JSON.parse(d);
    //                $('#stateid').val(d);
    //            }
    //        }
    //    });
    // }
    function newCompanyTypeDetailsView(id) {
        $.ajax({
            type:'post',
            url:'<?= base_url("Company/companyTypeViewDetails")?>',
            data:{id:id},
            success:function (res) {
                if(res!=false){
                    $('#loadCompanyTypeDetailsView').html(res);
                    // $("#dname").html(res.distname);
                }
            }
        });
    }
</script>
