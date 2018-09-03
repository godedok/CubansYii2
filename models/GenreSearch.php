<?php

namespace app\models;

use Yii;
use app\models\Genre;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "Genre"
 */
class GenreSearch extends Genre
{
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
    public function scenarios()
    {
        return Model::scenarios();
    }
    /**
     * 
     */
    public function search($params)
    {
        $query = Genre::find();

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
