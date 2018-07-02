<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $items = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
        // ['label' => 'Posts', 'url' => ['/post/index']],
        ['label' => 'Gii', 'url' => ['/gii']]
    ];

    //    if (Yii::$app->user->identity->isAdmin())
    //    array_push($items,
    //        ['label' => 'Users', 'url' => ['/user/index']]
    //    );
    if (Yii::$app->user->isGuest)
        array_push($items,
            ['label' => 'Login', 'url' => ['/site/login']],
            ['label' => 'Register', 'url' => ['/site/register']]
        );
    else
        array_push($items,
            '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->name . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        );

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $items
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <div id='content' class='row-fluid'>
            <? if (Yii::$app->controller->action->id == 'login' || Yii::$app->controller->action->id == 'register') { ?>
                <div class="col-xs-12 col-sm-12">
                    <?= $content ?>
                </div>
            <? } else { ?>
                <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                    <div class="list-group">
                        <?= \app\models\BaseModel::get_html_anchor_bootstrap('Home', 'site/index') ?>
                        <? if (!Yii::$app->user->isGuest) {
                            echo \app\models\BaseModel::get_html_anchor_bootstrap('User Types', 'user-type/index');
                            echo \app\models\BaseModel::get_html_anchor_bootstrap('Categories', 'category/index');
                            echo \app\models\BaseModel::get_html_anchor_bootstrap('Users', 'user/index');
                        }
                        ?>
                        <?= \app\models\BaseModel::get_html_anchor_bootstrap('Posts', 'post/index'); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <?= $content ?>
                </div>
            <? } ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
