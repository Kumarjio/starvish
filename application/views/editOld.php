<?php
$userId = '';
$name = '';
$email = '';
$mobile = '';
$roleId = '';


if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $userId = $uf->userId;
        $name = $uf->name;
        $email = $uf->email;
        $mobile = $uf->mobile;
        $roleId = $uf->roleId;
    }
}

?>

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
        <i class="fa fa-users"></i>Employee Master
        <small>Add / Edit User</small>
      </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter User Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" action="<?php echo base_url() ?>editUser" method="post" id="editUser" role="form">
                        <div class="box-body">

                          <!--row 1-->
                            <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="emp_id">Employee ID</label>
                                      <input type="text " class="form-control required" value="<?php echo $datas[0]->id; ?>" id="emp_id" name="emp_id" maxlength="128" readonly>
                                      <input type="hidden" value="<?php echo $userId;?>" name="userId" id="userId" />
                                  </div>
                              </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Employee Name</label>
                                        <input type="text" class="form-control required" value="<?php echo $name; ?>" id="fname" name="fname" maxlength="128">
                                    </div>
                                </div>
                            </div><!--row 1 End-->

                          <!--row 2-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="email">Email address</label>
                                      <input type="text" class="form-control required email" id="email" value="<?php echo $email;?>" name="email" maxlength="128">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="mobile">Mobile Number</label>
                                      <input type="text" class="form-control required digits" id="mobile" value="<?php echo $mobile; ?>" name="mobile" maxlength="10">
                                  </div>
                              </div>
                            </div>
                            <!--row 2 end-->

                            <!--row 3-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpassword" maxlength="20">
                                    </div>
                                </div>
                            </div>
                            <!--row 3 end-->

                            <!--row 4-->
                            <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="address1">Address Line 1</label>
                                      <input type="text" class="form-control required" id="address1" value="<?php echo $datas[0]->address1; ?>" name="address1" maxlength="100">
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address2">Address Line 2</label>
                                    <input type="text" class="form-control required" id="address2" value="<?php echo $datas[0]->address2; ?>" name="address2" maxlength="100">
                                </div>
                          </div>
                            </div>
                            <!--row 4 end-->

                            <!--row 5-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="desg">Designation</label>
                                      <input type="text" class="form-control required" id="desg" value="<?php echo $datas[0]->designation;?>" name="desg" maxlength="100">
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="doj">DOJ</label>
                                    <input type="date" class="form-control required" id="doj" value="<?php echo $datas[0]->doj; ?>" name="doj" maxlength="100">
                                </div>
                          </div>
                            </div>
                            <!--row 5 end-->

                            <!--row 6-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="bank">Bank name</label>
                                      <input type="text" class="form-control required" id="bank" value="<?php echo $datas[0]->bank_name; ?>" name="bank" maxlength="100">
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bank_acc">Account Number</label>
                                    <input type="text" class="form-control required" id="bank_acc" value="<?php echo $datas[0]->account_number; ?>" name="bank_acc" maxlength="100">
                                </div>
                          </div>
                            </div>
                            <!--row 6 end-->

                            <!--row 7-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="ifsc">IFSC code</label>
                                      <input type="text" class="form-control required" id="ifsc" value="<?php echo $datas[0]->ifsc_code; ?>" name="ifsc" maxlength="100">
                                  </div>
                            </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="bank">Aadhaar Number</label>
                                      <input type="text" class="form-control required" id="aadhaar" value="<?php echo $datas[0]->aadhaar_no; ?>" name="aadhaar" maxlength="100">
                                  </div>
                            </div>
                          </div>
                            <!--row 7 end-->

                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="pan">PAN Number</label>
                                      <input type="text" class="form-control required" id="pan" value="<?php echo $datas[0]->pan_no;?>" name="pan" maxlength="30">
                                  </div>
                              </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Designation</label>
                                        <select class="form-control" id="role" name="role">
                                            <option value="0">Select Designation</option>
                                            <?php
                                            if(!empty($roles))
                                            {
                                                foreach ($roles as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->roleId; ?>" <?php if($rl->roleId == $roleId) {echo "selected=selected";} ?>><?php echo $rl->role ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="attachment">Select files to attach more</label>
                                    <input type="file" class="form-control " id="attachment" value="" name="attachment[]" multiple=''>
                                </div>
                              </div>

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
                              <td><li class="list-group-item"><a href="../uploads/employee/'.$file->file_name.'" target="_blank">'.$file->file_name.'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>';
                                        ?>
                                  <td>  <a class="btn btn-sm btn-danger" href="<?php  echo base_url().'delete_user_file/'.$file->file_name.'/'.$file->employee_id; ?>" title="Delete"> <i class="fa fa-trash"></i></a></td>
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

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" name="fileSubmit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
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

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
