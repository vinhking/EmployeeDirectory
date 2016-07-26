<h2><?php echo __('Employees'); ?></h2>
<br>
<div class="pull-right">
    <?php
    echo $this->Form->create('Employee', array(
        'url' => array(
            'action' => 'index'
        ),
        'class' => 'form-inline',
        'inputDefaults' => array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'div' => array('class' => 'form-group'),
            'label' => array('class' => 'sr-only'),
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));
    ?>
    <?php
    echo $this->Form->input('name', array(
        'placeholder' => 'Discription of name'
    ));
    ?>
    <?php echo ' '; ?>
    <?php echo $this->Form->button($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search')) . ' Search', array('type' => 'submit', 'class' => 'btn btn-info'), array('escape' => false)); ?>
    <?php echo $this->Form->end(); ?>

</div>
<?php if (!empty($employees)) { ?>
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
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __(''); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo h($employee['Employee']['id']); ?>&nbsp;</td>
                    <td><?php echo h($employee['Employee']['name']); ?>&nbsp;</td>
                    <td><?php echo h($employee['Employee']['email']); ?>&nbsp;</td>
                    <td><?php echo h(explode(' ', $employee['Employee']['birth'])[0]); ?>&nbsp;</td>
                    <td><?php
                        if ($employee['Employee']['gender'] == 1) {
                            echo h('Nam');
                        } else {
                            echo h('Nữ');
                        }
                        ?>&nbsp;</td>
                    <td><?php echo h($employee['Employee']['position']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($employee['Department']['name'], array('controller' => 'departments', 'action' => 'view', $employee['Department']['id'])); ?>
                    </td>
                    <td><?php echo h($employee['Employee']['created']); ?>&nbsp;</td>
                    <td><?php echo h($employee['Employee']['modified']); ?>&nbsp;</td>
                    <td class="dropdown">

                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Options<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link(__('View'), array('action' => 'view', $employee['Employee']['id'])); ?></li>
                            <li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $employee['Employee']['id'])); ?></li>
                            <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $employee['Employee']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $employee['Employee']['id']))); ?></li>
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
    <?php echo $this->Html->link(__('Add Employee'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
    <br><br>
    <?php
    } else {
    echo '<br><br><br>';
    echo '<h3>Result</h3>';
    echo "<p style='color: red'>No Any Employee Is Found :)</p>";
    };
    ?>

