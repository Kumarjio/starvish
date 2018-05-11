<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
          <div class="col-xs-12 text-left">
              <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>customer_dc"><i class="fa fa-angle-left"></i> Back</a>
              </div>
          </div>
      </div>
      <h1>
        <i class="fa fa-plus-square-o"></i> Customer DC Listing
        <small>Add, Edit, Update or Delete the Customer DC</small>
      </h1>
    </section>

  <section class="content">

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
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php } ?>
            <div class="col-md-8">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Edit Customer DC</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                  <!--<form role="form" id="addvendor" action="<?php echo base_url() ?>update_vendor" method="post" role="form">-->
				    <?php echo form_open_multipart('update_customer_dc');?>
                        <div class="box-body">
                          <!--row 1-->
                            <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="date">Date</label>
                                      <input type="date" class="form-control required" value="<?php echo $datas[0]->date; ?>" id="date" name="date" maxlength="128">
                                  </div>
                              </div>


                            </div><!--row 1 End-->

                          <!--row 2-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="customer_id">Customer Id</label>
                                      <input type="text" class="form-control required" value="<?php echo $datas[0]->customer_id; ?>" id="customer_id" name="customer_id" maxlength="128">
                                  </div>
                              </div>
                            </div>
                            <!--row 2 end-->

                            <!--row 3-->
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="dc_no">DC No</label>
                                          <input type="textarea" class="form-control required " id="dc_no" value="<?php echo $datas[0]->dc_no; ?>" name="dc_no" maxlength="50">
                                      </div>
                                  </div>
                                </div>
                                <!--row 3 end-->

                                <!--row 4-->
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" class="form-control required" id="description" value="<?php echo $datas[0]->description; ?>" name="description" maxlength="150">
                                        </div>
                                    </div>
                                  </div>

                                  <!--row 4-->
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <button type="button" class="btn btn-primary" onClick="addRow()">Add Product</button></div>
                                        </div>
                                      </div>
                                      <!--row 4 end-->

                                      <div class="container-fluid">
                                          <div class="row">
                                          <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                                          <caption></caption>
                                          <div class="table-responsive">
                                          <table id="dataTable" class="table table-striped table-condensed table-hover table-bordered product-details">
                                             <thead class="bg-primary">
                                                <tr>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Remarks</th>
                                               </tr>
                                            </thead>
                                            <tbody>
                                              <?php for($i=0;$i<count($data);$i++) {
                                             echo'<tr>
                                                  <td><input type="text" value='.$data[$i]->description.' name="p_description[]"></td>
                                                  <td><input type="text" value='.$data[$i]->quantity.' name="quantity[]"></td>
                                                  <td><input type="text" value='.$data[$i]->remarks.' name="remarks[]"></td>';?>
                                                  <td class="text-center"><a class="btn btn-sm btn-success" href="<?php echo base_url().'update_customer_products/'.$data[$i]->dc_no; ?>" title="Update"><i class="fa fa-view"></i>Update</a></td>
                                                <?php echo'</tr>';
                                              }?>
                                            </tbody>
                                    </table></div></div></div></div>
                            </div>

                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-primary" value="Update Customer DC" />
                                        <input type="reset" class="btn btn-default" value="Reset" />
                                    </div>
                              </div><!-- /.box-body -->
                          </div>
                      </div>
              </section>

          </div>

<script>
var counter = 1;

function addRow(){
counter++;
var newRow = jQuery('<tr><td><input type="text" name="p_description[]" class="small" required></td><td><input type="text" class="product-add-field quantity ' + counter + '" name="quantity[]" class="small" required/></td><td><input type="text" class="product-add-field remarks" name="remarks[]" class="small" required/></td><td><a href="#" class="close">X</a></td></tr>');
jQuery('table.product-details').append(newRow);
}

</script>
