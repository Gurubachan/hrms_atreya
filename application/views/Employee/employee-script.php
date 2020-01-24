<script>
    $(function () {
        education('cboEducationid0');
        designation('cboDesignationid');
        designation('cboJobdesignation');
        marital_status('cboMaritalstatusid');
        gender('cboGenderid');
        state('cboPermanentstateid');
        state('cboStateid');
        load_mapping_department('cboDepartmentmappingid');
        custom_datepicker('txtDoj');
        custom_datepicker('txtDob');
        // custom_datepicker('txtFromdate');
        // custom_datepicker('txtTodate');
        custome_range_datepicker('txtFromdate','txtTodate');
    });
    var i=1;
    $("#btnAdd").click(function () {
        if(i<4){
            var v=i-1;
            var value=$("#cboEducationid"+v).val();
            education("cboEducationid"+i);
            if(value!=null){
                $("#addrow").append("    <div class=\"col-sm-2\">\n" +
                    "                                                      <div class=\"form-group\">\n" +
                    "                                                          <label for=\"employeeeducation\"\n" +
                    "                                                                 class=\"control-label mb-1\">Education<span style=\"color:red;\">*</span></label>\n" +
                    "                                                          <select id=\"cboEducationid"+i+"\" name=\"cboEducationid[]\" class=\"select\" required>\n" +
                    "                                                          </select>\n" +
                    "                                                      </div>\n" +
                    "                                                  </div>\n" +
                    "                                                  <div class=\"col-sm-3\">\n" +
                    "                                                      <div class=\"form-group\">\n" +
                    "                                                          <label for=\"employeeeducationstream\"\n" +
                    "                                                                 class=\"control-label mb-1\">Education Stream<span style=\"color:red;\">*</span></label>\n" +
                    "                                                          <input type=\"text\" id=\"txtEducationstream"+i+"\" name=\"txtEducationstream[]\" class=\"form-control\"\n" +
                    "                                                                 placeholder=\"Enter education stream\"  required>\n" +
                    "                                                      </div>\n" +
                    "                                                  </div>\n" +
                    "                                                  <div class=\"col-sm-3\">\n" +
                    "                                                      <div class=\"form-group\">\n" +
                    "                                                          <label for=\"employeeboard\" class=\"control-label mb-1\">Board</label>\n" +
                    "                                                          <input type=\"text\" id=\"txtBoard"+i+"\" name=\"txtBoard[]\" class=\"form-control\"\n" +
                    "                                                                 placeholder=\"enter Board\">\n" +
                    "                                                      </div>\n" +
                    "                                                  </div>\n" +
                    "                                                  <div class=\"col-sm-2\">\n" +
                    "                                                      <div class=\"form-group\">\n" +
                    "                                                          <label for=\"employeeregdno\" class=\"control-label mb-1\">Regd.No</label>\n" +
                    "                                                          <input type=\"text\" id=\"txtRegdno"+i+"\" name=\"txtRegdno[]\" class=\"form-control\"\n" +
                    "                                                                 placeholder=\"enter Regd.No\">\n" +
                    "                                                      </div>\n" +
                    "                                                  </div>\n" +
                    "                                                  <div class=\"col-sm-2\">\n" +
                    "                                                      <div class=\"form-group\">\n" +
                    "                                                          <label for=\"employeepercentage\" class=\"control-label mb-1\">Percentage/CGPA</label>\n" +
                    "                                                          <input type=\"text\" id=\"txtPercentage"+i+"\" name=\"txtPercentage[]\" class=\"form-control\"\n" +
                    "                                                                 placeholder=\"enter percentage\">\n" +
                    "                                                      </div>\n" +
                    "                                                  </div>");


                i++;
            }else{
                alert("Previous field cannot be blank.");
            }

        }
    });


    function sameaddress_check_uncheck(){
        if($('#txtPermanentaddress').val()=="" ) {
            $(this).focus();
            alert("Fill all the fields.");
        }else{
            if ($("#chkAddress").is(":checked")) {
                $('#txtAddress').val($('#txtPermanentaddress').val());
                $('#cboStateid').val($('#cboPermanentstateid').val());
                $('#cboDistid').val($('#cboPermanentdistid').val());
                $('#txtPincode').val($('#txtPermanentpincode').val());
                $('#txtAddress').attr('disabled', true);
                $('#cboStateid').attr('disabled', true);
                $('#cboDistid').attr('disabled', true);
                $('#txtPincode').attr('disabled', true);
            } else {
                $('#txtAddress').removeAttr('disabled',false);
                $('#cboStateid').removeAttr('disabled' ,false);
                $('#cboDistid').removeAttr('disabled' ,false);
                $('#txtPincode').removeAttr('disabled' ,false);
            }
        }

    }

    $('#chkAddress').click(function(){
        sameaddress_check_uncheck();
    })

    $('#cboPermanentstateid').change(function () {
        load_district($(this).val());
    });  $('#cboStateid').change(function () {
        load_district($(this).val());
    });

    $('#newEmployeeForm').submit(function(e){
        e.preventDefault();
        var pvil = document.getElementById('txtPermanentaddress').value;
        var pstate = document.getElementById("cboPermanentstateid");
        var ps = pstate.options[pstate.selectedIndex].text;
        var pdist = document.getElementById("cboPermanentdistid");
        var pd = pdist.options[pdist.selectedIndex].text;
        var pp = document.getElementById('txtPermanentpincode').value;
        // var paddress = pvil +","+ ps +","+ pd +","+ pp ;        //permanent address
        var paddress = "permanentaddress:"+ pvil +","+"permanentstate:"+ps+","+"permanentdistrict:"+pd+","+"permanentpincode:"+pp;
        var v = document.getElementById('txtAddress').value;
        var states = document.getElementById("cboStateid");
        var s = states.options[states.selectedIndex].text;
        var dist = document.getElementById("cboDistid");
        var d = dist.options[dist.selectedIndex].text;
        var p = document.getElementById('txtPincode').value;
        // var address = 'address:"'+ v +'","'+state:+ s +'","'dist:'"+ d +",'pin:'"+ p ;              //present address
        var address = "presentaddress:"+ v +","+"presentstate:"+s+","+"presentsistrict:"+d+","+"presentpincode:"+p;
        var frm=$('#newEmployeeForm').serialize()+'&'+$.param({ 'paddress': paddress , 'address':address });
        $.ajax({
            type:"post",
            // crossDomain:true,
            url:'<?=base_url("Employee/create_employee_basic_details")?>',
            data:frm,
            success:function(res){
                if(res!=false){
                    var jsondata= JSON.parse(res);
                    alert(red);
                    // mytoast(jsondata);
                    // if(jsondata.status == true){
                    //     $(this).trigger('reset');
                    // }
                }else{
                    console.log(data);
                }
            }
        });
    });
    
var data=0;
function employee_report(id) {
    if(id==1){
        data=1;
    }else if(id==2){
        data=1;
    }else if(id==3){
        data=3;
    }
    $.ajax({
        type:'post',
        url:'<?=base_url("Employee/employee_report")?>',
        data:{checkparams:data},
        success:function (res) {
            if(res!=false){
                var jsondata = JSON.parse(res);
                alert(res);
            }
        }

    });
}


















    //$("#newEmployeeForm").submit(function(e){
    //    $('#toggle_new_employee').show();
    //    e.preventDefault();
    //    var frm = $("#newEmployeeForm").serialize();
    //    $.ajax({
    //        type:'post',
    //        url:"<?//= base_url('Employee/create_employee')?>//",
    //        crossDomain:true,
    //        data:frm,
    //        success:function(data){
    //            if(data!=false){
    //                var josndata = JSON.parse(data);
    //                if($('#createNewEmployee').html()=='Update'){
    //                    // window.location.reload();
    //                    $('#newEmployeeForm').trigger('reset');
    //                    reportFunction(2);
    //                }else{
    //                    reportFunction(1);
    //                    $('#newEmployeeForm').trigger('reset');
    //                }
    //            }
    //        }
    //    });
    //});
    //function loadAjaxForReport(id){
    //    $('#toggle_new_employee').show();
    //    $.ajax({
    //        type:'post',
    //        url:"<?//= base_url('Employee/report_temp_employee')?>//",
    //        data:{checkparams:id},
    //        crossDomain:true,
    //        success:function(data){
    //            if(data!=false){
    //                var jsondata = JSON.parse(data);
    //                var j=0;
    //                var z = jsondata.length;
    //                var html = "";
    //                var isactive='';
    //                var isattendance='';
    //                for(var i=0; i<z; i++){
    //                    j++;
    //                    var checkId = jsondata[i].id;
    //                    var checkIsactive = jsondata[i].isactive;
    //                    var checkIsattendance = jsondata[i].isattendance;
    //                    var editisattendance = JSON.stringify(checkIsattendance);
    //                    var editisactive = JSON.stringify(checkIsactive);
    //                    var updatedid = '"<?//= $cname ?>//"';
    //                    var urlid = '"../Common/record_active_deactive"';
    //                    var strfname =  JSON.stringify(jsondata[i].fname);
    //                    var strmname =  JSON.stringify(jsondata[i].mname);
    //                    var strlname =  JSON.stringify(jsondata[i].lname);
    //                    var stremailid =  JSON.stringify(jsondata[i].emailid);
    //                    var strfathername =  JSON.stringify(jsondata[i].fathername);
    //                    var strmothername =  JSON.stringify(jsondata[i].mothername);
    //                    var strspoucsename =  JSON.stringify(jsondata[i].spousename);
    //                    var straddress =  JSON.stringify(jsondata[i].address);
    //                    var strepf = JSON.stringify(jsondata[i].epfno);
    //                    var strpan = JSON.stringify(jsondata[i].panno);
    //                    var strempid = JSON.stringify(jsondata[i].empid);
    //                    var strdoj = JSON.stringify(jsondata[i].doj);
    //                    var strdol = JSON.stringify(jsondata[i].dol);
    //                    var strdob = JSON.stringify(jsondata[i].dob);
    //                    var stateid = jsondata[i].stateid;
    //                    if(checkIsactive=='t'){
    //                        isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
    //                    }else{
    //                        isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
    //                    }
    //                    if(checkIsattendance=='t'){
    //                        isattendance= "<button id='action"+checkId+"' onclick='editIsattendance(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
    //                    }else{
    //                        isattendance= "<button id='action"+checkId+"' onclick='editIsattendance(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
    //                    }
    //                    html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].slno+"</td><td>"+ jsondata[i].empid+"</td><td>"+ jsondata[i].designationname+"</td><td>"+ jsondata[i].fname+" "+jsondata[i].mname+" "+jsondata[i].lname+"</td>" +
    //                        "<td>"+ jsondata[i].gendername+"</td><td>"+ jsondata[i].dob+"</td><td>"+ jsondata[i].maritalstatusname+"</td><td>"+ jsondata[i].doj+"</td><td>"+ jsondata[i].dol+"</td><td>"+ jsondata[i].fathername+"</td><td>"+ jsondata[i].mothername+"</td>" +
    //                        "<td>"+ jsondata[i].spousename+"</td><td>"+ jsondata[i].address+"</td><td>"+ jsondata[i].emailid+"</td><td>"+ jsondata[i].mobile+"</td><td>"+ jsondata[i].statename+"</td><td>"+ jsondata[i].distname+"</td><td>"+ jsondata[i].educationname+"</td>" +
    //                        "<td>"+ jsondata[i].epfno+"</td><td>"+ jsondata[i].esifno+"</td><td>"+ jsondata[i].aadharno+"</td><td>"+ jsondata[i].panno+"</td><td>"+isactive+"</td><td>"+isattendance+"</td><td><button class='btn editBtn btn-sm' " +
    //                        "onclick='reportEditEmployee(" +checkId+ ","+jsondata[i].slno+","+strempid+","+jsondata[i].departmentmappingid+","+jsondata[i].designationid+","+strdoj+","+strdol+","+strfname+","+strmname+","+strlname+","+jsondata[i].genderid+","+jsondata[i].mobile+"," +
    //                        ""+stremailid+","+strfathername+","+strmothername+","+jsondata[i].maritalstatusid+","+strspoucsename+","+jsondata[i].educationid+","+straddress+","+strdob+","+strepf+","+jsondata[i].esifno+","+jsondata[i].aadharno+","+strpan+","+jsondata[i].distid+","+stateid+","+editisactive+ ","+editisattendance+")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
    //                }
    //                $("#load_employeess").html(html);
    //            }
    //        }
    //    });
    //}
    //function reportEditEmployee(id,slno,strempid,departmentmappingid,designationid,strdoj,strdol,strfname,strmname,strlname,
    //                            genderid,mobile,stremailid,strfathername,strmothername,maritalstatusid,
    //                            strspoucsename,educationid,straddress,strdob,strepf,esifno,aadharno,strpan,distid,stateid,isactive,isattendance) {
    //    if(isactive=='t'){
    //        var isactiveval=1;
    //    }else{
    //        isactiveval=0;
    //    }
    //    if(isattendance=='t'){
    //        var attendanceval=1;
    //    }else{
    //        attendanceval=0;
    //    }
    //    $('#txtid').val(id);
    //    $('#slno').val(slno);
    //    $('#empid').val(strempid);
    //    $('#departmentmappingid').val(departmentmappingid);
    //    $('#designationid').val(designationid);
    //    $('#doj').val(strdoj);
    //    $('#dol').val(strdol);
    //    $('#fname').val(strfname);
    //    $('#mname').val(strmname);
    //    $('#lname').val(strlname);
    //    $('#genderid').val(genderid);
    //    $('#mobile').val(mobile);
    //    $('#emailid').val(stremailid);
    //    $('#fathername').val(strfathername);
    //    $('#mothername').val(strmothername);
    //    $('#maritalstatusid').val(maritalstatusid);
    //    $('#spousename').val(strspoucsename);
    //    $('#educationid').val(educationid);
    //    $('#address').val(straddress);
    //    $('#dob').val(strdob);
    //    $('#epfno').val(strepf);
    //    $('#esifno').val(esifno);
    //    $('#aadharno').val(aadharno);
    //    $('#panno').val(strpan);
    //    $('#distid').val(distid);
    //    $("#stateid").val(stateid).change();
    //    dist=distid;
    //    $('#isactive').val(isactiveval);
    //    $('#isattendance').val(attendanceval);
    //    $('#slno').focus();
    //    $("#createNewEmployee").html("Update");
    //
    //}
</script>