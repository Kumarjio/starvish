<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Note Master
        <small>Add, Edit, or Delete Note</small>
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>add_edit_note"><i class="fa fa-plus"></i> Add New</a>
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
                        <h3 class="box-title"> Note List</h3>
                        <div class="box-tools">
                            <form action="<?php echo base_url() ?>note_listing" method="POST" id="searchList">
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
                            <th>ID</th>
                            <th>Description</th>
                            <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>';
                          foreach($datas as $data)
                          {
                            echo'<tr class="bg-info">
                              <td>'.$data->id.'</td>
                              <td>'.$data->description.'</td>';?>
                              <td class="text-center">
                                  <a  class="btn btn-sm btn-success" data-toggle="modal" data-target="#datas" data-id="<?php echo $data->id?>"
                                    data-description="<?php echo $data->description?>">
                                    <i class="fa fa-info-circle"></i></a>&nbsp;|
                                  <a class="btn btn-sm btn-info" href="<?php echo base_url().'add_edit_note/'.$data->id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;|
                                  <a class="btn btn-sm btn-danger" href="<?php  echo base_url().'delete_note/'.$data->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
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
            var description=btn.data('description');

           $('#id').text(id); //put the data value in the element which set in the modal with an id
           $('#description').text(description);
            });
         });
        </script>

        <!-- Modal -->
        <div class="modal fade" id="datas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Note</h5>
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
                    <tbody class="bg-info">
                      <tr>
                        <th>ID</th>
                        <td id="id"></td>
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
