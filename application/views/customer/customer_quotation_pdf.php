

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

  <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header">
                        <h2 class="box-title" align="center" style="font-weight:bold;font-family:Roboto;">QUOTATION</h2>
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
                    <?php echo '<table class="table table-hover" align="center" style="border:1px solid black;border-collapse:collpase;font-family:Roboto;font-size:15px">
                      <tbody>';
                       #Quotation
                          echo '<tr style="border-bottom:hidden">
                                  <td colspan="5" style="font-weight:bold">'.$cmp->company_name.'</td>
                                  <td align="right" style="font-weight:bold">Quote NO.:</td><td>'.$data->quote_id.'</td>
                                </tr>

                                <tr style="border-bottom:hidden">
                                  <td colspan="5" style="font-weight:bold">'.$cmp->address1.'</td>
                                  <td align="right" style="font-weight:bold">Date:</td><td>'.$data->date.'</td>
                                </tr>

                                <tr style="border-bottom:hidden;">
                                  <td colspan="5" style="font-weight:bold">Contact no:'.$cmp->contact_no.'</td>
                                  <td align="right" style="font-weight:bold">Company\'s GSTN:</td><td style="font-weight:bold">'.$cmp->gstn.'</td>
                                </tr>

                               <tr style="border-bottom:hidden;">
                                  <td colspan="7" style="border-bottom:double;font-weight:bold">'.$cmp->email.'</td>
                                </tr>';

                          #Quoated to
                          echo '<tr style="border-bottom:hidden"><td colspan="7">&nbsp;</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="7" style="font-weight:bold">Quoted to</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="7">&nbsp;</td></tr>

                              <tr style="border-bottom:hidden">
                                <td colspan="7">'.$cust->company_name.'</td>
                              </tr>

                              <tr style="border-bottom:hidden">
                                <td colspan="7">'.$cust->address1.','.$cust->address2.'</td>
                              </tr>

                              <tr style="border-bottom:hidden"><td colspan="7">&nbsp;</td></tr>
                              <tr><td colspan="7" style="font-weight:bold;border-bottom:double;">Kind attention: Mr.</td></tr>';

                        #Dear Sir
                        $per=($data->tax)/100;
                        $total=$total+$data->total*$per;
                        echo '<tr style="border-bottom:hidden"><td colspan="7">Dear Sir,</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="7">&nbsp;</td></tr>

                              <tr><td colspan="7">With reference to your enquiry , we take pleasure in submitting our best offer as below:</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="7">&nbsp;</td></tr>

                              <tr>
                                <th style="border:1px solid black;">S.NO</th>
                                <th style="border:1px solid black;">Description</th>
                                <th style="border:1px solid black;">HSN/SAC Code</th>
                                <th style="border:1px solid black;">Quantity</th>
                                <th style="border:1px solid black;">Unit Charges</th>
                                <th style="border:1px solid black;">Tax</th>
                                <th style="border:1px solid black;">Total amount(in Rs)</th>
                              </tr>

                              <tr>
                                <td style="border:1px solid black;">'.$i++.'</td>
                                <td style="border:1px solid black;">'.$data->description.'</td>
                                <td style="border:1px solid black;">'.$data->hsn_sac.'</td>
                                <td style="border:1px solid black;">'.$data->quantity.'</td>
                                <td style="border:1px solid black;">'.$data->unit_charges.'</td>
                                <td style="border:1px solid black;">'.$data->tax.'='.$per.'</td>
                                <td style="border:1px solid black;">'.$total.'</td>
                              </tr>

                              <tr>
                                <td colspan="6" align="right" style="border:1px solid black;">Total</td>
                                <td style="border:1px solid black;">'.$total.'</td>
                              </tr>

                              <tr>
                                <td colspan="5" style="border:1px solid black;">Tax Value</td>
                                <td align="right" style="border:1px solid black;">Total Tax Value</td>
                                <td style="border:1px solid black;">4860</td>
                              </tr>

                              <tr>
                                <td colspan="5" style="border:1px solid black;font-weight:bold">Sl.no 1,2,3: IGST @ 18% = Rs.4860</td>
                                <td align="right" style="border:1px solid black;">Grand Total</td>
                                <td style="border:1px solid black;"></td>
                              </tr>

                              <tr><td colspan="7" style="border:1px solid black;border-bottom: double;">Amount in words:&nbsp;</b>';
                              print_r($amount); echo(' Rupees only'); ' </td></tr>
                              <tr style="border-bottom:hidden"><td colspan="7">&nbsp;</td></tr>';

                        #Note
                        echo '<tr style="border-bottom:hidden"><td colspan="6" style="font-weight:bold;">Note: </td></tr>
                              <tr style="border-bottom:hidden"><td colspan="6">&nbsp;</td></tr>

                              <tr style="border-bottom:hidden"><td colspan="6" style="font-style:italic">Payment to be done immediately after delivery/service</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="6" style="font-style:italic">We are looking forward for your Purchase Order in return</td></tr>

                              <tr><td colspan="7" style="font-style:italic">Quote is valid only for 15 days</td></tr>
                              <tr><td colspan="7" style="border-bottom:double;font-style:italic">'.$datas[0]->note.'</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="6">&nbsp;</td></tr>

                              <tr style="border-bottom:hidden"><td colspan="6"></td><td align="center" style="font-weight:bold">Yours faithfully</td></tr>
                              <tr style="border-bottom:hidden"><td colspan="6"></td><td align="center" style="font-style:italic;font-weight:bold">'.$cust->contact_person1.'</td></tr>
                              <tr><td colspan="6" style="font-style:italic;font-size:12px;">* This is generated digitally</td><td align="center" style="font-weight:bold;font-style:italic">'.$cmp->company_name.'</td></tr>
                          </tbody>
                        </table>';
                      ?>
                </div>
            </div>
          </div>
      </div><!-- /.box-body -->

            </div>
        </div>
    </section>

</div>
