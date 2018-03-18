<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bar-chart"></i> Upload success
        <small></small>
      </h1>
    </section>

  <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Vendor Quotation</h3>
                    </div><!-- /.box-header -->

                    <ul>
                        <?php foreach ($upload_data as $item => $value):?>
                        <li><?php echo $item;?>: <?php echo $value;?></li>
                        <?php endforeach; ?>
                    </ul>

                    <p><?php //print_r(array_map(null,$upload_data));
                      echo $upload_data['file_name'];
                      ?></p>
                    <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
