<?php
/**
 * @author Denis A Boldinov
 *
 * @copyright
 * Copyright (c) 2012 Denis A Boldinov
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT
 * LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
 * NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 */
?>

<li class="span3">
    <div class="thumbnail">
        <?php echo CHtml::image($data->default_image, $data->name, array('width' => 260)) ?>
        <div class="caption clearfix" style="line-height: 16px;">
            <a style="font-size: 14px;margin-bottom: 2px;" href="<?php echo Yii::app()->createUrl('/apartment/view', array('id' => $data->parent_id)) ?>"><?php echo CHtml::encode(empty($data->parent_name) ? $data->typeName : $data->parent_name) ?></a>
            <div><em>Цена</em>: <?php echo Yii::app()->numberFormatter->formatCurrency($data->price, 'RUB') ?> </div>
            <div>Комнат: <?php echo CHtml::encode($data->room_number) ?> </div>
            <div>Площадь: <?php echo CHtml::encode($data->square) ?> м<sup>2</sup> </div>

            <div class="pull-right"><?php echo CHtml::link('Подробнее', array('/apartment/view', 'id' => $data->id)) ?></div>
        </div>
    </div>
</li>