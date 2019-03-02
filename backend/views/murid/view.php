<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Murid */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'nama',
            'no_hp',
            'email:email',
            'password',
            'alamat',
            'jk:ntext',
            'nisn:ntext',
            'kelas:ntext',
            'nama_sekolah:ntext',
            'photo',
        ],
    ]) ?>

</div>
