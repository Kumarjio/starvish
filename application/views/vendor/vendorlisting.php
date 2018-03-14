

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bar-chart"></i> Vendor Master
        <small>Add, Edit or Delete Vendors</small>
      </h1>
    </section>

  <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Vendor List</h3>
                    </div><!-- /.box-header -->
                    <?php
                    if($datas!='NA')
                    {
                      echo '<div class="container">
                      <div class="row">
                      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                      <caption></caption>
                      <div class=" table-responsive">';

                      echo '<table class="table table-striped table-condensed table-bordered">
                          <thead class="bg-primary">
                            <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            </tr>
                          </thead>
                          ';
                      echo'</div>
                      </div>
                      </div>
                      </div>';

                    }
                    else {
                      echo '<br><br>
                            <h3 class="head text-center">
                                Sorry, No Data Available !
                                .
                            </h3> <br><br>';

                    }
                    ?>



                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
