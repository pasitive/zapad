<?php $this->renderPartial('//mail/_header') ?>

<p>Вам пришло новое сообщение с формы заявки</p>

<ul>
    <li>Имя: <?php echo CHtml::encode($model->name) ?></li>
    <li>Email: <?php echo CHtml::encode($model->email) ?></li>
    <li>Площадь: <?php echo CHtml::encode($model->square) ?> </li>
    <li>Комнат: <?php echo CHtml::encode($model->room_number) ?> </li>
    <li>Действие: <?php echo (($model->is_rent == 1) ? 'Продать' : 'Сдать') ?> </li>
    <li>Адрес: <?php echo CHtml::encode($model->address) ?> </li>
    <li>Сумма: <?php echo $model->price_from ?> - <?php echo $model->price_to ?> </li>
    <li>ЖК: <?php echo join(',', $apartmentNames) ?> </li>
</ul>

<?php $this->renderPartial('//mail/_footer') ?>