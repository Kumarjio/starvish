<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
          <div class="col-xs-12 text-left">
              <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>customer_po"><i class="fa fa-angle-left"></i> Back</a>
              </div>
          </div>
      </div>
      <h1>
        <i class="fa fa-plus-square-o"></i> Customer PO Listing
        <small>Add, Edit, Update or Delete the Customer PO</small>
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
                        <h3 class="box-title"> Edit Customer PO</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                  <!--<form role="form" id="addvendor" action="<?php echo base_url() ?>update_vendor" method="post" role="form">-->
				    <?php echo form_open_multipart('update_customer_po');?>
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
                                          <label for="po_id">PO Id</label>
                                          <input type="textarea" class="form-control required " id="po_id" value="<?php echo $datas[0]->po_id; ?>" name="po_id" maxlength="50">
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
                              <!--    <div class="row">
                                    <div class="col-md-6">
                                        <label for="attachment" class="custom-file">Attachment</label>
                                      <div class="input-group">
                                          <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                              Browse&hellip; <input type="file" style="display: none;" name="attachment" id="attachment">
                                            </span>
                                          </label>
                                          <input type="text" class="form-control" placeholder="Browse Files" readonly>
                                      </div>
                                        </span>
                                    </div>
                                </div>-->
                                  <!--row 5 end-->

                              <!--    <script>
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
                                </script>-->


                          </div><br>
                          <div class="box-footer">
                              <input type="submit" class="btn btn-primary" value="Update Customer PO" />
                              <input type="reset" class="btn btn-default" value="Reset" />
                          </div>
                      </form>




                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
