
    <div class="modal" id="editProfile">
      <div class="modal-dialog">
        <div class="modal-content">
        </div>
      </div>
    </div>
<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->
<script>
    var dataString = <?php echo $this->session->userdata('user_id');?>;
    
    $.ajax({
      type: 'ajax',
      method: 'post',
      url:"<?php echo base_url();?>users/refresher",
      dataType:'json',
      data: dataString,
      success:function(data){
        $('#logged_email').html(data);
      }


    })
</script>
</body>
</html>