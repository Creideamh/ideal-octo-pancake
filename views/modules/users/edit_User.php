
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit User</h4>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="form_edit">
        <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $rows['user_id'];?>" />
          <div class="form-group">
            <label>Full name</label>
                <div class="row">
                   <div class="col-xs-6">
                     <input type="text" name="lastname" class="form-control" id="lastname" placeholder="lastname" value="<?php echo $rows['lastname'];?>">
                   </div>
                   <div class="col-xs-6">
                     <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Firstname" value="<?php echo $rows['firstname'];?>">
                   </div>
                </div>
          </div>  
          <div class="form-group">
            <label>Email Address</label>
              <div class="row">
                   <div class="col-xs-12">
                     <div class="input-group">
                       <div class="input-group-addon">
                         <i class="fa fa-envelope"> </i>
                       </div>
                     <input type="email" name="user_email" class="form-control" id="user_email" placeholder="john.doe@example.com" value="<?php echo $rows['user_email'];?>">
                    </div>
                   </div>
              </div>
        </div>
        <div class="form-group">
          <label>Password</label>
           <div class="row">
                   <div class="col-xs-12">
                     <div class="input-group">
                       <div class="input-group-addon">
                         <i class="fa fa-lock"> </i>
                       </div>
                        <input type="password" name="user_password" class="form-control" id="user_password"  value="">
                      </div>
                   </div>
            </div>
        </div>
        <div class="form-group">
          <label>Status</label>
            <div class="row">
                   <div class="col-xs-12">
                       <select id="user_status" name="user_status" class="form-control select2" style="width: 100%;"  placeholder="Active...Inactive">
                       <option><?php echo $rows['user_status'];?></option>
                       <option></option>
                       <option>Active</option>
                       <option>Inactive</option>
                     </select>                    
                   </div>
              </div>
        </div>
        <div class="form-group">
         <label> User Type </label>
            <div class="row">
                   <div class="col-xs-12">
                       <select id="user_type" name="user_type" class="form-control select2" style="width: 100%;">
                       <option><?php echo $rows['user_type'];?></option>
                       <option></option>
                       <option>master</option>
                       <option>user</option>
                       <option>brand_user</option>
                       <option>category_user</option>
                     </select>                    
                   </div>
            </div>
        </div> 


        </div> <!-- modal -body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="update" class="btn btn-primary">Update</button>
      </div>



<script> 

      //Initialize Select2 Elements
  $(document).ready(function(){

    $('.select2').select2();

    $('.modal').on('hidden.bs.modal', function(e){
        $(this).removeData('bs.modal');
      })

    $('#update').on('click', function(){

      if($('#user_password').val() != ''){

      var user_email = $('#user_email').val();
      var lastname = $("#lastname").val();
      var firstname = $("#firstname").val();
      var user_id = $("#hidden_id").val();
      var user_type = $("#user_type").val();
      var user_password = $("#user_password").val();
      var user_status = $("#user_status").val();

      var dataString = 'lastname='+ lastname +
                       '&firstname='+ firstname +
                       '&user_email='+ user_email +
                       '&user_id='+ user_id +
                       '&user_type='+ user_type +
                       '&user_password='+ user_password +
                       '&user_status='+ user_status;

      $.ajax({
      type: 'ajax',
      method: 'post',
      url:"<?php echo base_url();?>users/user_update",
      dataType:'json',
      data: dataString,
      success: function(msg){
          if(msg === 0){
            toastr.options.positionClass= 'toast-bottom-full-width';
            toastr.options.preventDuplicates = true;
            toastr.options.positionClass= 'toast-top-full-width';
            toastr.error('Error encountered, Please try again');     
          }else if(msg == 1){
            $('#editModal').modal('hide')
            toastr.options.showMethod = 'slideDown';
            toastr.options.positionClass= 'toast-top-full-width';
            toastr.success('Data Successful Updated');
          }else{
            toastr.options.positionClass= 'toast-bottom-full-width';
            toastr.options.preventDuplicates = true;
            toastr.options.positionClass= 'toast-top-full-width';
            toastr.warning('Please try again');
           }
      }
      }); // $.ajax({})
}else{
  toastr.options.showMethod = 'slideDown';
  toastr.options.positionClass= 'toast-top-full-width';
  toastr.options.preventDuplicates = true;
  toastr.warning('Empty password field');     

}
    })

  })
</script>



