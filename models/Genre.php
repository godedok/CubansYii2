<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Genre".
 */
class Genre extends ActiveRecord
{
    /**
     * Return table name
     */
    public static function tableName()
    {
        return '{{Genre}}';
    }
    /**
     * Add rules of validation
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Name'], 'string', 'max' => 45],
            [['Name'], 'unique'],
        ];
    }
    /**
     * Aliases for table values
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Genre Name',
        ];
    }
    /**
     * Link to one-to-many table Cubans
     */
    public function getCubans()
    {
        return $this->hasMany(Cubans::className(), ['IdGenre' => 'id']);
    }

    public static function getAllGenres() {
        return ArrayHelper::map(self::find()->all(), 'id', 'Name');
    }
}
