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
                    <input type="text" name="gh_number" class="form-control" id="gh_number" placeholder="+233 000 000 000" value="">     
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

            $('#gh_number').mask('(+000) 000 000 000');

            $('.modal').on('hidden.bs.modal', function(e){
            $(this).removeData('bs.modal');
            });


            $('#submit').on('click',  function(event){
            event.preventDefault();
            
            function validate_Email(sender_email) {
               var expression = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                  if (expression.test(sender_email)) {
                    return true;
                  }
                  else {
                    return false;
                  }
            }

            

            var supplier_name = $('#supplier_name').val();
            var gh_number = $('#gh_number').val();
            var supplier_email = $('#supplier_email').val();
            var supplier_address = $('#supplier_address').val();

            var dataString = 'supplier_name='+supplier_name+'&supplier_email='+supplier_email+'&supplier_address='+supplier_address+'&gh_number='+gh_number;

            if(validate_Email(supplier_email)){

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
                    
              }else{
                toastr.error("Invalid email");
              } // IF
            })
    //$("#error_display_div").fadeOut(5000, function() { $(this).remove(); });
   })
 </script>