

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        <i class="fa fa-bar-chart"></i> View Customer PO
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
                        <h3 class="box-title"> Purchase Order  #<?php echo $datas[0]->po_id;?></h3>
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
                          <th>PO ID</th>
                          <th>'.$datas[0]->po_id.'</th>
                          </tr>
                          </thead>
                          <tr>
                          <td>Date</td>
                          <td>'.$datas[0]->date.'</td>
                          </tr>
                          <tr>
                          <td>Customer ID</td>
                          <td>'.$datas[0]->customer_id.'</td>
                          </tr>
                          <tr>
                          <td>Total Amount</td>
                          <td>'.$datas[0]->total_amt.'</td>
                          </tr>
                          <tr>
                          <td>Description</td>
                          <td>'.$datas[0]->description.'</td>
                          </tr>
                          <tr>
                          <td>Created on</td>
                          <td>'.$datas[0]->created.'</td>
                          </tr>';
                          $i=0;

                          foreach($files as $file)
                          {
                            echo '<tr>
                            <td>Attachment - '.$i++.'</td>
                            <td><a href="../uploads/po/customer/'.$file->file_name.'" target="_blank">'.$file->file_name.'</a></td>
                            </tr>';
                          }


                        echo '<tbody>';


                    echo '</tbody>
                    </table>
                    </div>

                      </div>
                      </div>


                    ';
                    ?>
                   <div class="row">
                        <div class="col-xs-12 text-left">
                            <div class="form-group">
                                <a class="btn btn-primary" href="<?php echo base_url(); ?>customer_po"><i class="fa fa-angle-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    </div>


                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
