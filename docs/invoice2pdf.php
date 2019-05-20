<?php 

include '../_database/database.php';
require('../controllers/tcpdf/tcpdf.php');

	$ref = mysqli_real_escape_string($conn,$_REQUEST['invoiceref']);
	
if(!$ref ==""){
	$sqlv="SELECT re_invoices.invoice_ref, re_invoices.date_issued, re_invoicing.rent, re_invoicing.tax_rate, re_invoicing.other_charges, re_invoicing.desciption, re_properties.property_name, re_invoices.costs,re_invoices.pay_status, re_propertytenant.unit_no, re_tenant.name, re_tenant.email, re_tenant.telephone, re_tenant.postal_address FROM re_invoices LEFT JOIN (re_properties,re_propertytenant, re_invoicing, re_tenant) ON re_properties.id = re_invoices.property_id AND re_invoices.tenant_id = re_propertytenant.tenant_id AND re_invoices.tenant_id = re_tenant.id AND re_invoicing.tenant_id = re_invoices.tenant_id WHERE re_invoices.invoice_ref ='$ref'";
	
	$resultv =  mysqli_query($conn,$sqlv) or die(mysqli_errno());
	$rowv = mysqli_fetch_array($resultv);
	
	$invoice_no = $rowv['invoice_ref'];
    $date_issued = $rowv['date_issued'];
	$name = $rowv['name']; 
	$email = $rowv['email'];
	$tel = $rowv['telephone'];
	$address= $rowv['postal_address'];
	$property =  $rowv['property_name'];
	$unit = $rowv['unit_no'];
	$rent = $rowv['rent'];
	$desc = $rowv['desciption'];
	$ocharge = $rowv['other_charges'];
	$tax  = $rowv['tax_rate'];
	$cost = $rowv['costs'];
	
	$html = '<table cellspacing="0" cellpadding="4" color="#555">
	<tr class="top">
		
		<td class="title">
			<img src="../assets/images/logo.png" style="width:121px; max-width:300px">
		</td>
		 <td style="text-align:right; font-size:12px; ">
			 Invoice #:'. $invoice_no .'<br>
             Created: '. $date_issued  .' <br>
			<!--Due: February 1, 2015-->
		</td>
			   
	</tr>
	<tr>
		<td colspan="2" height="40"></td>
	</tr>
	<tr class="information">
	   <td><h2 style="color: #0e4645; font-weight: 300; font-size: 36px;">INVOICE</h2></td>
	   <td style="text-align:right; font-size:12px;">
					'. $name .'<br>
					'. $email .'<br>
					'. $tel .'<br>
					'. $address .'<br>
		</td>
	</tr>
	<tr>
		<td colspan="2"></td>
	</tr>
	<tr class="heading" bgcolor="#eeeeee" >
		<td colspan="2" style="font-weight: 300; font-size:12px; padding: 6px 10px !important;">Payment Method - Mobile Money</td>
		
	</tr>
	<tr class="details">
		<td height="30px" style="font-size:12px;">Ref No:</td>
		<td align="right" height="30px"  style="font-size:12px;">'. $invoice_no .'</td>
	</tr>
	<tr class="heading" bgcolor="#eeeeee">
		<td style="font-weight: 300; font-size:12px; padding: 6px 10px !important;">Item</td>
		<td align="right"  style="font-weight: 300; font-size:12px; padding: 6px 10px !important;">Price</td>
	</tr>
	<tr class="item">
		<td height="30px" style="font-size:12px">'. $property .' - '. $unit .'</td>
		<td align="right" height="30px" style="font-size:12px">'. $rent .'</td>
	</tr>
	<tr>
		<td colspan="2" height="1px" cellpadding="0" style="border-bottom:solid #f3f3f3 0.5px;"></td>
	</tr>
	<tr class="item">
		<td style="font-size:12px"><strong>Other Charges:</strong><br />'. $desc .'</td>
		<td align="right" style="font-size:12px">'. $ocharge .'</td>
	</tr>
	<tr>
		<td colspan="2" height="1px" cellpadding="0" style="border-bottom:solid #f3f3f3 0.5px;"></td>
	</tr>
	<tr class="item last">
		<td style="font-size:12px">Tax</td>
		<td align="right" style="font-size:12px;">'. $tax .'</td>
	</tr>
	<tr>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td></td>
		<td height="1px" cellpadding="0" style="border-bottom:solid #f3f3f3 0.5px;"></td>
	</tr>
	<tr class="total" style="border-bottom:1pt solid black;">
		<td style="font-size:12px;">Total</td>
		<td align="right" style="font-size:20px;">'. $cost .' </td>
	</tr>
</table>';
}
	
	
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	 
	 public function Footer() {
		 $this->writeHTML($footertext, false, true, false, true);
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
       // $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 15, 'kodipoint.com', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(30, 20, 30, true);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('Helvetica', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();


// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

ob_end_clean();
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('invoice_ref_'. $invoice_no .'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


?>