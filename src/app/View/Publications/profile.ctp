<div class="publications index">
	<h2><?php echo __('Publications'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('registration'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('text_publication'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('matter_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('teacher_id'); ?></th>
			<th><?php echo $this->Paginator->sort('text_review'); ?></th>
			<th><?php echo $this->Paginator->sort('old_publication'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($publications as $publication): ?>
	<tr>
		<td><?php echo h($publication['Publication']['id']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['registration']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['title']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['text_publication']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($publication['User']['name'], array('controller' => 'users', 'action' => 'view', $publication['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($publication['Type']['name'], array('controller' => 'types', 'action' => 'view', $publication['Type']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($publication['Matter']['name'], array('controller' => 'matters', 'action' => 'view', $publication['Matter']['id'])); ?>
		</td>
		<td><?php echo h($publication['Publication']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($publication['Teacher']['id'], array('controller' => 'teachers', 'action' => 'view', $publication['Teacher']['id'])); ?>
		</td>
		<td><?php echo h($publication['Publication']['text_review']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['old_publication']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $publication['Publication']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $publication['Publication']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $publication['Publication']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $publication['Publication']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	/* echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	*/ ?>	</p>
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
		<li><?php echo $this->Html->link(__('New Publication'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matters'), array('controller' => 'matters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matter'), array('controller' => 'matters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ratings'), array('controller' => 'ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rating'), array('controller' => 'ratings', 'action' => 'add')); ?> </li>
	</ul>
</div>