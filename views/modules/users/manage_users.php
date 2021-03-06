

      <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $title;?></h3><a href="<?php echo base_url();?>modules/add_User" class="pull-right"><i class="fa fa-user-plus"></i></a>
          </div>
          <div class="box-body">
          <table id="user-List" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Email</th>
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
                  <th>Email</th>
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
        <div class="modal-content">
        </div>
      </div>
    </div>
    
    <div class="modal" id="editModal">
      <div class="modal-dialog">
      <div id="error_display_div"></div>

        <div class="modal-content">
        </div>
      </div>
    </div>

  
    <div class="modal" id="deleteModal">
    <div id="error_display_div"></div>
      <div class="modal-dialog">
        <div class="modal-content">
        </div>
      </div>
    </div>

    <div class="modal" id="infoModal">
    <div id="error_display_div"></div>
      <div class="modal-dialog">
        <div class="modal-content">
        </div>
      </div>
    </div>

  <script type="text/javascript">
  $(document).ready(function() {

        $('.modal').on('hidden.bs.modal', function(e){
        $(this).removeData('bs.modal');
      });

    var table = $('#user-List').DataTable({
    "ajax": "<?php echo base_url();?>users/user_List",
    stateSave: true
    });


    setInterval( function () {
            table.ajax.reload();
        }, 3000 );
   });
  </script> 
