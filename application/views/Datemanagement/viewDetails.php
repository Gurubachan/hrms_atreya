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
        ?>
        <div class="table-responsive">
           <div class="">
               <div class="col-12">
                   <table class="table-bordered">
                       <!--                <tr  style="border: 1px solid red;"><td><h4>Basic Details</h4></td><td></td></tr>-->
                       <tr class="">
                           <td class="" style="width: 300px;">Year ID:</td>
                           <td class=""><?php echo $r->id?></td>
                       </tr>
                       <tr class="">
                           <td class="">Year:</td>
                           <td class=""><?php echo $r->year?></td>
                       </tr>
                       <tr class="">
                           <td class="">Entry By:</td>
                           <td class=""><?php echo $r->entryby?></td>
                       </tr>
                       <tr class="">
                           <td class="">Created By:</td>
                           <td class=""><?php echo $r->createdat?></td>
                       </tr>
                       <tr class="">
                           <td class="">Updated at:</td>
                           <td class=""><?php echo $updatedat?></td>
                       </tr>
                       <tr class="">
                           <td class="">Updated By:</td>
                           <td class=""><?php echo $updatedby?></td>
                       </tr>
                       <tr class="">
                           <td class="">IsActive:</td>
                           <td class=""><?php echo $isactive?></td>
                       </tr>
                   </table>
               </div>
           </div>
        </div>
        <?php
    }
   }
?>
