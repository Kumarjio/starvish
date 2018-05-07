<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file-text-o"></i> Customer DC Listing
        <small>Add, Edit, Update or Delete Customer DC</small>
      </h1>
    </section>

  <section class="content">
    <div class="row">
        <div class="col-xs-12 text-right">
            <div class="form-group">
                <a class="btn btn-primary" href="<?php echo base_url(); ?>add_edit_customer_dc"><i class="fa fa-plus"></i> Add New DC</a>
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
                        <h3 class="box-title"> Cusotmer DC List</h3>
                        <div class="box-tools">
                            <form action="<?php echo base_url() ?>customer_dc_listing" method="POST" id="searchList">
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
                            <th>Date</th>
                            <th>Customer Id</th>
                            <th>DC No</th>
                            <th>Description</th>
                            <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>';
                          $i=1;
                          foreach($datas as $data)
                          {

                            echo'<tr class="bg-info">
                             <td>'.$i++.'</td>
                              <td>'.$data->date.'</td>
                              <td>'.$data->customer_id.'</td>
                              <td>'.$data->dc_no.'</td>
                              <td>'.$data->description.'</td>';?>

                              <td class="text-center">
                                  <a  class="btn btn-sm btn-success" data-toggle="modal" data-target="#datas" data-id="<?php echo $i++?>"
                                    data-date="<?php echo $data->date;?>" data-customer_id="<?php echo $data->customer_id;?>" data-dc_no="<?php echo $data->dc_no;?>"
                                   data-description="<?php echo $data->description;?>">
                                    <i class="fa fa-info-circle"></i></a>&nbsp;|
                                  <a class="btn btn-sm btn-info" href="<?php echo base_url().'add_edit_customer_dc/'.$data->customer_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;|
                                  <a class="btn btn-sm btn-danger" href="<?php  echo base_url().'delete_customer_dc/'.$data->customer_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
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
   var date=btn.data('date');
   var customer_id=btn.data('customer_id');
   var dc_no=btn.data('dc_no');
   var description=btn.data('description');

   $('#id').text(id); //put the data value in the element which set in the modal with an id
   $('#date').text(date);
   $('#customer_id').text(customer_id);
   $('#dc_no').text(dc_no);
   $('#description').text(description);

  });
 });
</script>

<!-- Modal -->
<div class="modal fade" id="datas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Cusotmer DC Details</h5>
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
              <th>Date</th>
              <th id="date"></th>
              </tr>
            </thead>
            <tbody class="bg-info">
              <tr>
                <th>Customer Id</th>
                <td id="customer_id"></td>
              </tr>
              <tr>
              <th>DC No</th>
              <td id="dc_no"></td>
            </tr>
            <tr>
            <th>Description</th>
            <td id="description"></td>
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
