<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\base\Model;
/**
 * This is the model class for table "Genre"
 */
class Genre extends ActiveRecord
{
    /**
     * Return table Name
     */
    public static function tableName()
    {
        return '{{Genre}}';
    }
    /**
     * Attribute verification rules
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Name'], 'require'],
            [['Name'], 'string', 'max' => 45],
            [['Name'], 'unique'],
        ];
    }
    /**
     * Returns all found scripts in the validation 
     * rules specified in the method rules()
     */
    public function scenarios()
    {
        return Model::scenarios();
    }
    /**
     * Declare attribute labels
     */
    public function attrbuteLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Genre name'
        ];
    }
    /**
     * declaring table relationships Cubans & Genre
     * many to many
     */
    public function getCubans()
    {
        return $this->hasMany(Cubans::className(), ['IdGenre' => 'id']);
    }
}
