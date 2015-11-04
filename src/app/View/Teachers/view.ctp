<div class="teachers view">
<h2><?php echo __('Teacher'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['institution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['place']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matter'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['matter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teacher['User']['name'], array('controller' => 'users', 'action' => 'view', $teacher['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Teacher'), array('action' => 'edit', $teacher['Teacher']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Teacher'), array('action' => 'delete', $teacher['Teacher']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $teacher['Teacher']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications'), array('controller' => 'publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Publications'); ?></h3>
	<?php if (!empty($teacher['Publication'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Registration'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Text Publication'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Type Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Teacher Id'); ?></th>
		<th><?php echo __('Text Review'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($teacher['Publication'] as $publication): ?>
		<tr>
			<td><?php echo $publication['id']; ?></td>
			<td><?php echo $publication['registration']; ?></td>
			<td><?php echo $publication['title']; ?></td>
			<td><?php echo $publication['text_publication']; ?></td>
			<td><?php echo $publication['user_id']; ?></td>
			<td><?php echo $publication['type_id']; ?></td>
			<td><?php echo $publication['status']; ?></td>
			<td><?php echo $publication['teacher_id']; ?></td>
			<td><?php echo $publication['text_review']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'publications', 'action' => 'view', $publication['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'publications', 'action' => 'edit', $publication['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'publications', 'action' => 'delete', $publication['id']), array('confirm' => __('Are you sure you want to delete # %s?', $publication['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Publication'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
