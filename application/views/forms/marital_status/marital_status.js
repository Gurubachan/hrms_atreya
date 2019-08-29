// function loadAjaxForReport(id){
//     $.ajax({
//         type:'post',
//         url:"<?= base_url('MaritalStatus/report_marital_status')?>",
//         data:{checkparams:id},
//         success:function(data){
//             if(data!=false){
//                 jsondata = JSON.parse(data);
//                 var j=0;
//                 var z = jsondata.length;
//                 // alert(z);
//                 var html = "";
//                 var isactive='';
//                 for(var i=0; i<z; i++){
//                     j++;
//                     var checkId = jsondata[i].id;
//                     var checkIsactive = jsondata[i].isactive;
//                     var updatedid = 19;
//                     var urlid = "<?=base_url('Common/record_active_deactive')?>";
//                     if(checkIsactive=='t'){
//                         isactive= "<button id='action"+checkId+"' onclick='editIsactive(1,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-on fa-2x'></i></button>";
//                     }else{
//                         isactive= "<button id='action"+checkId+"' onclick='editIsactive(0,"+checkId+","+updatedid+","+urlid+")'><i class='fa fa-toggle-off fa-2x' ></i></button>";
//                     }
//                     html +=("<tr> <td>"+j+"</td><td>"+ jsondata[i].statusname+"</td><td>"+isactive+"</td><td>Edit</td></tr>");
//                 }
//                 $("#load_status_names").html(html);
//             }
//         }
//     });
// }
