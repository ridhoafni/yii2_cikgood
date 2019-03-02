<?php

namespace backend\modules\api\controllers;

class PenerimaController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	echo "This is test"; exit;
        return $this->render('index');
    }

}
