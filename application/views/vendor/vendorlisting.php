<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-square-o"></i> Vendor Master
        <small>Add, Edit or Delete Vendors</small>
      </h1>
    </section>

  <section class="content">
    <div class="row">
        <div class="col-xs-12 text-right">
            <div class="form-group">
                <a class="btn btn-primary" href="<?php echo base_url(); ?>add_edit_vendor"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
    </div>
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
            <div class="alert alert-success alert-dismissable ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php } ?>
            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Vendor List</h3>
                        <div class="box-tools">
                            <form action="<?php echo base_url() ?>vendor_listing" method="POST" id="searchList">
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
                            <th>Vendor ID</th>
                            <th>Company Name</th>
                            <th>Contact person</th>
                            <th>Contact Number</th>
                            <th>Email Id </th>
                            <th>Files Attached</th>
                            <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>';
                          $i=1;
                          foreach($datas as $data)
                          {

                            echo'<tr class="bg-info">
                             <td>'.$i++.'</td>
                              <td>'.$data->vendor_id.'</td>
                              <td>'.$data->company_name.'</td>
                              <td>'.$data->contact_person1.', '.$data->contact_person2.'</td>
                              <td>'.$data->contact_no1.', '.$data->contact_no2.'</td>
                              <td>'.$data->email1.', '.$data->email2.'</td>
                              <td>'.$data->no_of_files.'</td>';?>
                              <td class="text-center">
                                  <a class="btn btn-sm btn-success" href="<?php echo base_url().'view_vendor/'.$data->vendor_id; ?>" title="view">&nbsp;View&nbsp;&nbsp;<i class="fa fa-info-circle"></i></a>&nbsp;|
                                  <a class="btn btn-sm btn-info" href="<?php echo base_url().'add_edit_vendor/'.$data->vendor_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;|
                                  <a class="btn btn-sm btn-danger" href="<?php  echo base_url().'delete_vendor/'.$data->vendor_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
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

<script type="text/javascript">
 $(document).ready(function(){
  $('#datas').on('show.bs.modal', function(event){
   var btn = $(event.relatedTarget); // find which button is clicked
   var id = btn.data('id'); //get the time data attribute
   var name=btn.data('name');
   var address1=btn.data('address1');
   var address2=btn.data('address2');
   var cp1=btn.data('cp1');
   var cp2=btn.data('cp2');
   var desg1=btn.data('desg1');
   var desg2=btn.data('desg2');
   var email1=btn.data('email1');
   var email2=btn.data('email2');
   var cn1=btn.data('cn1');
   var cn2=btn.data('cn2');
   var gst=btn.data('gst');
   var bank=btn.data('bank');
   var anm=btn.data('anm');
   var ano=btn.data('ano');
   var ifsc=btn.data('ifsc');
   var at=btn.data('at');


   $('#vendor_id').text(id); //put the data value in the element which set in the modal with an id
   $('#name').text(name);
    $('#address1').text(address1);   $('#address2').text(address2);
    $('#cp1').text(cp1);   $('#cp2').text(cp2);
    $('#desg1').text(desg1);   $('#desg2').text(desg2);
    $('#email1').text(email1);   $('#email2').text(email2);
   $('#cn1').text(cn1); $('#cn2').text(cn2);
   $('#gst').text(gst);$('#bank').text(bank);
    $('#anm').text(anm); $('#ano').text(ano);
   $('#ifsc').text(ifsc); $('#at').text(at);
   $("#at").attr("href", "uploads/vendor/"+at);//file upload location

  });
 });
</script>

<!-- Modal -->
<div class="modal fade" id="datas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vendor Details</h5>
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
              <th>Vendor ID</th>
              <th id="vendor_id"></th>
              </tr>
            </thead>
            <tbody class="bg-info">
              <tr>
                <th>Company name</th>
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
            <th>Contact person 1</th>
            <td id="cp1"></td>
          </tr>
          <tr>
          <th>Desgination 1</th>
          <td id="desg1"></td>
        </tr>
          <tr>
            <th>Email 1</th>
            <td id="email1"></td>
          </tr>
          <tr>
            <th>Contact No 1</th>
            <td id="cn1"></td>
          </tr>
          <tr>
            <th>Contact person 2</th>
            <td id="cp2"></td>
        </tr>
        <tr>
          <th>Desgination 2</th>
          <td id="desg2"></td>
        </tr>
        <tr>
          <th>Email 2</th>
          <td id="email2"></td>
        </tr>
        <tr>
          <th>Contact No 2</th>
          <td id="cn2"></td>
        </tr>
        <tr>
          <th>GST No</th>
          <td id="gst"></td>
        </tr>
        <tr>
          <th>Bank Name</th>
          <td id="bank"></td>
        </tr>
        <tr>
          <th>Account Name</th>
          <td id="anm"></td>
        </tr>
        <tr>
          <th>Account Number</th>
          <td id="ano"></td>
        </tr>
        <tr>
          <th>IFSC Code</th>
          <td id="ifsc"></td>
        </tr>
        <tr>
          <th>Attachment</th>
          <td ><a target="_blank" id="at"></a></td>
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
