<script>

    $("#frmLogin").submit(function (e) {
        e.preventDefault();
        var frm = $("#frmLogin").serialize();
        $.ajax({
            type:'post',
            url:"<?= base_url('User/check_user') ?>",
            data:frm,
            success:function (data) {
                var jsondata = JSON.parse(data);
                if(jsondata.status!=false){
                    $("#frmLogin").hide();
                    $('#frmPassword').show();
                    $("#password").focus();
                    var userid = jsondata.userid;
                    $("#frmPassword").submit(function (e) {
                        e.preventDefault();
                        var frm = $("#frmPassword").serialize()+'&'+$.param({ 'userid': userid });
                        $.ajax({
                            type:'post',
                            url:"<?= base_url('User/check_password') ?>",
                            data:frm,
                            success:function (data) {
                                var jsondata = JSON.parse(data);
                                if (jsondata.status != false) {
                                    $("#frmLogin").hide();
                                    $('#frmPassword').hide();
                                    $('#frmOtp').show();
                                    $("#otp").focus();
                                    var otp = jsondata.otp;
                                    var userid = jsondata.userid;
                                    $("#frmOtp").submit(function (e) {
                                        e.preventDefault();
                                        var frm = $("#frmOtp").serialize()+'&'+$.param({ 'userid': userid});
                                        $.ajax({
                                            type: 'post',
                                            url: "<?= base_url('User/verify_otp') ?>",
                                            data: frm,
                                            success: function (data) {
                                                var jsondata = JSON.parse(data);
                                                console.log(jsondata);
                                                var check = $("#otp_check").val();
                                                if(jsondata.status != false){
                                                    window.location.href="<?= base_url('Dashboard/')?>";
                                                }else{
                                                    if(check == 1){
                                                        $("#otp_check").val(2);
                                                        alert("Your have entered wrong Otp");
                                                    }else if(check == 2){
                                                        alert("Your have entered wrong Otp");
                                                        window.location.href="<?= base_url('Welcome/')?>";
                                                    }
                                                }
                                            }
                                        });
                                    });
                                }else{
                                    alert('You are not authorized to access.');
                                }
                            }
                        });
                    });
                }else{
                    alert('You are not authorized to access.');
                }
            }
        });
    });

</script>
