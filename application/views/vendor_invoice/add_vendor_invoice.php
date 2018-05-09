<!-- add customer -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
          <div class="col-xs-12 text-left">
              <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>vendor_invoice"><i class="fa fa-angle-left"></i> Back</a>
              </div>
          </div>
      </div>
      <h1>
        <i class="fa fa-plus-square-o"></i> Vendor Invoice
        <small>Add, Edit, Update or Delete the Vendor Invoice</small>
      </h1>
    </section>

  <section class="content">

        <div class="row">
            <!-- left column -->
            <!--flash msg-->
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

            <div class="col-md-12">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <i><h3 class="box-title">Add New Invoice</h3></i>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addinvoice" action="<?php echo base_url() ?>add_vendor_invoice" method="post" role="form">

                        <div class="box-body">

                          <!--row 1-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="date">Date</label>
                                      <input type="date" class="form-control required" value="<?php echo set_value('date'); ?>" id="date" name="date">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="vendor_id">Vendor ID</label>
                                      <input type="text" class="form-control required" value="<?php echo set_value('vendor_id'); ?>" id="vendor_id" name="vendor_id">
                                    </div>
                                </div>
                              </div><!--row 1 End-->

                            <!--row 2-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="vendor_name">Vendor Name</label>
                                      <input type="text" class="form-control required" value="<?php echo set_value('vendor_name'); ?>" id="vendor_name" name="vendor_name">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="invoice_id">Invoice ID</label>
                                      <input type="text" class="form-control required" value="<?php echo set_value('invoice_id'); ?>" id="invoice_id" name="invoice_id" maxlength="128">
                                  </div>
                              </div>
                            </div><!--row 2 End-->

                            <!--row 3-->
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input type="text" class="form-control required " id="total" value="<?php echo set_value('total'); ?>" name="total" maxlength="500">
                                </div>
                              </div>
                            </div>
                            <!--row 3 End-->

                            <!--row 4-->
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="cgst">CGST</label>
                                      <input type="text" class="form-control required " id="cgst" value="<?php echo set_value('cgst'); ?>" name="cgst" maxlength="500">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sgst">SGST</label>
                                        <input type="text" class="form-control required " id="sgst" value="<?php echo set_value('sgst'); ?>" name="sgst" maxlength="500">
                                    </div>
                                </div>

                              </div>
                            <!--row 4 end-->

                            <!--row 5-->
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="igst">IGST</label>
                                        <input type="text" class="form-control required " id="igst" value="<?php echo set_value('igst'); ?>" name="igst" maxlength="500">
                                    </div>
                                </div>

                              </div>
                              <!--row 5 End-->

                              <!--row 6-->
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="grant_total">Grant_Total</label>
                                          <input type="text" class="form-control required " id="grant_total" value="<?php echo set_value('grant_total'); ?>" name="grant_total" maxlength="500">
                                      </div>
                                  </div>

                                </div>
                                <!--row 6 End-->

                                <!--row 7-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="attachment" class="custom-file">Attachment</label>
                                      <div class="input-group">
                                          <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                              Browse&hellip; <input type="file" multiple="" style="display: none;" name="attachment[]" id="attachment[]">
                                            </span>
                                          </label>
                                          <input type="text" class="form-control" placeholder="Browse Files" readonly>
                                      </div>
                                        </span>
                                    </div>
                                </div>
                                <!--row 7 End-->

                                <script>
                                $(function() {

                                  // We can attach the `fileselect` event to all file inputs on the page
                                  $(document).on('change', ':file', function() {
                                    var input = $(this),
                                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                                    input.trigger('fileselect', [numFiles, label]);
                                  });

                                  // We can watch for our custom `fi  leselect` event like this
                                  $(document).ready( function() {
                                    $(':file').on('fileselect', function(event, numFiles, label) {

                                      var input = $(this).parents('.input-group').find(':text'),
                                      log = numFiles > 1 ? numFiles + ' files selected' : label;

                                      if( input.length ) {
                                        input.val(log);
                                      } else {
                                        if( log ) alert(log);
                                      }

                                    });
                                  });
                                });
                                </script>

				</div>

                          <div class="box-footer">
							                <input type="submit" class="btn btn-primary" value="Add Vendor Invoice" name="fileSubmit" />
                              <input type="reset" class="btn btn-default" value="Reset" />
                          </div>
                      </form>

                    </div><!-- /.box-body -->

            </div>
        </div>
    </section>

</div>
