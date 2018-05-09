<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file-text-o"></i> Vendor Quotation Listing
        <small>Add, Edit, Update or Delete Vendor Quotation</small>
      </h1>
    </section>

  <section class="content">
    <div class="row">
        <div class="col-xs-12 text-right">
            <div class="form-group">
                <a class="btn btn-primary" href="<?php echo base_url(); ?>add_edit_vendor_quotation"><i class="fa fa-plus"></i> Add New Quotation</a>
            </div>
        </div>
    </div>
        <div class="row">
            <!-- left column -->
            <?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if($error)
                {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php } ?>
            <?php
                $success = $this->session->flashdata('success');
                if($success)
                {
            ?>
            <div class="alert alert-success alert-dismissable ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php } ?>
            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Vendor Quotation List</h3>
                        <div class="box-tools">
                            <form action="<?php echo base_url() ?>vendor_quotation_listing" method="POST" id="searchList">
                                <div class="input-group">
                                  <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                  <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.box-header -->
                    <?php
                    if($datas!='NA')
                    {
                      echo '<div class="container-fluid">
                      <div class="row">
                      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                      <caption></caption>
                      <div class="table-responsive">';
                      echo '<table class="table table-striped table-condensed table-hover table-bordered">
                          <thead class="bg-primary">
                            <tr>
                            <th>S.No</th>
                            <th>Date</th>
                            <th>Vendor Quote Id</th>
                            <th>Vendor Id</th>
                            <th>Total Amount</th>
                            <th>Description</th>
                            <th>Files Attached</th>
                            <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>';
                          $i=1;
                          foreach($datas as $data)
                          {

                            echo'<tr class="bg-info">
                             <td>'.$i++.'</td>
                              <td>'.$data->date.'</td>
                              <td>'.$data->vendor_quote_id.'</td>
                              <td>'.$data->vendor_id.'</td>
                              <td>'.$data->total_amt.'</td>
                              <td>'.$data->description.'</td>
                              <td>'.$data->no_of_files.'</td>';?>

                              <td class="text-center">
                                <a class="btn btn-sm btn-success" href="<?php echo base_url().'view_vendor_quotation/'.$data->vendor_quote_id; ?>" title="View"><i class="fa fa-view"></i>View</a>&nbsp;|
                                  <a class="btn btn-sm btn-info" href="<?php echo base_url().'add_edit_vendor_quotation/'.$data->vendor_quote_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;|
                                  <a class="btn btn-sm btn-danger" href="<?php  echo base_url().'delete_vendor_quotation/'.$data->vendor_quote_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                              </td>
                            <?php echo '</tr>
                                ';
                          }

                      echo'</tbody>
                      </table></div>
                      </div>
                      </div>
                      </div>';

                    }
                    else {
                      echo '<br><br>
                            <h3 class="head text-center">
                                Sorry, No Data Available !
                            </h3> <br><br>';

                    }
                    ?>

                    </div><!-- /.box-body -->
            </div>
        </div>
    </section>

</div>
