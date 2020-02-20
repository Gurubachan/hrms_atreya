<?php
if($result!=false){
    foreach ($result as $r) {
        if($r->isactive == "t"){
            $isactive = "Active";
        }else{
            $isactive = "Not Active";
        }
        if($r->updatedat ==""){
            $updatedat = "<span style='color:red'>No Updated Yet</span>";
        }else{
            $updatedat = $r->updatedat;
        }
        if($r->updatedby ==0){
            $updatedby = "<span style='color:red'>No Updated Yet</span>";
        }else{
            $updatedby = $r->updatedby;
        }
//        if($r->stateshortname ==""){
//            $shortname = "<span style='color:red'>No Updated Yet</span>";
//        }else{
//            $shortname = $r->stateshortname;
//        }
        ?>
        <div class="table-responsive">
           <div class="">
               <div class="col-12">
                   <table class="table-bordered">
                       <!--                <tr  style="border: 1px solid red;"><td><h4>Basic Details</h4></td><td></td></tr>-->
                       <tr class="">
                           <td class="p-1" style="width: 300px;">Religion Name:</td>
                           <td class="p-1"><?php echo $r->religion?></td>
                       </tr>
                       <tr class="">
                           <td class="p-1">Entry By:</td>
                           <td class="p-1"><?php echo $r->entryby?></td>
                       </tr>
                       <tr class="">
                           <td class="p-1">Created By:</td>
                           <td class="p-1"><?php echo $r->createdat?></td>
                       </tr>
                       <tr class="">
                           <td class="p-1">Updated at:</td>
                           <td class="p-1"><?php echo $updatedat?></td>
                       </tr>
                       <tr class="">
                           <td class="p-1">Updated By:</td>
                           <td class="p-1"><?php echo $updatedby?></td>
                       </tr>
                       <tr class="">
                           <td class="p-1">IsActive:</td>
                           <td class="p-1"><?php echo $isactive?></td>
                       </tr>
                   </table>
               </div>
           </div>
        </div>
        <?php
    }
   }
?>
