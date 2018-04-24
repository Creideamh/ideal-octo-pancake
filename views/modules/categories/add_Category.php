<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
          </div>

        <div class="modal-body">
        <form action="" method="post" id="category_form">
            <div class="form-group">
              <label>Category name</label>
              <div class="row">
                    <div class="col-xs-8">
                      <input type="text" name="category_name" class="form-control" id="category_name" placeholder="category name" value="">
                    </div>
                    <div class="col-xs-4">
                       <select id="category_status" name="category_status" class="form-control select2" style="width: 100%;"  placeholder="Active...Inactive">
                       <option><?php  if(isset($rows['user_status'])){echo $row['user_status'];}?></option>
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
        <button type="button" id="submit" class="btn btn-primary">Submit</button>
      </div>

  <script>

    $('#submit').on('click',  function(event){
      event.preventDefault();
      
      var category_name = $('#category_name').val();
      var category_status = $('#category_status').val();

      var dataString = 'category_name='+category_name+'&category_status='+category_status;

      $.ajax({
        url:"<?php echo base_url();?>categories/add_Category",
        method:"POST",
        data:dataString,
        dataType:"json",
        success: function(data){
            $('#error_display_div').addClass("alert alert-success alert-dismissible").html(data);
            $("#error_display_div").fadeOut(5000, function() { $(this).removeClass("alert alert-success alert-dismissible"); });
        },
        error: function(data){
            $('#error_display_div').fadeIn().addClass("alert alert-danger alert-dismissible").html(data);
            $("#error_display_div").fadeOut(5000, function() { $(this).removeClass("alert alert-danger alert-dismissible"); });
        }
             })
    })

 </script>