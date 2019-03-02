<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru".
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
 * @property string $prestasi
 * @property string $pengalaman_kerja
 * @property string $pengalaman_mengajar
 * @property string $riwayat_pendidikan
 * @property string $photo_ijazah
 * @property string $nomor_ktp
 * @property string $photo_ktp
 * @property string $npwp
 * @property string $photo_npwp
 * @property string $nama_bank
 * @property string $norek
 * @property string $nama_pemilik
 * @property string $photo_cv
 * @property string $photo_sertifikat
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property BahanAjar[] $bahanAjars
 */
class Guru extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'email', 'no_hp', 'password'], 'required'],
            [['tgl_lahir', 'created_at', 'updated_at'], 'safe'],
            [['alamat_ktp', 'alamat_domisili', 'biodata', 'prestasi', 'pengalaman_kerja', 'pengalaman_mengajar', 'riwayat_pendidikan', 'status'], 'string'],
            [['nama', 'npwp', 'norek', 'nama_pemilik'], 'string', 'max' => 50],
            [['photo_profile', 'password', 'photo_ijazah', 'photo_ktp', 'photo_npwp', 'photo_cv', 'photo_sertifikat'], 'string', 'max' => 255],
            [['email', 'provinsi_ktp', 'kota_ktp', 'kecamatan_ktp', 'provinsi_domisili', 'kota_domisili', 'kecamatan_domisili'], 'string', 'max' => 100],
            [['no_hp', 'jk'], 'string', 'max' => 12],
            [['nomor_ktp'], 'string', 'max' => 25],
            [['nama_bank'], 'string', 'max' => 20],
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
            'prestasi' => 'Prestasi',
            'pengalaman_kerja' => 'Pengalaman Kerja',
            'pengalaman_mengajar' => 'Pengalaman Mengajar',
            'riwayat_pendidikan' => 'Riwayat Pendidikan',
            'photo_ijazah' => 'Photo Ijazah',
            'nomor_ktp' => 'Nomor Ktp',
            'photo_ktp' => 'Photo Ktp',
            'npwp' => 'Npwp',
            'photo_npwp' => 'Photo Npwp',
            'nama_bank' => 'Nama Bank',
            'norek' => 'Norek',
            'nama_pemilik' => 'Nama Pemilik',
            'photo_cv' => 'Photo Cv',
            'photo_sertifikat' => 'Photo Sertifikat',
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
