<?php
/* @var $this ForumController */
/* @var $data BbiiForum */

		$image = 'forum';
		if(!isset($data->last_post_id) || $this->forumIsRead($data->id)) {
			$image .= '2';
		} else {
			$image .= '1';
		}
		if($data->locked) {
			$image .= 'l';
		}
		if($data->moderated) {
			$image .= 'm';
		}
		if(!$data->public) {
			$image .= 'h';
		}
?>

<?php if($data->type): ?>
	<div class="forum">
	<div class="forum-cell <?php echo $image; ?>"></div>
	<div class="forum-cell main">
		<div class="header2">
			<?php echo CHtml::link(CHtml::encode($data->name), array('forum', 'id'=>$data->id)); ?>
		</div>
		<div class="header4">
			<?php echo CHtml::encode($data->subtitle); ?>
		</div>
	</div>
	<div class="forum-cell center">
		<?php echo CHtml::encode($data->num_posts); ?><br>
		<?php echo CHtml::encode($data->getAttributeLabel('num_posts')); ?>
	</div>
	<div class="forum-cell center">
		<?php echo CHtml::encode($data->num_topics); ?><br>
		<?php echo CHtml::encode($data->getAttributeLabel('num_topics')); ?>
	</div>
	<div class="forum-cell last-cell">
		<?php if($data->last_post_id && $data->lastPost) {
			echo CHtml::encode($data->lastPost->poster->member_name);
			echo CHtml::link(CHtml::image($this->module->getRegisteredImage('next.png'), 'next', array('style'=>'margin-left:5px;')), array('topic', 'id'=>$data->lastPost->topic_id, 'nav'=>'last'));
			echo '<br>';
			echo DateTimeCalculation::long($data->lastPost->create_time);
		} else {
			echo Yii::t('BbiiModule.bbii', 'No posts');
		}
		?>
	</div>


<?php else: ?>
	<div class="forum-category">
		<div class="header2">
			<?php echo CHtml::encode($data->name); ?>
		</div>
		<div class="header4">
			<?php echo CHtml::encode($data->subtitle); ?>
		</div>
<?php endif; ?>
</div>