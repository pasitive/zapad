<!DOCTYPE html>

<html lang="en">
<head>
    <meta name='yandex-verification' content='742de57a9a87e7ed' />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!--
    Skype 'My status' button
    http://www.skype.com/go/skypebuttons
    -->
    <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
    <style>
        a.zingaya_button {
            display: block;
            width: 176px;
            height: 36px;
            background: url(http://cdn.zingaya.com/img/buttons/7e69593761b8f544627bcac8bdd900e2_1350463443246.png) no-repeat;
        }
        a.zingaya_button:hover {
            background-position: 0 -36px;
        }
        a.zingaya_button:active {
            background-position: 0 -72px;
        }
    </style>

    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />

</head>
<body>

<div class="container">

    <div class="span12" id="overtop"><span>Элитная недвижимость на западе Москвы</span></div>

    <div id="top" class="span12">&nbsp;</div>

    <div class="span12" id="header">

        <div class="row">
            <div class="span12" style="background-color: #f0f0f0; height: 20px;"></div>
        </div>

        <div class="row">
            <div class="span2" style="background-color: #f0f0f0; height: 83px;">
                <a href="<?php echo Yii::app()->homeUrl ?>" id="logo"></a>
            </div>
            <div class="span7" style="background-color: #fff;">
                <h3><?php echo CHtml::decode(Yii::app()->name) ?></h3>
                <?php $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'О компании', 'url' => array('/page/view', 'name' => 'about')),
                    array('label' => 'Услуги', 'url' => array('/page/view', 'name' => 'services')),
                    array('label' => 'Оценка', 'url' => array('/page/view', 'name' => 'assessment')),
                    array('label' => 'Вакансии', 'url' => array('/page/view', 'name' => 'vacancies')),
                    array('label' => 'Контакты', 'url' => array('/site/contact')),
                ),
                'htmlOptions' => array('class' => 'navigation main')
            )); ?>
                <hr>
            </div>
            <div class="span3" style="background-color: #f0f0f0;">
                <ul class="unstyled" style="padding-left: 30px;font-size: 115%;">
                    <li>тел.: 8 917 555 0217</li>                    
                    <li>email: <a href="mailto:info@zapadrealty.ru">info@zapadrealty.ru</a></li>
                    <li><a href="http://zingaya.com/widget/7e69593761b8f544627bcac8bdd900e2" onclick="window.open(this.href+'?referrer='+escape(window.location.href)+'', '_blank', 'width=236,height=220,resizable=no,toolbar=no,menubar=no,location=no,status=no'); return false" class="zingaya_button"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="span12" style="height:5px;"></div>

    <div class="span12" id="content-container">
        <div class="row">
            <div class="span2">

                <?php $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Продажа квартир', 'url' => array('/apartment/index')),
                    array('label' => 'Аренда квартир', 'url' => array('/apartment/rent')),
                    array('label' => 'Каталог элитных домов', 'url' => array('/map/index')),
                    array('label' => 'Собсвенникам', 'url' => array('/page/view', 'name' => 'owners')),
                ),
                'htmlOptions' => array('class' => 'nav nav-main nav-pills nav-stacked')
            )); ?>


                <legend>ЖК на Западе</legend>
                <?php $this->widget('ContainerListWidget') ?>

            </div>

            <?php echo $content; ?>


        </div>
    </div>

    <div class="span12" id="footer">
        <div style="text-align: center;">
            <hr>
            <?php $this->widget('zii.widgets.CMenu', array(
            'items' => array(
                array('label' => 'О компании', 'url' => array('/page/view', 'name' => 'about')),
                array('label' => 'Услуги', 'url' => array('/page/view', 'name' => 'services')),
                array('label' => 'Оценка', 'url' => array('/page/view', 'name' => 'assessment')),
                array('label' => 'Вакансии', 'url' => array('/page/view', 'name' => 'vacancies')),
                array('label' => 'Контакты', 'url' => array('/site/contact')),
            ),
        )); ?>

            &copy; Агентство элитной недвижимости &laquo;Запад&raquo;
        </div>
    </div>

</div>

<?php $this->renderPartial('//layouts/_counters') ?>

<script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/bootstrap/js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/bootstrap/js/bootstrap-button.js"></script>
<script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/bootstrap/js/bootstrap-tab.js"></script>
<script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/bootstrap/js/bootstrap-carousel.js"></script>
<script type="text/javascript" src="<?php echo $this->assetsUrl; ?>/bootstrap/js/bootstrap-transition.js"></script>
</body>
</html>