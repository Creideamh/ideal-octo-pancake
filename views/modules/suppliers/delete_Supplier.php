
  <div class="modal-header">
        <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $rows['brand_id'];?>" />
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Brand</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure, you want to permanently delete this Brand</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" id="delete">Yes</button>
      </div>



<script> 

      //Initialize Select2 Elements
  $(document).ready(function(){

    $('.select2').select2();

    $('.modal').on('hidden.bs.modal', function(e){
        $(this).removeData('bs.modal');
      })

    $('#delete').on('click', function(){

      var dataString = 'brand_id='+ <?php echo $rows['brand_id'];?>;

        $.ajax({
            type: 'ajax',   
            url:"<?php echo base_url();?>brands/delete_Brand",
            method:"post",
            dataType:"json",
            data: dataString,
            success: function(msg){
                    toastr.success("Success, Brand data deleted");
                    $('#delete').remove();
            },
            error:function(msg){
                    toastr.error("Error, Could not delet Brand data");
            }
        })

    })

  })
</script>



