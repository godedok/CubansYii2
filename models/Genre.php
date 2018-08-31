<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\base\Model;
use yii\data\ActiveDataProvider;

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
    /**
     * 
     */
    public function search($params)
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!( $this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name]);

        return $dataProvider;
    }
}
