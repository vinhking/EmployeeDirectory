<html>
    <title></title>
    <body>
        <h2>Search Employee By Discription Of Name</h2>
        <div><?php echo $this->Html->link(__('Return'), array('action' => 'index')); ?></div>
   <?php echo $this->Form->create('Employee');?>
   <?php
    echo $this->Form->input('name');
    echo $this->Form->submit('Search');
   ?>
   <?php echo $this->Form->end();?>

        <h3>Result</h3>
   <?php if(!empty($employees)){?>
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
        }else if($this->request->is('post')){
        echo "<p style='color: red'>No Result Is Found :)</p>";
        };
	?>
        </div>
        
    </body>
</html>