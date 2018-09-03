<?php

namespace app\models;

use Yii;

class Cubans extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{Cubans}}';
    }
    public function rules()
    {
        return [
            [['FirstName', 'LastName', 'Gender', 'YearOfBirth', 'IdGenre', 'IsInGroup'], 'required'],
            [['YearOfBirth'], 'number', 'max' => 2020, 'min' => 1901],
            [['IdGenre'], 'integer'],
            [['FirstName', 'LastName'], 'string', 'max' => 20],
            [['Gender'], 'string', 'max' => 10],
            [['IsInGroup'], 'string', 'max' => 40],
            [['IdGenre'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['IdGenre' => 'id']],
        ];
    }
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'Gender' => 'Gender',
            'YearOfBirth' => 'Year Of Birth',
            'IdGenre' => 'Genre Name',
            'IsInGroup' => 'Is In Group',
        ];
    }
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'IdGenre']);
    }
}
