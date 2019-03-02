<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MasterMatpel */

$this->title = $model->id_master_matpel;
$this->params['breadcrumbs'][] = ['label' => 'Master Matpels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-matpel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_master_matpel], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_master_matpel], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_master_matpel',
            'nama',
        ],
    ]) ?>

</div>
