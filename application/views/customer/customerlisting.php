<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-square-o"></i> Customer Master
        <small>Add, Edit or Delete Customers</small>
      </h1>
    </section>

  <section class="content">
    <div class="row">
        <div class="col-xs-12 text-right">
            <div class="form-group">
                <a class="btn btn-primary" href="<?php echo base_url(); ?>add_edit_customer"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
    </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Customer List</h3>
                        <div class="box-tools">
                        <form action="<?php echo base_url() ?>customer_listing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText;?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                    </div><!-- /.box-header -->
                    <?php
                    if($datas!='NA')
                    {
                      echo '<div class="container-fluid">
                      <div class="row">
                      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                      <caption></caption>
                      <div class="table-responsive">';
                      echo '<table class="table table-striped table-condensed table-hover table-bordered">
                          <thead class="bg-primary">
                            <tr>
                            <th>S.No</th>
                            <th>Customer ID</th>
                            <th>Company Name</th>
                            <th>Contact person</th>
                            <th>Contact Number</th>
                            <th>Email Id </th>
                            <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>';
                          $i=1;
                          foreach($datas as $data)
                          {
                            $id=$data->customer_id;
                            echo'<tr class="bg-info">
                              <td>'.$i++.'</td>
                              <td>'.$data->customer_id.'</td>
                              <td>'.$data->company_name.'</td>
                              <td>'.$data->contact_person1.', '.$data->contact_person2.'</td>
                              <td>'.$data->contact_no1.', '.$data->contact_no2.'</td>
                              <td>'.$data->email1.', '.$data->email2.'</td>';?>
                              <td class="text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#datas">View</button>&nbsp;|
                                  <a class="btn btn-sm btn-info" href="<?php echo base_url().'add_edit_customer/'.$data->customer_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                  <a class="btn btn-sm btn-danger" href="<?php  echo base_url().'delete_customer/'.$data->customer_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                              </td>
                            <?php echo '</tr>
                                ';
                          }

                      echo'</tbody>
                      </table></div>
                      </div>
                      </div>
                      </div>';

                    }
                    else {
                      echo '<br><br>
                            <h3 class="head text-center">
                                Sorry, No Data Available !
                            </h3> <br><br>';

                    }
                    ?>

                    </div><!-- /.box-body -->

        </div>
      </div>
    </section>

</div>

<!-- Modal -->
<div class="modal fade" id="datas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
        <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-xs-12 col-sm-12 col-md-12">
        <caption></caption>
        <div class="table-responsive">
        <table class="table table-striped table-condensed table-bordered">
            <thead class="bg-primary">
              <tr>
              <th>Customer ID</th>
              <th><?php echo $id;?></th>
              </tr>
            </thead>
            <tbody class="bg-info">
              <tr>
                <th>Company name</th>
                <td><?php echo $data->company_name;?></td>
              </tr>
              <tr>
              <th>Address Line 1</th>
              <td><?php echo $data->address1;?></td>
            </tr>
            <tr>
            <th>Address Line 2</th>
            <td><?php echo $data->address2;?></td>
            </tr>
            <tr>
            <th>Contact person 1</th>
            <td><?php echo $data->contact_person1;?></td>
          </tr>
          <tr>
          <th>Desgination 1</th>
          <td><?php echo $data->designation1;?></td>
        </tr>
          <tr>
            <th>Email 1</th>
            <td><?php echo $data->email1;?></td>
          </tr>
          <tr>
            <th>Contact No 1</th>
            <td><?php echo $data->contact_no1;?></td>
          </tr>
          <tr>
            <th>Contact person 2</th>
            <td><?php echo $data->contact_person2;?></td>
        </tr>
        <tr>
          <th>Desgination 2</th>
          <td><?php echo $data->designation2;?></td>
        </tr>
        <tr>
          <th>Email 2</th>
          <td><?php echo $data->email2; ?></td>
        </tr>
        <tr>
          <th>Contact No 2</th>
          <td><?php echo $data->contact_no2;?></td>
        </tr>
        <tr>
          <th>GST No</th>
          <td><?php echo $data->gstin;?></td>
        </tr>
        <tr>
          <th>Bank Name</th>
          <td><?php echo $data->bank_name;?></td>
        </tr>
        <tr>
          <th>Account Name</th>
          <td><?php echo $data->account_name;?></td>
        </tr>
        <tr>
          <th>Account Number</th>
          <td><?php echo $data->account_number;?></td>
        </tr>
        <tr>
          <th>IFSC Code</th>
          <td><?php echo $data->ifsc_code;?></td>
        </tr>
        <tr>
          <th>Attachment</th>
          <td><?php echo $data->attachment;?></td>
        </tr>

            </tbody>
                </table>
              </div>
            </div>
          </div></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
