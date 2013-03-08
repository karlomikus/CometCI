<?php
	$avatar = 'noavatar.jpg';
	if(isset($user->avatar)) $avatar = $user->avatar;
?>
<div class="userarea clearfix">
	<img src="<?php echo base_url(); ?>uploads/users/<?php echo $avatar; ?>" />
	<ul class="unstyled">
		<li><?php echo $user->username; ?></li>
		<li><a href="<?php echo base_url(); ?>users/profile/<?php echo $user->id; ?>" target="_blank">Profile</a></li>
		<li><a href="<?php echo base_url(); ?>" target="_blank">View site</a></li>
	</ul>
</div>
<h5 class="sidebar-header">Related links</h5>
<ul class="nav nav-list">
    <li><a href="<?php echo site_url('groups/admin');?>">Groups</a></li>
    <li><a href="<?php echo site_url('access/admin');?>">User access</a></li>
</ul>
<h5 class="sidebar-header">Module help</h5>
<p>
	Echo park sunt eu authentic direct trade. Fanny pack fingerstache aliquip meggings. Banjo pork belly DIY hoodie single-origin coffee truffaut. 3 wolf moon brooklyn fixie cosby sweater chambray, hella keytar labore 90's bicycle rights direct trade typewriter +1 selvage. Hashtag pour-over flexitarian whatever brooklyn.
</p>