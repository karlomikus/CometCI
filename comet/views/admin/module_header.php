<section class="module_header clearfix">
	<div class="pull-left">
		<h1 class="admin-module-title"><?php echo isset($title) ? $title : 'Undefined module'; ?></h1>
		<?php echo $this->breadcrumb->output(); ?>
	</div>
	<p class="pull-right">
		<?php if(isset($add_button) && !empty($add_button)): ?>
		<a class="btn btn-dark btn-action" href="<?php echo current_url().'/create';?>">
			<?php echo isset($add_button) ? $add_button : 'Create'; ?> <i class="icon-plus-sign icon-white"></i>
		</a>
		<?php endif; ?>
	</p>
</section>
<hr />