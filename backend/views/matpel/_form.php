<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Matpel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matpel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'guru_id')->textInput() ?>

    <?= $form->field($model, 'matpel_id')->textInput() ?>

    <?= $form->field($model, 'tarif')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
