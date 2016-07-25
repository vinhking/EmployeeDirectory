<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <h2><?php echo __('Users'); ?></h2>
            <br>
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('username'); ?></th>
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
                        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['display_name']); ?>&nbsp;</td>
                        <td><?php echo "<img src='".$user['User']['avatar']."' alt='avatar' height='50' width='50' />"; ?>&nbsp;</td>
                        <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                        <td class="dropdown">
                            
                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Options<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?></li>
                        <li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?></li>
                        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?></li>
                        </ul>    
                            
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
            <br>
            <?php echo $this->Html->link(__('Add User'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
        </div>

    </body>
</html>
