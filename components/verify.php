<?php
	include '../_database/database.php';
	
	$trans_id=mysqli_real_escape_string($conn,$_REQUEST['transid']);
	$account=mysqli_real_escape_string($conn,$_REQUEST['account']);
	$amount=mysqli_real_escape_string($conn,$_REQUEST['amount']);
	$tenant=mysqli_real_escape_string($conn,$_REQUEST['tenant']);
	
	$today=date("Y/m/d");
	
	$value="";
	
	$sql1 = "SELECT trans_identify, trans_amount FROM re_payment WHERE trans_identify='$trans_id'";
	$resultx = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
	$rowcount = mysqli_num_rows($resultx);
	$rwsx = mysqli_fetch_array($resultx);
	$paid= $rwsx['trans_amount'];
	
	$sql3 ="SELECT re_invoices.invoice_ref, re_invoices.date_issued, re_invoicing.rent, re_invoicing.tax_rate, re_invoicing.other_charges, re_invoicing.desciption, re_properties.property_name, re_invoices.costs,re_invoices.pay_status, re_propertytenant.unit_no, re_tenant.name, re_tenant.email, re_tenant.telephone, re_tenant.postal_address FROM re_invoices LEFT JOIN (re_properties,re_propertytenant, re_invoicing, re_tenant) ON re_properties.id = re_invoices.property_id AND re_invoices.tenant_id = re_propertytenant.tenant_id AND re_invoices.tenant_id = re_tenant.id AND re_invoicing.tenant_id = re_invoices.tenant_id WHERE re_invoices.invoice_ref ='$account'";
	
    $result = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
    $rws = mysqli_fetch_array($result);
	
	if ($rowcount==0){
	        $report = "transerror";
		print_r(json_encode($report));
	}else{
	if ($rowcount==1){
	if ($paid == $amount){
        
        $sql2 = "UPDATE re_invoices SET pay_status = '1', date_paid = '$today' WHERE invoice_ref='$account'";
		mysqli_query($conn,$sql2) or die(mysqli_error($conn));
		
		$report =  array('Success');
		
		print_r(json_encode($report));
		
		
		$msg = '<table cellspacing="3" cellpadding="4" width="700px">
			<tr class="top">
				
				<td class="title">
					<img src="../assets/images/logo.png" style="width:121px; max-width:300px">
				</td>
				 <td style="text-align:right; font-size:12px; ">
					Receipt #:'.$rws["name"].'<br>
					Created:'.$today.'<br>
				</td>
					   
			</tr>
			<tr class="information">
			   <td><h2 style="color: #0e4645; font-weight: 300; font-size: 36px;">Receipt</h2></td>
			   <td style="text-align:right; font-size:12px;">
							Kodi Point<br>
							info@kodipoint.com<br>
							Pin No: <br>
							VAT No: <br>
							
				</td>
			</tr>
			<tr>
				<td colspan="2"></td>
			</tr>
			<tr class="heading" bgcolor="#cccccc" >
				<td colspan="2" style="font-weight: bold; font-size:12px; padding: 6px 10px !important;">Being Payment of</td>
			</tr>
			
			<tr>
				<td height="30px" style="font-size:12px">'.$rws['property_name'].' -  '.$rws['unit_no'].'</td>
				<td align="right" height="30px" style="font-size:12px">'. $rws['rent'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px"><strong>Other Charges:</strong><br />'. $rws['description'].'</td>
				<td align="right" style="font-size:12px">'.$rws['other_charges'].'</td>
			</tr>
			<tr>
				<td colspan="2"></td>
			</tr>
			<tr class="details">
				<td height="30px" style="font-size:12px;">Mpesa Ref Number: </td>
				<td align="right" height="30px"  style="font-size:12px;"><?php echo $trans_id; ?></td>
			</tr>
			<tr>
				<td  colspan="2" height="1px" cellpadding="0" style="border-bottom:solid #f3f3f3 0.5px;"></td>
			</tr>
			<tr class="item last">
				<td style="font-size:12px">Tax</td>
				<td align="right" style="font-size:12px;">'. $row['tax_rate'].'</td>
			</tr>
			<tr>
				<td></td>
				<td height="1px" cellpadding="0" style="border-bottom:solid #f3f3f3 0.5px;"></td>
			</tr>
			<tr class="total">
				<td style="font-size:12px;">Total</td>
				<td align="right" style="font-size:20px;"><?php echo $paid ?></td>
			</tr>
		</table>';
						
	   $subject= "KodiPoint Payment Receipt - Ref:  ". $account;
		
	}else if ($paid < $amount){
		  $sql2 = "UPDATE re_invoices SET pay_status = '3' WHERE tenant_id='$tenant'";
		mysqli_query($conn,$sql3) or die(mysqli_error($conn));
			
			$value = ($amount-$paid);
			$report = array('less',$value);

			print_r(json_encode($report));
			
			$msg = '<table cellspacing="3" cellpadding="4" width="700px">
			<tr class="top">
				
				<td class="title">
					<img src="../assets/images/logo.png" style="width:121px; max-width:300px">
				</td>
				 <td style="text-align:right; font-size:12px; ">
					Receipt #:'.$rws['name'].'<br>
					Created:'.$today.'<br>
				</td>
					   
			</tr>
			<tr class="information">
			   <td><h2 style="color: #0e4645; font-weight: 300; font-size: 36px;">Receipt</h2></td>
			   <td style="text-align:right; font-size:12px;">
							Kodi Point<br>
							info@kodipoint.com<br>
							Pin No: <br>
							VAT No: <br>
							
				</td>
			</tr>
			<tr>
				<td colspan="2"></td>
			</tr>
			<tr class="heading" bgcolor="#cccccc" >
				<td colspan="2" style="font-weight: bold; font-size:12px; padding: 6px 10px !important;">Being Payment of</td>
			</tr>
			
			<tr>
				<td height="30px" style="font-size:12px">'.$rws['property_name'].' -  '.$rws['unit_no'].'</td>
				<td align="right" height="30px" style="font-size:12px">'. $rws['rent'].'</td>
			</tr>
			<tr>
				<td style="font-size:12px"><strong>Other Charges:</strong><br />'. $rws['description'].'</td>
				<td align="right" style="font-size:12px">'.$rws['other_charges'].'</td>
			</tr>
			<tr>
				<td colspan="2"></td>
			</tr>
			<tr class="details">
				<td height="30px" style="font-size:12px;">Mpesa Ref Number: </td>
				<td align="right" height="30px"  style="font-size:12px;"><?php echo $trans_id; ?></td>
			</tr>
			<tr>
				<td  colspan="2" height="1px" cellpadding="0" style="border-bottom:solid #f3f3f3 0.5px;"></td>
			</tr>
			<tr class="item last">
				<td style="font-size:12px">Tax</td>
				<td align="right" style="font-size:12px;">'. $row['tax_rate'].'</td>
			</tr>
			<tr>
				<td></td>
				<td height="1px" cellpadding="0" style="border-bottom:solid #f3f3f3 0.5px;"></td>
			</tr>
			<tr class="total">
				<td style="font-size:12px;">Total</td>
				<td align="right" style="font-size:20px;"><?php echo $paid ?></td>
			</tr>
		</table>';
			$subject= "KodiPoint Payment Receipt - Ref:  ". $account." - Payment Less than Expected";				
		
	}
				$sql5 ="SELECT email FROM re_tenant WHERE id='$tenant'";
				$result5 = mysqli_query($conn,$sql5) or die(mysqli_error($conn));
				$rws5 = mysqli_fetch_array($result5);
				$email = $rws5[0];
				
                $to = "info@kodipoint.com,". $email;
            	$headers = "From: Kodi Point - <info@kodipoint.com>\r\n". 
            	   "MIME-Version: 1.0" . "\r\n" . 
            	   "Content-type: text/html; charset=UTF-8" . "\r\n";
            mail($to,$subject,$msg,$headers);
            	
	}
	else if($rowcount==0){
		$report =  array("Fail");
		
		print_r(json_encode($report));
		
	}
	}

	
?>