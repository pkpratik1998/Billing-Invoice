<?php 
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
if(!empty($_POST['companyName']) && $_POST['companyName'] && !empty($_POST['invoiceId']) && $_POST['invoiceId']) {	
	$invoice->updateInvoice($_POST);	
	header("Location:invoice_list.php");	
}
if(!empty($_GET['update_id']) && $_GET['update_id']) {
	$invoiceValues = $invoice->getInvoice($_GET['update_id']);		
	$invoiceItems = $invoice->getInvoiceItems($_GET['update_id']);		
}
?>
<title> Edit Invoice</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('container.php');?>
<div class="container content-invoice">
    	<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
	    	<div class="load-animate animated fadeInUp">
		    	<div class="row">
				<div class="col-xs-12 col-md-12 ">
					<h1 class="text-center titleText " style="color: #dc0f0f; font-size: 50px;">भावना ड्रायक्लिनर्स</h1>
						<?php include('menu.php');?>			
		    		</div>		    		
		    	</div>
				<hr>
		      	<input id="currency" type="hidden" value="$">
		    	<div class="row">
					<div class="col-xs-6 col-md-6">
					  <div class="form-group">
					  		<label for="name" style="color: #dc0f0f; margin-right: 20px;">नाव:
							<input value="<?php echo $invoiceValues['order_receiver_name']; ?>" type="text" class="" style="width: 430px; border:none;  padding: 5px 20px;  margin: 10px 0;" name="companyName" id="companyName" placeholder="Company Name" autocomplete="off">
							</label></div>
						
					</div>     		
					<div class="col-xs-6 col-md-6 text-right">
                       
					   <b><p id="demo" style="color: #dc0f0f;"></p></b>
					 <b> <p style="color: #dc0f0f;"> Invoice No. : <?php echo $invoiceValues['order_id']; ?></p><b>


				   </div>
		      	</div>
		      	<div class="row">
		      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		      			<table class="table table-bordered table-hover" id="invoiceItem">	
							<tr>
								<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
								<th width="15%" style="color: #dc0f0f;">तपशिल न.</th>
								<th width="38%" style="color: #dc0f0f;">तपशिल</th>
								<th width="15%" style="color: #dc0f0f;">नग</th>
								<th width="15%" style="color: #dc0f0f;">दर</th>								
								<th width="15%" style="color: #dc0f0f;">रुपये</th>
							</tr>
							<?php 
							$count = 0;
							foreach($invoiceItems as $invoiceItem){
								$count++;
							?>								
							<tr>
								<td><input class="itemRow" type="checkbox"></td>
								<td><input type="text" value="<?php echo $invoiceItem["item_code"]; ?>" name="productCode[]" id="productCode_<?php echo $count; ?>" class="form-control" autocomplete="off"></td>
								<td><input type="text" value="<?php echo $invoiceItem["item_name"]; ?>" name="productName[]" id="productName_<?php echo $count; ?>" class="form-control" autocomplete="off"></td>			
								<td><input type="number" value="<?php echo $invoiceItem["order_item_quantity"]; ?>" name="quantity[]" id="quantity_<?php echo $count; ?>" class="form-control quantity" autocomplete="off"></td>
								<td><input type="number" value="<?php echo $invoiceItem["order_item_price"]; ?>" name="price[]" id="price_<?php echo $count; ?>" class="form-control price" autocomplete="off"></td>
								<td><input type="number" value="<?php echo $invoiceItem["order_item_final_amount"]; ?>" name="total[]" id="total_<?php echo $count; ?>" class="form-control total" autocomplete="off"></td>
								<input type="hidden" value="<?php echo $invoiceItem['order_item_id']; ?>" class="form-control" name="itemId[]">
							</tr>	
							<?php } ?>		
						</table>
		      		</div>
		      	</div>
		      	<div class="row">
		      		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
		      			<button class="btn btn-danger delete noPrint" id="removeRows" type="button">- Delete</button>
		      			<button class="btn btn-success noPrint" id="addRows" type="button">+ Add More</button>
		      		</div>
		      	</div>
		      	<div class="row">	
		      		
		      		<div class="col-xs-12  col-md-12 ">
						<span class="form-inline">
							<div class="form-group" style="margin-left: 420px">
								
								<div class="input-group">
								<label style="color: #dc0f0f;">एकुण: &nbsp;</label>
									<div class="input-group-addon currency">₹</div>
									<input value="<?php echo $invoiceValues['order_total_before_tax']; ?>" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
								</div>
							</div>
							<br>
						<br>
							<div class="form-group">
								
								<div class="input-group">
									<input value="<?php echo $invoiceValues['order_tax_per']; ?>" type="hidden" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
									
								</div>
							</div>
							<div class="form-group">
								
								<div class="input-group">
									
									<input value="<?php echo $invoiceValues['order_total_tax']; ?>" type="hidden" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
								</div>
							</div>							
							<div class="form-group">
								
								<div class="input-group">
									
									<input value="<?php echo $invoiceValues['order_total_after_tax']; ?>" type="hidden" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
								</div>
							</div>
							<div class="form-group" style="margin-left: 400px">
								<div class="input-group">
								<label style="color: #dc0f0f;">जमा&nbsp; रक्कम: &nbsp;</label>

									<div class="input-group-addon currency">₹</div>
									<input value="<?php echo $invoiceValues['order_amount_paid']; ?>" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
								</div>
							</div>
							<br><br><br>
							<div class="form-group" style="margin-left: 400px">
								
								<div class="input-group">
								<label style="color: #dc0f0f;">बाकी&nbsp; रक्कम: &nbsp;</label>
									<div class="input-group-addon currency">₹</div>
									<input value="<?php echo $invoiceValues['order_total_amount_due']; ?>" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
								</div>
							</div>
						</span>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		      			
						  <br>
						  <div class="form-group">
							  <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
							  <input type="hidden" value="<?php echo $invoiceValues['order_id']; ?>" class="form-control" name="invoiceId" id="invoiceId">
								<input data-loading-text="Updating Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm noPrint">
								<button class="btn btn-success submit_btn invoice-save-btm noPrint" id="invoice-print" onclick="window.print()"><i class="fa fa-print"></i> Print & Save</button>
						  </div>
						  
						</div>

		      		</div>
		      	<div class="clearfix"></div>		      	
	      	</div>
		</form>	
		<div class="printable">
           <ul style="list-style-type: '✳️'; color: #000;">
               <li> कपड्याच्या रंगाची एम्ब्रॉयडरी, प्रिंट व बटणाची जबाबदारी नाही.</li>
               <li> कपडे हरवल्यास व जळाल्यास त्या कपड्याऐवजी 1/4 रक्कम 1 महिन्यानंतर मिळेल.</li>
               <li> 1 महिन्याच्या आत कपडे न नेल्यास जबाबदारी आमच्यावर राहणार नाही.</li>
               <li> अचानक (मशीन बंद होणे, वीज खंडित होणे) या कारणामुळे कपडे देण्यास उशीर होऊ शकतो.</li>
               <li> पावती शिवाय कपडे देता येणार नाही, पावती हरवल्यास कपड्याची जबाबदारी नाही.</li>
           </ul>
        </div>		
    </div>
</div>	
</div>
</div>
<script>
 var d = new Date();
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var dmy= "दि.- " +  d.getDate()+" / "+ months[d.getMonth()] +" / "+ d.getFullYear();
        document.getElementById("demo").innerHTML = dmy;

		
</script>

</body>
</html>
<?php include('footer.php');?>