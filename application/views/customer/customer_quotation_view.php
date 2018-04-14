

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
                    <div class="box-header" align="center">
                        <h2 class="box-title" style="font-weight:bold;font-family:Roboto;">QUOTATION</h2>
                    </div><!-- /.box-header -->
                    <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 col-xs-12 col-sm-12 col-md-12">
                    <caption></caption>
                    <!--<?php print_r($datas) ?>
                    <?php print_r($company);?>
                    <?php print_r($customer);?>-->
                    <?php foreach ($datas as $data){} ?>
                    <?php foreach($company as $cmp){} ?>
                  <?php foreach($customer as $cust){} ?>
                    <?php $i=1;?>
                    <div class="table-responsive">
                    <?php echo '<table class="table table-hover" style="border:3px solid black;font-family:Roboto;font-size:15px">
                      <tbody>';
                       #Quotation
                          echo '<tr style="border-bottom:hidden">
                            <td colspan="4" style="font-weight:bold">'.$cust->company_name.'</td>
                            <td align="right" style="font-weight:bold">Quote NO.:</td><td>'.$data->quote_id.'</td>
                          </tr>
                          <tr style="border-bottom:hidden">
                            <td colspan="4" style="font-weight:bold">'.$cust->address1.'</td>
                            <td align="right" style="font-weight:bold">Date:</td><td>'.$data->date.'</td>
                          </tr>
                          <tr style="border-bottom:hidden;font-weight:bold">
                            <td colspan="4">'.$cust->address2.'</td>
                            <td align="right">Company\'s GSTN:</td><td>'.$cmp->gstn.'</td>
                          </tr>
                          <tr style="border-bottom:hidden;font-weight:bold">
                            <td colspan="6">Contact no:'.$cust->contact_no1.','.$cust->contact_no2.'</td>
                          </tr>
                          <tr style="border-bottom:hidden;font-weight:bold">
                            <td colspan="6" style="border-bottom:double;">'.$cust->email1.'</td>
                          </tr>';

                          #Quoated to
                          echo '<tr style="border-bottom:hidden"><td colspan="6">&nbsp;</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="6" style="font-weight:bold">Quoted to</td></tr>
                              <tr style="border-bottom:hidden">
                                <td colspan="6">'.$cmp->company_name.'</td>
                              </tr>
                              <tr style="border-bottom:hidden">
                                <td colspan="6">'.$cmp->address1.'</td>
                              </tr>
                              <tr style="border-bottom:hidden"><td colspan="6">&nbsp;</td></tr>
                              <tr><td colspan="6" style="font-weight:bold;border-bottom:double;">Kind attention: Mr.</td></tr>';

                        #Dear Sir
                        echo '<tr style="border-bottom:hidden"><td colspan="6">Dear Sir,</td></tr>
                              <tr><td colspan="6">With reference to your enquiry , we take pleasure in submitting our best offer as below:</td></tr>
                              <tr style="border:3px solid black">
                                <th style="border:3px solid black">S.NO</th>
                                <th style="border:3px solid black">Description</th>
                                <th style="border:3px solid black">HSN/SAC Code</th>
                                <th style="border:3px solid black">Quantity</th>
                                <th style="border:3px solid black">Unit Charges</th>
                                <th style="border:3px solid black">Total amount(in Rs)</th>
                              </tr>
                              <tr style="border:3px solid black">
                                <td style="border:3px solid black">'.$i++.'</td>
                                <td style="border:3px solid black">'.$data->description.'</td>
                                <td style="border:3px solid black">'.$data->hsn_sac.'</td>
                                <td style="border:3px solid black">'.$data->quantity.'</td>
                                <td style="border:3px solid black">'.$data->unit_charges.'</td>
                                <td style="border:3px solid black">'.$data->total.'</td>
                              </tr>
                              <tr style="border:3px solid black">
                                <td colspan="5" align="right" style="border:3px solid black">Total</td>
                                <td></td>
                              </tr>
                              <tr style="border:3px solid black">
                                <td colspan="4" style="border:3px solid black">Tax Value</td>
                                <td align="right" style="border:3px solid black">Total Tax Value</td>
                                <td>4860</td>
                              </tr>
                              <tr style="border:3px solid black">
                                <td colspan="4" style="font-weight:bold">Sl.no 1,2,3: IGST @ 18% = Rs.4860</td>
                                <td align="right" style="border:3px solid black">Grand Total</td>
                                <td></td>
                              </tr>
                              <tr><td colspan="6" style="border-bottom: double;">Amount in words: </td></tr>

                              <tr style="border-bottom:hidden"><td colspan="6">&nbsp;</td></tr>';
                        #Note
                        echo '<tr style="border-bottom:hidden"><td colspan="6" style="font-weight:bold;">Note: </td></tr>
                              <tr style="border-bottom:hidden"><td colspan="6">&nbsp;</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="6" style="font-style:italic">Payment to be done immediately after delivery/service</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="6" style="font-style:italic">We are looking forward for your Purchase Order in return</td></tr>
                              <tr><td colspan="6" style="border-bottom:double;font-style:italic">Quote is valid only for 15 days</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="5"></td><td align="center" style="font-weight:bold">Yours faithfully</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="5"></td><td align="center" style="font-style:italic;font-weight:bold">'.$cust->contact_person1.'</td></tr>
                              <tr><td colspan="5" style="font-style:italic;font-size:12px;">* This is generated digitally</td><td align="center" style="font-weight:bold;font-style:italic">'.$cust->company_name.'</td></tr>
                          </tbody>
                        </table>';
                      ?>
                </div>
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>customer_quotation">Back</a>
                </div>
            </div>
          </div>
      </div><!-- /.box-body -->

            </div>
        </div>
    </section>

</div>
