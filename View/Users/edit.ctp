<?php echo $this->Form->create('User', array(
                'class' => 'form-inline',
                'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array('class' => 'form-group'),
                'label' => array('class' => 'sr-only'),   
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                )));?>
            <?php echo '<h2>'.__('Edit User').'</h2>'; ?>
            <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Enter new password'));?>
            <?php echo $this->Form->button(__('Edit Password'), array(
                         'type' => 'submit',
                         'class' => 'btn btn-warning'
            ));?>
            <?php echo $this->Form->end();?>