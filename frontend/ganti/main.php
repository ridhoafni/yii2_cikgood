<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\Layout;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<link rel="shortcut icon" href="<?php echo Yii::$app->getHomeUrl(); ?>/favicon.png" type="image/x-icon" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php $warna=Layout::find()->where(['id_layout'=>'1'])->one()->warna_navbar;?>
<!--warna main
?php $warna=Layout::find()->where(['id_layout'=>'1']);?>
?php foreach($warna as $warna);?>
-->
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<span style="color:#fff;margin-left:-100px;padding-top:-50px;" valign="top">
			<img src="'.Yii::$app->homeUrl.'images/logo3.png" alt="Logo" style="width:150px;padding:0px;margin-top:-27px;" class="hidden-xs">
			<img src="'.Yii::$app->homeUrl.'images/logo3.png" alt="Logo" style="width:150px;padding:0px;margin-top:-27px;margin-left:100px;" class="hidden-md hidden-lg">
		</span>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            //warna layout navbar
			'style' => 'background-color:'.$warna.';border-color:#af0e02;',
			//warna layout navbar
			'role' => 'navigation',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index'],'options'=>['style'=>'color:#fff;'],'linkOptions'=>['style'=>'color:#fff;']],
        ['label' => 'Profil', 'url' => ['/site/profil'],'linkOptions'=>['style'=>'color:#fff;']],
        ['label' => 'Kontak Kami', 'url' => ['/site/contact'],'linkOptions'=>['style'=>'color:#fff;']],
    ];
    if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup'],'linkOptions'=>['style'=>'color:#fff;']];
        // $menuItems[] = ['label' => 'Login', 'url' => ['/site/login'],'linkOptions'=>['style'=>'color:#fff;']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link','style'=>'color:#fff;']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => [
			'class' => 'navbar-nav navbar-right',
		],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

	<div class="footerx" style="background:#d60548;color:#fff;margin-bottom:-4%;">
		<div class="containerx" style="padding:10px 10px 5px 10px;">
			<br><br>
			<p class="pull-left"><small>Software House (Website and Mobile Application)</small></p>
			<p class="pull-right"><small>CP 0812-612-3812 (WhatsApp)</small></p>
			<br>
		</div>
	</div>
	
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer hidden-lg hidden-md" style="background:#ffdca8;border-color:#af0e02;border-width:3px;color:#fff;min-height:800px;">
    <div class="container">
        <div class="pull-left col-md-6">
			<img src="<?= Yii::$app->homeUrl ?>images/logo2.png" alt="Logo" style="width:100%;">
		</div>

        <div class="col-md-6" style="color:#000;">
			<div class="col-md-4">
				<h4>Tentang Kami</h4>
				<p><a href="http://fsoft-go.com/" style="color:#4e4e4e;">Software House</a></p>
				<p><a href="#" style="color:#4e4e4e;">Helowot</a></p>
				<p><a href="http://bedawarna.com/" style="color:#4e4e4e;">Beda Warna</a></p>
				<hr>
			</div>
			<div class="col-md-4">
				<h4>Product Kami</h4>
				<p><a href="#" style="color:#4e4e4e;">Smart Mosque Display</a></p>
				<p><a href="#" style="color:#4e4e4e;">eMenu</a></p>
				<p><a href="#" style="color:#4e4e4e;">Flash Store</a></p>
				<p><a href="#" style="color:#4e4e4e;">eSchool</a></p>
				<p><a href="#" style="color:#4e4e4e;">Sistem Akademik Universitas</a></p>
				<p><a href="#" style="color:#4e4e4e;">Medica</a></p>
				<hr>
			</div>
			<div class="col-md-4">
				<h4>Partner</h4>
				<p><a href="https://gamebrott.com/" style="color:#4e4e4e;">Gamebrott</a></p>
				<p><a href="https://startuppekanbaru.org/" style="color:#4e4e4e;">Startup Pekanbaru</a></p>
				<p><a href="#" style="color:#4e4e4e;">Seishin Creative</a></p>
				<p><a href="https://gramcaster.com" style="color:#4e4e4e;">Gramcaster</a></p>
			</div>
		</div>
    </div>
</footer>
<footer class="footer hidden-xs" style="background:#ffdca8;border-color:#af0e02;border-width:3px;color:#fff;min-height:300px;">
    <div class="container">
        <div class="pull-left col-md-6">
			<img src="<?= Yii::$app->homeUrl ?>images/logo2.png" alt="Logo" style="width:100%;">
		</div>

        <div class="col-md-6" style="color:#000;">
			<div class="col-md-4">
				<h4>Tentang Kami</h4>
				<p><a href="http://fsoft-go.com/" style="color:#4e4e4e;">Software House</a></p>
				<p><a href="#" style="color:#4e4e4e;">Helowot</a></p>
				<p><a href="http://bedawarna.com/" style="color:#4e4e4e;">Beda Warna</a></p>
			</div>
			<div class="col-md-4">
				<h4>Product Kami</h4>
				<p><a href="#" style="color:#4e4e4e;">Smart Mosque Display</a></p>
				<p><a href="#" style="color:#4e4e4e;">eMenu</a></p>
				<p><a href="#" style="color:#4e4e4e;">Flash Store</a></p>
				<p><a href="#" style="color:#4e4e4e;">eSchool</a></p>
				<p><a href="#" style="color:#4e4e4e;">Sistem Akademik Universitas</a></p>
				<p><a href="#" style="color:#4e4e4e;">Medica</a></p>
			</div>
			<div class="col-md-4">
				<h4>Partner</h4>
				<p><a href="https://gamebrott.com/" style="color:#4e4e4e;">Gamebrott</a></p>
				<p><a href="https://startuppekanbaru.org/" style="color:#4e4e4e;">Startup Pekanbaru</a></p>
				<p><a href="#" style="color:#4e4e4e;">Seishin Creative</a></p>
				<p><a href="https://gramcaster.com" style="color:#4e4e4e;">Gramcaster</a></p>
			</div>
		</div>
    </div>
</footer>
<footer class="footer" style="background:#af0e02;color:#fff;">
    <div class="container">
        <p class="pull-left">&copy; Flashsoft 2014-<?= date('Y') ?></p>

        <p class="pull-right hidden-xs">Powered by <a href="http://www.yiiframework.com/" style="color:#fff;">Yii Framework</a> | Development by Flashsoft</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
