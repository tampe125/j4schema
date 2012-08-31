<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); ?>

<!-- List of product reviews -->
<h4><?php echo $VM_LANG->_('PHPSHOP_REVIEWS') ?>:</h4>

<?php
foreach( $reviews as $review ) { // Loop through all reviews
	/**
	 * Available indexes:
	 *
	 * $review['userid'] => The user ID of the comment author
	 * $review['username'] => The username of the comment author
	 * $review['name'] => The name of the comment author
	 * $review['time'] => The UNIX timestamp of the comment ("when" it was posted)
	 * $review['user_rating'] => The rating; an integer from 1 - 5
	 * $review['comment'] => The comment text
	 *
	 */

	$date = vmFormatDate( $review["time"], $VM_LANG->_('DATE_FORMAT_LC') );
	?>
	<div {VM_REVIEW}>
		{VM_META_REVIEW_PUBLISH_DATE:<?php echo date('Y-m-d H:i', $review["time"])?>}
		<strong {VM_REVIEW_AUTHOR}><?php echo $review["username"]."&nbsp;&nbsp;($date)" ?></strong>
		<br />
		<div {VM_REVIEW_RATING_WRAPPER}>
			{VM_META_REVIEW_RATING:<?php echo $review['user_rating'] ?>}
			{VM_META_REVIEW_BEST_RATING:5}
		<?php echo $VM_LANG->_('PHPSHOP_RATE_NOM') // "Rating:" ?>:
			<img src="<?php echo VM_THEMEURL ?>images/stars/<?php echo $review["user_rating"] ?>.gif" border="0" alt="<?php echo $review["user_rating"] ?>" />
		</div>
		<br />
		<blockquote {VM_REVIEW_BODY}><div><?php echo $review['comment']; ?></div></blockquote>
	</div>
	<br /><br />

	<?php
}

if( $num_rows < 1 ) {
  echo $VM_LANG->_('PHPSHOP_NO_REVIEWS')." <br />"; // "There are no reviews for this product"
  if (!empty($my->id)) {
  	echo $VM_LANG->_('PHPSHOP_WRITE_FIRST_REVIEW'); // "Be the first to write a review!"
  }
  else {
  	echo $VM_LANG->_('PHPSHOP_REVIEW_LOGIN'); // Login to write a review!
  }
}
if( !$showall && $num_rows >=5 ) {
	// Link to: "SHOW ALL Reviews"
	echo "<a href=\"".$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']."&showall=1\">". $VM_LANG->_('MORE') ."</a>";
}

?>
