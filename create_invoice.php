<?php 
session_start();
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
if(!empty($_POST['companyName']) && $_POST['companyName']) {	
	$invoice->saveInvoice($_POST);
	header("Location:invoice_list.php");	
}
	 $host  = 'localhost';
     $user  = 'root';
     $password   = "";
     $database  = "billing";
	 $conn = new mysqli($host, $user, $password, $database);
	 $sql = "select order_id from invoice_order order by order_id desc limit 1";
$result = $conn->query($sql) or die($conn->error);
while ($row = $result->fetch_assoc()) {
	$last_id= $row['order_id'];
	
  }
?>
<!DOCTYPE html>
<html>
<head>
<?php include('header.php'); ?>
<title>create invoice</title>
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
			<input id="currency" type="hidden" value="Rs">
			<div class="row">
				    		
				<div class="col-xs-6 col-md-6">
					
					<div class="form-group">
						<label for="name" style="color: #dc0f0f; margin-right: 20px;">नाव:
						<input type="text" class="" style="width: 430px; border:none;  padding: 5px 20px;  margin: 10px 0;" name="companyName" id="companyName" placeholder="" >
						</label></div>
					
					
				</div>
				<div class="col-xs-6 col-md-6 text-right">
                       
					   <b><p id="demo" style="color: #dc0f0f;"></p></b>
					   
					   <b> <p style="color: #dc0f0f;"> Invoice No. : <?php echo $last_id + 1 ?></p><b>

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
						<tr>
							<td><input class="itemRow" type="checkbox"></td>
							<td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
							<td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off" list="mySuggestion">
							<datalist id="mySuggestion">
                                    <option>शर्ट</option>
                                    <option>पॅन्ट</option>
                                    <option>६वार साडी </option>
                                    <option>९वार साडी </option>
                                    <option>धोतर </option>
                                    <option>लेडीज ड्रेस</option>
                                    <option>शेरवानी </option>
                                    <option>साडी</option>
                                    <option>ब्लाऊज </option>
                                    <option>कोट </option>
                                    <option>जॅकेट</option>
                                    <option>जर्किंग</option>
                                    <option>सलवार </option>
                                    <option>लेडीज कुर्ता </option>
                                    <option>ओढणी </option>
                                    <option>घागरा </option>
                                    <option>ब्लॅंकेट </option>
                                    <option>बेडशिट </option>
                                    <option>मंडप कापड प्र. कि. </option>
                                </datalist>
						
						
						</td>			
							<td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
							<td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
							<td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
						</tr>						
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
					<span class="form-inline" >
						<div class="form-group" style="margin-left: 420px">
							
							<div class="input-group">
							<label style="color: #dc0f0f;">एकुण: &nbsp;</label>
								<div class="input-group-addon currency">₹</div>
								<input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
							</div>
						</div>
						<br>
						<br>
						<div class="form-group">
							
							<div class="input-group">
								<input value="" type="hidden" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
								
							</div>
						</div>
						<div class="form-group">
							
							<div class="input-group">
								
								<input value="" type="hidden" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
							</div>
						</div>							
						<div class="form-group">
							
							<div class="input-group">
								
								<input value="" type="hidden" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
							</div>
						</div>
						<div class="form-group" style="margin-left: 400px">
							
							<div class="input-group">
							<label style="color: #dc0f0f;">जमा&nbsp; रक्कम: &nbsp;</label>
								<div class="input-group-addon currency">₹</div>
								<input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
							</div>
						</div>
						<br><br><br>
						<div class="form-group" style="margin-left: 400px">
							
							<div class="input-group">
							<label style="color: #dc0f0f;">बाकी&nbsp; रक्कम: &nbsp;</label>
								<div class="input-group-addon currency">₹</div>
								<input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
							</div>
						</div>
					</span>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					
					<br>
					<div class="form-group">
						<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
						<input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm noPrint">						
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
</body></html>


<?php include('footer.php');?>