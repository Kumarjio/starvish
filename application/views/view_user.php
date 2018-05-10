<!-- add customer -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
          <div class="col-xs-12 text-left">
              <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>userListing"><i class="fa fa-angle-left"></i> Back</a>
              </div>
          </div>
      </div>
      <h1>
        <i class="fa fa-plus-square-o"></i> Employee Master
        <small>View Employee</small>
      </h1>
    </section>

  <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> view employee #<?php echo $datas[0]->id;?></h3>
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
                                <th>Employee ID</th>
                                <td ><?php echo $datas[0]->id;?></td>
                                </tr>
                              </thead>
                              <tbody class="bg-info">
                                <tr>
                                  <th>Name</th>
                                  <td ><?php echo $datas[0]->name;?></td>
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
                              <th>Desgination </th>
                            <td ><?php echo $datas[0]->designation;?></td>
                          </tr>
                            <tr>
                              <th>Email </th>
                              <td ><?php echo $datas[0]->email;?></td>
                            </tr>
                            <tr>
                              <th>Contact No </th>
                              <td ><?php echo $datas[0]->contact_no;?></td>
                            </tr>
                            <tr>
                              <th>DOJ</th>
                              <td ><?php echo $datas[0]->doj;?></td>
                          </tr>
                          <tr>
                            <th>PAN NO</th>
                            <td ><?php echo $datas[0]->pan_no;?></td>
                          </tr>
                          <tr>
                            <th>Bank Name</th>
                            <td ><?php echo $datas[0]->bank_name;?></td>
                          </tr>
                          <tr>
                            <th>Account Number</th>
                            <td ><?php echo $datas[0]->account_number;?></td>
                          </tr>
                          <tr>
                            <th>IFSC Code</th>
                            <td ><?php echo $datas[0]->ifsc_code;?></td>
                          </tr>
                          <tr>
                            <th>Aadhaar NO</th>
                            <td ><?php echo $datas[0]->aadhaar_no;?></td>
                          </tr>


                          <?php
                          if($files!='NA')
                          {
                          $i=0;

                          foreach($files as $file)
                          {
                            echo '<tr>
                            <th>Attachment - '.$i++.'</th>
                            <td><a href="../uploads/employee/'.$file->file_name.'" target="_blank">'.$file->file_name.'</a></td>
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
                              <a class="btn btn-primary" href="<?php echo base_url(); ?>userListing"><i class="fa fa-angle-left"></i> Back</a>
                              <a class="btn btn-success" href="<?php echo base_url().'editOld/'.$details[0]->userId; ?>" title="Edit"><i class="fa fa-pencil"></i>Edit</a>&nbsp;
                          </div>
                      </form>




                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
