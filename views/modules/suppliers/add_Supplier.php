<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Brand</h4>
          </div>

        <div class="modal-body">
        <form action="" method="post" id="supplier_form">
            <div class="form-group">
              <label>Supplier name</label>
              <div class="row">
                    <div class="col-xs-12">
                      <input type="text" name="supplier_name" class="form-control" id="supplier_name" placeholder="brand name" value="">
                    </div>
              </div>
            </div>  
            <div class="form-group">
              <label>Contact Details</label>
              <div class="row">
                    <div class="col-xs-6">
                    <input type="text" name="supplier_mnb" class="form-control" id="supplier_mnb" placeholder="+233 000 000 000" value="">     
                  </div>
                  <div class="col-xs-6">
                    <input type="text" name="supplier_email" class="form-control" id="supplier_email" placeholder="email address" value="">       
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label>Supplier Address</label>
              <div class="row">
                    <div class="col-xs-12">
                      <textarea class="form-control" id="supplier_address" row="4" col="10"></textarea>
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
            
            var supplier_name = $('#supplier_name').val();
            var supplier_mnb = $('#supplier_mnb').val();
            var supplier_email = $('#supplier_email').val();
            var supplier_address = $('#supplier_address').val();

            var dataString = 'supplier_name='+supplier_name+'&supplier_email='+supplier_email+'&supplier_address='+supplier_address+'&supplier_mnb='+supplier_mnb;

            $.ajax({
                url:"<?php echo base_url();?>suppliers/add_Supplier",
                method:"POST",
                data:dataString,
                dataType:"json",
                success: function(msg){
                        toastr.success("Success, Supplier data created");
                },
                error:function(msg){
                    toastr.error("Error, Could not add Supplier data");
                }
                    })
            })
    //$("#error_display_div").fadeOut(5000, function() { $(this).remove(); });
   })
 </script>