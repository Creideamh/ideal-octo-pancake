<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Category</h4>
          </div>

        <div class="modal-body">
        <form action="" method="post" id="category_form">
          <input type="hidden" name="hidden_id" id="hidden_id" value="<?php  echo $rows['category_id']; ?>" />
            <div class="form-group">
              <label>Category name</label>
              <div class="row">
                    <div class="col-xs-8">
                      <input type="text" name="category_name" class="form-control" id="category_name" placeholder="category name" value="<?php echo $rows['category_name']; ?>">
                    </div>
                    <div class="col-xs-4">
                       <select id="category_status" name="category_status" class="form-control select2" style="width: 100%;"  placeholder="Active...Inactive">
                       <option><?php  echo $rows['category_status'];?></option>
                       <option></option>
                       <option>Active</option>
                       <option>Inactive</option>
                     </select>        
                  </div>
              </div>
            </div>  
          </div> <!-- modal -body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="update" class="btn btn-primary">Update</button>
      </div>

 <script type="text/javascript">
  $(document).ready(function() {

      $('.select2').select2();

      $('.modal').on('hidden.bs.modal', function(e){
        $(this).removeData('bs.modal');
      });

      $('#update').on('click', function(){
          var category_name = $('#category_name').val();
          var category_status = $('#category_status').val();
          var category_id   = $('#hidden_id').val();

          var dataString = 'category_name='+category_name+'&category_id='+category_id+'&category_status='+category_status;

          $.ajax({
              url:"<?php echo base_url();?>categories/edit_Category",
              method:"POST",
              data:dataString,
              dataType:"json",
              success: function(data){
                $('#error_display_div').fadeIn().addClass("alert alert-success alert-dismissible").html(data);
              },
              error:function(){
                $('#error_display_div').fadeIn().addClass("alert alert-danger alert-dismissible").html(data);
              }
          })


      })


})
</script>