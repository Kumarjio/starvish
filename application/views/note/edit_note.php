<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
          <div class="col-xs-12 text-left">
              <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>note_master"><i class="fa fa-angle-left"></i> Back</a>
              </div>
          </div>
      </div>
      <h1>
        <i class="fa fa-plus-square-o"></i> Note Master
        <small>Add, Edit or Delete the Note</small>
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
                        <h3 class="box-title"> Edit Note</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                  <!--<form role="form" id="addvendor" action="<?php echo base_url() ?>update_vendor" method="post" role="form">-->
				    <?php echo form_open_multipart('update_note');?>
                        <div class="box-body">

                          <!--row 1-->
                            <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="note_id">ID</label>
                                      <input type="text" class="form-control required" value="<?php echo $datas[0]->id;?>" id="note_id" name="note_id" maxlength="128" readonly>
                                  </div>
                              </div>
                            </div><!--row 1 End-->

                              <!--row 2-->
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Description</label>
                                        <input type="text" class="form-control required" value="<?php echo $datas[0]->description; ?>" id="description" name="description" maxlength="128">                                    </div>
                                </div>
                              </div>
                                      <!--row 2 End-->

                          </div>
                          <div class="box-footer">
                              <input type="submit" class="btn btn-primary" value="Update Note" />
                              <input type="reset" class="btn btn-default" value="Reset" />
                          </div>
                      </form>

                    </div><!-- /.box-body -->

            </div>
        </div>
    </section>

</div>
