<?php echo $this->Form->create('Employee', array(
                'class' => 'form-horizontal',
                'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array('class' => 'form-group'),
                'label' => array('class' => 'col col-sm-2 control-label'),   
                'between' => '<div class="col col-sm-10 pull-right">',
                'after' => '</div>',
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                )));?>
     
                <?php echo '<h2>'.__('Add Employee').'</h2>'; ?>
                <?php echo $this->Form->input('name', array(
                        'class' => 'form-control' // the preset in Form->create() doesn't work for me
                     )); 
                ?>
                <?php 
                echo $this->Form->input('email', array(
                        'class' => 'form-control'
                     )); 
                ?>
                <?php 
                echo $this->Form->input('birth', array(
                        //'class' => 'form-control'
                     )); 
                ?>
                <?php 
                echo $this->Form->input('gender', array(
                        'class' => 'form-control',
                        'options' => Configure::read('gender_option') //array(1 => 'Nam', 0 => 'Nữ')
                     )); 
                ?>
                <?php 
                echo $this->Form->input('position', array(
                        'class' => 'form-control',
                     )); 
                ?>
                <?php 
                echo $this->Form->input('department_id', array(
                        'class' => 'form-control'
                     )); 
                ?>
                
            <div class="form-group">
                <div class="col col-sm-offset-2 col-sm-10">
                    <?php echo $this->Form->button(__('Add Employee'), array(
                        'type' => 'submit',
			'class' => 'btn btn-warning'
                    ));?>
                </div>
            </div>
            <?php echo $this->Form->end();?>