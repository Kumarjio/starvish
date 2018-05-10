<div class="content-wrapper">
  <!-- add customer -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-square-o"></i> Customer Quotation
        <small>Add, Edit or Delete Quotation</small>
      </h1>
    </section>

  <section class="content">
    <div class="row">
        <div class="col-xs-12 text-right">
            <div class="form-group">
                <a class="btn btn-primary" href="<?php echo base_url(); ?>add_edit_customer_quote"><i class="fa fa-plus"></i> Add New</a>
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
                        <h3 class="box-title"> Quotation List</h3>
                        <div class="box-tools">
                        <form action="<?php echo base_url() ?>quotation_search" method="POST" id="searchList">
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
							<th>Date</th>
                            <th>Customer ID</th>
                            <th>Quote ID</th>
                            <th>Description</th>
							              <th>No of products</th>
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
							  <td>'.$data->date.'</td>
                              <td>'.$data->customer_id.'</td>
                              <td>'.$data->quote_id.'</td>
                              <td>'.$data->description.'</td>
							                  <td>'.$data->product_count.'</td>';?>
                              <td class="text-center">
                              <a class="btn btn-sm btn-success" href="<?php echo base_url().'customer_quotation_view/'.$data->quote_id; ?>" title="view"><i class="fa fa-eye"></i></a>
									<a class="btn btn-primary" target="blank" href="<?php echo base_url().'generate_pdf/'.$data->quote_id; ?>" title="Pdf"><i class="fa fa-file-pdf-o" style="font-size:18px;"></i></a>&nbsp;|
                                  <a class="btn btn-sm btn-info" href="<?php echo base_url().'add_edit_customer_quote/'.$data->quote_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                  <a class="btn btn-sm btn-danger" href="<?php  echo base_url().'delete_customer_quote/'.$data->quote_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
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
   var qid=btn.data('qid');
   var date=btn.data('dte');
   var description=btn.data('des');


   $('#customer_id').text(id); //put the data value in the element which set in the modal with an id
   $('#quote_id').text(qid);
    $('#date').text(date);
    $('#description').text(description);

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
              <th>Customer ID</th>
              <th id="customer_id"></th>
              </tr>
            </thead>
            <tbody class="bg-info">
              <tr>
                <th>Quote ID</th>
                <td id="quote_id"></td>
              </tr>
              <tr>
              <th>Date</th>
              <td id="date"></td>
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
