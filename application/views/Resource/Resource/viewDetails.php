<?php
if($result!=false){
    foreach ($result as $r) {
        if($r->securedmark != null or $r->securedmark!=0){
            $percentage =  $r->securedmark/$r->totalmark * 100;
        }else{
            $percentage=0;
        }
        ?>
        <div class="table-responsive">
            <table class="table-striped table--no-card">
                <tr  style="border: 1px solid red;"><td><h4>Basic Details</h4></td><td></td></tr>
                <tr>
                    <td class="col-sm-7">Name:</td>
                    <td class="col-sm-5"><?php echo $r->fname." ".$r->mname." ".$r->lname;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Father Name:</td>
                    <td class="col-sm-5"> <?php echo $r->fathername;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Mother Name:</td>
                    <td class="col-sm-5"><?php echo $r->mothername;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Spouse Name:</td>
                    <td class="col-sm-5"><?php echo $r->spousename;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Date of Birth:</td>
                    <td class="col-sm-5"><?php echo $r->dob;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Marital Status:</td>
                    <td class="col-sm-5"><?php echo $r->statusname;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Gender:</td>
                    <td class="col-sm-5"><?php echo $r->gendername;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Religion:</td>
                    <td class="col-sm-5"><?php echo $r->religion;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Mobile Number:</td>
                    <td class="col-sm-5"><?php echo $r->contact;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Alternate Mobile:</td>
                    <td class="col-sm-5"><?php echo $r->altcontact;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Whatsapp Number:</td>
                    <td class="col-sm-5"><?php echo $r->whatsapp;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Email Id:</td>
                    <td class="col-sm-5"><?php echo $r->email;?></td>
                </tr>
                <tr style="border: 1px solid red;"><td><h4>Address:</h4></td><td></td></tr>
                <tr>
                    <td class="col-sm-7">At:</td>
                    <td class="col-sm-5"><?php echo $r->at?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Po:</td>
                    <td class="col-sm-5"><?=$r->po;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Ps:</td>
                    <td class="col-sm-5"><?=$r->ps?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Pincode:</td>
                    <td class="col-sm-5"><?=$r->pincode?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">District:</td>
                    <td class="col-sm-5"><?=$r->distname?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">State:</td>
                    <td class="col-sm-5"><?=$r->statename;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Communication Type:</td>
                    <td class="col-sm-5"><?php echo $r->ctype;?></td>
                </tr>
                <tr style="border: 1px solid red;"><td><h4>Qualification</h4></td><td></td></tr>
                <tr>
                    <td class="col-sm-7">University/Institute:</td>
                    <td class="col-sm-5"><?php echo $r->orgname;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Board of Exam:</td>
                    <td class="col-sm-5"><?php echo $r->boad;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Examination Name:</td>
                    <td class="col-sm-5"><?php echo $r->examname;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Pass Out Year:</td>
                    <td class="col-sm-5"><?php echo $r->yop;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Full Mark:</td>
                    <td class="col-sm-5"><?php echo $r->totalmark;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Secured Mark:</td>
                    <td class="col-sm-5"><?php echo $r->securedmark;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Percentage:</td>
                    <td class="col-sm-5"><?php echo round($percentage,2);?></td>
                </tr>
                <tr style="border: 1px solid red;"><td><h4>Experience:</h4></td><td></td></tr>
                <tr>
                    <td class="col-sm-7">Experience Type:</td>
                    <td class="col-sm-5"><?php echo $r->exetypename;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Company Name:</td>
                    <td class="col-sm-5"><?php echo $r->companyname;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Date of Joining:</td>
                    <td class="col-sm-5"><?php echo $r->doj;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Date of Leaving:</td>
                    <td class="col-sm-5"><?php echo $r->dol;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Role/Designation:</td>
                    <td class="col-sm-5"><?php echo $r->role;?></td>
                </tr>
                <tr>
                    <td class="col-sm-7">Remark:</td>
                    <td class="col-sm-5"><?php echo $r->remark;?></td>
                </tr>
            </table>
        </div>
        <?php
    }
   }
?>
