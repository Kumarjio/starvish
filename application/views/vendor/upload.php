<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bar-chart"></i> File Upload
        <small>Add File</small>
      </h1>
    </section>

  <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Customers</h3>
                    </div><!-- /.box-header -->
                    <?php echo $error;?>
                    <?php echo form_open_multipart('do_upload');?>
                    <?php echo "<input type='file' name='userfile' size='20' />"; ?>
                    <?php echo "<input type='submit' name='submit' value='upload' /> ";?>
                    <?php echo "</form>"?>



                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
