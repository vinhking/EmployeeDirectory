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
            <?php echo $this->Form->create('User', array(
                'type' => 'file',
                'class' => 'form-horizontal',
                'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array('class' => 'form-group'),
                'label' => array('class' => 'col col-sm-2 control-label'),   
                'between' => '<div class="col col-sm-10 pull-right">',
                'after' => '</div>',
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                )));?>
            <fieldset>
                <legend><?php echo __('Add User'); ?></legend>
                <?php echo $this->Form->input('username', array(
                        'label' => array('class' => 'control-label'), // the preset in Form->create() doesn't work for me
                     )); 
                ?>
                <?php 
                echo $this->Form->input('password', array(
                        'label' => array('class' => 'control-label'),
                     )); 
                ?>
                <?php 
                echo $this->Form->input('email', array(
                        'label' => array('class' => 'control-label'),
                     )); 
                ?>
                <?php 
                echo $this->Form->input('display_name', array(
                        'label' => array('class' => 'control-label'),
                     )); 
                ?>
                <?php 
                echo $this->Form->input('avatar', array(
                        'label' => array('class' => 'control-label'),
                        'type' => 'file'
                     )); 
                ?>
                <?php 
                echo $this->Form->input('role', array(
                        'label' => array('class' => 'control-label'),
                        'options' => Configure::read('role_option') //array(1 => 'Admin', 0 => 'Author')
                     )); 
                ?>
                
            </fieldset>
            <div class="form-group">
                <div class="col col-sm-offset-2 col-sm-10">
                    <?php echo $this->Form->button(__('Add User'), array(
                        'type' => 'submit',
			'class' => 'btn btn-warning'
                    ));?>
                </div>
            </div>
            <?php echo $this->Form->end();?>
            
            <!--
            <?php echo $this->Form->create('User',array('type'=>'file')); ?>
            <fieldset>
                <legend><?php echo __('Add User'); ?></legend>
            <?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('display_name');
		echo $this->Form->input('avatar', array('type' => 'file'));
                echo $this->Form->input('role', array(
                'options' => array(1 => 'admin', 0 => 'author')
                ));
            ?>
            </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
            -->
        </div>

    </body>
</html>