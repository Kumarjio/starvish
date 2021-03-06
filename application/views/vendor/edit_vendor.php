<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
          <div class="col-xs-12 text-left">
              <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>vendor_master"><i class="fa fa-angle-left"></i> Back</a>
              </div>
          </div>
      </div>
      <h1>
        <i class="fa fa-plus-square-o"></i> Vendor Master
        <small>Add, Edit or Delete the Vendors</small>
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
                        <h3 class="box-title"> Edit vendor</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                  <!--<form role="form" id="addvendor" action="<?php echo base_url() ?>update_vendor" method="post" role="form">-->
				    <?php echo form_open_multipart('update_vendor');?>
                        <div class="box-body">

                          <!--row 1-->
                            <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="emp_id">Vendor ID</label>
                                      <input type="text" class="form-control required" value="<?php echo $datas[0]->vendor_id;?>" id="vendor_id" name="vendor_id" maxlength="128" readonly>
                                  </div>
                              </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Company Name</label>
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
                                          <label for="email">Contact Person 1</label>
                                          <input type="text" class="form-control required " id="contact_person1" value="<?php echo $datas[0]->contact_person1; ?>" name="contact_person1" maxlength="50">
                                      </div>
                                  </div>

                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="mobile">Contact person 2</label>
                                          <input type="text" class="form-control required" id="contact_person2" value="<?php echo $datas[0]->contact_person2; ?>" name="contact_person2" maxlength="50">
                                      </div>
                                  </div>
                                </div>
                                <!--row 3 end-->

                                <!--row 4-->
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desg1">Designation1</label>
                                            <input type="text" class="form-control required" id="desg1" value="<?php echo $datas[0]->designation1; ?>" name="desg1" maxlength="50">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desg2">Designation 2</label>
                                            <input type="text" class="form-control required " id="desg2" value="<?php echo $datas[0]->designation2; ?>" name="desg2" maxlength="50">
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
                                                <input type="text" class="form-control required" id="contact_no1" value="<?php echo $datas[0]->contact_no1; ?>" name="contact_no1" maxlength="13">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact_no2">Contact Number 2</label>
                                                <input type="text" class="form-control required " id="contact_no2" value="<?php echo $datas[0]->contact_no2; ?>" name="contact_no2" maxlength="50">
                                            </div>
                                        </div>
                                      </div>
                                      <!--row 6 end-->

                                      <!--row 7-->
                                        <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="bank">Bank Name</label>
                                                  <input type="text" class="form-control required" id="bank" value="<?php echo $datas[0]->bank_name; ?>" name="bank" maxlength="50">
                                              </div>
                                          </div>

                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="bank_acc">Account Name</label>
                                                  <input type="text" class="form-control required " id="bank_acc" value="<?php echo $datas[0]->account_name; ?>" name="bank_acc" maxlength="50">
                                              </div>
                                          </div>
                                        </div>
                                        <!--row 7 end-->

                                        <!--row 8-->
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bank_acc_no">Account Number</label>
                                                    <input type="text" class="form-control required digits" id="bank_acc_no" value="<?php echo $datas[0]->account_number; ?>" name="bank_acc_no" maxlength="20">
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
                                                      <label for="gst">GST Number</label>
                                                      <input type="text" class="form-control required" id="gst" value="<?php echo $datas[0]->gstin; ?>" name="gst" maxlength="50">
                                                  </div>
                                              </div>

                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="attachment">Select files to attach more</label>
                                                      <input type="file" class="form-control required " id="attachment" value="" name="attachment[]" multiple=''>
                                                  </div>
                                              </div>
                                            </div>
                                            <!--row 9 end-->

                                    <div class="row">
                                      <div class="col-md-6">
                                        <label for="attachment">Files Attached</label>
                                            <?php
                                              if($files!='NA')
                                          {
                                              echo'<ul class="list-group">
                                                  <table>
                                                      <tbody>';
                                                foreach($files as $file)
                                                {
                                                echo '
                                                <tr>
                                      <td><li class="list-group-item"><a href="../uploads/vendor/'.$file->file_name.'" target="_blank">'.$file->file_name.'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>';
                                                ?>
                                          <td>  <a class="btn btn-sm btn-danger" href="<?php  echo base_url().'delete_vendor_file/'.$file->file_name.'/'.$file->vendor_id; ?>" title="Delete"> <i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            <?php
                                            echo '</li>';
                                                          }
                                                        }
                                      else {
                                            echo '<label for="attachments"> :  N / A </label>';
                                            }
                                                ?>
                                              </tbody>
                                          </table>
                                      </ul>
                                  </div>
                                </div>


                                    <br>

                          </div>
                          <div class="box-footer">
                              <input type="submit" name="fileSubmit" class="btn btn-primary" value="Update Vendor" />
                              <input type="reset" class="btn btn-default" value="Reset" />
                          </div>
                      </form>




                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
