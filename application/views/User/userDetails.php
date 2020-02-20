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
        if($r->mname!=""){
            $name = $r->fname." ".$r->mname." ".$r->lname;
        }else{
            $name = $r->fname." ".$r->lname;
        }
       ?>
        <div class="table-responsive">
           <div class="">
               <div class="col-12">
                   <table class="table-bordered">
                       <tr class="">
                           <td class="p-1" style="width: 300px;">Name:</td>
                           <td class="p-1"><?php echo $name?></td>
                       </tr>
                       <tr class="">
                           <td class="p-1" style="width: 300px;">Email:</td>
                           <td class="p-1"><?php echo $r->emailid?></td>
                       </tr>
                       <tr class="">
                           <td class="p-1" style="width: 300px;">Mobile:</td>
                           <td class="p-1"><?php echo $r->mobile?></td>
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
