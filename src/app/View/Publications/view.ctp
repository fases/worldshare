<div class="publications view">
<h2><?php echo __('Publication'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registration'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['registration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text Publication'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['text_publication']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($publication['User']['name'], array('controller' => 'users', 'action' => 'view', $publication['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($publication['Type']['name'], array('controller' => 'types', 'action' => 'view', $publication['Type']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($publication['Matter']['name'], array('controller' => 'matters', 'action' => 'view', $publication['Matter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Teacher'); ?></dt>
		<dd>
			<?php echo $this->Html->link($publication['Teacher']['id'], array('controller' => 'teachers', 'action' => 'view', $publication['Teacher']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text Review'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['text_review']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Old Publication'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['old_publication']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Publication'), array('action' => 'edit', $publication['Publication']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Publication'), array('action' => 'delete', $publication['Publication']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $publication['Publication']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Attachments'); ?></h3>
	<?php if (!empty($publication['Attachment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Publication Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($publication['Attachment'] as $attachment): ?>
		<tr>
			<td><?php echo $attachment['id']; ?></td>
			<td><?php echo $attachment['file']; ?></td>
			<td><?php echo $attachment['publication_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attachments', 'action' => 'view', $attachment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attachments', 'action' => 'edit', $attachment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attachments', 'action' => 'delete', $attachment['id']), array('confirm' => __('Are you sure you want to delete # %s?', $attachment['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Comments'); ?></h3>
	<?php if (!empty($publication['Comment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Publication Id'); ?></th>
		<th><?php echo __('Schedule'); ?></th>
		<th><?php echo __('Text'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($publication['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['id']; ?></td>
			<td><?php echo $comment['user_id']; ?></td>
			<td><?php echo $comment['publication_id']; ?></td>
			<td><?php echo $comment['schedule']; ?></td>
			<td><?php echo $comment['text']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array('confirm' => __('Are you sure you want to delete # %s?', $comment['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Ratings'); ?></h3>
	<?php if (!empty($publication['Rating'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Publication Id'); ?></th>
		<th><?php echo __('Stars'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($publication['Rating'] as $rating): ?>
		<tr>
			<td><?php echo $rating['id']; ?></td>
			<td><?php echo $rating['user_id']; ?></td>
			<td><?php echo $rating['publication_id']; ?></td>
			<td><?php echo $rating['stars']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ratings', 'action' => 'view', $rating['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ratings', 'action' => 'edit', $rating['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ratings', 'action' => 'delete', $rating['id']), array('confirm' => __('Are you sure you want to delete # %s?', $rating['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Rating'), array('controller' => 'ratings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
