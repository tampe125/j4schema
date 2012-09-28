<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
mm_showMyFileName(__FILE__);

// J4Schema Customizations
$product_image = str_replace('<img', '<img {VM_MAIN_IMAGE}', urldecode($product_image));

 ?>

<?php echo $buttons_header // The PDF, Email and Print buttons ?>

<?php
if( $this->get_cfg( 'showPathway' )) {
	echo "<div class=\"pathway\">$navigation_pathway</div>";
}
if( $this->get_cfg( 'product_navigation', 1 )) {
	if( !empty( $previous_product )) {
		echo '<a class="previous_page" href="'.$previous_product_url.'">'.shopMakeHtmlSafe($previous_product['product_name']).'</a>';
	}
	if( !empty( $next_product )) {
		echo '<a class="next_page" href="'.$next_product_url.'">'.shopMakeHtmlSafe($next_product['product_name']).'</a>';
	}
}
?>
<br style="clear:both;" />
<div {VM_PRODUCT_WRAPPER}>
<table border="0" style="width: 100%;">
  <tbody>
	<tr>
<?php  if( $this->get_cfg('showManufacturerLink') ) { $rowspan = 5; } else { $rowspan = 4; } ?>
	  <td width="33%" rowspan="<?php echo $rowspan; ?>" valign="top"><br/>
	  	<div><?php echo $product_image ?></div><br/><br/>
	  	<?php echo $this->vmlistAdditionalImages( $product_id, $images ) ?></td>
	  <td rowspan="1" colspan="2">
	  <h1 {VM_PRODUCT_NAME}><?php echo $product_name ?> <?php echo $edit_link ?></h1>
	  </td>
	</tr>
	<?php if( $this->get_cfg('showManufacturerLink')) { ?>
		<tr>
		  <td rowspan="1" colspan="2"><?php echo $manufacturer_link ?><br /></td>
		</tr>
	<?php } ?>
	<tr>
      <td width="33%" valign="top" align="left" {VM_PRICE_WRAPPER}>
      	<?php
      		echo $product_price_lbl;
			if($this->vars['product_availability_data']['product_in_stock']){
  				echo '{VM_PRODUCT_IN_STOCK}';
  			}
  			else{
  				echo '{VM_PRODUCT_OUT_STOCK}';
  			}
      	?>
      	<?php
			//EDIT THIS LINE TO ADD YOUR J4SCHEMA TOKEN
    		$token = '{VM_PRICE}';
    		echo str_replace('<span', '<span '.$token, $product_price);
    	 ?><br /></td>
      <td valign="top"><?php echo $product_packaging ?><br /></td>
	</tr>
	<tr>
	  <td colspan="2"><?php echo $ask_seller ?></td>
	</tr>
	<tr>
	  <td rowspan="1" colspan="2" {VM_PRODUCT_DESCR}><hr />
	  	<?php echo $product_description ?><br/>
	  	<span style="font-style: italic;"><?php echo $file_list ?></span>
	  </td>
	</tr>
	<tr>
	  <td><?php
	  		if( $this->get_cfg( 'showAvailability' )) {
	  			echo $product_availability;
	  		}
	  		?><br />
	  </td>
	  <td colspan="2"><br /><?php echo $addtocart ?></td>
	</tr>
	<tr>
	  <td colspan="3"><?php echo $product_type ?></td>
	</tr>
	<tr>
	  <td colspan="3"><hr /><?php echo $product_reviews ?></td>
	</tr>
	<tr>
	  <td colspan="3"><?php echo $product_reviewform ?><br /></td>
	</tr>
	<tr>
	  <td colspan="3"><?php echo $related_products ?><br />
	   </td>
	</tr>
	<?php if( $this->get_cfg('showVendorLink')) { ?>
		<tr>
		  <td colspan="3"><div style="text-align: center;"><?php echo $vendor_link ?><br /></div><br /></td>
		</tr>
	<?php  } ?>
	<?php if( isset($paypalLogo)) : ?>
		<tr>
			<td colspan="3" align="center">
				<?php echo $paypalLogo ?>
			</td>
		</tr>
	<?php endif;?>
  </tbody>
</table>
<?php
if( !empty( $recent_products )) { ?>
	<div class="vmRecent">
	<?php echo $recent_products; ?>
	</div>
<?php
}
if( !empty( $navigation_childlist )) { ?>
	<?php echo $VM_LANG->_('PHPSHOP_MORE_CATEGORIES') ?><br />
	<?php echo $navigation_childlist ?><br style="clear:both"/>
<?php
} ?>
</div>