<li style="margin-bottom: 10px;">
    <span class="label"><?php echo date('d.m.Y', strtotime($data->created_at)) ?></span>
    <p><?php echo CHtml::link($data->teaser, array('news/view', 'id' => $data->id));?></p>
</li>