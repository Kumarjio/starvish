

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bar-chart"></i> Customer Quotation
        <small>View Customer Quotation</small>
      </h1>
    </section>

  <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Customer Quotation</h3>
                    </div><!-- /.box-header -->
                    <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 col-xs-12 col-sm-12 col-md-12">
                    <caption></caption>
                    <?php print_r($datas);?>
                    <div class="table-responsive">
                    <table class="table table-striped table-condensed table-bordered">
                        <thead class="bg-primary">
                          <tr>
                          <th>Customer ID</th>
                          <th><php ?></th>
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
                      </div>


                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
