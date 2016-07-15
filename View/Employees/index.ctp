<div class="employees index">
    <h2><?php echo __('Employees'); ?></h2>
    <?php 
    if($this->Session->check('Auth.User.username')){
     echo 'Hello, ' . $this->Session->read('Auth.User.username').' | ';
     echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout'));
    }else{
        echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login'));
    }
    ?>
    <br>
    <br>
    <div><?php echo $this->Html->link(__('Search Employee By Discription Of Name'), array('action' => 'search')); ?></div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('email'); ?></th>
                <th><?php echo $this->Paginator->sort('birth'); ?></th>
                <th><?php echo $this->Paginator->sort('gender'); ?></th>
                <th><?php echo $this->Paginator->sort('position'); ?></th>
                <th><?php echo $this->Paginator->sort('department_id'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
	<?php foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo h($employee['Employee']['id']); ?>&nbsp;</td>
                <td><?php echo h($employee['Employee']['name']); ?>&nbsp;</td>
                <td><?php echo h($employee['Employee']['email']); ?>&nbsp;</td>
                <td><?php echo h(explode(' ', $employee['Employee']['birth'])[0]); ?>&nbsp;</td>
                <td><?php if($employee['Employee']['gender']==1){
                                echo h('Nam');
                            }
                          else{
                                echo h('Nữ');
                          }?>&nbsp;</td>
                <td><?php echo h($employee['Employee']['position']); ?>&nbsp;</td>
                <td>
			<?php echo $this->Html->link($employee['Department']['name'], array('controller' => 'departments', 'action' => 'view', $employee['Department']['id'])); ?>
                </td>
                <td><?php echo h($employee['Employee']['created']); ?>&nbsp;</td>
                <td><?php echo h($employee['Employee']['modified']); ?>&nbsp;</td>
                <td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $employee['Employee']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $employee['Employee']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $employee['Employee']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $employee['Employee']['id']))); ?>
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
    <div><?php echo $this->Html->link(__('Add Employee'), array('action' => 'add')); ?></div>
</div>
<div class="actions">
    <h3><?php echo __('Category'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
    </ul>
</div>
