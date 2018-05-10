<!-- add customer -->
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
        <small>View vendor</small>
      </h1>
    </section>

  <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> view vendor #<?php echo $datas[0]->vendor_id;?></h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>

                        <div class="box-body">

                          <div class="container-fluid">
                          <div class="row">
                          <div class="col-lg-10 col-lg-offset-1 col-xs-12 col-sm-12 col-md-12">
                          <caption></caption>
                          <div class="table-responsive">
                          <table class="table table-striped table-condensed table-bordered">
                              <thead class="bg-primary">
                                <tr>
                                <th>vendor ID</th>
                                <td ><?php echo $datas[0]->vendor_id;?></td>
                                </tr>
                              </thead>
                              <tbody class="bg-info">
                                <tr>
                                  <th>Company name</th>
                                  <td ><?php echo $datas[0]->company_name;?></td>
                                </tr>
                                <tr>
                                <th>Address Line 1</th>
                                <td ><?php echo $datas[0]->address1;?></td>
                              </tr>
                              <tr>
                              <th>Address Line 2</th>
                              <td ><?php echo $datas[0]->address2;?></td>
                              </tr>
                              <tr>
                              <th>Contact person 1</th>
                              <td ><?php echo $datas[0]->contact_person1;?></td>
                            </tr>
                            <tr>
                            <th>Desgination 1</th>
                            <td ><?php echo $datas[0]->designation1;?></td>
                          </tr>
                            <tr>
                              <th>Email 1</th>
                              <td ><?php echo $datas[0]->email1;?></td>
                            </tr>
                            <tr>
                              <th>Contact No 1</th>
                              <td ><?php echo $datas[0]->contact_no1;?></td>
                            </tr>
                            <tr>
                              <th>Contact person 2</th>
                              <td ><?php echo $datas[0]->contact_person2;?></td>
                          </tr>
                          <tr>
                            <th>Desgination 2</th>
                            <td ><?php echo $datas[0]->designation2;?></td>
                          </tr>
                          <tr>
                            <th>Email 2</th>
                            <td ><?php echo $datas[0]->email2;?></td>
                          </tr>
                          <tr>
                            <th>Contact No 2</th>
                            <td ><?php echo $datas[0]->contact_no2;?></td>
                          </tr>
                          <tr>
                            <th>GST No</th>
                            <td ><?php echo $datas[0]->gstin;?></td>
                          </tr>
                          <tr>
                            <th>Bank Name</th>
                            <td ><?php echo $datas[0]->bank_name;?></td>
                          </tr>
                          <tr>
                            <th>Account Name</th>
                            <td ><?php echo $datas[0]->account_name;?></td>
                          </tr>
                          <tr>
                            <th>Account Number</th>
                            <td ><?php echo $datas[0]->account_number;?></td>
                          </tr>
                          <tr>
                            <th>IFSC Code</th>
                            <td ><?php echo $datas[0]->ifsc_code;?></td>
                          </tr>

                          <?php
                          if($files!='NA')
                          {
                          $i=0;

                          foreach($files as $file)
                          {
                            echo '<tr>
                            <th>Attachment - '.$i++.'</th>
                            <td><a href="../uploads/vendor/'.$file->file_name.'" target="_blank">'.$file->file_name.'</a></td>
                            </tr>';
                          }
                        }
                        else
                        {
                      echo'    <tr>
                          <th>Attachments</th>
                          <td>N / A</td>
                          </tr>';
                        }


                        ?>
                              </tbody>
                                  </table>
                                </div>
                              </div>
                            </div></div>

                          </div>
                          <div class="box-footer">
                              <a class="btn btn-primary" href="<?php echo base_url(); ?>vendor_master"><i class="fa fa-angle-left"></i> Back</a>
                              <a class="btn btn-success" href="<?php echo base_url().'add_edit_vendor/'.$datas[0]->vendor_id; ?>" title="Edit"><i class="fa fa-pencil"></i>Edit</a>&nbsp;
                          </div>
                      </form>




                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
