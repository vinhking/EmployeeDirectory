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
            <h2><?php echo __('Employee Detail'); ?></h2>
	<table>
            <tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($employee['Employee']['id']); ?>
			&nbsp;
		</td>
            </tr>
            
            <tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($employee['Employee']['name']); ?>
			&nbsp;
		</td>
            </tr>
            
            <tr>
		<td><?php echo __('Email'); ?></td>
		<td>
			<?php echo h($employee['Employee']['email']); ?>
			&nbsp;
		</td>
            </tr>
            
            <tr>
		<td><?php echo __('Birth'); ?></td>
		<td>
			<?php echo h($employee['Employee']['birth']); ?>
			&nbsp;
		</td>
            </tr>
            
            <tr>
		<td><?php echo __('Gender'); ?></td>
		<td>
			<?php echo h($employee['Employee']['gender']); ?>
			&nbsp;
		</td>
            </tr>
            
            <tr>
		<td><?php echo __('Position'); ?></td>
		<td>
			<?php echo h($employee['Employee']['position']); ?>
			&nbsp;
		</td>
            </tr>
            
            <tr>
		<td><?php echo __('Department'); ?></td>
		<td>
			<?php echo $this->Html->link($employee['Department']['name'], array('controller' => 'departments', 'action' => 'view', $employee['Department']['id'])); ?>
			&nbsp;
		</td>
            </tr>
            
            <tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($employee['Employee']['created']); ?>
			&nbsp;
		</td>
            </tr>
            
            <tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($employee['Employee']['modified']); ?>
			&nbsp;
		</td>
            </tr>
	</table>
        </div>

    </body>
</html>







<!--

<div class="employees view">
<h2><?php echo __('Employee'); ?></h2>
	<table>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($employee['Employee']['id']); ?>
			&nbsp;
		</td>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($employee['Employee']['name']); ?>
			&nbsp;
		</td>
		<td><?php echo __('Email'); ?></td>
		<td>
			<?php echo h($employee['Employee']['email']); ?>
			&nbsp;
		</td>
		<td><?php echo __('Birth'); ?></td>
		<td>
			<?php echo h($employee['Employee']['birth']); ?>
			&nbsp;
		</td>
		<td><?php echo __('Gender'); ?></td>
		<td>
			<?php echo h($employee['Employee']['gender']); ?>
			&nbsp;
		</td>
		<td><?php echo __('Position'); ?></td>
		<td>
			<?php echo h($employee['Employee']['position']); ?>
			&nbsp;
		</td>
		<td><?php echo __('Department'); ?></td>
		<td>
			<?php echo $this->Html->link($employee['Department']['name'], array('controller' => 'departments', 'action' => 'view', $employee['Department']['id'])); ?>
			&nbsp;
		</td>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($employee['Employee']['created']); ?>
			&nbsp;
		</td>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($employee['Employee']['modified']); ?>
			&nbsp;
		</td>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Employee'), array('action' => 'edit', $employee['Employee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Employee'), array('action' => 'delete', $employee['Employee']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $employee['Employee']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('action' => 'atd')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'atd')); ?> </li>
	</ul>
</div>-->
