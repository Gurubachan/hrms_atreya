<script>
$("#frmDocumenttype").submit(function (e) {
    e.preventDefault();
   let frm = $(this).serialize();
    $.ajax({
        type:'post',
        url:'<?=base_url("Document/create_document_type")?>',
        data:frm,
        success:function (res) {
            if(res!=false){
                var jsondata= JSON.parse(res);
                mytoast(jsondata);
                if(jsondata.status == true){
                    $("#frmDocumenttype").trigger('reset');
                }
            }else{
                console.log(data);
            }
            }
    });
})
</script>