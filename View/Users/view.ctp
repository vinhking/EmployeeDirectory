<h2><?php echo __('User'); ?></h2>
            <br>
            <table class="table">
                <tr>
                    <td><?php echo __('Id'); ?></td>
                    <td>
			<?php echo h($user['User']['id']); ?>
                        &nbsp;
                    </td>
                </tr>

                <tr>
                    <td><?php echo __('Username'); ?></td>
                    <td>
			<?php echo h($user['User']['username']); ?>
                        &nbsp;
                    </td>
                </tr>

                <tr>
                    <td><?php echo __('Email'); ?></td>
                    <td>
			<?php echo h($user['User']['email']); ?>
                        &nbsp;
                    </td>
                </tr>

                <tr>
                    <td><?php echo __('Display Name'); ?></td>
                    <td>
			<?php echo h($user['User']['display_name']); ?>
                        &nbsp;
                    </td>
                </tr>

                <tr>
                    <td><?php echo __('Avatar'); ?></td>
                    <td>
			<?php echo h($user['User']['avatar']); ?>
                        &nbsp;
                    </td>
                </tr>

                <tr>
                    <td><?php echo __('Role'); ?></td>
                    <td>
			<?php echo h($user['User']['role']); ?>
                        &nbsp;
                    </td>
                </tr>

                <tr>
                    <td><?php echo __('Created'); ?></td>
                    <td>
			<?php echo h($user['User']['created']); ?>
                        &nbsp;
                    </td>
                </tr>

                <tr>
                    <td><?php echo __('Modified'); ?></td>
                    <td>
			<?php echo h($user['User']['modified']); ?>
                        &nbsp;
                    </td>
                </tr>
            </table>










<!--
<div class="users view">
<h2><?php echo __('User'); ?></h2>
        <dl>
                <td><?php echo __('Id'); ?></td>
                <td>
			<?php echo h($user['User']['id']); ?>
                        &nbsp;
                </td>
                <td><?php echo __('Username'); ?></td>
                <td>
			<?php echo h($user['User']['username']); ?>
                        &nbsp;
                </td>
                <td><?php echo __('Password'); ?></td>
                <td>
			<?php echo h($user['User']['password']); ?>
                        &nbsp;
                </td>
                <td><?php echo __('Email'); ?></td>
                <td>
			<?php echo h($user['User']['email']); ?>
                        &nbsp;
                </td>
                <td><?php echo __('Display Name'); ?></td>
                <td>
			<?php echo h($user['User']['display_name']); ?>
                        &nbsp;
                </td>
                <td><?php echo __('Avatar'); ?></td>
                <td>
			<?php echo h($user['User']['avatar']); ?>
                        &nbsp;
                </td>
                <td><?php echo __('Role'); ?></td>
                <td>
			<?php echo h($user['User']['role']); ?>
                        &nbsp;
                </td>
                <td><?php echo __('Created'); ?></td>
                <td>
			<?php echo h($user['User']['created']); ?>
                        &nbsp;
                </td>
                <td><?php echo __('Modified'); ?></td>
                <td>
			<?php echo h($user['User']['modified']); ?>
                        &nbsp;
                </td>
        </dl>
</div>
<div class="actions">
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
                <li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
                <li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
                <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New User'), array('action' => 'atd')); ?> </li>
                <li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'atd')); ?> </li>
        </ul>
</div>
<div class="related">
        <h3><?php echo __('Related Posts'); ?></h3>
	<?php if (!empty($user['Post'])): ?>
        <table cellpatding = "0" cellspacing = "0">
        <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('User Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
	<?php foreach ($user['Post'] as $post): ?>
                <tr>
                        <td><?php echo $post['id']; ?></td>
                        <td><?php echo $post['user_id']; ?></td>
                        <td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'posts', 'action' => 'edit', $post['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'posts', 'action' => 'delete', $post['id']), array('confirm' => __('Are you sure you want to delete # %s?', $post['id']))); ?>
                        </td>
                </tr>
	<?php endforeach; ?>
        </table>
<?php endif; ?>

        <div class="actions">
                <ul>
                        <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'atd')); ?> </li>
                </ul>
        </div>
</div>-->
