<?php
if($result!=false){
    foreach ($result as $r) {
        if($r->isactive == "t"){
            $isactive = "Active";
        }else{
            $isactive = "InActive";
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
        if($r->distshortname ==""){
            $shortname = "<span style='color:red'>No Updated Yet</span>";
        }else{
            $shortname = $r->distshortname;
        }
        ?>
        <div class="table-responsive">
            <div class="">
                <div class="col-12">
                    <table class="table-bordered">
                        <!--                <tr  style="border: 1px solid red;"><td><h4>Basic Details</h4></td><td></td></tr>-->
                        <tr class="">
                            <td class="" style="width: 300px;">State Id:</td>
                            <td class=""><?php echo $r->stateid?></td>
                        </tr>
                        <tr class="">
                            <td class="">District Name:</td>
                            <td class=""><?php echo $r->distname?></td>
                        </tr>
                        <tr class="">
                            <td class="">District Short Name:</td>
                            <td class=""><?php echo $shortname?></td>
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
