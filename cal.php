
<!DOCTYPE html>
<html>
<head>
	<title>PAYE CALCULATOR</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-4">
		
		
			<?php 

 if (isset($_POST['submit']))
		 { 
		 $gross = $_POST['Gross'];
		 $monthlygross = $gross/12;
		 $relief = 0.2*$gross;
		 $reliefallowance = $relief + 200000;
		 $pension = 0.08*$gross;
		 $non_taxable = $reliefallowance + $pension;
		 $taxable_income = $gross - $non_taxable;
		 $monthlytaxable=$taxable_income/12;
		 $monthlypension=$pension/12;
		 $amount = $taxable_income;
		 $tax1=300000;
		 $tax2=600000;
		 $tax3=1100000;
		 $tax4=1600000;
		 $tax5=3200000;
		 $firsttax=300000*0.07;
		 $secondtax=300000*0.11;
		 $thirdtax=500000*0.15;
		 $fourthtax=500000*0.19;
		 $fifthtax= 1600000*0.21;



		 function tax_1st($amount,$tax1,$percent_1)  { 
				if ($amount < $tax1) {
					$tax_1 = $amount * $percent_1;
					echo $tax_1 ;
					} else {
						$tax_2 = $tax1*$percent_1;
					} 
			}
			function tax_2nd($amount,$tax2,$percent_2,$tax1,$firsttax) { 
				if ($amount < $tax2) {
					  	$firstadd = ($amount-$tax1)*$percent_2;
					  	$tax_3 = $firstadd + $firsttax;
					  	echo $tax_3;
					  } else {
						$tax_4 = ($tax2-$tax1)*$percent_2;
						echo $tax_4;
					} 
								}
			function tax_3rd($amount,$tax3,$tax2,$percent_3,$firsttax,$secondtax) { 
				 if ($amount < $tax3) {
						$secondadd = ($amount-$tax2)*$percent_3;
					  	$tax_5= $firsttax + $secondtax +$secondadd;
					  	echo $tax_5;
					  } else {
						$tax_6 = ($tax3-$tax2)*$percent_3;
						echo $tax_8;
					} 
								}
			function tax_4th( $amount,$tax4, $tax3,$percent_4,$firsttax,$secondtax,$thirdtax) { 
				if($amount < $tax4) {
					  	$thirdadd = ($amount-$tax3)*$percent_4;
					  	$tax_7=$firsttax + $secondtax + $thirdtax +$thirdadd;
					  	echo $tax_7;
					  } else {
						$tax_8 = ($tax4-$tax3)*$percent_4;
						echo $tax_8;
					} 
								}
			function tax_5th($amount,$tax5,$tax4,$percent_5,$firsttax,$secondtax,$thirdtax,$fourthtax) { 
				if ($amount < $tax5) {
					  	$fourthadd= ($amount-$tax4)*$percent_5;
					  	$tax_9=$firsttax + $secondtax + $thirdtax +$fourthtax+$fourthadd;
					  	echo $tax_9;
					  } else {
						$tax_10 = ($tax5-$tax4)*$percent_5;
						echo $tax_10;
					} 
								}
			function tax_6th($amount, $tax5,$percent_6,$firsttax,$secondtax,$thirdtax,$fourthtax,$fifthtax) { 
				if ($amount > $tax5) {
					$fifthadd= ($amount-$tax5)*$percent_6;
					$tax_9=$firsttax + $secondtax + $thirdtax +$fourthtax+$fifthtax+$fifthadd;
						echo $tax_9;
					} 
								}

					function tax($amount,$tax1,$tax2,$tax3,$tax4,$tax5,$firsttax,$secondtax,$thirdtax,$fourthtax,$fifthtax){
					if ($amount <  $tax1) {
					tax_1st($amount,$tax1,0.07);
						
					} elseif ($amount < $tax2) {
					tax_2nd($amount,$tax2,0.11,$tax1,$firsttax);
						
						
					} elseif ($amount < $tax3) {
					tax_3rd($amount,$tax3,$tax2,0.15,$firsttax,$secondtax);
						
					} elseif ($amount < $tax4) {
					tax_4th($amount,$tax4,$tax3,0.19,$firsttax,$secondtax,$thirdtax);
					} elseif ($amount < $tax5) {
					tax_5th($amount,$tax5,$tax4,0.21,$firsttax,$secondtax,$thirdtax,$fourthtax);
					} else {
					tax_6th($amount,3200000,0.32,$firsttax,$secondtax,$thirdtax,$fourthtax,$fifthtax);
						
					}
				}
				
				

		 echo "<h2>Results</h2>";
		echo "<h5>The Relief Allowance is  $reliefallowance <br></h5>"; 
		echo "<h5>The Pension  is $pension<br></h5> ";
		echo "<h5>The Total Non Taxable Income  is $non_taxable<br></p> ";
		echo "<h5>The Taxable Income is $taxable_income <br></h5>";
		echo "<h5>The tax of $gross is </h5>" ;
 }
 ?> 
 <form action="cal.php" method="POST">
			<div class="table-responsive">
  			<table class="table" style="padding:15px; border: 1px solid black;">
  			<thead>
  			<tr>
				<td></td>
				<td><h3>ANNUAL</h3></td>
				<td><h3>MONTHLY</h3></td>
			</tr>
			</thead>
			<tbody>
				<tr>
			
			 	<td>
			 	 <label for="gross">GROSS SALARY:</label>
				</td>
			<td>
				<input type="varchar" class="form-control" size="4" name="Gross" value="<?php echo "$gross";?>">
			</td>
			<td> <input type="varchar"  class="form-control" size="4" value="<?php echo "$monthlygross";?>">
			</td>
			</tr>
			<tr>
				<td><label for="gross">TAX PAYABLE:</label></td>
				<td><input type="varchar"  class="form-control" size="4" value=""></td>
				<td><input type="varchar" class="form-control" size="4"  value=""></td>
			</tr>
			<tr>
				<td><label for="gross">PENSION CONTRIBUTION:</label></td>
				<td><input type="varchar" class="form-control" size="4"  value="<?php echo "$pension";?>"></td>
				<td><input type="varchar" class="form-control" size="4"  value="<?php echo "$monthlypension";?>"></td>
			</tr>
			<tr>
				<td><label for="gross">NET TAKEHOME PAY:</label></td>
				<td><input type="varchar" class="form-control" size="4" value=""></td>
				<td><input type="varchar" class="form-control" size="4" value=""></td>
			</tr>
			<tr>
			<td>
			 <button type="submit"  name="submit" class="btn btn-default" style="background-color: #f44336; color: white; padding: 14px 25px; text-align: center; text-decoration: none; display: inline-block;">Submit</button>
			 </td>
			 </tr>
			 </tbody>
			 </table>
			 </div>
			</form>
			
	
		</div>
</div>
</div>

</body>
</html>

 
