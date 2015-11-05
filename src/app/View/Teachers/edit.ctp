<div class="teachers form">
<?php echo $this->Form->create('Teacher'); ?>
	<fieldset>
		<legend><?php echo __('Edit Teacher'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('institution');
		echo $this->Form->input('place');
		echo $this->Form->input('matter');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Teacher.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Teacher.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications'), array('controller' => 'publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
	</ul>
</div>
