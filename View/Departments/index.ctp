<div class="departments index">
    <h2><?php echo __('Departments'); ?></h2>
    <?php 
    if($this->Session->check('Auth.User.username')){
     echo 'Hello, ' . $this->Session->read('Auth.User.username').' | ';
     echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout'));
    }else{
        echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login'));
    }
    ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($departments as $department): ?>
            <tr>
                <td><?php echo h($department['Department']['id']); ?>&nbsp;</td>
                <td><?php echo h($department['Department']['name']); ?>&nbsp;</td>
                <td><?php echo h($department['Department']['created']); ?>&nbsp;</td>
                <td><?php echo h($department['Department']['modified']); ?>&nbsp;</td>
                <td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $department['Department']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $department['Department']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $department['Department']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $department['Department']['id']))); ?>
                        <?php echo $this->Html->link(__('List Employees'), array('action' => 'list_employees', $department['Department']['id'])); ?>
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
    <div><?php echo $this->Html->link(__('Add Department'), array('action' => 'add')); ?></div>
</div>
<div class="actions">
    <h3><?php echo __('Category'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
    </ul>
</div>
