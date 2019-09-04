<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    // var txtid=0;
    $("#companyTypeForm").submit(function(e){
        e.preventDefault();
        var frm = $("#companyTypeForm").serialize();
        // if(txtid > 0){
        //     frm+=frm + "&txtid="+txtid;
        // }
        $.ajax({
            type:'post',
            url: "<?= base_url('Company/create_company_type')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    // if(txtid > 0){
                    //     txtid=0;
                        $("#createCompanyType").html('Create');
                    // }
                    $("#companyTypeForm").trigger("reset");
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
            url:"<?= base_url('Company/report_company_type')?>",
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
                        var companytype = jsondata[i].typename;
                        var strcompanytype = JSON.stringify(companytype);
                        var strcompanytypeshortname = JSON.stringify(jsondata[i].typeshortname);
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].typename+"</td><td>"+ jsondata[i].typeshortname+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditCompanyType(" +checkId+ "," +strcompanytype+ "," +strcompanytypeshortname+ "," +editisactive+ ")'>Edit</button></td></tr>");
                    }
                    $("#load_company_type").html(html);
                }
            }
        });
    }

    function reportEditCompanyType(id,strcompanytype,strcompanytypeshortname,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        txtid=id;
        $('#txtid').val(id);
        $('#companytypename').val(strcompanytype);
        $('#companyShortname').val(strcompanytypeshortname);
        $('#isactive').val(isactiveval);
        $('#designationname').focus();
        $("#createCompanyType").html('Update');
    }
</script>
