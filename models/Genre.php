<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Genre extends ActiveRecord
{
    public static function tableName()
    {
        return '{{Genre}}';
    }
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Name'], 'string', 'max' => 45],
            [['Name'], 'unique'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Genre Name',
        ];
    }
    public function getCubans()
    {
        return $this->hasMany(Cubans::className(), ['IdGenre' => 'id']);
    }
}
