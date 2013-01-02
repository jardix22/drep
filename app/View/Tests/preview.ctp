
<h3><?php echo $test['Test']['title']?></h3>

<?php foreach ($test['Part'] as $part): ?>
	<?php foreach ($part['Block'] as $block): ?>
			<h4><?php echo $block['name']; ?></h4>
			<ul>
			<?php foreach ($block['Question'] as $question): ?>
				<li><?php echo $question['description']; ?></li>
			<?php endforeach; ?>
			</ul>
	<?php endforeach; ?>
<?php endforeach; ?>
