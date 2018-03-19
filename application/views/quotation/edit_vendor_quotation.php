<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
          <div class="col-xs-12 text-left">
              <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>vendor_quotation"><i class="fa fa-angle-left"></i> Back</a>
              </div>
          </div>
      </div>
      <h1>
        <i class="fa fa-plus-square-o"></i> Vendor Quotation Listing
        <small>Add, Edit, Update or Delete the Vendor Quotation</small>
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
                        <h3 class="box-title"> Edit vendor Quotation</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                  <!--<form role="form" id="addvendor" action="<?php echo base_url() ?>update_vendor" method="post" role="form">-->
				    <?php echo form_open_multipart('update_vendor_quotation');?>
                        <div class="box-body">


                          <!--row 1-->
                            <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="date">Date</label>
                                      <input type="text" class="form-control required" value="<?php echo $datas[0]->date; ?>" id="date" name="date" maxlength="128">
                                  </div>
                              </div>


                            </div><!--row 1 End-->

                          <!--row 2-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="vendor_quote_id">Vendor Quote Id</label>
                                      <input type="text" class="form-control required" value="<?php echo $datas[0]->vendor_quote_id; ?>" id="vendor_quote_id" name="vendor_quote_id" maxlength="128">
                                  </div>
                              </div>
                            </div>



                            <!--row 2 end-->

                            <!--row 3-->
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="vendor_id">Vendor Id</label>
                                          <input type="textarea" class="form-control required " id="vendor_id" value="<?php echo $datas[0]->vendor_id; ?>" name="vendor_id" maxlength="50">
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
                                  <!--row 4 end-->

                                  <!--row 5-->
                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="attachment">Attachment</label>
                                              <input type="file" class="form-control required" id="attachment" name="attachment" maxlength="50">
                                          </div>
                                      </div>
                                    <!--row 5 end-->

                          </div>
                          <div class="box-footer">
                              <input type="submit" class="btn btn-primary" value="Update Vendor Quotation" />
                              <input type="reset" class="btn btn-default" value="Reset" />
                          </div>
                      </form>




                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
