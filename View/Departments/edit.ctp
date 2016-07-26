<?php echo $this->Form->create('Department', array(
                'class' => 'form-horizontal',
                'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array('class' => 'form-group'),
                'label' => array('class' => 'col-sm-2 control-label'),   
                'between' => '<div class="col-sm-10 controls pull-right">',
                'after' => '</div>',
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                )));?>
                <?php echo '<h2>'.__('Edit Department').'</h2>'; ?>
                <?php echo $this->Form->input('id', array(
                        'class' => 'form-control', // the preset in Form->create() doesn't work for me
                     )); 
                ?>
                <?php echo $this->Form->input('name', array(
                        'class' => 'form-control' 
                     )); 
                ?>
                <div class="form-group">
                    <div class="col col-sm-offset-2 col-sm-10">
                        <?php echo $this->Form->button(__('Edit Department'), array(
                            'type' => 'submit',
                            'class' => 'btn btn-warning'
                        ));?>
                    </div>
                </div>
            
            <?php echo $this->Form->end();?>