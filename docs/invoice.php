<?php 
include '../_database/database.php';
	$ref = mysqli_real_escape_string($conn,$_REQUEST['invoiceref']);
	
if(!$ref ==""){
	$sqlv="SELECT re_invoices.invoice_ref, re_invoices.date_issued, re_invoicing.rent, re_invoicing.tax_rate, re_invoicing.other_charges, re_invoicing.desciption, re_properties.property_name, re_invoices.costs,re_invoices.pay_status, re_invoicing.unit_no, re_tenant.name, re_tenant.email, re_tenant.telephone, re_tenant.postal_address FROM re_invoices LEFT JOIN (re_properties,re_invoicing, re_tenant) ON re_properties.id = re_invoices.property_id AND re_invoices.tenant_id = re_tenant.id AND re_invoicing.tenant_id = re_invoices.tenant_id WHERE re_invoices.invoice_ref ='$ref'";
	
	$resultv =  mysqli_query($conn,$sqlv) or die(mysqli_errno());
	$rowv = mysqli_fetch_array($resultv);
	
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Ref:<?php echo $ref; ?></title>
    
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="../assets/images/logo.png" style="width:121px; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: <?php echo $rowv['invoice_ref']; ?><br>
                                Created: <?php echo $rowv['date_issued']; ?><br>
                                <!--Due: February 1, 2015-->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td><h2>INVOICE</h2></td>
                            
                            <td>
                                <?php echo $rowv['name']; ?><br>
                                <?php echo $rowv['email']; ?><br>
                                <?php echo $rowv['telephone']; ?><br>
                                <?php echo $rowv['postal_address']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td colspan="2">
                    Payment Method -  Mobile Money 
                </td>
                
            </tr>
            
            <tr class="details">
                <td>
                    Ref No: 
                </td>
                
                <td>
                    Mpesa Ref Number
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    <?php echo $rowv['property_name']; ?> - <?php echo $rowv['unit_no']; ?>
                </td>
                
                <td>
                    <?php echo $rowv['rent']; ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    <strong>Other Charges:<strong><br />
					<?php echo $rowv['desciption']; ?>
                </td>
                
                <td>
                    <?php echo $rowv['other_charges']; ?>
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Tax
                </td>
                
                <td>
                    <?php echo $rowv['tax_rate']; ?>
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   <?php echo $rowv['costs']; ?>
                </td>
            </tr>
        </table>
		<br /><br />
		<a href="invoice2pdf.php?invoiceref=<?php echo $rowv['invoice_ref']; ?>">Export to PDF</a>
    </div>
</body>
	</html>
	<?php }else{
		echo "error! No Invoice Selected!";
		
	}
?>