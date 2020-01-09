<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
	$(function () {
		custom_datepicker('attendance_date');
		load_employee_attendance();
		checkTimeInOut();
	});
	// $('#timeIn').click(function (){
	// 	alert('hi');
	// 	$('#showTimeIn').timepicker('setTime', new Date());
	// });
	function checkEmpTime(id,timecheck) {
		// $("#timeIn"+id).click(function () {
		// $("#timeOut"+id).prop("disabled",true);
		let status;
		if(timecheck == 0){
			status =0;
		}else{
			status =1;
		}
		if ($("input[type=checkbox]").is(":checked")) {
			$.ajax({
				type:'post',
				url:'<?=base_url("Attendance/employeeAttendanceSheet")?>',
				data:{empid:id,status:status},
				success:function (e) {
					if(e!=false){
						let jsondata = JSON.parse(e);
						$("#timeIn"+id).prop("disabled",true);
						$("#timeOut"+id).prop("disabled",false);
					}
				}
			});
		}
		// });
	}
	function timeout(id,timecheck) {
		// $("#timeIn"+id).click(function () {
		if ($("input[type=checkbox]").is(":checked")) {
			$.ajax({
				type:'post',
				url:'<?=base_url("Datemanagement/employeeAttendanceOuttimeSheet")?>',
				data:{empid:id},
				success:function (e) {
					if(e!=false){
						let jsondata = JSON.parse(e);
						$("#timeIn"+id).prop("disabled",true);
					}
				}
			});
		}
		// });
	}
	function checkTimeInOut(){

	}
	function load_employee_attendance(){
		$.ajax({
			type:'post',
			url:'<?=base_url("Employee/load_employee_data")?>',
			success:function (e) {
				if (e != false) {
					const jsondata = JSON.parse(e);
								let html = "";
								let j = 0;
								let l = 0;
								for (let i in jsondata) {
									j++;
									let empname = jsondata[i].fname + " " + jsondata[i].mname + " " + jsondata[i].lname;
									html += "<tr><td>" + j + "</td><td>" + empname + "</td><td>" + jsondata[i].empid + "</td><td>" + jsondata[i].companyname + "</td><td>" + jsondata[i].designationname + "</td><td><input type='checkbox' id='timeIn"+jsondata[i].id+"'  onclick='checkEmpTime("+jsondata[i].id+",0)'><span id='showTimeIn'></span></td><td><input type='checkbox' id='timeOut"+jsondata[i].id+"'  onclick='checkEmpTime("+jsondata[i].id+",1)' style=' disabled = true '><span id='showTimeOut'></span></td></tr>";
								}
								$("#load_attendance_sheet").html(html);
							}
						}
					});

				}



    $("#attendanceTypeForm").submit(function(e){
        e.preventDefault();
        var frm = $("#attendanceTypeForm").serialize();
        $.ajax({
            type:'post',
            url: "<?= base_url('Attendance/create_attendance_type')?>",
            crossDomain:true,
            data:frm,
            success:function(data){
                if(data!=false){
                    var jsondata = JSON.parse(data);
                    if(jsondata.flag==0){
                        alert("Duplicate Entry");
                    }
                        $("#createAttendanceType").html('Create');
                    $("#attendanceTypeForm").trigger("reset");
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
            url:"<?= base_url('Attendance/report_attendance_type')?>",
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].typename+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditAttendanceType(" +checkId+ "," +strattendancetype+ "," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_attendance_type").html(html);
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
        $("#createAttendanceType").html('Update');
    }
</script>
