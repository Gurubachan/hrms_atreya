<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
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
                    var jsondata = JSON.parse(data);
                    if(jsondata.flag==0){
                        duplicate_entries();
                    }else{
                        if($('#createDistrict').html()=='Create'){
                            successfull_entries();
                            reportFunction(1);
                            $("#districtname").trigger("reset");
                        }else if($('#createDistrict').html()=='Update'){
                            $('#createDistrict').html('Create');
                            successfully_updates();
                            reportFunction(2);
                            $("#districtname").trigger("reset");
                            $('#txtid').val(0);
                        }
                    }
                }else{
                    console.log(data);
                }
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
        reportFunction(2);
    });
    function loadAjaxForReport(data){
        var stateid = $('#stateid').val();
        if(stateid == ''){
            alert("Please Select a State.");
        }else{
            $.ajax({
                type:'post',
                url:"<?= base_url('District/report_district')?>",
                data:{stateid:stateid,checkparams:data},
                // crossDomain:true,
                success:function(data){
                    var jsondata = JSON.parse(data);
                    if(data!=false){
                        var j=0;
                        var z = jsondata.length;
                        // alert(z);
                        var html = "";
                        var isactive='';
                        for(var i=0; i<z; i++){
                            j++;
                            var checkId = jsondata[i].id;
                            var checkIsactive = jsondata[i].isactive;
                            var editisactive = JSON.stringify(checkIsactive);
                            var district = jsondata[i].distname;
                            var strdistrict = JSON.stringify(district);
                            var strdistrictshortname = JSON.stringify(jsondata[i].distshortname);
                            var updatedid = '"<?= $cname ?>"';
                            var urlid = '"../Common/record_active_deactive"';
                            if(checkIsactive=='t'){
                                isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                            }else{
                                isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                            }
                            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].distname+"</td><td>"+ jsondata[i].distshortname+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditDistrict(" +checkId+ "," +strdistrict+ "," +strdistrictshortname+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='districtDetailsView(" +checkId+ ")' data-toggle='modal' data-target='#districtDetials'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                        }
                        $("#load_district").html(html);
                    }
                }
            });
        }
    }
    function reportEditDistrict(id,strdistrict,strdistrictshortname,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#distname').val(strdistrict);
        $('#districtShortname').val(strdistrictshortname);
        $('#isactive').val(isactiveval);
        $('#distname').focus();
        $('#createDistrict').html('Update');
    }
    function districtDetailsView(id) {
        var stateid = $('#stateid').val();
        $.ajax({
            type:'post',
            url:'<?= base_url("District/districtViewDetails")?>',
            data:{id:id,stateid: stateid},
            success:function (res) {
                if(res!=false){
                $('#loadDistrictDetailsView').html(res);
                // $("#dname").html(res.distname);
                }
            }
        });
    }
</script>
