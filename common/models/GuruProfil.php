<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru_profil".
 *
 * @property integer $id_guru
 * @property string $nama
 * @property string $photo_profile
 * @property string $email
 * @property string $no_hp
 * @property string $password
 * @property string $tgl_lahir
 * @property string $jk
 * @property string $provinsi_ktp
 * @property string $kota_ktp
 * @property string $kecamatan_ktp
 * @property string $alamat_ktp
 * @property string $provinsi_domisili
 * @property string $kota_domisili
 * @property string $kecamatan_domisili
 * @property string $alamat_domisili
 * @property string $biodata
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property BahanAjar[] $bahanAjars
 */
class GuruProfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru_profil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'email', 'no_hp', 'password'], 'required'],
            [['tgl_lahir', 'created_at', 'updated_at'], 'safe'],
            [['alamat_ktp', 'alamat_domisili', 'biodata', 'status'], 'string'],
            [['nama'], 'string', 'max' => 50],
            [['photo_profile', 'password'], 'string', 'max' => 255],
            [['email', 'provinsi_ktp', 'kota_ktp', 'kecamatan_ktp', 'provinsi_domisili', 'kota_domisili', 'kecamatan_domisili'], 'string', 'max' => 100],
            [['no_hp', 'jk'], 'string', 'max' => 12],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_guru' => 'Id Guru',
            'nama' => 'Nama',
            'photo_profile' => 'Photo Profile',
            'email' => 'Email',
            'no_hp' => 'No Hp',
            'password' => 'Password',
            'tgl_lahir' => 'Tgl Lahir',
            'jk' => 'Jk',
            'provinsi_ktp' => 'Provinsi Ktp',
            'kota_ktp' => 'Kota Ktp',
            'kecamatan_ktp' => 'Kecamatan Ktp',
            'alamat_ktp' => 'Alamat Ktp',
            'provinsi_domisili' => 'Provinsi Domisili',
            'kota_domisili' => 'Kota Domisili',
            'kecamatan_domisili' => 'Kecamatan Domisili',
            'alamat_domisili' => 'Alamat Domisili',
            'biodata' => 'Biodata',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBahanAjars()
    {
        return $this->hasMany(BahanAjar::className(), ['guru_id' => 'id_guru']);
    }
}
