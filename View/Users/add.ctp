<div class="users form">
<?php echo $this->Form->create('User',array('type'=>'file')); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('display_name');
		echo $this->Form->input('upload', array('type'=>'file'));
                echo $this->Form->input('role', array(
                'options' => array(1 => 'admin', 0 => 'author')
                ));
	?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
    </ul>
</div>
