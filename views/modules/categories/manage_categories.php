

      <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $title;?></h3><a href="#" class="pull-right" id="modal_Category" data-toggle="modal" data-target="#categoryModal"><i class="fa fa-bars"></i></a>
          </div>
          <div class="box-body">
          <table id="category-List" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>          
            </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->



    <div class="modal" id="categoryModal">
      <div class="modal-dialog">
      <div id="error_display_div"></div>
       <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
          </div>

        <div class="modal-body">
        <form action="" method="post" id="category_form">
          <input type="hidden" name="hidden_id" id="hidden_id" value="" />
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
        </div>
      </div>
    </div>


  <script type="text/javascript">
  $(document).ready(function() {

      $('.select2').select2();

      $('.modal').on('hidden.bs.modal', function(e){
        $(this).removeData('bs.modal');
      });

    var table = $('#category-List').DataTable({
    "ajax": "<?php echo base_url();?>categories/categories_List",
    stateSave: true
    });


    setInterval( function () {
            table.ajax.reload();
        }, 60000 );
   });
  </script> 
  <script>
    $(document).ready(function(){
      $('#modal_Category').on('click', function(){
        $('#category_form')[0].reset();
        $('.modal-title').html('<i class="fa fa-plus"></i> Add Category');
        $('#submit').val('Add');        
      })
    })

    $('#submit').on('click',  function(event){
      event.preventDefault();
      
      var category_name = $('#category_name').val();
      var category_status = $('#category_status').val();

      var dataString = 'category_name='+category_name+'&category_status='+category_status;

      $.ajax({
        url:"<?php echo base_url();?>categories/add_Category",
        method:"POST",
        data:dataString,
        success: function(data){
            $('#category_form')[0].reset();
            $('#error_display_div').fadeIn().addClass("alert alert-success alert-dismissible").html(data);
            $('#submit').attr('disabled', false);
        
        },
        error: function(data){
          $('#category_form')[0].reset();
            $('#error_display_div').fadeIn().addClass("alert alert-danger alert-dismissible").html(data);
        }
             })
    })

    $('#update').on('click', function(event){
        event.prevendDefault();

      var category = $(this).attr('data-edit');
      $.ajax({
        url:"<?php echo base_url();?>categories/fetch_Category",
        method:"POST",
        data: category_id,
        dataType:"json",
        success: function(data){
          $('#categoryModal').modal('show');
          $('#category_name').val(data.category_name);
          $('.modal-title').html('<i class="fa fa-pencil-o"></i>Edit Category');
          $('#hidden_id').val(category_id);
          $('#submit').val('Update');

        }

      })

    })

 
  </script>
