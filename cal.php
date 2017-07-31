<!DOCTYPE html>
<html>
<head>
	<title>PAYE CALCULATOR</title>
	<style>
		input:focus {
   		outline:none;
	}
	#button{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    align-self: center
}
	#layout {
	border: 25px;
    padding: 25px;
    margin: 25px;
		}
		table, th, td {
    border: 1px solid black;
    text-align: left;
     padding: 5px;
}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
				
			<?php 
			 $gross = NULL;
			 $monthlygross = NULL;
			 $relief  = NULL;
			 $reliefallowance = NULL;
			 $pension = NULL;
			 $non_taxable = NULL;
			 $taxable_income = NULL;
			 $monthlytaxable = NULL;
			 $monthlypension = NULL;
			 $taxpayable = NULL;
			 $monthlytax = NULL;
			$nettakehome = NULL;
			$monthlytakehome = NULL;
			$pensioncontribution = NULL;
			$monthlytax = NULL;
			$nettakehome = NULL;
			$monthlytakehome = NULL;
			$pensioncontribution = NULL;
			$monthlypensioncontribution= NULL;
			$totalbenefit= NULL;
			$monthlytotalbenefit= NULL;
			$companyexpense = NULL; 
			$monthlycompanyexpense = NULL;
			$monthlypensioncontribution= NULL;
			$totalbenefit= NULL;
			$monthlytotalbenefit= NULL;
			$companyexpense = NULL; 
			$monthlycompanyexpense = NULL;



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
		
		 function computeTaxPayable($taxable_income)	{
		 	$taxpayable = 0;
		 	if($taxable_income < 300000)
		 		$taxpayable = computeFirstTax($taxable_income);
		 	elseif($taxable_income < 600000)	
		 		$taxpayable = computeFirstTax($taxable_income) + computeSecondTax($taxable_income);
		 	elseif ($taxable_income < 1100000) 
		 		$taxpayable = computeFirstTax($taxable_income) + computeSecondTax($taxable_income) + computeThirdTax($taxable_income);
		 	elseif ($taxable_income < 1600000) 
		 		$taxpayable = computeFirstTax($taxable_income) + computeSecondTax($taxable_income) + computeThirdTax($taxable_income) + computeFourthTax($taxable_income);
		 	elseif ($taxable_income < 3200000) 
		 		$taxpayable = computeFirstTax($taxable_income) + computeSecondTax($taxable_income) + computeThirdTax($taxable_income) + computeFourthTax($taxable_income) + computeFifthTax($taxable_income);
		 	else
		 		$taxpayable = computeFirstTax($taxable_income) + computeSecondTax($taxable_income) + computeThirdTax($taxable_income) + computeFourthTax($taxable_income) + computeFifthTax($taxable_income) + computeSixthTax($taxable_income);
		 	return $taxpayable;
		 }
		 function computeFirstTax($taxable_income)	{
		 	if($taxable_income < 300000)	{
		 		$firsttax = $taxable_income * 0.07;
		 	}	else {
		 		$firsttax = 0.07 * 300000;
		 	}
		 	return $firsttax;
		 }
		  function computeSecondTax($taxable_income)	{
		  	if($taxable_income < 600000)	{
		 		$secondtax = ($taxable_income - 300000)* 0.11;
		 	}	else {
		 		$secondtax = 0.11 * 300000;
		 	}
		 	return $secondtax;
		 	
		 }
		 function computeThirdTax($taxable_income)	{
		 	if($taxable_income < 1100000)	{
		 		$thirdtax = ($taxable_income - 600000)* 0.15;
		 	}	else {
		 		$thirdtax = 0.15 * 500000;
		 	}
		 	return $thirdtax;
		 }
		 function computeFourthTax($taxable_income)	{
		 	if($taxable_income < 1600000)	{
		 		$fourthtax = ($taxable_income - 1100000)* 0.19;
		 	}	else {
		 		$fourthtax = 0.19 * 500000;
		 	}
		 	return $fourthtax;
		 }
		 function computeFifthTax($taxable_income)	{
		 	if($taxable_income < 3200000)	{
		 		$fifthtax = ($taxable_income - 1600000)* 0.21;
		 	}	else {
		 		$fifthtax = 0.21 * 1600000;
		 	}
		 	return $fifthtax;
		 }
		 function computeSixthTax($taxable_income)	{
		 	return ($taxable_income - 3200000) * 0.24;
		 }
				
	
		$taxpayable = computeTaxPayable($taxable_income);
		$monthlytax = $taxpayable/12;
		$nettakehome = $gross -  $pension - $taxpayable;
		$monthlytakehome = $nettakehome / 12;
		$pensioncontribution = $gross*0.1;
		$monthlypensioncontribution= $pensioncontribution/12;
		$totalbenefit=$pensioncontribution + $nettakehome + $pension;
		$monthlytotalbenefit= $totalbenefit/12;
		$companyexpense = $totalbenefit + $taxpayable; 
		$monthlycompanyexpense = $companyexpense/12;
 }
 ?> 
 <form action="cal.php" method="POST" id="layout">
			<div class="table-responsive">
  		 <table style="width:80%" border="1">
  <caption>The PAYE Calculator</caption>  			

			<thead>
  			<tr>
				<th></th>
				<th>Annual</th>
				<th>Monthly</th>
				<th>Explanation</th>
			</tr>
			</thead>
			<tbody>
				<tr>
			
			 	<td>Gross Salary
				</td>
			<td>
				<input type="varchar" class="form-control" style="border:none;  width: 98%"  name="Gross" placeholder= "Enter your annual gross salary" value="<?php echo number_format(floatval("$gross"),2,".",",");?>">
			</td>
			<td> <input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo number_format(floatval("$monthlygross"),2,".",",");?>" disabled>
			</td>
			<td>Amount on Employment contract </td>
			</tr>
			<tr>
				<td>Tax Payable</td>
				<td>
				<input type="varchar"  class="form-control" style="border:none;  width: 98%" value="<?php echo number_format (floatval("$taxpayable"),2,".",",");?>" disabled></td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%"  value="<?php echo number_format(floatval("$monthlytax"),2,".",",");?>" disabled></td>
				<td>PAYE deductions to the state tax office	</td>
			</tr>
			<tr>
				<td>Pension Contribution</td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%"  value="<?php echo number_format(floatval("$pension"),2,".",",");?>" disabled>
				</td>

				<td><input type="varchar" class="form-control" style="border:none; width: 98%" value="<?php echo number_format(floatval("$monthlypension"),2,".",",");?>" disabled>
				</td>
				<td>Employee portion of pension	</td>
			</tr>
			<tr>
				<td>Net Takehome Pay</td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo number_format (floatval("$nettakehome"),2,".",",");?>" disabled></td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo number_format(floatval("$monthlytakehome"),2,".",",");?>" disabled></td>
				<td>Amount on cheque or credited to bank</td>
			</tr>
			<tr>
				<td style="border:none" align="center" valign="middle" colspan="4">Additional Company Expenses:	</td>
			</tr>
			<tr>
				<td>Employer Pension Contribution </td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo number_format(floatval("$pensioncontribution"),2,".",",");?>" disabled></td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo number_format(floatval("$monthlypensioncontribution"),2,".",",");?>" disabled></td>
				<td>10% of Gross for companies with over 15 employees	</td>
			</tr>
			<tr>
				<td>Other Employee benefits	</td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="-" ></td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="-" ></td>
				<td>Enter Healthcare and other benefits as determined by the company (0 if not entered) </td>
			</tr>
			<tr>
				<td>Total Benefit to Employee</td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo number_format(floatval("$totalbenefit"),2,".",",");?>" disabled></td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo number_format(floatval("$monthlytotalbenefit"),2,".",",");?>" disabled></td>
				<td> payroll and pension benefits, excluding taxes</td>
			</tr>
			
			<tr>
				<td>Total Company Expense on Employee</td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo  number_format (floatval("$companyexpense"),2,".",",");?>" disabled></td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo number_format (floatval("$monthlycompanyexpense"),2,".",",");?>" disabled></td>
				<td> </td>
			</tr>
			<tr>
			<td style="border:none" align="center" valign="middle" colspan="4">
			 <button type="submit"  name="submit" class="btn btn-default" id="button"  align = "center">Analyze  Payroll</button>
			 </td>
			 </tr>
			 </tbody>
			 </table>
			 </div>
			</form>
			
	
	
</div>
</div>

</body>
</html>