<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" href="/css/reset.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="/css/960.css" type="text/css" media="screen, projection">

    <!--[if IE 6]>
    <script src="http://ie-note.googlecode.com/hg/ie-note.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="/css/main.css" type="text/css" media="screen, projection">
</head>
<body>

<div id="container" class="container_12">

    <div id="header" class="grid_12">
        <a href="<?php echo Yii::app()->homeUrl ?>" id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></a>
    </div>

    <div id="menu_block" class="grid_12">
        <?php $this->widget('zii.widgets.CMenu', array(
        'id' => 'main_navigation',
        'activateParents' => true,
        'items' => array(
            array('label' => 'Новости компании', 'url' => array('/news/'), 'active' => Yii::app()->controller->id == 'news'),
            array('label' => 'Объекты на карте', 'url' => array('/map/index')),
        ),
    )); ?>
    </div>

    <?php echo $content; ?>

    <div class="grid_12">
        <div id="footer" class="clearfix">

            <div class="footer_wrapper prepend_left">

                <div class="space small"></div>

                <?php if (isset($this->breadcrumbs)): ?>
                    <?php $this->widget('application.components.Breadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'separator' => CHtml::image('/images/breadcrumb_delimeter.png'),
                )); ?><!-- breadcrumbs -->
                <?php endif?>

                <hr class="splitter">

                <ul>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                    <li><span><a href="">Ссылка</a></span></li>
                </ul>


                <div class="clear"></div>

                <hr class="splitter">

                <div class="prefix_3 grid_4 alpha">
                    <p class="copyright">&copy; Агенство Элитной недвижимости &laquo;Запад&raquo;</p>
                </div>

                <div class="grid_4 omega">
                    <div class="footer_logo">
                        <img src="/images/logo_white_small.png">
                    </div>
                </div>

            </div>

            <?php if (YII_DEBUG) {
                list($queryCount, $queryTime) = Yii::app()->db->getStats();
                echo "Query count: $queryCount, Total query time: " . sprintf('%0.5f', $queryTime) . "s";
            }
            ?>
            <?php if (YII_DEBUG) : ?>
            <div>
                Execution Time: <?php echo round(CLogger::getExecutionTime(), 3);?> sec<br/>
                Memory Usage: <?php echo round(CLogger::getMemoryUsage() / 1048576, 2);?> mb
            </div>
                <?php endif; ?>
        </div>

    </div>
</div>

</div>
</body>
</html>