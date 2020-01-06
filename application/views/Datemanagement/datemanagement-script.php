<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
		$(document).ready(function() {
			load_date_type();
			$("#txtDate").datepicker({
				dateFormat:'dd-mm-yy',
				changeMonth: true,
				changeYear:true,
				numberOfMonths: 1,
				showAnim: "slideDown",
				// yearRange: '1980:2002'
				yearRange: "-35:+0"
			}).datepicker("show");
		});
	$("#frmDateManagement").submit(function(e){
        e.preventDefault();
        var frm = $("#frmDateManagement").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('Datemanagement/action')?>",
            data:frm,
            success:function(data){
                if(data!=false){
                    var jsondata= JSON.parse(data);
                    if(jsondata.flag==0){
                        duplicate_entries();
                    }else{
                        if($('#manageDate').html()=='Create'){
                            successfull_entries();
                            reportFunction(1);
                            $("#frmDateManagement").trigger("reset");
                        }else if($('#manageDate').html()=='Update'){
                            $('#createYear').html('Create');
                            successfully_updates();
                            reportFunction(2);
                            $("#frmDateManagement").trigger("reset");
                            $('#txtid').val(0);
                        }
                    }
                }
            }
        });
    });
    function loadAjaxForReport(id){
        $.ajax({
            type:'post',
            url:"<?= base_url('Year/report_year')?>",
            data:{checkparams:id},
            success:function(data){
                if(data!=false){
                    jsondata = JSON.parse(data);
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
                        var year = jsondata[i].year;
                        var updatedid = '"<?= $cname ?>"';
                        var urlid = '"../Common/record_active_deactive"';
                        if(checkIsactive=='t'){
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
                        }else{
                            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
                        }
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].year+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditYear(" +checkId+ "," +year+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='yearDetailsView(" +checkId+ ")' data-toggle='modal' data-target='#yearDetails'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_year").html(html);
                }
            }
        });
    }
    function reportEditYear(id,year,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#year').val(year);
        $('#isactive').val(isactiveval);
        $('#year').focus();
        $("#createYear").html('Update');
    }
    function load_date_type() {
        $.ajax({
            type:'post',
            url:'<?= base_url("Datemanagement/load_date_type")?>',
            success:function (res) {
                if(res!=false){
                	let jsondata = JSON.parse(res);
                    $('#txtDateType').html(jsondata);
                    // $("#dname").html(res.distname);
                }
            }
        });
    }
</script>
