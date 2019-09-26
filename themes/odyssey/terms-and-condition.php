<?php
	//Template Name: Terms & Conditions
	get_header();
?>
<section class="page-wrapper">
	<div class="section-header">
		<?php 
			echo '<h2 class="section-heading">'.get_the_title().'</h1>';
		?>
	</div>
	<div class="inner-wrap">
		<?php 
			while ( have_posts() ) :
				the_post();
				//echo '<h1>'.get_the_title().'</h1>';
				the_content();
			endwhile; // End of the loop.
		?>
	</div>
</section>
<?php
	get_footer();
?>