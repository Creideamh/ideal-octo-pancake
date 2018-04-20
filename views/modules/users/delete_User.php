
  <div class="modal-header">
        <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $rows['user_id'];?>" />
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete User</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure, you want to permanently delete this user</p>
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

      var user_id = $('#hidden_id').val();

      $.ajax({
      type: 'ajax',
      method: 'post',
      url:"<?php echo base_url();?>users/user_delete",
      dataType:'json',
      data: user_id,     
      success: function(msg){
          if(msg === 0){
            toastr.options.preventDuplicates = true;
            toastr.options.positionClass= 'toast-top-full-width';
            toastr.error('An error occured, Please try again');     
          }else if(msg == 1){
            $('#editModal').modal('hide')
            toastr.options.showMethod = 'slideDown';
            toastr.options.positionClass= 'toast-top-full-width';
            toastr.success('User data deleted');
          }else{
            toastr.options.positionClass= 'toast-bottom-full-width';
            toastr.options.preventDuplicates = true;
            toastr.warning('Please try again');
           }
      }
      }); // $.ajax({})

    })

  })
</script>



