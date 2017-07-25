<?php /* Template Name: PayeCal */ ?>

<!-- HEADER SECTION-->

<?php 
/**
 * Theme Header
 *
 * @package	HelpingHands
 * @author Skat
 * @copyright 2015, Skat Design
 * @link http://www.skat.tf
 * @since HelpingHands 1.0
 */
 
global $sd_data;

if ( is_page() || is_single()  ) {
	$transp_header   = rwmb_meta( 'sd_transparent_header', 'type=checkbox');
}
$header_email    = isset( $sd_data['sd_header_email'] ) ? sanitize_email( $sd_data['sd_header_email'] ) : NULL;
$header_phone    = isset( $sd_data['sd_header_phone'] ) ? $sd_data['sd_header_phone'] : NULL;
$header_btn      = isset( $sd_data['sd_extra_button'] ) ? esc_url( $sd_data['sd_extra_button'] ) : NULL;
$header_btn_text = isset( $sd_data['sd_extra_button_text'] ) ? $sd_data['sd_extra_button_text'] : NULL;
$logo            = esc_url( $sd_data['sd_logo_upload']['url'] );
$header_style    = $sd_data['sd_header_style'];
$boxed           = $sd_data['sd_boxed'];
$top_bar         = $sd_data['sd_top_bar'];
$sticky          = $sd_data['sd_sticky_menu'];

?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/framework/js/html5.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/framework/js/respond.min.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>
<body <?php body_class( 'sd-theme' ); ?>>
<div class="sd-wrapper">
<?php if ( $boxed == '2' ) : ?>
	<div class="sd-boxed">
<?php endif; ?>
<header id="sd-header" class="clearfix <?php if ( is_page() && $transp_header == '1' ) { echo 'sd-transparent-bg'; } ?>">

	<?php if ( $top_bar == '1' ) { get_template_part( 'framework/inc/header-top-bar' ); } ?>
	
	<div class="container sd-logo-menu">
		<div class="sd-logo-menu-content">
			<div class="sd-logo">
				<?php if ( ! empty( $logo ) ) : ?>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img src="<?php echo $logo; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" /></a>
				<?php else : ?>
					<a name="top" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <?php echo get_bloginfo( 'name' );	?> </a>
				<?php endif; ?>
			</div>
			<!-- sd-logo -->
			
			<?php if ( $header_style == '1' ) : ?>
				<div id="sd-sticky-wrapper" class="sd-header-style1 <?php if ( $sticky == '1' ) { echo 'sd-sticky-header sd-opacity-trans'; } ?>">
					<?php if ( $sticky == '1' ) { echo '<div class="container">'; } ?>
					<?php get_template_part( 'framework/inc/main-menu' ); ?>
					<?php if ( $sticky == '1' ) { echo '</div>'; } ?>
				</div>
			<?php else : ?>
				<?php if ( ! empty( $header_email ) || ! empty( $header_phone ) || ! empty( $header_btn ) ) : ?>
					<div class="sd-header-extra">
						<?php if ( ! empty( $header_email ) ) : ?>
							<div class="sd-header-extra-email clearfix">
								<i class="fa fa-envelope-o"></i>
								<span>
									<span><?php _e( 'EMAIL US AT', 'sd-framework' ); ?></span>
									<a href="mailto:<?php echo antispambot( $header_email, 1 ); ?>" title="<?php _e( 'Email Us', 'sd-framework' ); ?>"><?php echo antispambot( $header_email ); ?></a>
								</span>
							</div>
							<!-- sd-header-extra-email -->
						<?php endif; ?>
						<?php if ( ! empty( $header_phone ) ) : ?>
							<div class="sd-header-extra-phone clearfix">
								<i class="fa fa-phone"></i>
								<span class="sd-header-extra-desc">
									<span><?php _e( 'CALL US NOW', 'sd-framework' ); ?></span>
									<span class="sd-header-ph-number"><?php echo $header_phone; ?></span>
								</span>
							</div>
							<!-- sd-header-extra-phone -->
						<?php endif; ?>
						<?php if ( ! empty( $header_btn ) ) : ?>
							<a class="sd-extra-button" href="<?php echo $header_btn; ?>" title="<?php echo esc_attr( $header_btn_text ); ?>"><?php echo $header_btn_text; ?></a>
						<?php endif; ?>
					</div>
					<!-- sd-header-extra -->
				<?php endif; ?>
			
			<?php endif; ?>

		</div>
		<!-- sd-logo-menu-content -->
	</div>
	<!-- sd-logo-menu -->
	<?php if ( $header_style == '3' ) : ?>
	<div id="sd-sticky-wrapper" class="sd-header-style3 <?php if ( $sticky == '1' ) { echo 'sd-sticky-header sd-opacity-trans'; } ?>">
		<div id="mega-menu-wrap-main-header-menu" class="sd-header-style3 <?php if ( $sticky == '1' ) { echo 'sd-sticky-header sd-opacity-trans'; } ?>">
			<div class="container">
				<?php get_template_part( 'framework/inc/main-menu' ); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</header>
<!-- #sd-header -->

<?php
	if ( ! is_singular( array( 'post', 'download', 'events', 'staff' ) ) ) {
		get_template_part( 'framework/inc/page-top' );
	}
?>


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
 if (isset($_POST['Gross']))
		 { 
		 $gross = $_POST['Gross'];
		 $monthlygross = $gross/12;
		 $relief = 0.2*$gross;
		 $pension = 0.2*$gross;
		 $non_taxable = $relief + $pension;
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
				
				
			

		 echo "<h2>Results</h2><br>";
		echo "<h5>The Relief Allowance is  $relief <br></h5>"; 
		echo "<h5>The Pension  is $pension<br></h5> ";
		echo "<h5>The Total Non Taxable Income  is $non_taxable<br></p> ";
		echo "<h5>The Taxable Income is $taxable_income <br></h5>";
		echo "<h5>The tax of $gross is </h5>";
		echo  tax($amount,$tax1,$tax2,$tax3,$tax4,$tax5,$firsttax,$secondtax,$thirdtax,$fourthtax,$fifthtax);
 }
 ?> 
 <form action="http://nairapayroll.com/paye-calculator/" method="POST">
			<div class="table-responsive">
  			<table class="table">
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
			<td> <input type="varchar"  class="form-control" size="4" name="monthlygross" value="<?php echo "$monthlygross";?>">
			</td>
			</tr>
			<tr>
				<td><label for="gross">TAX PAYABLE:</label></td>
				<td><input type="varchar"  class="form-control" size="4" name="tax" value=""></td>
				<td><input type="varchar" class="form-control" size="4" name="monthlytax" value=""></td>
			</tr>
			<tr>
				<td><label for="gross">PENSION CONTRIBUTION:</label></td>
				<td><input type="varchar" class="form-control" size="4" name="pension" value="<?php echo "$pension";?>"></td>
				<td><input type="varchar" class="form-control" size="4" name="monthlypension" value="<?php echo "$monthlypension";?>"></td>
			</tr>
			<tr>
				<td><label for="gross">NET TAKEHOME PAY:</label></td>
				<td><input type="varchar" class="form-control" size="4" name="income" value=""></td>
				<td><input type="varchar" class="form-control" size="4" name="monthlyincome" value=""></td>
			</tr>
			<tr>
			<td>
			 <button type="submit"  name="Calculate" class="btn btn-default">Submit</button>
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

 


 
<!--FOOTER SECTION -->

<?php
/**
 * Theme Footer
 *
 * @package	HelpingHands
 * @author Skat
 * @copyright 2015, Skat Design
 * @link http://www.skat.tf
 * @since HelpingHands 1.0
 */

global $sd_data;

$body_boxed        = $sd_data['sd_boxed'];
$boxed_footer      = $sd_data['sd_boxed_footer'];
$widgetized_footer = $sd_data['sd_widgetized_footer'];
$footer_sidebars   = $sd_data['sd_footer_sidebars'];
$copyright         = $sd_data['sd_copyright'];
$minicart_enabled  = ( isset( $sd_data['sd_minicart_top'] ) ? $sd_data['sd_minicart_top'] : '' );
$minicart_main     = ( isset ( $sd_data['sd_minicart_main'] ) ? $sd_data['sd_minicart_main'] : '' );
$newsletter        = $sd_data['sd_newsletter'];
wp_reset_query();
if ( is_page() ) {
	$newsletter_hide = rwmb_meta( 'sd_hide_newsletter', 'type=checkbox');
} else {
	$newsletter_hide = '';
}

?>
<?php if ( $boxed_footer == 1 ) : ?>
<div class="sd-boxed-footer">
	<div class="container">
<?php endif; ?>
<?php if ( $newsletter == 1 ) {
	if ( $newsletter_hide !== '1' ) {
	get_template_part( 'framework/inc/newsletter' );
	}
} ?>
<footer id="sd-footer" class="<?php if ( $widgetized_footer == '0' ) echo 'sd-padding-none'; ?>">
	<?php 
		if ( $widgetized_footer == '1' ) { 
			if ( $footer_sidebars == '3' ) {
				get_template_part( 'framework/inc/3-sidebars-footer' );
			} else {
				get_template_part( 'framework/inc/4-sidebars-footer' );
			}
		} 
	?>
	<?php if ( $copyright == 1 ) { get_template_part( 'framework/inc/copyright' ); } ?>
</footer>
<!-- footer end -->
<?php if ( $boxed_footer == 1 ) : ?>
	</div>
	<!-- container -->
</div>
<!-- sd-boxed-footer -->
<?php endif; ?>
<?php if ( $body_boxed == 2 ) : ?>
</div>
<!-- sd-boxed -->
<?php endif; ?>
</div>
<!-- sd-wrapper -->
<?php
	if ( sd_is_woo() ) {
		if ( $minicart_enabled == 1 || $minicart_main == 1 ) {
		  get_template_part( 'framework/inc/minicart' );
		}
	}
?>
<?php wp_footer(); ?>
</body>
</html>