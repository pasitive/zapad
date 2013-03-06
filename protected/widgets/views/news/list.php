<ul class="unstyled">
    <?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => 'news/_view',
    'template' => '{items}'
)) ?>
</ul>