<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Employee Master
        <small>Add, Edit, or Delete Employees</small>
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->





                      <?php
                      if($userRecords!='NA')
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
                              <th>Employee ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile</th>
                              <th>Role</th>
                              <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>';
                            $i=1;
                            foreach($userRecords as $record)
                            {
                              $id=$record->employee_id;
                              echo'<tr class="bg-info">
                                <td>'.$i++.'</td>
                                <td>'.$record->employee_id.'</td>
                                <td>'.$record->name.'</td>
                                <td>'.$record->email.'</td>
                                <td>'.$record->mobile.'</td>
                                <td>'.$record->role.'</td>';?>
                                <td class="text-center">

                              <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#datas" data-id="<?php echo $record->employee_id?>"
                              data-name="<?php echo $record->name?>" data-address1="<?php echo $record->address1;?>" data-address2="<?php echo $record->address2?>"
                              data-desgination="<?php echo $record->designation?>" data-email="<?php echo $record->email?>" data-mobile="<?php echo $record->mobile?>"
                              data-doj="<?php echo $record->doj?>" data-pan="<?php echo $record->pan_no?>" data-bank="<?php echo $record->bank_name?>"
                              data-acc="<?php echo $record->account_number?>" data-ifsc="<?php echo $record->ifsc_code?>" data-aadhaar="<?php echo $record->aadhaar_no?>"
                              data-role="<?php echo $record->role?>">

                            <i class="fa fa-info-circle"></i></a>&nbsp;|
                          <a class="btn btn-sm btn-primary" href="<?= base_url().'login-history/'.$record->userId; ?>" title="Login history"><i class="fa fa-history"></i></a> |
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editOld/'.$record->userId; ?>" title="Edit"><i class="fa fa-pencil"></i></a> |
                          <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->userId; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                      <?php echo '</tr>
                          ';
                    }

                echo'</tbody>
                </table></div>
                </div>
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
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
            </section>
        </div>

        <script type="text/javascript">
         $(document).ready(function(){
          $('#datas').on('show.bs.modal', function(event){
           var btn = $(event.relatedTarget); // find which button is clicked
           var id = btn.data('id'); //get the time data attribute
           var name=btn.data('name');
           var address1=btn.data('address1');
           var address2=btn.data('address2');
           var desg=btn.data('desgination');
           var email=btn.data('email');
           var mobile=btn.data('mobile');
           var doj=btn.data('doj');
           var pan=btn.data('pan');
           var bank=btn.data('bank');
           var acc=btn.data('acc');
           var ifsc=btn.data('ifsc');
           var aadhaar=btn.data('aadhaar');
           var role=btn.data('role');

           $('#employee_id').text(id); //put the data value in the element which set in the modal with an id
           $('#name').text(name);
           $('#address1').text(address1);
           $('#address2').text(address2);
           $('#desg').text(desg);
            $('#email').text(email);
            $('#mobile').text(mobile);
            $('#doj').text(doj);
            $('#pan').text(pan);
            $('#bank').text(bank);
            $('#acc').text(acc);
            $('#ifsc').text(ifsc);
            $('#aadhaar').text(aadhaar);
            $('#role').text(role);

          });
         });
        </script>
        <!-- Modal -->
        <div class="modal fade" id="datas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
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
                      <th>Employee ID</th>
                      <th id="employee_id"></th>
                      </tr>
                    </thead>
                    <tbody class="bg-info">
                      <tr>
                        <th>Name</th>
                        <td id="name"></td>
                      </tr>
                      <tr>
                        <th>Address Line 1</th>
                        <td id="address1"></td>
                      </tr>
                      <tr>
                        <th>Address Line 2</th>
                        <td id="address2"></td>
                      </tr>
                      
                      <tr>
                        <th>Designation</th>
                        <td id="desg"></td>
                      </tr>
                      <tr>
                      <th>Email</th>
                      <td id="email"></td>
                    </tr>
                    <tr>
                    <th>Mobile</th>
                    <td id="mobile"></td>
                    </tr>
                    <tr>
                      <th>Date of Joining</th>
                      <td id="doj"></td>
                    </tr>
                    <tr>
                      <th>PAN Number</th>
                      <td id="pan"></td>
                    </tr>
                    <tr>
                      <th>Bank Name</th>
                      <td id="bank"></td>
                    </tr>
                    <tr>
                      <th>Account Number</th>
                      <td id="acc"></td>
                    </tr>
                    <tr>
                      <th>IFSC</th>
                      <td id="ifsc"></td>
                    </tr>
                    <tr>
                      <th>Aadhaar Number</th>
                      <td id="aadhaar"></td>
                    </tr>
                    <tr>
                    <th>Role</th>
                    <td id="role"></td>
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



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
