<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Tingkatan */

$this->title = 'Create Tingkatan';
$this->params['breadcrumbs'][] = ['label' => 'Tingkatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tingkatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
