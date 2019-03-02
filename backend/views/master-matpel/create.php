<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MasterMatpel */

$this->title = 'Create Master Matpel';
$this->params['breadcrumbs'][] = ['label' => 'Master Matpels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-matpel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
