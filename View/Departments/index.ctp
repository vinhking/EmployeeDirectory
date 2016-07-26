<h2><?php echo __('Departments'); ?></h2>
<table class="table" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($departments as $department): ?>
            <tr>
                <td><?php echo h($department['Department']['id']); ?>&nbsp;</td>
                <td><?php echo h($department['Department']['name']); ?>&nbsp;</td>
                <td><?php echo h($department['Department']['created']); ?>&nbsp;</td>
                <td><?php echo h($department['Department']['modified']); ?>&nbsp;</td>
                <td class="dropdown">

                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Options<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><?php echo $this->Html->link(__('View'), array('action' => 'view', $department['Department']['id'])); ?></li>
                        <li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $department['Department']['id'])); ?></li>
                        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $department['Department']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $department['Department']['id']))); ?></li>
                        <li><?php echo $this->Html->link(__('List Employees'), array('action' => 'list_employees', $department['Department']['id'])); ?></li>
                    </ul>    

                </td>
    <!--                        <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $department['Department']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $department['Department']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $department['Department']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $department['Department']['id']))); ?>
                <?php echo $this->Html->link(__('List Employees'), array('action' => 'list_employees', $department['Department']['id'])); ?>
                </td>-->
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

<!--            <p>
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
<?php echo $this->Html->link(__('Add Department'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>