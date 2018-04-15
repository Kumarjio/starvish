<!-- add customer -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-plus-square-o"></i> Customer Quotation
      </h1>
    </section>

  <section class="content">

        <div class="row">
            <!-- left column -->
            <!--flash msg-->
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

            <div class="col-md-12">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <i><h3 class="box-title">Add New Quotation</h3></i>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addquote" action="<?php echo base_url() ?>add_customer_quote" method="post" role="form">


                        <div class="box-body">

                          <!--row 1-->
                            <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="emp_id">Customer ID</label>
                                            <select class="form-control" name="customer_id">
                                              <?php foreach($customer as $cust){?>
                                                    <option value="<?php echo $cust->customer_id;?>"><?php echo $cust->customer_id;?> - <?php echo $cust->company_name;?></option>
                                                <?php }?>
                                            </select>


                                  </div>
                              </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quote_id">Quote ID</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('quote_id'); ?>" id="quote_id" name="quote_id" maxlength="128">
                                    </div>
                                </div>
                            </div><!--row 1 End-->

                          <!--row 2-->
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="description">Description</label>
                                      <textarea class="form-control required " id="description" value="<?php echo set_value('description'); ?>" name="description" maxlength="500"></textarea>
                                  </div>
                              </div>

                            </div>
                            <!--row 2 end-->

                            <!--row 3-->
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                         <button type="button" class="btn btn-primary" onClick="addRow('dataTable')">Add Product</button></div>
                                  </div>
                                </div>
                                <!--row 3 end-->

     <div class="container-fluid">
                      <div class="row">
                      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                      <caption></caption>
                      <div class="table-responsive">
			  <table id="dataTable" class="table table-striped table-condensed table-hover table-bordered">
			   <thead class="bg-primary">
                            <tr>
                            <th>Product ID</th>
                            <th>Description</th>
                            <th>Hsn/Sac</th>
                            <th>Quantity</th>
							              <th>Unit Charge</th>
							              <th>Total</th>
                            <th>Tax</th>
							</tr>
                          </thead>
                          <tbody>
                    <tr>
                      <p>
						<td>
							<input type="text" class="small" required="required" name="product_id[]">
						 </td>
						<td>
							<input type="text" class="small" required="required" name="p_description[]">
						 </td>
						<td>
							<input type="text" class="small" required="required" name="hsn[]">
						 </td>
						<td>
							<input type="text" class="small" required="required" name="quantity[]">
						 </td>
						<td>
							<input type="text" class="small" required="required" name="unit_charge[]">
						 </td>
						<td>
							<input type="text" class="small" required="required" name="total[]">
						 </td>
             <td>
 							<input type="text" class="small" required="required" name="tax[]">
 						 </td>

							</p>
                    </tr>
                    </tbody>
                </table></div></div></div></div>

				</div>


                          <div class="box-footer">
							  <input type="submit" class="btn btn-primary" value="Create & Save" />
                              <input type="reset" class="btn btn-default" value="reset" />
                          </div>
                      </form>


                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>


</div>
<script>
function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	if(rowCount <50){
		var row = table.insertRow(rowCount);
		var colCount = table.rows[1].cells.length;
		for(var i=0; i<colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[1].cells[i].innerHTML;
		}
	}

}
</script>
