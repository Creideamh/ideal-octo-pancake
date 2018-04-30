<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Brand</h4>
          </div>

        <div class="modal-body">
        <form action="" method="post" id="category_form">
        <input type="hidden" name="hidden_id" class="form-control" id="hidden_id" placeholder="brand name" value="<?php echo $rows['brand_id'];?>">

            <div class="form-group">
              <label>Brand name</label>
              <div class="row">
                    <div class="col-xs-12">
                      <input type="text" name="brand_name" class="form-control" id="brand_name" placeholder="brand name" value="<?php echo $rows['brand_name'];?>">
                    </div>
              </div>
            </div>  
            <div class="form-group">
              <label>Category</label>
              <div class="row">
                    <div class="col-xs-6">
                       <select id="category_id" name="category_id" class="form-control select2" style="width: 100%;"  placeholder="Active...Inactive">
                       <option selected>
                       <?php   echo $this->brands_model->category_name($rows['category_id']);?>
                       </option>
                       <?php 
                            $results =  $this->categories_model->categories_data_edit();          
                            foreach($results as $rows){
                              echo '<option value="'.$rows['category_id'].'">'.$rows['category_name'].'</options>';
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
            
            var brand_id   = $('#hidden_id').val();
            var brand_name = $('#brand_name').val();
            var brand_status = $('#brand_status').val();
            var category_id  = $('#category_id').val();

            var dataString = 'brand_id='+brand_id+'&brand_name='+brand_name+'&category_id='+category_id+'&brand_status='+brand_status;

            $.ajax({
                url:"<?php echo base_url();?>brands/edit_Brand",
                method:"POST",
                data:dataString,
                dataType:"json",
                success: function(msg){
                        toastr.success("Success, Brand data updated");
                },
                error:function(msg){
                    toastr.error("Error, Could not update Brand data");
                }
                    })
            })
    //$("#error_display_div").fadeOut(5000, function() { $(this).remove(); });
   })
 </script>