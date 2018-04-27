<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Brand</h4>
          </div>

        <div class="modal-body">
        <form action="" method="post" id="category_form">
            <div class="form-group">
              <label>Brand name</label>
              <div class="row">
                    <div class="col-xs-12">
                      <input type="text" name="brand_name" class="form-control" id="brand_name" placeholder="brand name" value="">
                    </div>
              </div>
            </div>  
            <div class="form-group">
              <label>Category</label>
              <div class="row">
                    <div class="col-xs-6">
                       <select id="category_id" name="category_id" class="form-control select2" style="width: 100%;"  placeholder="Active...Inactive">
                       <option></option>
                       <?php 
                          foreach($results as $options){
                            echo '<option value="'.$options['category_id'].'">'.$options['category_name'].'</option>';
                          }                       
                        ;?>
                     </select>        
                  </div>
                  <div class="col-xs-6">
                       <select id="brand_status" name="brand_status" class="form-control select2" style="width: 100%;"  placeholder="Active...Inactive">
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
 $(document).ready(function(){

            $('.select2').select2();

            $('.modal').on('hidden.bs.modal', function(e){
            $(this).removeData('bs.modal');
            });


            $('#submit').on('click',  function(event){
            event.preventDefault();
            
            var brand_name = $('#brand_name').val();
            var brand_status = $('#brand_status').val();
            var category_id  = $('#category_id').val();

            var dataString = 'brand_name='+brand_name+'&category_id='+category_id+'&brand_status='+brand_status;

            $.ajax({
                url:"<?php echo base_url();?>brands/add_Brand",
                method:"POST",
                data:dataString,
                dataType:"json",
                success: function(msg){
                        toastr.success("Success, Brand data created");
                },
                error:function(msg){
                    toastr.error("Error, Could not add Brand data");
                }
                    })
            })
    //$("#error_display_div").fadeOut(5000, function() { $(this).remove(); });
   })
 </script>