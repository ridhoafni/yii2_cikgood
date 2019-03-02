<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guru Profils';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-profil-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Guru Profil', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_guru',
            'nama',
            'photo_profile',
            'email:email',
            'no_hp',
            // 'password',
            // 'tgl_lahir',
            // 'jk',
            // 'provinsi_ktp',
            // 'kota_ktp',
            // 'kecamatan_ktp',
            // 'alamat_ktp:ntext',
            // 'provinsi_domisili',
            // 'kota_domisili',
            // 'kecamatan_domisili',
            // 'alamat_domisili:ntext',
            // 'biodata:ntext',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
