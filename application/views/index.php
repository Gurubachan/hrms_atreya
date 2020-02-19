<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="container">
        <div class="col-sm-12">
            <div id="" style="margin-left:auto;margin-right:auto;display: block;margin-top:10%;" class="col-lg-6 col-lg-offset-6 col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 text-center">
                <img src="<?= base_url('assets/images/favicon.png')?>" alt="" height="150" width="150">
            </div>
        </div>
        <div class="col-sm-12">
            <div id="loginbox" style="margin-left:auto;margin-right:auto;display: block;margin-top:10%;" class="col-lg-6 col-lg-offset-6 col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>
                    <div style="padding-top:30px" class="panel-body" >
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <form method="post" class="form-horizontal" name="frmLogin" role="form" id="frmLogin">
                            <div style="margin-bottom: 25px">
                                <input id="username" type="text" class="form-control" name="username"  autofocus  placeholder="username or email" autocomplete="off" required>
                            </div>
                            <br>
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls text-right">
                                    <button type="reset" id="btn-reset"  class="btn btn-danger">Reset</button>
                                    <button type="submit" id="btn-login"  class="btn btn-success">Next</button>
                                </div>
                            </div>
                        </form>
                        <form method="post" class="form-horizontal" name="frmPassword" role="form" id="frmPassword" style="display: none;">
                            <div style="margin-bottom: 25px">
                                <!--                                <input type="hidden" id="userid" value="" hidden>-->
                                <input id="password" type="password" class="form-control"  name="password"  placeholder="password" autocomplete="off" required autofocus>
                            </div>
                            <br>
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls text-right">
                                    <button type="reset" id="btn-reset"  class="btn btn-danger">Reset</button>
                                    <button type="submit" id="btn-login"  class="btn btn-success">Password Verify</button>
                                </div>
                            </div>
                        </form>
                        <form method="post" class="form-horizontal" name="frmOtp" role="form" id="frmOtp" style="display: none;">
                            <div style="margin-bottom: 25px">
                                <input type="hidden" id="otp_check" name="otp_check" value="1">
                                <input id="otp" type="text" class="form-control" name="otp" autofocus  minlength="6" maxlength="6" placeholder="otp" autocomplete="off">
                            </div>
                            <br>
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls text-right">
                                    <button type="reset" id="btn-reset"  class="btn btn-danger">Reset</button>
                                    <button type="submit" id="btn-login"  class="btn btn-success">Verify Otp</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

