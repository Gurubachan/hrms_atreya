<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cname = $this->uri->segment(2);
?>
<script>
      $(function () {
// load_bank_details();
});
      $("#frmBankName").submit(function(e){
            e.preventDefault();
            var frm = $("#frmBankName").serialize();
            $.ajax({
                type:'post',
                url: "<?= base_url('Bank/create_bank')?>",
                crossDomain:true,
                data:frm,
                success:function(data){
                    if(data!=false){
                        var jsondata = JSON.parse(data);
                        if(jsondata.flag==0){
                            duplicate_entries();
                        }else{
                            if($('#createBank').html()=='Create'){
                                successfull_entries();
                                reportFunction(1);
                                $("#frmBankName").trigger("reset");
                            }else{
                                if($('#createBank').html()=='Update'){
                                    $('#createBank').html('Create');
                                    successfully_updates();
                                    reportFunction(2);
                                    $("#frmBankName").trigger("reset");
                                    $('#txtid').val(0);
                                }
                            }
                        }
                        }else{
                        console.log(data);
                    }
                }
            });
            });
      function loadAjaxForReport(data){
            $.ajax({
            type:'post',
            url:"<?= base_url('Bank/report_bank_details')?>",
            crossDomain:true,
            data:{checkparams:data},
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
            var bank = jsondata[i].bankname;
            var strbankshortname = JSON.stringify(jsondata[i].bankshortname);
            var strbank = JSON.stringify(bank);
            var updatedid = '"<?= $cname ?>"';
            var urlid = '"../Common/record_active_deactive"';
            if(checkIsactive=='t'){
            isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
            }else{
            isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
            }
            html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].bankname+"</td><td>"+ jsondata[i].bankshortname+"</td><td>"+isactive+"</td><td><button class='btn editBtn btn-sm' onclick='reportEditBank(" +checkId+ "," +strbank+ ","+strbankshortname+"," +editisactive+ ")'><i class='fa fa-pencil-alt' title='Record Edit'></i></button>&nbsp;<button class='btn editBtn btn-sm' onclick='BankDetailsView(" +checkId+ ")' data-toggle='modal' data-target='#bankDetails'><i class='fa fa-tasks' title='View Details'></i></button></td></tr>");
            }
            $("#load_bank_names").html(html);
            }
            }
            });
            }
      function reportEditBank(id,strbank,strbankshortname,isactive) {
            if(isactive=='t'){
            var isactiveval=1;
            }else{
            isactiveval=0;
            }
            $('#txtid').val(id);
            $('#bankname').val(strbank);
            $("#bankShortname").val(strbankshortname);
            $('#isactive').val(isactiveval);
            $('#bankname').focus();
            $("#createBank").html('Update');
            }
      function BankDetailsView(id) {
          $.ajax({
              type:'post',
              url:'<?= base_url("Bank/bankViewDetails")?>',
              data:{id:id},
              success:function (res) {
                  if(res!=false){
                      $('#loadBankDetailsView').html(res);
                      // $("#dname").html(res.distname);
                  }
              }
          });
      }
</script>
