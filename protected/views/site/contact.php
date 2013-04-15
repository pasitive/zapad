<div class="span7">

    <legend>Контакты</legend>

    <table class="table">
        <tr>
            <td>Индивидуальный предприниматель</td>
            <td>Сухих Максим Теймурович</td>
        </tr>
        <tr>
            <td>ИНН</td>
            <td>771900364581</td>
        </tr>
        <tr>
            <td>ОГРНИП</td>
            <td>309774622501210</td>
        </tr>
        <tr>
            <td>Расчетный счет</td>
            <td>40802810400750001128</td>
        </tr>
        <tr>
            <td>БИК</td>
            <td>044525209</td>
        </tr>
        <tr>
            <td>Кор/счет</td>
            <td>30101810400000000209</td>
        </tr>
        <tr>
            <td>Банк</td>
            <td>ЗАО «МОССТРОЙЭКОНОМБАНК» г.Москва Москва, Щелковское шоссе 86-51</td>
        </tr>
        <tr>
            <td>Фактический Адрес</td>
            <td>Москва, Мичуринский проспект дом 7</td>
        </tr>
    </table>

    <?php if (Yii::app()->user->hasFlash('contact')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('contact') ?>
    </div>
    <?php endif; ?>

    <legend>Оставьте заявку и мы Вам перезвоним</legend>

    <br>

    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'contact-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    ),
)); ?>


    <fieldset class="control-group error">
        <?php echo $form->errorSummary($model); ?>
    </fieldset>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'name', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255), array('class' => 'input-large', 'id' => 'name')); ?>
            <!--                    <p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>-->
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'email', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 255), array('class' => 'input-large', 'id' => 'name')); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'body', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textArea($model, 'body', array('cols' => 44, 'rows' => 5), array('class' => 'input-xlarge')); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'date', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'date', array('size' => 60, 'maxlength' => 255), array('class' => 'input-large', 'id' => 'name')); ?>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="select01">Удобное время для звонка</label>

        <div class="controls">
            <?php echo $form->dropDownList($model, 'time', array(
            'в течение часа' => 'в течение часа',
            'с 10 до 12' => 'с 10 до 12',
            'с 12 до 14' => 'с 12 до 14',
            'с 14 до 18' => 'с 14 до 18',
            'с 18 до 19' => 'с 18 до 19',
        )) ?>
        </div>
    </div>


    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Оставить заявку</button>
    </div>

    <?php $this->endWidget(); ?>

    </div>

<div class="span3">
    <legend>Спецпредложения</legend>
    <?php $this->widget('SpecialOffersWidget', array('pageSize' => 5)); ?>
</div>