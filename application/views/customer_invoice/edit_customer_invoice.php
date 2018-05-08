<!-- add customer -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
          <div class="col-xs-12 text-left">
              <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>customer_invoice"><i class="fa fa-angle-left"></i> Back</a>
              </div>
          </div>
      </div>
      <h1>
        <i class="fa fa-plus-square-o"></i> Customer Invoice
        <small>Add, Edit, Update or Delete the Customer Invoice</small>
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
                        <i><h3 class="box-title">Edit Customer Invoice</h3></i>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                  <!--  <form role="form" id="addinvoice" action="<?php echo base_url() ?>add_customer_invoice" method="post" role="form">-->
                      <?php echo form_open_multipart('update_customer_invoice');?>


                        <div class="box-body">

                          <!--row 1-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="date">Date</label>
                                      <input type="date" class="form-control required" value="<?php echo $datas[0]->date; ?>" id="date" name="date" maxlength="128">
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="customer_id">Customer ID</label>
                                      <input type="text" class="form-control required" value="<?php echo $datas[0]->customer_id; ?>" id="customer_id" name="customer_id" maxlength="128">

                                        <!--    <select class="form-control" name="customer_id">
                                              <?php foreach($customer as $cust){?>
                                                    <option value="<?php echo $cust->customer_id;?>"><?php echo $cust->customer_id;?> - <?php echo $cust->company_name;?></option>
                                                <?php }?>
                                            </select>-->
                                  </div>
                              </div>
                            </div><!--row 1 End-->

                            <!--row 2-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="invoice_id">Invoice ID</label>
                                        <input type="text" class="form-control required" value="<?php echo $datas[0]->invoice_id; ?>" id="invoice_id" name="invoice_id" maxlength="128">
                                    </div>
                                </div>

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="po_id">PO ID</label>
                                      <input type="po_id" class="form-control required" value="<?php echo $datas[0]->po_id; ?>" id="po_id" name="po_id" maxlength="128">
                                  </div>
                              </div>

                            </div>
                            <!--row 2 end-->

                            <!--row 3-->
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="srn_dc">Srn/dc</label>
                                        <input type="srn_dc" class="form-control required" value="<?php echo $datas[0]->srn_dc; ?>" id="srn_dc" name="srn_dc" maxlength="128">
                                    </div>
                                </div>
                              </div>
                              <!--row 3 end-->

                              <!--row 4-->
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="payment_mode">Payment Mode</label>
                                          <input type="payment_mode" class="form-control required" value="<?php echo $datas[0]->payment_mode; ?>" id="payment_mode" name="payment_mode" maxlength="128">
                                      </div>
                                  </div>
                                </div>
                                <!--row 4 end-->


                            <!--row 5-->
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                         <button type="button" class="btn btn-primary" onClick="addRow()">Add Product</button></div>
                                  </div>
                                </div>
                                <!--row 5 end-->

                                <div class="container-fluid">
                                  <div class="row">
                                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                                  <caption></caption>
                                  <div class="table-responsive">
            			                    <table id="dataTable" class="table table-striped table-condensed table-hover table-bordered product-details">
            			                         <thead class="bg-primary">
                                             <tr>
                                                <th>Description</th>
                                                <th>Hsn/Sac</th>
                                                <th>Quantity</th>
                    							              <th>Unit Charge</th>
                                                <th>Total</th>
                    							              <th>Cgst Percent</th>
                                                <th>Cgst Amount</th>
                                                <th>Sgst Percent</th>
                                                <th>Sgst Amount</th>
                                                <th>Igst Percent</th>
                                                <th>Igst Amount</th>
                    							          </tr>
                                          </thead>
                                          <tbody>
                                            <?php for($i=0;$i<count($data);$i++) {
                                            echo'<tr>';
                                                echo '<td><input type="text" id="description" name="description" value='.$data[$i]->description.'></td>
                                                <td><input type="text" id="hsn_sac" value='.$data[$i]->hsn_sac.' name="hsn_sac"></td>
                                                <td><input type="text" id="quantity" value='.$data[$i]->quantity.' name="quantity"></td>
                                                <td><input type="text" id="unit_charges" value='.$data[$i]->unit_charges.' name="unit_charges"></td>
                                                <td><input type="text" id="total" value='.$data[$i]->total.' name="total"></td>
                                                <td><input type="text" id="cgst_percent" value='.$data[$i]->cgst_percent.' name="cgst_percent"></td>
                                                <td><input type="text" id="cgst_amt" value='.$data[$i]->cgst_amt.' name="cgst_amt"></td>
                                                <td><input type="text" id="sgst_percent" value='.$data[$i]->sgst_percent.' name="sgst_percent"></td>
                                                <td><input type="text" id="sgst_amt" value='.$data[$i]->sgst_amt.' name="sgst_amt"></td>
                                                <td><input type="text" id="igst_percent" value='.$data[$i]->igst_percent.' name="igst_percent"></td>
                                                <td><input type="text" id="igst_amt" value='.$data[$i]->igst_amt.' name="igst_amt"></td>
                                              </tr>';
                                            }?>
                                          </tbody>
                                    </table></div></div></div></div>

				  <!--row 1-->
                          <!--  <div class="row">

                               <div class="col-md-4">

                                        <label for="quote_id">Total Tax</label>
                                        <input type="text"  value="0" id="totaltax" readonly >

                                </div>
                                <div class="col-md-4">

                                        <label for="quote_id">Total</label>
                                        <input type="text" value="0" id="ttotal" readonly>

                                </div>
								<div class="col-md-4">
                                        <label for="quote_id">Grand Total</label>
                                        <input type="text" value="0" id="grandtotal" readonly>

                                </div>
                            </div>--><!--row 1 End-->
                          </div>

                          <div class="box-footer">
							  <input type="submit" class="btn btn-primary" value="Update" />
                              <input type="reset" class="btn btn-default" value="Reset" />
                          </div>

                    </div><!-- /.box-body -->


            </div>
        </div>
    </section>

</div>


<script>
/*var grand_total=0;
var ttotal=0;
//var tot_tax=0;

var totalArray =  [];
var grandArray = [];*/
//var taxArray = [];
var counter = 1;
function addRow(){
    counter++;
    console.log("crick");
    var newRow = jQuery('<tr><td><input type="text" name="p_description[]" class="small" required></td><td><input type="text" name="hsn[]" class="small" required/></td><td><input type="text" class="product-add-field quantity ' + counter + '" name="quantity[]" class="small" required/></td><td><input type="text" class="product-add-field unit-price ' + counter + '" name="unit_charge[]" class="small" required/></td><td><input type="text" value="" name="total"  class="product-add-field price-total ' + counter + '" id="" class="small" required/></td><td><input type="text" name="cgst_percent[]" class="small" required></td><td><input type="text" name="cgst_amt[]" class="small" required></td><td><input type="text" name="sgst_percent[]" class="small" required></td> <td><input type="text" name="sgst_amt[]" class="small" required></td><td><input type="text" name="igst_percent[]"></td><td><input type="text" name="igst_amt[]"></td> <td><a href="#" class="close">X</a></td></tr>');
    jQuery('table.product-details').append(newRow);
  }


/*jQuery('table.product-details').on('click','tr a',function(e){
 e.preventDefault();
jQuery(this).parents('tr').remove();
//$("#totaltax").val('0');
$("#ttotal").val('0');
$("#grandtotal").val('0');
});


jQuery('table.product-details').on("keyup", "tr", function() {
    var row = jQuery(this);
    var value = jQuery( ".unit-price", row ).val();
    var value2 = jQuery( ".quantity", row ).val();
    //var tax = jQuery( ".unit-tax", row).val();
    var total = value * value2;
	var amt= (tax*value*value2)/100;
  var prod_total=total+amt;
	//load values in index
	totalArray[counter] = total;
	grandArray[counter] = total+amt;
	//taxArray[counter] = amt;

	//init to 0 to prevent loop iteration
	grand_total=0;
	ttotal=0;
	//tot_tax=0;
	for (var i = 2; i < totalArray.length; i++) {
	    grand_total += grandArray[i];
		ttotal += totalArray[i];
		//tot_tax += taxArray[i];
	}
	console.log("grand total: "+grand_total);
	console.log("total total: "+ttotal);
	//console.log("total tax: "+tot_tax);
	//display values
	//$("#totaltax").val(tot_tax);
	$("#ttotal").val(ttotal);
	$("#grandtotal").val(grand_total);

	jQuery( ".product-add-field.price-total", row ).val( prod_total.toFixed(3) );
});*/

</script>
