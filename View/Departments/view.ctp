<h2><?php echo __('Department Detail'); ?></h2>
	<table class="table">
            <tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($department['Department']['id']); ?>
			&nbsp;
		</td>
            </tr>
            
            <tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($department['Department']['name']); ?>
			&nbsp;
		</td>
            </tr>
            
            <tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($department['Department']['created']); ?>
			&nbsp;
		</td>
            </tr>
            
            <tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($department['Department']['modified']); ?>
			&nbsp;
		</td>
            </tr>
	</table>