<!-- add customer -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-square-o"></i> Customer Master
        <small>Add, Edit or Delete the Customer</small>
      </h1>
    </section>

  <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Edit customer</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>

                    <!--<form role="form" id="addcustomer" action="<?php echo base_url() ?>update_customer" method="post" role="form">-->
                    <?php echo form_open_multipart('update_customer');?>
          
                        <div class="box-body">

                          <!--row 1-->
                            <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="customer_id">Customer ID</label>
                                      <input type="text" class="form-control required" value="<?php echo $datas[0]->customer_id;?>" id="customer_id" name="customer_id" maxlength="128" readonly>
                                  </div>
                              </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cname">Company Name</label>
                                        <input type="text" class="form-control required" value="<?php echo $datas[0]->company_name; ?>" id="company_name" name="company_name" maxlength="128">
                                    </div>
                                </div>
                            </div><!--row 1 End-->

                          <!--row 2-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="address1">Address Line 1</label>
                                      <input type="textarea" class="form-control required " id="address1" value="<?php echo $datas[0]->address1; ?>" name="address1" maxlength="50">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="address2">Address Line 2</label>
                                      <input type="textarea" class="form-control required" id="address2" value="<?php echo $datas[0]->address2; ?>" name="address2" maxlength="50">
                                  </div>
                              </div>
                            </div>
                            <!--row 2 end-->

                            <!--row 3-->
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="contactperson1l">Contact Person 1</label>
                                          <input type="text" class="form-control required " id="contact_person1" value="<?php echo $datas[0]->contact_person1; ?>" name="contact_person1" maxlength="50">
                                      </div>
                                  </div>

                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="contactperson2">Contact person 2</label>
                                          <input type="text" class="form-control required" id="contact_person2" value="<?php echo $datas[0]->contact_person2; ?>" name="contact_person2" maxlength="50">
                                      </div>
                                  </div>
                                </div>
                                <!--row 3 end-->

                                <!--row 4-->
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="designation1">Designation1</label>
                                            <input type="text" class="form-control required" id="designation1" value="<?php echo $datas[0]->designation1; ?>" name="designation1" maxlength="50">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="designation2">Designation 2</label>
                                            <input type="text" class="form-control required " id="designation2" value="<?php echo $datas[0]->designation2; ?>" name="designation2" maxlength="50">
                                        </div>
                                    </div>
                                  </div>
                                  <!--row 4 end-->

                                  <!--row 5-->
                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="email1">Email1</label>
                                              <input type="email" class="form-control required" id="email1" value="<?php echo $datas[0]->email1; ?>" name="email1" maxlength="50">
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="email2">Email 2</label>
                                              <input type="text" class="form-control required " id="email2" value="<?php echo $datas[0]->email2; ?>" name="email2" maxlength="50">
                                          </div>
                                      </div>
                                    </div>
                                    <!--row 5 end-->

                                    <!--row 6-->
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact_no1">Contact Number 1</label>
                                                <input type="number" class="form-control required" id="contact_no1" value="<?php echo $datas[0]->contact_no1; ?>" name="contact_no1" maxlength="13">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact_no2">Contact Number 2</label>
                                                <input type="number" class="form-control required " id="contact_no2" value="<?php echo $datas[0]->contact_no2; ?>" name="contact_no2" maxlength="50">
                                            </div>
                                        </div>
                                      </div>
                                      <!--row 6 end-->

                                      <!--row 7-->
                                        <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="bank_name">Bank Name</label>
                                                  <input type="text" class="form-control required" id="bank_name" value="<?php echo $datas[0]->bank_name; ?>" name="bank_name" maxlength="50">
                                              </div>
                                          </div>

                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="account_name">Account Name</label>
                                                  <input type="text" class="form-control required " id="account_name" value="<?php echo $datas[0]->account_name; ?>" name="account_name" maxlength="50">
                                              </div>
                                          </div>
                                        </div>
                                        <!--row 7 end-->

                                        <!--row 8-->
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="account_number">Account Number</label>
                                                    <input type="number" class="form-control required digits" id="account_number" value="<?php echo $datas[0]->account_number; ?>" name="account_number" maxlength="20">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ifsc_code">IFSC Code</label>
                                                    <input type="text" class="form-control required " id="ifsc_code" value="<?php echo $datas[0]->ifsc_code; ?>" name="ifsc_code" maxlength="50">
                                                </div>
                                            </div>
                                          </div>
                                          <!--row 8 end-->
                                          <!--row 9-->
                                            <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="gstin">GST Number</label>
                                                      <input type="text" class="form-control required" id="gstin" value="<?php echo $datas[0]->gstin; ?>" name="gstin" maxlength="50">
                                                  </div>
                                              </div>

                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="attachment">Attachment</label>
                                                      <input type="file" class="form-control required " id="attachment" value="<?php echo $datas[0]->attachment;?>" name="attachment" maxlength="50">
                                                  </div>
                                              </div>
                                            </div>
                                            <!--row 9 end-->
                          </div>
                          <div class="box-footer">
                              <input type="submit" class="btn btn-primary" value="Update Vendor" />
                              <input type="reset" class="btn btn-default" value="Reset" />
                          </div>
                      </form>




                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
