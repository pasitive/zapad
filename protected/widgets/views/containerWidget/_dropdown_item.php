<?php
$ss = Yii::app()->session['searchState'];
$checked = '';
if (isset($ss['parent_id'][$data->id]) && $key = $ss['parent_id'][$data->id]) {
    $checked = ($key == 'on') ? 'checked' : '';
}
?>
<li>
    <div>
        <label class="checkbox">
            <input type="checkbox"
                   name="Apartment[parent_id][<?php echo $data->id ?>]" <?php echo $checked ?>> <?php echo $data->name ?>
        </label>
    </div>
</li>