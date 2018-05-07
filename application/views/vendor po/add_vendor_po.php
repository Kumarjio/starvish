<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
          <div class="col-xs-12 text-left">
              <div class="form-group">
                  <a class="btn btn-primary" href="<?php echo base_url(); ?>vendor_po"><i class="fa fa-angle-left"></i> Back</a>
              </div>
          </div>
      </div>
      <h1>
        <i class="fa fa-plus-square-o"></i> Vendor PO Listing
        <small>Add, Edit, Update or Delete the Vendor PO</small>
      </h1>
    </section>

  <section class="content">

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
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php } ?>
            <div class="col-md-12">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <i><h3 class="box-title">Add New Vendor PO</h3></i>
                    </div><!-- /.box-header -->
                    <script>
                    $(document).ready(function(){

                      jQuery.validator.addMethod("noSpace", function(value, element) {
                        return value.indexOf(" ") < 0 && value != "";
                      }, "No space please and don't leave it empty");


                      $("form").validate({
                        rules: {
                          vendor_id: {
                            noSpace: true
                          }
                        }
                      });

                      })
                    </script>
                    <?php $this->load->helper("form"); ?>
                   <!-- <form role="form" id="addvendor" action="<?php echo base_url() ?>add_vendor" method="post" role="form">-->
				            <?php echo form_open_multipart('add_vendor_po');?>
                        <div class="box-body">
                            <!--row 1-->
                            <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="date">Date</label>
                                      <input type="date" class="form-control required " id="date" value="<?php echo set_value('date'); ?>" name="date" maxlength="50">
                                  </div>
                              </div>
                            </div>

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="vendor_id">Vendor Id</label>
                                          <input type="textarea" class="form-control required " id="vendor_id" value="<?php echo set_value('vendor_id'); ?>" name="vendor_id" maxlength="50">
                                      </div>
                                  </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="po_id">PO Id</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('po_id'); ?>" id="po_id" name="po_id" maxlength="128">
                                    </div>
                                </div>
                              </div>

                            <!--row 3 end-->

                                <!--row 4-->
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                          <textarea type="textarea" rows="5" cols="60" class="form-control required" id="description" value="<?php echo set_value('description'); ?>" name="description" maxlength="500"></textarea>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <button type="button" class="btn btn-primary" onClick="addRow()">Add Product</button></div>
                                    </div>
                                  </div>
                                  <!--row 4 end-->

                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                        <caption></caption>
                        <div class="table-responsive">
  			                      <table id="dataTable" class="table table-striped table-condensed table-hover table-bordered product-details">
  			                            <thead class="bg-primary">
                                        <tr>
                                          <th>Product ID</th>
                                          <th>Description</th>
                                          <th>Hsn/Sac</th>
                                          <th>Quantity</th>
              							              <th>Unit Charge</th>
              							              <th>Total</th>
            							              </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                            </table></div></div></div></div>
  				  <!--row 1-->
                              <div class="row">

                                 <!--<div class="col-md-4">

                                          <label for="quote_id">Total Tax</label>
                                          <input type="text"  value="0" id="totaltax" readonly >

                                  </div>-->
                                  <div class="col-md-4">

                                          <label for="quote_id">Total</label>
                                          <input type="text" value="0" id="ttotal" readonly>

                                  </div>
  								                <div class="col-md-4">
                                          <label for="quote_id">Grand Total</label>
                                          <input type="text" value="0" id="grandtotal" readonly>

                                  </div>
                              </div><!--row 1 End-->

  				        </div>


                            <div class="box-footer">
  							                 <input type="submit" class="btn btn-primary" value="Create & Save" />
                                <input type="reset" class="btn btn-default" value="reset" />
                            </div>
                      </div><!-- /.box-body -->


              </div>
          </div>
      </section>


  </div>


  <script>
  var grand_total=0;
  var ttotal=0;
  //var tot_tax=0;
  var counter = 1;
  var totalArray =  [];
  var grandArray = [];
  //var taxArray = [];
  function addRow(){
  	console.log("crick");
      counter++;
      var newRow = jQuery('<tr><td><input type="text" name="product_id[]" class="small" required></td><td><input type="text" name="p_description[]" class="small" required></td><td><input type="text" name="hsn[]" class="small" required/></td><td><input type="text" class="product-add-field quantity ' + counter + '" name="quantity[]" class="small" required/></td><td><input type="text" class="product-add-field unit-price ' + counter + '" name="unit_charge[]" class="small" required/></td><td><input type="text" value="" name="total"  class="product-add-field price-total ' + counter + '" id="" class="small" required/></td><td><a href="#"  class="close">X</a></td></tr>');
      jQuery('table.product-details').append(newRow);
  }


  jQuery('table.product-details').on('click','tr a',function(e){
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
    //  var tax = jQuery( ".unit-tax", row).val();
      var total = value * value2;
  	var amt= (value*value2)/100;
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
  	});

  </script>
