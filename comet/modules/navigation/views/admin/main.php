<ul class="nav-module">
	<?php foreach ($links as $navlink): ?>
	<li>
		<div class="nav-name">
			<span><?php echo $navlink->sort; ?></span>
			<h5><?php echo $navlink->name; ?></h5>
			<a href="<?php echo current_url().'/delete/'.$navlink->id;?>" class="confirm-delete"><i class="icon-remove-sign"></i></a>
		</div>
		<div class="nav-link">
			<?php if($navlink->type == 'url'): ?>
				<a href="<?php echo $navlink->link; ?>" target="_blank"><?php echo ellipsize($navlink->link, 30, .5); ?></a>
			<?php else: ?>
				<?php echo $navlink->link; ?>
			<?php endif; ?>
		</div>
	</li>
	<?php endforeach; ?>
	<li>
		<div class="nav-name nav-add"><h5><a href="<?php echo current_url().'/create';?>">Add menu item</a></h5></div>
	</li>
</ul>