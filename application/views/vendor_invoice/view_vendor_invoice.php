<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        <i class="fa fa-bar-chart"></i> View Vendor Invoice
        <small></small>
      </h1>
    </section>


  <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Invoice  #<?php echo $datas[0]->invoice_id;?></h3>
                    </div><!-- /.box-header -->
                    <?php
                    echo '
                    <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <caption></caption>
                    <div class="table-responsive">';
                    echo '<table class="table table-striped table-condensed table-hover table-bordered">
                        <thead class="bg-primary">
                          <tr>
                          <th>Invoice ID</th>
                          <th>'.$datas[0]->invoice_id.'</th>
                          </tr>
                          </thead>
                          <tr>
                          <td>Date</td>
                          <td>'.$datas[0]->date.'</td>
                          </tr>
                          <tr>
                          <td>Vendor ID</td>
                          <td>'.$datas[0]->vendor_id.'</td>
                          </tr>
                          <tr>
                          <td>Vendor Name</td>
                          <td>'.$datas[0]->vendor_name.'</td>
                          </tr>
                          <tr>
                          <td>Grant Total</td>
                          <td>'.$datas[0]->grant_total.'</td>
                          </tr>
                          <tr>';
                          if($files!='NA')
                          {
                          $i=0;

                          foreach($files as $file)
                          {
                            echo '<tr>
                            <td>Attachment - '.$i++.'</td>
                            <td><a href="../uploads/invoice/vendor/'.$file->file_name.'" target="_blank">'.$file->file_name.'</a></td>
                            </tr>';
                          }
                        }
                        else
                        {
                      echo'    <tr>
                          <td>Attachments</td>
                          <td>N / A</td>
                          </tr>';
                        }

                        echo '<tbody>';


                    echo '</tbody>
                    </table>
                    </div>

                      </div>
                      </div>';
                    ?>
                   <div class="row">
                        <div class="col-xs-12 text-left">
                            <div class="form-group">
                                <a class="btn btn-primary" href="<?php echo base_url(); ?>vendor_invoice"><i class="fa fa-angle-left"></i> Back</a>
                                <a class="btn btn-success" href="<?php echo base_url().'add_edit_vendor_invoice/'.$datas[0]->invoice_id; ?>" title="Edit"><i class="fa fa-pencil"></i>Edit</a>&nbsp;
                            </div>
                        </div>
                    </div>
                    </div>


                    </div><!-- /.box-body -->

            </div>
        </div>
    </section>

</div>
