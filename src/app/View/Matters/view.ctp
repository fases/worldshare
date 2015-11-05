<div class="matters view">
<h2><?php echo __('Matter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($matter['Matter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($matter['Matter']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($matter['Matter']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Matter'), array('action' => 'edit', $matter['Matter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Matter'), array('action' => 'delete', $matter['Matter']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $matter['Matter']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Matters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications'), array('controller' => 'publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Publications'); ?></h3>
	<?php if (!empty($matter['Publication'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Registration'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Text Publication'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Type Id'); ?></th>
		<th><?php echo __('Matter Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Teacher Id'); ?></th>
		<th><?php echo __('Text Review'); ?></th>
		<th><?php echo __('Old Publication'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($matter['Publication'] as $publication): ?>
		<tr>
			<td><?php echo $publication['id']; ?></td>
			<td><?php echo $publication['registration']; ?></td>
			<td><?php echo $publication['title']; ?></td>
			<td><?php echo $publication['text_publication']; ?></td>
			<td><?php echo $publication['user_id']; ?></td>
			<td><?php echo $publication['type_id']; ?></td>
			<td><?php echo $publication['matter_id']; ?></td>
			<td><?php echo $publication['status']; ?></td>
			<td><?php echo $publication['teacher_id']; ?></td>
			<td><?php echo $publication['text_review']; ?></td>
			<td><?php echo $publication['old_publication']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Teachers'); ?></h3>
	<?php if (!empty($matter['Teacher'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Institution'); ?></th>
		<th><?php echo __('Matter Id'); ?></th>
		<th><?php echo __('Place'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($matter['Teacher'] as $teacher): ?>
		<tr>
			<td><?php echo $teacher['id']; ?></td>
			<td><?php echo $teacher['institution']; ?></td>
			<td><?php echo $teacher['matter_id']; ?></td>
			<td><?php echo $teacher['place']; ?></td>
			<td><?php echo $teacher['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'teachers', 'action' => 'view', $teacher['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'teachers', 'action' => 'edit', $teacher['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'teachers', 'action' => 'delete', $teacher['id']), array('confirm' => __('Are you sure you want to delete # %s?', $teacher['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
