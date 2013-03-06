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

$this->pageTitle = Yii::app()->name . ' - ' . 'Новости компании' . ' - ' . $model->title;
$this->breadcrumbs = array(
    'Новости' => array('/news/index'),
    $model->title
);
?>

<div class="span7">

    <legend><?php echo CHtml::encode($model->title) ?></legend>


    <?php echo $model->content; ?>


    <div class="well" style="padding: 8px 0">
        <ul class="nav nav-list">
            <li>
                <?php echo CHtml::link('<i class="icon-home"></i> К списку новостей', array('/news')) ?>
            </li>
        </ul>
    </div>


</div>

<div class="span3">
    <legend>Спецпредложения</legend>
    <?php $this->widget('SpecialOffersWidget', array('pageSize' => 5)); ?>
</div>