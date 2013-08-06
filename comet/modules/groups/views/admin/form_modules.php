<?php echo validation_errors(); ?>
<?php echo form_open(uri_string(), array('class' => 'cms-form')); ?>
	
	<table class="table tbl-custom">
		<thead>
			<tr>
				<th>Module</th>
				<th><a id="check-all-public" href="#"><i class="icon-check-sign"></i></a> Public rule</th>
				<th><a id="check-all-admin" href="#"><i class="icon-check-sign"></i></a> Admin rule</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($modules as $module): ?>
			<tr>
				<td><?php echo $module->name; ?></td>
				<td class="pub-boxes">
					<ul class="check-list">
						<li>
							<input id="pub-<?php echo $module->name; ?>" type="checkbox" name="rules[public][]" value="<?php echo $module->id; ?>" <?php echo (isset($data[$module->id]) && $data[$module->id]['public'] == 'allow') ? 'checked' : ''; ?> />
							<label for="pub-<?php echo $module->name; ?>">Public access</label>
						</li>
					</ul>
				</td>
				<td class="admin-boxes">
					<ul class="check-list">
						<li>
							<input id="admin-<?php echo $module->name; ?>" type="checkbox" name="rules[admin][]" value="<?php echo $module->id; ?>" <?php echo (isset($data[$module->id]) && $data[$module->id]['admin'] == 'allow') ? 'checked' : ''; ?> />
							<label for="admin-<?php echo $module->name; ?>">Admin access</label>
						</li>
					</ul>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>

    <button type="submit" class="btn btn-large btn-cms-orange">Edit group access</button>
	<a class="btn btn-large btn-cms" href="<?php echo base_url(); ?>admin/<?php echo $this->uri->segment(2); ?>">Cancel</a>
<?php echo form_close(); ?>