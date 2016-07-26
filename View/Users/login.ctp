<?php echo $this->Flash->render('auth'); ?>
<?php 
echo $this->Form->create('User', array(
'role' => 'form',
'class' => 'form-horizontal',
'inputDefaults' => array(
'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
'div' => array('class' => 'form-group'),
'label' => array('class' => 'col col-sm-2 control-label'),   
'between' => '<div class="col col-sm-10">',
'after' => '</div>',
'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')
))
));?>
<?php echo '<h2>'.__('Please enter your username and password').'</h2>'; ?>
<?php echo $this->Form->input('username', array('class' => 'form-control'));?>
<?php echo $this->Form->input('password', array('class' => 'form-control'));?>
<div class="form-group">
    <div class="col col-sm-offset-2 col-sm-10">
        <?php echo $this->Form->button(__('Login'), array(
            'type' => 'submit',
            'class' => 'btn btn-primary'
        ));?>
    </div>
</div>
<?php echo $this->Form->end();?>