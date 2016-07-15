<div class="users index">
    <h2><?php echo __('Users'); ?></h2>
    <?php 
    if($this->Session->check('Auth.User.username')){
     echo 'Hello, ' . $this->Session->read('Auth.User.username').' | ';
     echo $this->Html->link(__('Logout'), array('action' => 'logout'));
    }else{
        echo $this->Html->link(__('Login'), array('action' => 'login'));
    }
    ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('username'); ?></th>
                <th><?php echo $this->Paginator->sort('password'); ?></th>
                <th><?php echo $this->Paginator->sort('email'); ?></th>
                <th><?php echo $this->Paginator->sort('display_name'); ?></th>
                <th><?php echo $this->Paginator->sort('avatar'); ?></th>
                <th><?php echo $this->Paginator->sort('role'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['password']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['display_name']); ?>&nbsp;</td>
                <td><?php echo "<img src='".$user['User']['avatar']."' alt='avatar' height='50' width='50' />"; ?>&nbsp;</td>
                <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                <td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
                </td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>
    <p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
    <div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
    </div>
    <div><?php echo $this->Html->link(__('Add User'), array('action' => 'add')); ?></div>
</div>
<div class="actions">
    <h3><?php echo __('Category'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
    </ul>
</div>
