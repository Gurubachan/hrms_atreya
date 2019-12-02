<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>
    $(function () {
        dashBoardForms();
        $('#example').dataTable();
    });
    function dashBoardForms(){
        $.ajax({
            type:"post",
            url:'<?= base_url("Forms/load_dashboard_forms")?>',
            success:function (res) {
                if(res!=false){
                    $('#allforms_and_reports').html(res);
                    // $("#reportsLabel").html("Forms");
                    // $('#formLabel').html("Reports");
                }
            }
        });
    }
    function dashBoardReports(){
        $.ajax({
            type:"post",
            url:'<?= base_url("Forms/load_dashboard_reports")?>',
            success:function (res) {
                if(res!=false){
                    $('#allforms_and_reports').html(res);
                    // $("#reportsLabel").html("Forms");
                    // $('#formLabel').html("Reports");
                }
            }
        });
    }
    $('#reportsFormMenu').click(function () {
        var labelS = $("#reportsLabel").html();
        if(labelS == "Reports"){
            $.ajax({
                type:"post",
                url:'<?= base_url("Forms/load_dashboard_reports")?>',
                success:function (res) {
                    if(res!=false){
                        $('#allforms_and_reports').html(res);
                        $("#reportsLabel").html("Forms");
                        $('#formLabel').html("Reports").removeClass('menu_name_red').addClass('menu_name_green');
                    }
                }
            });
        }else if(labelS == "Forms"){
            $.ajax({
                type:"post",
                url:'<?= base_url("Forms/load_dashboard_forms")?>',
                success:function (res) {
                    if(res!=false){
                        $('#allforms_and_reports').html(res);
                        $("#reportsLabel").html("Reports");
                        $('#formLabel').html("Forms").removeClass('menu_name_green').addClass('menu_name_red');
                    }
                }
            });
        }
    });
    // document.addEventListener('mousemove', (e) => {
    //     const sqrs = document.querySelectorAll('.move');
    //
    //     const mouseX = e.pageX;
    //     const mouseY = e.pageY;
    //
    //     sqrs.forEach(sqr => {
    //         const sqrX = sqr.offsetLeft + 20;
    //         const sqrY = sqr.offsetTop + 20;
    //
    //         const diffX = mouseX - sqrX;
    //         const diffY = mouseY - sqrY;
    //
    //         const radians = Math.atan2(diffY, diffX);
    //
    //         const angle = radians * 180 / Math.PI;
    //
    //         sqr.style.transform = `rotate(${angle}deg)`;
    //     })
    //
    // })
	$('.cardhover').hover(function () {
		$(this).addClass('skewClass');
	});
</script>
