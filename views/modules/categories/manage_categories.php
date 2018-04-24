

      <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">
            <?php echo $title;?></h3>
            <a href="<?php echo base_url();?>modules/add_Category" class="pull-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-bars"></i></a>
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



    <div class="modal" id="addModal">
      <div class="modal-dialog">
      <div id="error_display_div"></div>
       <div class="modal-content">

        </div>
      </div>
    </div>

    <div class="modal" id="editModal">
      <div class="modal-dialog">
        <div class="modal-content">
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

