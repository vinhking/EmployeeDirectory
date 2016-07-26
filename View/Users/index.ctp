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
            <th class="actions"><?php echo __(''); ?></th>
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
            <td><?php if($user['User']['role']==1){
                                echo h('Admin');
                            }
                          else{
                                echo h('Author');
                        }?>&nbsp;</td>
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
?>
</p>
<ul class="pagination">
<?php
  echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
  echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
  echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
?>
</ul>

<!--<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
 <div class="pagination">
        <ul>
            <?php 
                echo $this->Paginator->prev( '<<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled myclass', 'tag' => 'li' ) );
                echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'disabled myclass' ) );
                echo $this->Paginator->next( '>>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled myclass', 'tag' => 'li' ) );
            ?>
        </ul>
    </div>-->

<!--<p>
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
</div>-->
<br>
            <?php echo $this->Html->link(__('Add User'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
<br><br><br>