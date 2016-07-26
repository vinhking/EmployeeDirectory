<h2><?php echo __('Employee Detail'); ?></h2>
	<dl>
           
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['id']); ?>
			&nbsp;
		</dd>
           
            
            
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['name']); ?>
			&nbsp;
		</dd>
            
            
            
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['email']); ?>
			&nbsp;
		</dd>
            
            
            
		<dt><?php echo __('Birth'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['birth']); ?>
			&nbsp;
		</dd>
            
            
           
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php if($employee['Employee']['gender']==1){
                                echo h('Nam');
                            }
                          else{
                                echo h('Nữ');
                        }?>
			&nbsp;
		</dd>
          
            
           
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['position']); ?>
			&nbsp;
		</dd>
          
            
          
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($employee['Department']['name'], array('controller' => 'departments', 'action' => 'view', $employee['Department']['id'])); ?>
			&nbsp;
		</dd>
         
            
        
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['created']); ?>
			&nbsp;
		</dd>
          
            
        
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($employee['Employee']['modified']); ?>
			&nbsp;
		</dd>
     
	</dl>