<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
    $(function () {
        load_user_type();
        load_userid();
       custom_datepicker('dob');
	});
	$(document).on("change",".uploadFile", function()
	{
		var uploadFile = $(this);
		var files = !!this.files ? this.files : [];
		if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

		if (/^image/.test( files[0].type)){ // only image file
			var reader = new FileReader(); // instance of the FileReader
			reader.readAsDataURL(files[0]); // read the local file

			reader.onloadend = function(){ // set image data as background of div
				//alert(uploadFile.closest(".upimage").find('.imagePreview').length);
				uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
			}
		}

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
    //$("#newUserForm").submit(function(e){
    //    $('#toggle_new_user').show();
    //    e.preventDefault();
    //    var frm = $("#newUserForm").serialize();
    //    // alert(frm);
    //    $.ajax({
    //        type:'post',
    //        url:"<?//= base_url('User/create_user')?>//",
    //        crossDomain:true,
    //        data:frm,
    //        success:function(data){
    //            if(data!=false){
    //                successfull_entries();
    //                var jsondata = JSON.parse(data);
    //                frm.trigger('reset');
    //                reportFunction(1);
    //            }
    //        }
    //    });
    //});
    $("#newUserForm").submit(function(e){
        $('#toggle_new_user').show();
        e.preventDefault();
        var frm = $("#newUserForm").serialize();
        // alert(frm);
        $.ajax({
            type:'post',
            url:"<?= base_url('User/create_user')?>",
            data:new FormData(this),
            dataType:'json',
            contentType: false,
            cache: false,
            processData:false,
            success:function(res){
                    if(res!=false){
                        var jsondata = JSON.parse(res);
                        mytoast(jsondata);
                        if(jsondata.status==true){
                            $("#newUserForm").trigger('reset');
                        }
                }
            }
        });
    });
  $('#uploadFile').change(function () {
      var input = document.getElementById("uploadFile");
      var fReader = new FileReader();
      fReader.readAsDataURL(input.files[0]);
      fReader.onloadend = function(event){
          var img = document.getElementById("uploadedImagePreview");
          img.src = event.target.result;
      }
      // $("#uploadFile").change(function() {
      //     $("#uploadedImagePreview").val(this.files && this.files.length ?
      //         this.files[0].name : this.value.replace(/^C:\\fakepath\\/i, ''));
      // })
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
                        var fname = jsondata[i].fname;
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
                        html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].typename+"</td><td>"+jsondata[i].username+"</td><td>"+fname+" "+mname+" "+lname+"</td>" +
                            "<td>"+ jsondata[i].emailid+"</td><td>"+ jsondata[i].mobile+"</td><td>"+ jsondata[i].dob+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' " +
							"onclick='reportEditUsertype(" +checkId+ "," +jsondata[i].usertypeid+ "," +jsondata[i].mobile+ "," +strfname+ ","+strmname+","+strlname+","+strusername+","+stremail+","+strdob+"," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='detailsView(" +checkId+ ")'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
                    }
                    $("#load_user").html(html);
                }
            }
        });
    }
    function reportEditUsertype(id,usertypeid,mobile,strfname,strmname,strlname,strusername,stremail,strdob,isactive) {
        if(isactive=='t'){
            var isactiveval=1;
        }else{
            isactiveval=0;
        }
        $('#txtid').val(id);
        $('#usertypeid').val(usertypeid);
        $('#fname').val(strfname);
        $('#mobile').val(mobile);
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
