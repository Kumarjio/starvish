

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-square-o"></i> Customer Master
        <small>Add, Edit or Delete the Customers</small>
      </h1>
    </section>

  <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <i><h3 class="box-title">Add New Customer</h3></i>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addvendor" action="<?php echo base_url() ?>add_customer" method="post" role="form">
                        <div class="box-body">

                          <!--row 1-->
                            <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="emp_id">Customer ID</label>
                                      <input type="text" class="form-control required" value="<?php echo set_value('customer_id'); ?>" id="customer_id" name="customer_id" maxlength="128">
                                  </div>
                              </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Company Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('company_name'); ?>" id="company_name" name="company_name" maxlength="128">
                                    </div>
                                </div>
                            </div><!--row 1 End-->

                          <!--row 2-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="address1">Address Line 1</label>
                                      <input type="textarea" class="form-control required " id="address1" value="<?php echo set_value('address1'); ?>" name="address1" maxlength="50">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="address2">Address Line 2</label>
                                      <input type="textarea" class="form-control required" id="address2" value="<?php echo set_value('address2'); ?>" name="address2" maxlength="50">
                                  </div>
                              </div>
                            </div>
                            <!--row 2 end-->

                            <!--row 3-->
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="email">Contact Person 1</label>
                                          <input type="text" class="form-control required " id="contact_person1" value="<?php echo set_value('contact_person1'); ?>" name="contact_person1" maxlength="50">
                                      </div>
                                  </div>

                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="mobile">Contact person 2</label>
                                          <input type="text" class="form-control required" id="contact_person2" value="<?php echo set_value('contact_person2'); ?>" name="contact_person2" maxlength="50">
                                      </div>
                                  </div>
                                </div>
                                <!--row 3 end-->

                                <!--row 4-->
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desg1">Designation1</label>
                                            <input type="text" class="form-control required" id="designation1" value="<?php echo set_value('designation1'); ?>" name="designation1" maxlength="50">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desg2">Designation 2</label>
                                            <input type="text" class="form-control required " id="designation2" value="<?php echo set_value('designation2'); ?>" name="designation2" maxlength="50">
                                        </div>
                                    </div>
                                  </div>
                                  <!--row 4 end-->

                                  <!--row 5-->
                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="email1">Email1</label>
                                              <input type="email" class="form-control required" id="email1" value="<?php echo set_value('email1'); ?>" name="email1" maxlength="50">
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="email2">Email 2</label>
                                              <input type="text" class="form-control required " id="email2" value="<?php echo set_value('email2'); ?>" name="email2" maxlength="50">
                                          </div>
                                      </div>
                                    </div>
                                    <!--row 5 end-->

                                    <!--row 6-->
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact_no1">Contact Number 1</label>
                                                <input type="number" class="form-control required" id="contact_no1" value="<?php echo set_value('contact_no1'); ?>" name="contact_no1" maxlength="13">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact_no2">Contact Number 2</label>
                                                <input type="number" class="form-control required " id="contact_no2" value="<?php echo set_value('contact_no2'); ?>" name="contact_no2" maxlength="50">
                                            </div>
                                        </div>
                                      </div>
                                      <!--row 6 end-->

                                      <!--row 7-->
                                        <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="bank">Bank Name</label>
                                                  <input type="text" class="form-control required" id="bank_name" value="<?php echo set_value('bank_name'); ?>" name="bank_name" maxlength="50">
                                              </div>
                                          </div>

                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="bank_acc">Account Name</label>
                                                  <input type="text" class="form-control required " id="account_name" value="<?php echo set_value('account_name'); ?>" name="account_name" maxlength="50">
                                              </div>
                                          </div>
                                        </div>
                                        <!--row 7 end-->

                                        <!--row 8-->
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bank_acc_no">Account Number</label>
                                                    <input type="number" class="form-control required digits" id="account_number" value="<?php echo set_value('account_number'); ?>" name="account_number" maxlength="20">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ifsc_code">IFSC Code</label>
                                                    <input type="text" class="form-control required " id="ifsc_code" value="<?php echo set_value('ifsc_code'); ?>" name="ifsc_code" maxlength="50">
                                                </div>
                                            </div>
                                          </div>
                                          <!--row 8 end-->
                                          <!--row 9-->
                                            <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="gst">GST Number</label>
                                                      <input type="text" class="form-control required" id="gstin" value="<?php echo set_value('gstin'); ?>" name="gstin" maxlength="50">
                                                  </div>
                                              </div>

                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="attachment">Attachment</label>
                                                      <input type="text" class="form-control required " id="attachment"  name="attachment" maxlength="50">
                                                  </div>
                                              </div>
                                            </div>
                                            <!--row 9 end-->
                          </div>
                          <div class="box-footer">
                              <input type="submit" class="btn btn-primary" value="Add Customer" />
                              <input type="reset" class="btn btn-default" value="Reset" />
                          </div>
                      </form>


                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
