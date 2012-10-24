
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    if ($key == 'error' || $key == 'success' || $key == 'notice') {
        echo "<div class='alert alert-{$key}'>{$message}</div>";
    }
}
?>

    <br>

    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'request-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    ),
)); ?>


    <fieldset class="control-group error">
        <?php echo $form->errorSummary($requestForm); ?>
    </fieldset>

    <div class="control-group">
        <?php echo $form->labelEx($requestForm, 'name', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($requestForm, 'name', array('size' => 60, 'maxlength' => 255), array('class' => 'input-large', 'id' => 'name')); ?>
        </div>
    </div>


    <div class="control-group">
        <?php echo $form->labelEx($requestForm, 'email', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($requestForm, 'email', array('size' => 60, 'maxlength' => 255), array('class' => 'input-large', 'id' => 'name')); ?>
        </div>
    </div>


    <div class="control-group">
        <?php echo $form->labelEx($requestForm, 'square', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($requestForm, 'square', array('size' => 60, 'maxlength' => 255), array('class' => 'input-large', 'id' => 'name')); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($requestForm, 'room_number', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($requestForm, 'room_number', array('size' => 60, 'maxlength' => 255), array('class' => 'input-large', 'id' => 'name')); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($requestForm, 'is_rent', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($requestForm, 'is_rent', array(0 => 'Сдать', 1 => 'Продать'), array('class' => 'input-large', 'id' => 'name')); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($requestForm, 'address', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($requestForm, 'address', array('size' => 60, 'maxlength' => 255), array('class' => 'input-large', 'id' => 'name')); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($requestForm, 'price_from', array('class' => 'control-label')); ?>
        <div class="controls controls-row">
            <?php echo $form->textField($requestForm, 'price_from', array('class' => 'span1', 'id' => 'price_from')); ?>
            до
            <?php echo $form->textField($requestForm, 'price_to', array('class' => 'span1', 'id' => 'price_to')); ?>
            руб
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($requestForm, 'apartment_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php $this->widget('ContainerListWidget', array(
            'itemView' => 'containerWidget/_dropdown_item'
        )) ?>
        </div>
    </div>


    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Оставить заявку</button>
    </div>

    <?php $this->endWidget(); ?>
