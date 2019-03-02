<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MasterMatpel */

$this->title = 'Update Master Matpel: ' . $model->id_master_matpel;
$this->params['breadcrumbs'][] = ['label' => 'Master Matpels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_master_matpel, 'url' => ['view', 'id' => $model->id_master_matpel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-matpel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
