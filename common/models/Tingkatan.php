<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tingkatan".
 *
 * @property integer $id
 * @property string $tingkatan
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Matpel[] $matpels
 */
class Tingkatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tingkatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tingkatan'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['tingkatan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tingkatan' => 'Tingkatan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatpels()
    {
        return $this->hasMany(Matpel::className(), ['tingkatan_id' => 'id']);
    }
}
