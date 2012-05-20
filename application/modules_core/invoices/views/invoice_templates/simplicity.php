<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->lang->line('invoice_number'); ?> <?php echo invoice_id($invoice); ?></title>
<style type="text/css">
* {margin: 0;padding: 0}

body {background: #ffffff;font-family: Arial, sans-serif;font-size: 14px;color: #4b4b4b;text-transform: uppercase}

td.seperator {height: 25px}

h1 {font-size: 21px;color: #4b4b4b}

h2 {font-size: 17px;color: #4b4b4b}

h3 {font-size: 15px;color: #c8c8c8}

h4 {font-size: 21px;color: #c8c8c8}

p {text-transform: none}

table#template {background: #ffffff;width: 100%;margin: 0 auto;padding: 25px}

td#invoice {width: 50%}

td#date {width: 50%;text-align: right}

td#to {width: 50%}

td#to span, td#from span {color: #4b4b4b}

.right {text-align: right}

td.legend {background: #4b4b4b;padding: 9px 12px;font-size: 15px;color: #ffffff}

td#item {width: 50%}

td#quantity {width: 12%;text-align: center}

td#price {width: 19%;text-align: center}

td#amount {width: 19%;text-align: right}

td.items {width: 50%;padding: 11px 12px;border-bottom: 1px dashed #4b4b4b}
td.items span {font-size: 12px;color: #777;margin: 5px 0 0;display: block}

td.quantities {width: 12%;padding: 11px 12px;border-bottom: 1px dashed #4b4b4b;text-align: center}

td.prices {width: 19%;padding: 11px 12px;border-bottom: 1px dashed #4b4b4b;text-align: center}

td.amounts {width: 19%;padding: 11px 12px;border-bottom: 1px dashed #4b4b4b;text-align: right}

td.total-amount {width: 50%;background: #f8f8f8;padding: 9px 12px;font-size: 15px}

td.total-amount-2 {width: 50%;background: #f8f8f8;padding: 9px 12px;font-size: 15px;text-align: right}

td.discount-percent {width: 50%;padding: 9px 12px;font-size: 15px}

td.discount-amount {width: 50%;padding: 9px 12px;font-size: 15px;text-align: right}

td.total-discount {background: #4b4b4b;padding: 9px 12px;font-size: 15px;color: #ffffff}

td#total-discount-exkl {width: 50%}

td#total-discount-amount {width: 50%;text-align: right}

td#payment {width: 50%}

td#vat {width: 50%;text-align: right}

td#bank {width: 50%}

td#account {width: 50%;text-align: right}

td#logo img {border: none}
</style>
</head>

<body>
<table id="template" border="0" cellspacing="0" cellpadding="0">
	<tr>
    <td id="logo"><?php echo invoice_logo(); ?></td>
    <td id="from" colspan="3" class="right">
    	<table border="0" cellspacing="0" cellpadding="0" width="100%" class="right">
    		<tr>
    			<td width="33%">
    				<strong><?php echo invoice_from_company_name($invoice); ?></strong>
      			<p>
        			<?php echo invoice_from_address($invoice); ?><br />
        			<?php if (invoice_from_address_2($invoice) != '') { echo invoice_from_address_2($invoice); echo '<br />'; } ?>
        			<?php echo invoice_from_zip($invoice); ?> <?php echo invoice_from_city($invoice); ?>
      			</p>
    			</td>
    			<td width="66%" class="right">
    				<p>
    					T: <?php echo invoice_from_phone_number($invoice); ?><br />
    					F: <?php echo invoice_from_fax_number($invoice); ?><br />
    					<?php echo $this->lang->line('simplicity_web'); ?>
    				</p>    				
    			</td>
    		</tr>
    	</table>
    </td>
  </tr>
  <tr>
    <td class="seperator" colspan="4"> </td>
  </tr>
  <tr>
    <td id="invoice" colspan="2">
      <h1><?php echo $this->lang->line('invoice'); ?></h1>
      <h3>#<?php echo invoice_id($invoice); ?></h3>
    </td>
    <td id="date" colspan="2">
      <h1><?php echo $this->lang->line('date'); ?></h1>
      <h3><?php echo invoice_date_entered($invoice); ?></h3>
    </td>
  </tr>
  <tr>
    <td class="seperator" colspan="4"> </td>
  </tr>
  <tr>
    <td id="to" colspan="4">
      <h4><?php echo $this->lang->line('to'); ?></h4>
      <p>
        <?php echo invoice_to_client_name($invoice); ?><br />
        <?php echo invoice_to_address($invoice); ?><br />
        <?php if (invoice_to_address_2($invoice) != '') { echo invoice_to_address_2($invoice); echo '<br />'; } ?>
        <?php echo invoice_to_zip($invoice); ?> <?php echo invoice_to_city($invoice); ?>
      </p>
    </td>
  </tr>
  <tr>
    <td class="seperator" colspan="4"> </td>
  </tr>
  <tr>
    <td id="item" class="legend"><?php echo $this->lang->line('item'); ?></td>
    <td id="quantity" class="legend"><?php echo $this->lang->line('quantity'); ?></td>
    <td id="price" class="legend"><?php echo $this->lang->line('unit'); ?></td>
    <td id="amount" class="legend"><?php echo $this->lang->line('cost'); ?></td>
  </tr>
  
  <?php foreach ($invoice->invoice_items as $item) { ?>
  <tr>
    <td class="items"><strong><?php echo invoice_item_name($item); ?></strong><br /><span><?php echo invoice_item_description($item); ?></span></td>
    <td class="quantities"><?php echo invoice_item_qty($item); ?></td>
    <td class="prices"><?php echo invoice_item_unit_price($item); ?></td>
    <td class="amounts"><?php echo invoice_item_total($item); ?></td>
  </tr>
  <?php } ?>
  
  <tr>
    <td class="total-amount" colspan="2"><?php echo $this->lang->line('subtotal'); ?></td>
    <td class="total-amount-2" colspan="2"><?php echo invoice_subtotal($invoice); ?></td>
  </tr>
  
  <?php if ($invoice->invoice_tax > 0) { ?>
  <tr>
    <td class="discount-percent" colspan="2"><?php echo $this->lang->line('tax'); ?></td>
    <td class="discount-amount" colspan="2"><?php echo invoice_tax_total($invoice); ?></td>
  </tr>
  <?php } ?>
  
  <?php if ($invoice->invoice_tax <= 0) { ?>
  	<?php if ($invoice->invoice_shipping > 0) { ?>
  	<tr>
    	<td class="discount-percent" colspan="2"><?php echo $this->lang->line('shipping'); ?></td>
    	<td class="discount-amount" colspan="2"><?php echo invoice_shipping($invoice); ?></td>
  	</tr>
  	<?php } ?>
  <?php } elseif ($invoice->invoice_tax > 0) { ?>
  	<?php if ($invoice->invoice_shipping > 0) { ?>
  	<tr>
    	<td class="total-amount" colspan="2"><?php echo $this->lang->line('shipping'); ?></td>
    	<td class="total-amount-2" colspan="2"><?php echo invoice_shipping($invoice); ?></td>
  	</tr>
  	<?php } ?>
	<?php } ?>
   
  <?php if ($invoice->invoice_tax <= 0 && $invoice->invoice_shipping <= 0) { ?>
  	<?php if ($invoice->invoice_discount > 0) { ?>
  	<tr>
    	<td class="discount-percent" colspan="2"><?php echo $this->lang->line('discount'); ?></td>
    	<td class="discount-amount" colspan="2"><?php echo invoice_discount($invoice); ?></td>
 		</tr>
  	<?php } ?>
  <?php } elseif ($invoice->invoice_tax > 0 && $invoice->invoice_shipping <= 0 || $invoice->invoice_tax <= 0 && $invoice->invoice_shipping > 0 ) { ?>
  	<?php if ($invoice->invoice_discount > 0) { ?>
  	<tr>
    	<td class="total-amount" colspan="2"><?php echo $this->lang->line('discount'); ?></td>
    	<td class="total-amount-2" colspan="2"><?php echo invoice_discount($invoice); ?></td>
 		</tr>
  	<?php } ?>
  <?php } else { ?>
  	<?php if ($invoice->invoice_discount > 0) { ?>
  	<tr>
    	<td class="discount-percent" colspan="2"><?php echo $this->lang->line('discount'); ?></td>
    	<td class="discount-amount" colspan="2"><?php echo invoice_discount($invoice); ?></td>
 		</tr>
  	<?php } ?>
  <?php } ?>

  <?php if ($invoice->invoice_tax <= 0 && $invoice->invoice_shipping <= 0 && $invoice->invoice_discount <= 0) { ?>
  	<tr>
    	<td class="discount-percent" colspan="2"><?php echo $this->lang->line('grand_total'); ?></td>
    	<td class="discount-amount" colspan="2"><?php echo invoice_total($invoice); ?></td>
  	</tr>
  <?php } elseif ($invoice->invoice_tax > 0 && $invoice->invoice_shipping <= 0 && $invoice->invoice_discount <= 0 || $invoice->invoice_tax <= 0 && $invoice->invoice_shipping > 0 && $invoice->invoice_discount <= 0 || $invoice->invoice_tax <= 0 && $invoice->invoice_shipping <= 0 && $invoice->invoice_discount > 0) { ?>
  	<tr>
    	<td class="total-amount" colspan="2"><?php echo $this->lang->line('grand_total'); ?></td>
    	<td class="total-amount-2" colspan="2"><?php echo invoice_total($invoice); ?></td>
  	</tr>
  <?php } elseif ($invoice->invoice_tax > 0 && $invoice->invoice_shipping > 0 && $invoice->invoice_discount <= 0 || $invoice->invoice_tax > 0 && $invoice->invoice_shipping <= 0 && $invoice->invoice_discount > 0 || $invoice->invoice_tax <= 0 && $invoice->invoice_shipping > 0 && $invoice->invoice_discount > 0) { ?>
  	<tr>
    	<td class="discount-percent" colspan="2"><?php echo $this->lang->line('grand_total'); ?></td>
    	<td class="discount-amount" colspan="2"><?php echo invoice_total($invoice); ?></td>
  	</tr>
  <?php } else { ?>
  	<tr>
    	<td class="total-amount" colspan="2"><?php echo $this->lang->line('grand_total'); ?></td>
    	<td class="total-amount-2" colspan="2"><?php echo invoice_total($invoice); ?></td>
  	</tr>
  <?php } ?>
  
	<?php if ($invoice->invoice_tax <= 0 && $invoice->invoice_shipping <= 0 && $invoice->invoice_discount <= 0) { ?>
  	<tr>
    	<td class="total-amount" colspan="2"><?php echo $this->lang->line('amount_paid'); ?></td>
    	<td class="total-amount-2" colspan="2"><?php echo invoice_paid($invoice); ?></td>
  	</tr>
  <?php } elseif ($invoice->invoice_tax > 0 && $invoice->invoice_shipping <= 0 && $invoice->invoice_discount <= 0 || $invoice->invoice_tax <= 0 && $invoice->invoice_shipping > 0 && $invoice->invoice_discount <= 0 || $invoice->invoice_tax <= 0 && $invoice->invoice_shipping <= 0 && $invoice->invoice_discount > 0) { ?>
  	<tr>
    	<td class="discount-percent" colspan="2"><?php echo $this->lang->line('amount_paid'); ?></td>
    	<td class="discount-amount" colspan="2"><?php echo invoice_paid($invoice); ?></td>
  	</tr>
  <?php } elseif ($invoice->invoice_tax > 0 && $invoice->invoice_shipping > 0 && $invoice->invoice_discount <= 0 || $invoice->invoice_tax > 0 && $invoice->invoice_shipping <= 0 && $invoice->invoice_discount > 0 || $invoice->invoice_tax <= 0 && $invoice->invoice_shipping > 0 && $invoice->invoice_discount > 0) { ?>
  	<tr>
    	<td class="total-amount" colspan="2"><?php echo $this->lang->line('amount_paid'); ?></td>
    	<td class="total-amount-2" colspan="2"><?php echo invoice_paid($invoice); ?></td>
  	</tr>
  <?php } else { ?>
  	<tr>
    	<td class="discount-percent" colspan="2"><?php echo $this->lang->line('amount_paid'); ?></td>
    	<td class="discount-amount" colspan="2"><?php echo invoice_paid($invoice); ?></td>
  	</tr>
  <?php } ?>

  <tr>
    <td id="total-discount-exkl" class="total-discount" colspan="2"><?php echo $this->lang->line('total_due'); ?></td>
    <td id="total-discount-amount" class="total-discount" colspan="2"><?php echo invoice_balance($invoice); ?></td>
  </tr>
  
  <tr>
    <td class="seperator" colspan="4"> </td>
  </tr>
  
  <?php if ($this->lang->line('simplicity_block01_title01') != '') { ?>
  <tr>
    <td id="payment" colspan="2">
      <h2><?php echo $this->lang->line('simplicity_block01_title01'); ?></h2>
      <h3><?php echo $this->lang->line('simplicity_block01_title02'); ?></h3>
      <p>
        <?php echo $this->lang->line('simplicity_block01_text'); ?>
      </p>
    </td>
    <td id="vat" colspan="2">
      <h2><?php echo $this->lang->line('simplicity_block02_title01'); ?></h2>
      <h3><?php echo $this->lang->line('simplicity_block02_title02'); ?></h3>
      <p>
        <?php echo $this->lang->line('simplicity_block02_text'); ?>
      </p>
    </td>
  </tr>
  <tr>
    <td class="seperator" colspan="4"> </td>
  </tr>
  <?php } ?>
  
  <?php if ($this->lang->line('simplicity_block03_title01') != '') { ?>
  <tr>
    <td id="bank" colspan="2">
      <h2><?php echo $this->lang->line('simplicity_block03_title01'); ?></h2>
      <h3><?php echo $this->lang->line('simplicity_block03_title02'); ?></h3>
      <p>
        <?php echo $this->lang->line('simplicity_block03_text'); ?>
      </p>
    </td>
    <td id="account" colspan="2">
      <h2><?php echo $this->lang->line('simplicity_block04_title01'); ?></h2>
      <h3><?php echo $this->lang->line('simplicity_block04_title02'); ?></h3>
      <p>
        <?php echo $this->lang->line('simplicity_block04_text'); ?>
      </p>
    </td>
  </tr>
  <?php } ?>
  
</table>
</body>
</html>
