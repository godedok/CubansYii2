<?php

namespace app\models;

use Yii;
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
            [['Name'], 'safe'],
        ];
    }
    /**
     * Declare attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id',
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
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        if (!( $this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'Name', $this->Name]);

        return $dataProvider;
    }
}
