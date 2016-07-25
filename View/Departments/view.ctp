<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="witdh=device-witdh, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Employee Directory</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><?php echo $this->Html->link(__('Home'), array('controller' => 'users', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php 
                        if($this->Session->check('Auth.User.username')){
                        echo '<li>'. $this->Html->link('Hello!, ' .$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-user')).' '. $this->Session->read('Auth.User.username'),array('action' => '#'), array('escape'=>false)) .'</li>';
                        echo '<li>'.$this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-log-out')). " Logout", array('action' => 'logout'), array('escape'=>false)).'</li>';
                        }else{
                        echo '<li>'.$this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-log-in')). " Login", array('action' => 'login'), array('escape'=>false)).'</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
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
        </div>

    </body>
</html>










<!--
<div class="departments view">
<h2><?php echo __('Department'); ?></h2>
	<table>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($department['Department']['id']); ?>
			&nbsp;
		</td>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($department['Department']['name']); ?>
			&nbsp;
		</td>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($department['Department']['created']); ?>
			&nbsp;
		</td>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($department['Department']['modified']); ?>
			&nbsp;
		</td>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Department'), array('action' => 'edit', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Department'), array('action' => 'delete', $department['Department']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $department['Department']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('action' => 'atd')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'atd')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Employees'); ?></h3>
	<?php if (!empty($department['Employee'])): ?>
	<table cellpatding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Birth'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($department['Employee'] as $employee): ?>
		<tr>
			<td><?php echo $employee['id']; ?></td>
			<td><?php echo $employee['name']; ?></td>
			<td><?php echo $employee['email']; ?></td>
			<td><?php echo $employee['birth']; ?></td>
			<td><?php echo $employee['gender']; ?></td>
			<td><?php echo $employee['position']; ?></td>
			<td><?php echo $employee['department_id']; ?></td>
			<td><?php echo $employee['created']; ?></td>
			<td><?php echo $employee['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'employees', 'action' => 'view', $employee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'employees', 'action' => 'edit', $employee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'employees', 'action' => 'delete', $employee['id']), array('confirm' => __('Are you sure you want to delete # %s?', $employee['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'atd')); ?> </li>
		</ul>
	</div>
</div>-->
