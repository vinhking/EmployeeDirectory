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
             <?php if(!empty($data)){?>
            <h2><?php echo __('List Employees Of '.ucfirst($data[0]['Department']['name']).' Department'); ?></h2>
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
                    </tr>
                </thead>
                <tbody>
	<?php foreach ($data as $employee): ?>
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
        <?php
             }else {
            echo "<p style='color: red'>There are not any employee :)</p>";
        }
        ?>
        </div>

    </body>
</html>





<!--





<div class="data index">
    <h2><?php echo __('List Employees Of '.ucfirst($data[0]['Department']['name']).' Department'); ?></h2>
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
            </tr>
        </thead>
        <tbody>
	<?php foreach ($data as $employee): ?>
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
</div>
-->
