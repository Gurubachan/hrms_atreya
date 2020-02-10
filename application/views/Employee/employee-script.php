<script>
    $(function () {
        education('cboEducationid0');
        education('cboUploadEducationid0');
        designation('cboDesignationid');
        designation('cboJobdesignation0');
        marital_status('cboMaritalstatusid');
        gender('cboGenderid');
        state('cboPermanentStateid');
        state('cboPresentStateid');
        load_mapping_department('cboDepartmentmappingid');
        custom_datepicker('txtDoj');
        custom_datepicker('txtDob');
        custome_range_datepicker('txtFromdate0','txtTodate0');
        load_banklist('cboUploadBankid');
        documenttype('cboDocumentTypes0');
        // report_basic();
        lowerToUpper('txtIFSCCode');
    });


    function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img=document.getElementById("thumbnil");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function(aImg) {
                return function(e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
    $("#cboMaritalstatusid").change(function () {
        var marital_status_id = $('#cboMaritalstatusid').val();
        if(marital_status_id == 2){
            $("#txtSpousename").val("").attr({'disabled':true,'placeholder':'Spouse name disabled'});
        }else{
            $("#txtSpousename").val("").attr({'disabled':false,'placeholder':'Enter spouse name'});
        }
    });
    var i=1;
    $("#btnAdd").click(function () {
        if(i<4){
            var v=i-1;
            var value=$("#cboEducationid"+v).val();
            education("cboEducationid"+i);
            if(value!=''){
                $("#addrow").append("    <div class=\"col-sm-2\">\n" +
                    "                                                      <div class=\"form-group\">\n" +
                    "                                                          <label for=\"employeeeducation\"\n" +
                    "                                                                 class=\"control-label mb-1\">Education<span style=\"color:red;\">*</span></label>\n" +
                    "                                                          <select id=\"cboEducationid"+i+"\" name=\"cboEducationid[]\" class=\"select\" title=\"Select education\" required>\n" +
                    "                                                          </select>\n" +
                    "                                                      </div>\n" +
                    "                                                  </div>\n" +
                    "                                                  <div class=\"col-sm-2\">\n" +
                    "                                                      <div class=\"form-group\">\n" +
                    "                                                          <label for=\"employeeeducationstream\"\n" +
                    "                                                                 class=\"control-label mb-1\">Stream<span style=\"color:red;\">*</span></label>\n" +
                    "                                                          <input type=\"text\" id=\"txtEducationstream"+i+"\" name=\"txtEducationstream[]\" class=\"form-control\"\n" +
                    "                                                                 placeholder=\"Enter education stream\" title=\"only charachters are allowed\" onclick=\"charachters_validate('txtEducationstream"+i+"')\"  required >\n" +
                    "                                                      </div>\n" +
                    "                                                  </div>\n" +
                    "                                                  <div class=\"col-sm-2\">\n" +
                    "                                                      <div class=\"form-group\">\n" +
                    "                                                          <label for=\"employeeboard\" class=\"control-label mb-1\">Board</label>\n" +
                    "                                                          <input type=\"text\" id=\"txtBoard"+i+"\" name=\"txtBoard[]\" class=\"form-control\"\n" +
                    "                                                               onclick=\" charachters_validate('txtBoard"+i+"')\" title=\"only characters are allowed\"  placeholder=\"enter Board\">\n" +
                    "                                                      </div>\n" +
                    "                                                  </div>\n" +
                    "                                                  <div class=\"col-sm-2\">\n" +
                    "                                                      <div class=\"form-group\">\n" +
                    "                                                          <label for=\"employeeregdno\" class=\"control-label mb-1\">Regd.No</label>\n" +
                    "                                                          <input type=\"text\" id=\"txtRegdno"+i+"\" name=\"txtRegdno[]\" class=\"form-control\"\n" +
                    "                                                               onclick=\" alfa_numeric('txtRegdno"+i+"')\"  placeholder=\"enter Regd.No\" title=\"only characters and numbers are allowed\"> \n" +
                    "                                                      </div>\n" +
                    "                                                  </div>\n" +
                    "                                                  <div class=\"col-sm-2\">\n" +
                    "                                                      <div class=\"form-group\">\n" +
                    "                                                          <label for=\"employeepercentage\" class=\"control-label mb-1\">Percentage/CGPA</label>\n" +
                    "                                                          <input type=\"text\" id=\"txtPercentage"+i+"\" name=\"txtPercentage[]\" class=\"form-control\"\n" +
                    "                                                               onclick=\"number_validate('txtPercentage"+i+"')\" title=\"only numbers are allowed\"  placeholder=\"enter percentage\">\n" +
                    "                                                      </div>\n" +
                    "                                                  </div>" +
                    "                                                 <div class=\"col-sm-2\">\n" +
                    "                                                 <div class=\"form-group\">\n" +
                    "                                                     <label for=\"employeeeducationsuploaddoc\"\n" +
                    "                                                            class=\"control-label mb-1\">Upload Doc's<span style=\"color:red;\">*</span></label>\n" +
                    "                                                     <input type=\"file\" id=\"fileCertificate"+i+"\" name=\"fileCertificate"+i+"\" class=\"form-control\" placeholder=\"Enter education stream\" title=\"only pdf format allowed and  max size 1mb\" required>\n" +
                    "                                                 </div>\n" +
                    "                                             </div>");


                i++;
            }else{
                alert("Previous field cannot be blank.");
            }

        }
    });
    var j=1;
    $("#btnAddExperience").click(function () {
        if(j<4){
            let v=j-1;
            let txt_value=$("#cboCompanyname"+v).val();
            designation('cboJobdesignation'+j);
            if(txt_value != ''){
                $("#addExperience").append("  <div class=\"col-sm-3 rowid"+j+"\">\n" +
                "                                             <div class=\"form-group\">\n" +
                "                                                 <label for=\"\" class=\"control-label mb-1\">Company Name<span style=\"color:red;\">*</span></label>\n" +
                "                                                 <input type=\"text\" id=\"cboCompanyname"+j+"\" name=\"cboCompanyname[]\" class=\"form-control\" onclick=\"only_characters_numbers_dot_highfen_slash('cboCompanyname"+j+"')\" placeholder=\"enter previous company name\" required title=\"Only characters and numbers are allowed\">\n" +
                "                                             </div>\n" +
                    "                                         </div>\n" +
                    "                                         <div class=\"col-sm-2 rowid"+j+"\">\n" +
                    "                                             <div class=\"form-group\">\n" +
                    "                                                 <label for=\"\" class=\"control-label mb-1\">Designation<span style=\"color:red;\">*</span></label>\n" +
                    "                                                 <select id=\"cboJobdesignation"+j+"\" name=\"cboJobdesignation[]\" class=\"select\" required title=\"Select a designation\">\n" +
                    "                                                 </select>\n" +
                    "                                             </div>\n" +
                    "                                         </div>\n" +
                    "                                         <div class=\"col-sm-3 rowid"+j+"\">\n" +
                    "                                             <div class=\"form-group\">\n" +
                    "                                                 <label for=\"employeejobrole\" class=\"control-label mb-1\">Role<span style=\"color:red;\">*</span></label>\n" +
                    "                                                 <input type=\"text\" id=\"txtJobrole"+j+"\" name=\"txtJobrole[]\" class=\"form-control\" onclick=\" only_characters_numbers_dot_highfen_slash('txtJobrole"+j+"')\" placeholder=\"enter job role\" required title=\"Only characters and numbers allowed\">\n" +
                    "                                             </div>\n" +
                    "                                         </div>\n" +
                    "                                         <div class=\"col-sm-2 rowid"+j+"\">\n" +
                    "                                             <div class=\"form-group\">\n" +
                    "                                                 <label for=\"employeefromdate\" class=\"control-label mb-1\">From Date<span style=\"color:red;\">*</span></label>\n" +
                    "                                                 <input type=\"text\" id=\"txtFromdate"+j+"\" name=\"txtFromdate[]\" class=\"form-control\" placeholder=\"dd-mm-yyyy\" required title=\"Select joining date\">\n" +
                    "                                             </div>\n" +
                    "                                         </div>\n" +
                    "                                         <div class=\"col-sm-2 rowid"+j+"\">\n" +
                    "                                             <div class=\"form-group\">\n" +
                    "                                                 <label for=\"employeetodate\" class=\"control-label mb-1\">To Date<span style=\"color:red;\">*</span></label>\n" +
                    "                                                 <input type=\"text\" id=\"txtTodate"+j+"\" name=\"txtTodate[]\" class=\"form-control\" placeholder=\"dd-mm-yyyy\" title=\"Select leaving date\">\n" +
                    "                                             </div>\n" +
                    "                                         </div>");
                custome_range_datepicker("txtFromdate"+j,"txtTodate"+j);
                j++;

            }else{
                alert("Previous field cannot be blank.");
            }

        }
    });
    // $("#btnRemoveExperience").click(function () {
    //     $i = 0;
    //
    // })
    var m=1;
    $("#btnADocdd").click(function () {
        if(m<10){
            let v = m-1;
            let txt_value=$("#cboDocumentTypes"+v).val();
            documenttype('cboDocumentTypes'+m);
            if(txt_value != ''){
                $("#addMoreDocuments").append("<div class=\"offset-1 col-sm-3\">\n" +
                    "                                                    <div class=\"form-group\">\n" +
                    "                                                        <label for=\"emploayee_identification_details\" class=\"control-label mb-1\">Document Type</label>\n" +
                    "                                                        <select id=\"cboDocumentTypes"+m+"\" name=\"cboDocumentType[]\" class=\"select\" title=\"select document type\">\n" +
                    "                                                        </select>\n" +
                    "                                                    </div>\n" +
                    "                                                </div>\n" +
                    "                                                <div class=\"col-sm-3\">\n" +
                    "                                                    <div class=\"form-group\">\n" +
                    "                                                        <label for=\"cirtificate_number\" class=\"control-label mb-1\">Document Number</label>\n" +
                    "                                                        <input type=\"text\" id=\"txtDocIdentificationNumber"+m+"\" name=\"txtDocIdentificationNumber[]\" class=\"form-control\"\n" +
                    "                                                               onclick=\" alfa_numeric('txtDocNumber"+m+"')\"   placeholder=\"Enter Number\" title=\"only numbers are allowed\">\n" +
                    "                                                    </div>\n" +
                    "                                                </div>\n" +
                    "                                                <div class=\"col-sm-3\">\n" +
                    "                                                    <div class=\"form-group\">\n" +
                    "                                                        <label for=\"employeeeBeneficiaryName\"\n" +
                    "                                                               class=\"control-label mb-1\">Upload Documents<span style=\"color:red;\">*</span></label>\n" +
                    "                                                        <input type=\"file\" id=\"fileUploadIdentification"+m+"\" name=\"fileUploadIdentification"+m+"\" class=\"form-control\"\n" +
                    "                                                               onclick=\" charachters_validate('txtBenificialryName"+m+"')\" placeholder=\"Enter Benificiary name\" title=\"only pdf format is allowed\">\n" +
                    "                                                    </div>\n" +
                    "                                                </div>");
                m++;

            }else{
                alert("Previous field cannot be blank.");
            }

        }
    });
    // $("#btnRemoveExperience").click(function () {
    //     $i = 0;
    //
    // })
    $('#chkAddress').click(function(){

        if ($(this).prop("checked")) {
            var permanent_address = $('#txtPermanentAddress').val();
            var permanent_stat = $('#cboPermanentStateid').val();
            var permanent_dist = $('#cboPermanentDistid').val();
            var permanent_pin = $('#txtPermanentPincode').val();
            $('#txtPresentAddress').val(permanent_address).attr('disabled', true);
            $('#cboPresentStateid').val(permanent_stat).attr('disabled', true);
            $('#cboPresentStateid').trigger('change',myFunction());
            function myFunction() {
                setTimeout(function(){ $('#cboPresentDistid').val(permanent_dist).attr('disabled', true); }, 200);
            }

            $('#txtPresentPincode').val(permanent_pin).attr('disabled', true);
        }else{
            $('#txtPresentAddress').val("").attr('disabled', false);
            $('#cboPresentStateid').val("").attr('disabled', false);
            $('#cboPresentDistid').val("").attr('disabled', false);
            $('#txtPresentPincode').val("").attr('disabled', false);
        }
    });
    $('#cboPermanentStateid').change(function () {
        load_district($(this).val(),'cboPermanentDistid');

    });
    $('#cboPresentStateid').change(function () {
        load_district($(this).val(),'cboPresentDistid');
    });
    var data=0;
    function employee_report(id,formid) {
    if(id==1){
        data=1;
    }else if(id==2){
        data=2;
    }else if(id==3){
        data=3;
    }else if(id==4){
        data=4;
    }else if(id==5){
        data=5;
    }
    if(formid == 1) {
        report_emp_basic(data);
    }else if(formid == 2){
        report_emp_communication(data);
    }else if(formid == 3){
        report_emp_experience(data);
    }else if(formid == 4){
        report_emp_qualification(data);
    }else if(formid == 5){
        report_emp_document_uploads(data);
    }else if(formid == 6){
        report_emp_bankdetails(data);
    }
}
    $("#basic").submit(function (e) {
    e.preventDefault();
    var frm = $(this).serialize();
    $.ajax({
            type:"post",
            // crossDomain:true,
            url:'<?=base_url("Employee/create_employee_basic_details")?>',
            data:frm,
            success:function(resp) {
                var jsondata = JSON.parse(resp);
                  if(jsondata.status==true){
                      var txt_communication_id_val = $('#txtidCommunication').val(jsondata.empid);
                      mytoast(jsondata);
                      $('#communicationtabbar').removeClass('disabled');
                      $('#experiencetabbar').removeClass('disabled');
                      $('#qualificationtabbar').removeClass('disabled');
                      $('#documentationtabbar').removeClass('disabled');
                      $('#bankdetailstabbar').removeClass('disabled');
                      if(txt_communication_id_val!=null){
                          // $('#basic').trigger('reset');
                          $('.nav-tabs > .active').next().trigger('click');
                          $("#basictabbar").removeClass('active');
                          $("#communicationtabbar").addClass('active');

                          //value set for all the tab
                          $("#txtid").val(jsondata.empid);
                          $("#txtidExperience").val(jsondata.empid);
                          $("#txtidQualification").val(jsondata.empid);
                          $("#txtidUploadDocument").val(jsondata.empid);
                          $("#txtidUploadBankDetails").val(jsondata.empid);
                      }else{
                          alert('Unable to load Communication Tab');
                      }
                  }else{
                      mytoast(jsondata);
                  }
                }
            });
        });
    $("#communication").submit(function (e) {
        e.preventDefault();
        var present_address="";
        var permanent_village = document.getElementById('txtPermanentAddress').value;
        var permanent_stateid = document.getElementById("cboPermanentStateid");
        var permanent_state = permanent_stateid.options[permanent_stateid.selectedIndex].text;
        var permanent_distid = document.getElementById("cboPermanentDistid");
        var permanent_district = permanent_distid.options[permanent_distid.selectedIndex].text;
        var permanent_pincode = document.getElementById('txtPermanentPincode').value;
        // var permanent_address = "permanentaddress:"+ permanent_village +","+"permanentstate:"+permanent_state+","+"permanentdistrict:"+permanent_district+","+"permanentpincode:"+permanent_pincode;
        var permanent_address = permanent_village +","+permanent_state+","+permanent_district+","+permanent_pincode;
        var present_village = document.getElementById('txtPresentAddress').value;
        var present_stateid = document.getElementById("cboPresentStateid");
        var present_state_select = present_stateid.options[present_stateid.selectedIndex].text;

        var present_distid = document.getElementById("cboPresentDistid");
        var present_district_select = present_distid.options[present_distid.selectedIndex].text;
        var present_pincode = document.getElementById('txtPresentPincode').value;
        if(present_village==""){
            present_address="";
        }else{
             present_address = present_village+","+present_state_select+","+present_district_select+","+present_pincode;
        }
        var frm=$('#communication').serialize()+'&'+$.param({ 'permanent_address': permanent_address , 'present_address':present_address });
            $.ajax({
                type:"post",
                // crossDomain:true,
                url:'<?=base_url("Employee/create_employee_communication")?>',
                data:frm,
                success:function(res){
                    var jsondata = JSON.parse(res);
                    if(jsondata.status==true){
                        mytoast(jsondata);
                        report_current_emp_communication();
                        // $('#experiencetabbar').removeClass('disabled');
                        let txt_experience_id_val = $("#txtidExperience").val(jsondata.empid);

                        if(txt_experience_id_val!=null){
                            $('#communication').trigger('reset');
                            $('.nav-tabs > .active').next().trigger('click');
                            $("#communicationtabbar").removeClass('active');
                            $("#experiencetabbar").addClass('active');
                            // $("#txtidExperiences").val(jsondata.empid);
                        }else{
                            alert('Unalble to load Experience tab');
                        }
                    }else{
                        mytoast(jsondata);
                    }
                }
            });
        });
    $("#experience").submit(function (e) {
        e.preventDefault();
        var frm = $(this).serialize();
        $.ajax({
            type:"post",
            // crossDomain:true,
            url:'<?=base_url("Employee/create_employee_experience")?>',
            data:frm,
            success:function(res){
                var jsondata = JSON.parse(res);
                if(jsondata.status==true){
                    mytoast(jsondata);
                    report_current_emp_experience();
                    // $('#qualificationtabbar').removeClass('disabled');
                    let txt_experience_id_val = $("#txtidQualification").val(jsondata.empid);
                    if(txt_experience_id_val!=null) {
                        $('#experience').trigger('reset');
                        $('.nav-tabs > .active').next().trigger('click');
                        $("#experiencetabbar").removeClass('active');
                        $("#qualificationtabbar").addClass('active');
                    }else{
                        alert("unable to lo Qualification Tab");
                    }
                }else{
                    mytoast(jsondata);
                }
            }
        });
    });
    $("#qualification").submit(function (e) {
        e.preventDefault();
        // var frm = $(this).serialize();
        $.ajax({
            type:"post",
            // crossDomain:true,
            url:'<?=base_url("Employee/create_employee_qualification")?>',
            // data:frm,
            data:new FormData(this),
            dataType:'json',
            contentType: false,
            cache: false,
            processData:false,
            success:function(res){
                if(res.status==true){
                    mytoast(res);
                    report_current_emp_qualification();
                    // $('#documentationtabbar').removeClass('disabled');
                    let txt_qualification_id_val = $("#txtidUploadDocument").val(res.empid);
                    if(txt_qualification_id_val!=null) {
                        $('#qualification').trigger('reset');
                        $('.nav-tabs > .active').next().trigger('click');
                        $("#qualificationtabbar").removeClass('active');
                        $("#documentationtabbar").addClass('active');
                    }else{
                        alert("unable to lo Qualification Tab");
                    }
                }else{
                    mytoast(jsondata);
                }
            }
        });
    });
    $("#upload_document_details").submit(function (e) {
        e.preventDefault();
        var frm = $(this).serialize();
        $.ajax({
            type:"post",
            // crossDomain:true,
            url:'<?=base_url("Employee/create_employee_upload_documnet_details")?>',
            // data:frm,
            data:new FormData(this),
            dataType:'json',
            contentType: false,
            cache: false,
            processData:false,
            success:function(jsondata){
                if(jsondata.status==true){
                    mytoast(jsondata);
                    report_current_emp_document_uploads();
                    // $('#bankdetailstabbar').removeClass('disabled');
                    let txt_documentsid_val = $("#txtidUploadBankDetails").val(jsondata.empid);
                    if(txt_documentsid_val!=null) {
                        $('#upload_document_details').trigger('reset');
                        $('.nav-tabs > .active').next().trigger('click');
                        $("#documentationtabbar").removeClass('active');
                        $("#bankdetailstabbar").addClass('active');
                    }else{
                        alert("unable to lo Qualification Tab");
                    }
                }else{
                    mytoast(jsondata);
                }
            }
        });
    });
    $("#upload_bank_details").submit(function (e) {
        e.preventDefault();
        var frm = $(this).serialize();
        $.ajax({
            type:"post",
            // crossDomain:true,
            url:'<?=base_url("Employee/create_employee_bank_details")?>',
            // data:frm,
            data:new FormData(this),
            dataType:'json',
            contentType: false,
            cache: false,
            processData:false,
            success:function(jsondata){
                if(jsondata.status==true){
                    mytoast(jsondata);
                    report_current_emp_bankdetails();
                    let txt_bankdocumentsid_val = $("#txtidUploadBankDetails").val(jsondata.empid);
                    if(txt_bankdocumentsid_val != null) {
                        // $('.nav-tabs > .active').next().trigger('click');
                        // $("#qualificationtabbar").removeClass('active');
                        // $("#documentationtabbar").addClass('active');
                        alert('Successfully inserted');
                        $('#communication').trigger('reset');
                        $('#basic').trigger('reset');
                        $('#experience').trigger('reset');
                        $('#qualification').trigger('reset');
                        $('#upload_document_details').trigger('reset');
                        $('#upload_bank_details').trigger('reset');
                        loadFormNewEmployee();
                    }else{
                        alert("unable to lo Qualification Tab");
                    }
                }else{
                    mytoast(jsondata);
                }
            }
        });
    });

    function report_emp_basic(id){
         $.ajax({
             type:'post',
             url:"<?= base_url('Employee/report_employee_basic_details')?>",
             data:{checkparams:id},
             success:function(data){
                 if(data!=false) {
                     var jsondata = JSON.parse(data);
                     var j = 0;
                     var z = jsondata.length;
                     var html = "";
                     var isactive = '';
                     var isattendance = '';
                     for (var i = 0; i < z; i++) {
                         j++;
                         html += "<tr><td>" + j + "</td><td>"+jsondata[i].empslno+"</td><td>"+jsondata[i].empname+"</td><td>"+jsondata[i].gendername+"</td><td>"+jsondata[i].empdob+"</td><td>"+jsondata[i].empdoj+"</td><td>"+jsondata[i].deptcompanyname+"</td><td>"+jsondata[i].deptname+"</td><td>"+jsondata[i].designationname+"</td></tr>";

                     }
                     $('#load_emp_basic_details').html(html);
                 }
             }
         });
     }
    //function report_emp_communication(id){
    //    $.ajax({
    //        type:'post',
    //        url:"<?//= base_url('Employee/report_employee_communication_details')?>//",
    //        data:{checkparams:id},
    //        success:function(data){
    //            if(data!=false) {
    //                var jsondata = JSON.parse(data);
    //                var j = 0;
    //                var z = jsondata.length;
    //                var html = "";
    //                var isactive = '';
    //                var isattendance = '';
    //                for (var i = 0; i < z; i++) {
    //                    j++;
    //                    html += "<tr><td>" + j + "</td><td>"+jsondata[i].empaddress+"</td><td>"+jsondata[i].emppresentaddress+"</td><td>"+jsondata[i].empcontact+"</td><td>"+jsondata[i].empaltcontact+"</td><td>"+jsondata[i].empemail+"</td></tr>";
    //
    //                }
    //                $('#load_emp_communication_details').html(html);
    //            }
    //        }
    //    });
    //}
    //function report_emp_experience(id){
    //    $.ajax({
    //        type:'post',
    //        url:"<?//= base_url('Employee/report_employee_experience_details')?>//",
    //        data:{checkparams:id},
    //        success:function(data){
    //            if(data!=false) {
    //                var jsondata = JSON.parse(data);
    //                var j = 0;
    //                var z = jsondata.length;
    //                var html = "";
    //                var isactive = '';
    //                var isattendance = '';
    //                for (var i = 0; i < z; i++) {
    //                    j++;
    //                    html += "<tr><td>" + j + "</td><td>"+jsondata[i].companyname+"</td><td>"+jsondata[i].designationname+"</td><td>"+jsondata[i].jobrole+"</td><td>"+jsondata[i].fromdate+"</td><td>"+jsondata[i].todate+"</td></tr>";
    //
    //                }
    //                $('#load_emp_experience_details').html(html);
    //            }
    //        }
    //    });
    //}
    //function report_emp_qualification(id){
    //    $.ajax({
    //        type:'post',
    //        url:"<?//= base_url('Employee/report_employee_qualification_details')?>//",
    //        data:{checkparams:id},
    //        success:function(data){
    //            if(data!=false) {
    //                var jsondata = JSON.parse(data);
    //                var j = 0;
    //                var z = jsondata.length;
    //                var html = "";
    //                var isactive = '';
    //                var isattendance = '';
    //                for (var i = 0; i < z; i++) {
    //                    j++;
    //                    html += "<tr><td>" + j + "</td><td>"+jsondata[i].educationname+"</td><td>"+jsondata[i].empedustream+"</td><td>"+jsondata[i].empeduboard+"</td><td>"+jsondata[i].empregdno+"</td><td>"+jsondata[i].emppercentage+"</td><td>"+jsondata[i].documentupload+"</td></tr>";
    //
    //                }
    //                $('#load_emp_qualification_details').html(html);
    //            }
    //        }
    //    });
    //}
    //function report_emp_document_uploads(id){
    //    $.ajax({
    //        type:'post',
    //        url:"<?//= base_url('Employee/report_employee_documents_upload_details')?>//",
    //        data:{checkparams:id},
    //        success:function(data){
    //            if(data!=false) {
    //                var jsondata = JSON.parse(data);
    //                var j = 0;
    //                var z = jsondata.length;
    //                var html = "";
    //                var isactive = '';
    //                var isattendance = '';
    //                for (var i = 0; i < z; i++) {
    //                    j++;
    //                    html += "<tr><td>" + j + "</td><td>"+jsondata[i].documenttypename+"</td><td>"+jsondata[i].documentnumber+"</td><td>"+jsondata[i].documentupload+"</td></tr>";
    //
    //                }
    //                $('#load_emp_identification_details').html(html);
    //            }
    //        }
    //    });
    //}
    //function report_emp_bankdetails(id){
    //    $.ajax({
    //        type:'post',
    //        url:"<?//= base_url('Employee/report_employee_bank_details')?>//",
    //        data:{checkparams:id},
    //        success:function(data){
    //            if(data!=false) {
    //                var jsondata = JSON.parse(data);
    //                var j = 0;
    //                var z = jsondata.length;
    //                var html = "";
    //                var isactive = '';
    //                var isattendance = '';
    //                for (var i = 0; i < z; i++) {
    //                    j++;
    //                    html += "<tr><td>" + j + "</td><td>"+jsondata[i].bankname+"</td><td>"+jsondata[i].acno+"</td><td>"+jsondata[i].ifsccode+"</td><td>"+jsondata[i].documentupload+"</td></tr>";
    //                }
    //                $('#load_emp_bank_details').html(html);
    //            }
    //        }
    //    });
    //}

    function report_current_emp_communication(){
        var id = $('#txtid').val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_communication_details')?>",
            data:{checkparams:id},
            success:function(data){
                if(data!=false) {
                    var jsondata = JSON.parse(data);
                    var j = 0;
                    var z = jsondata.length;
                    var html = "";
                    var isactive = '';
                    var isattendance = '';
                    for (var i = 0; i < z; i++) {
                        j++;
                        html += "<tr><td>" + j + "</td><td>"+jsondata[i].empaddress+"</td><td>"+jsondata[i].emppresentaddress+"</td><td>"+jsondata[i].empcontact+"</td><td>"+jsondata[i].empaltcontact+"</td><td>"+jsondata[i].empemail+"</td></tr>";

                    }
                    $('#load_emp_communication_details').html(html);
                }
            }
        });
    }
    function report_current_emp_experience(){
        var id = $('#txtid').val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_experience_details')?>",
            data:{checkparams:id},
            success:function(data){
                if(data!=false) {
                    var jsondata = JSON.parse(data);
                    var j = 0;
                    var z = jsondata.length;
                    var html = "";
                    var isactive = '';
                    var isattendance = '';
                    for (var i = 0; i < z; i++) {
                        j++;
                        html += "<tr><td>" + j + "</td><td>"+jsondata[i].companyname+"</td><td>"+jsondata[i].designationname+"</td><td>"+jsondata[i].jobrole+"</td><td>"+jsondata[i].fromdate+"</td><td>"+jsondata[i].todate+"</td></tr>";

                    }
                    $('#load_emp_experience_details').html(html);
                }
            }
        });
    }
    function report_current_emp_qualification(){
        var id = $('#txtid').val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_qualification_details')?>",
            data:{checkparams:id},
            success:function(data){
                if(data!=false) {
                    var jsondata = JSON.parse(data);
                    var j = 0;
                    var z = jsondata.length;
                    var html = "";
                    var isactive = '';
                    var isattendance = '';
                    for (var i = 0; i < z; i++) {
                        j++;
                        html += "<tr><td>" + j + "</td><td>"+jsondata[i].educationname+"</td><td>"+jsondata[i].empedustream+"</td><td>"+jsondata[i].empeduboard+"</td><td>"+jsondata[i].empregdno+"</td><td>"+jsondata[i].emppercentage+"</td><td>"+jsondata[i].documentupload+"</td></tr>";

                    }
                    $('#load_emp_qualification_details').html(html);
                }
            }
        });
    }
    function report_current_emp_document_uploads(){
        var id = $('#txtid').val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_documents_upload_details')?>",
            data:{checkparams:id},
            success:function(data){
                if(data!=false) {
                    var jsondata = JSON.parse(data);
                    var j = 0;
                    var z = jsondata.length;
                    var html = "";
                    var isactive = '';
                    var isattendance = '';
                    for (var i = 0; i < z; i++) {
                        j++;
                        html += "<tr><td>" + j + "</td><td>"+jsondata[i].documenttypename+"</td><td>"+jsondata[i].documentnumber+"</td><td>"+jsondata[i].documentupload+"</td></tr>";

                    }
                    $('#load_emp_identification_details').html(html);
                }
            }
        });
    }
    function report_current_emp_bankdetails(){
        var id = $('#txtid').val();
        $.ajax({
            type:'post',
            url:"<?= base_url('Employee/report_employee_bank_details')?>",
            data:{checkparams:id},
            success:function(data){
                if(data!=false) {
                    var jsondata = JSON.parse(data);
                    var j = 0;
                    var z = jsondata.length;
                    var html = "";
                    var isactive = '';
                    var isattendance = '';
                    for (var i = 0; i < z; i++) {
                        j++;
                        html += "<tr><td>" + j + "</td><td>"+jsondata[i].bankname+"</td><td>"+jsondata[i].acno+"</td><td>"+jsondata[i].ifsccode+"</td><td>"+jsondata[i].documentupload+"</td></tr>";
                    }
                    $('#load_emp_bank_details').html(html);
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