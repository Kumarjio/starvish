<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Employee Master
        <small>Add / Edit Employee</small>
      </h1>
    </section>

    <section class="content">

        <div class="row">
                      <!-- left column -->  <?php
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
                        <h3 class="box-title">Enter Employee Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <script>
                    $(document).ready(function(){

                      jQuery.validator.addMethod("noSpace", function(value, element) {
                        return value.indexOf(" ") < 0 && value != "";
                      }, "No space please and don't leave it empty");


                      $("form").validate({
                        rules: {
                          emp_id: {
                            noSpace: true
                          }
                        }
                      });

                      })
                    </script>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addVendor" action="<?php echo base_url() ?>addNewUser" method="post" role="form">
                        <div class="box-body">

                          <!--row 1-->
                            <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="emp_id">Employee ID</label>
                                      <input type="text" class=tsyo"form-control required" value="<?php echo set_value('emp_id'); ?>" id="emp_id" name="emp_id" maxlength="128">
                                  </div>
                              </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Employee Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="128">
                                    </div>
                                </div>
                            </div><!--row 1 End-->

                          <!--row 2-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="email">Email address</label>
                                      <input type="text" class="form-control required email" id="email" value="<?php echo set_value('email'); ?>" name="email" maxlength="128">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="mobile">Mobile Number</label>
                                      <input type="text" class="form-control required digits" id="mobile" value="<?php echo set_value('mobile'); ?>" name="mobile" maxlength="10">
                                  </div>
                              </div>
                            </div>
                            <!--row 2 end-->

                            <!--row 3-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control required" id="password" name="password" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password</label>
                                        <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" maxlength="20">
                                    </div>
                                </div>
                            </div>
                            <!--row 3 end-->

                            <!--row 4-->
                            <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="address1">Address Line 1</label>
                                      <input type="text" class="form-control required" id="address1" value="<?php echo set_value('address1'); ?>" name="address1" maxlength="100">
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address2">Address Line 2</label>
                                    <input type="text" class="form-control required" id="address2" value="<?php echo set_value('address2'); ?>" name="address2" maxlength="100">
                                </div>
                          </div>
                            </div>
                            <!--row 4 end-->

                            <!--row 5-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="desg">Designation</label>
                                      <input type="text" class="form-control required" id="desg" value="<?php echo set_value('desg'); ?>" name="desg" maxlength="100">
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="doj">DOJ</label>
                                    <input type="date" class="form-control required" id="doj" value="<?php echo set_value('doj'); ?>" name="doj" maxlength="100">
                                </div>
                          </div>
                            </div>
                            <!--row 5 end-->

                            <!--row 6-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="bank">Bank name</label>
                                      <input type="text" class="form-control required" id="bank" value="<?php echo set_value('bank'); ?>" name="bank" maxlength="100">
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bank_acc">Account Number</label>
                                    <input type="text" class="form-control required" id="bank_acc" value="<?php echo set_value('bank_acc'); ?>" name="bank_acc" maxlength="100">
                                </div>
                          </div>
                            </div>
                            <!--row 6 end-->

                            <!--row 7-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="ifsc">IFSC code</label>
                                      <input type="text" class="form-control required" id="ifsc" value="<?php echo set_value('ifsc'); ?>" name="ifsc" maxlength="100">
                                  </div>
                            </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="bank">Aadhaar Number</label>
                                      <input type="text" class="form-control required" id="aadhaar" value="<?php echo set_value('aadhaar'); ?>" name="aadhaar" maxlength="100">
                                  </div>
                            </div>
                          </div>
                            <!--row 7 end-->

                            <!--row 8-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pan">PAN Number</label>
                                        <input type="text" class="form-control required" id="pan" value="<?php echo set_value('pan'); ?>" name="pan" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control required" id="role" name="role">
                                            <option value="0">Select Role</option>
                                            <?php
                                            if(!empty($roles))
                                            {
                                                foreach ($roles as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->roleId ?>" <?php if($rl->roleId == set_value('role')) {echo "selected=selected";} ?>><?php echo $rl->role ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--row 8 end-->
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
