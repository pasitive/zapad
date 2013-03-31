<?php
$ss = Yii::app()->session['searchState'];
$checked = false;
if (isset($ss['parent_id'][$data->id]) && $key = $ss['parent_id'][$data->id]) {
    $checked = ($key == $data->id) ? true : false;
}
?>
<li>
    <div>
        <label class="checkbox">
            <?php echo CHtml::activeCheckBox($model, 'parent_id['.$data->id.']', array('uncheckValue' => null, 'value' => $data->id, 'checked' => $checked)) ?>
            <?php echo $data->name; ?>
        </label>
    </div>
</li>