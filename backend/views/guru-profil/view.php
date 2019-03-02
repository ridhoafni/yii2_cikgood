<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GuruProfil */

$this->title = $model->id_guru;
$this->params['breadcrumbs'][] = ['label' => 'Guru Profils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-profil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_guru], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_guru], [
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
            'id_guru',
            'nama',
            'photo_profile',
            'email:email',
            'no_hp',
            'password',
            'tgl_lahir',
            'jk',
            'provinsi_ktp',
            'kota_ktp',
            'kecamatan_ktp',
            'alamat_ktp:ntext',
            'provinsi_domisili',
            'kota_domisili',
            'kecamatan_domisili',
            'alamat_domisili:ntext',
            'biodata:ntext',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
