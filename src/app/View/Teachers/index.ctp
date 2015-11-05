<div class="teachers index">
	<h2><?php echo __('Teachers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('institution'); ?></th>
			<th><?php echo $this->Paginator->sort('place'); ?></th>
			<th><?php echo $this->Paginator->sort('matter'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($teachers as $teacher): ?>
	<tr>
		<td><?php echo h($teacher['Teacher']['id']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['institution']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['place']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['matter']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($teacher['User']['name'], array('controller' => 'users', 'action' => 'view', $teacher['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $teacher['Teacher']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $teacher['Teacher']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $teacher['Teacher']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $teacher['Teacher']['id']))); ?>
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
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Teacher'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications'), array('controller' => 'publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
	</ul>
</div>
