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
            <h2><?php echo __('Employees'); ?></h2>
            <br>
            <div class="pull-right">
                <?php echo $this->Form->create('Employee', array(
                'url'   => array(
                'action' => 'index'
                ),     
                'class' => 'form-inline',
                'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array('class' => 'form-group'),
                'label' => array('class' => 'sr-only'),
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                )));?>
                <?php echo $this->Form->input('name', array(
                    'placeholder' => 'Discription of name'
                ));?>
                <?php echo $this->Form->button($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search')). ' Search', array('type' => 'submit', 'class' => 'btn btn-info'), array('escape'=>false)); ?>
                <?php echo $this->Form->end();?>
                
            </div>
            <?php if(!empty($employees)){?>
            <table class="table" cellpadding="0" cellspacing="0">
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
                        <th class="actions"><?php echo __(''); ?></th>
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
                        <td class="dropdown">
                            
                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Options<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('View'), array('action' => 'view', $employee['Employee']['id'])); ?></li>
                        <li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $employee['Employee']['id'])); ?></li>
                        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $employee['Employee']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $employee['Employee']['id']))); ?></li>
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
            <?php echo $this->Html->link(__('Add Employee'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
        <?php
        }else{
            echo '<br><br><br>';
            echo '<h3>Result</h3>';
            echo "<p style='color: red'>No Any Employee Is Found :)</p>";
        };
        ?>
        </div>

    </body>
</html>









<!--



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
</div>-->
