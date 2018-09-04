<?php

namespace app\models;

use Yii;
use app\models\Genre;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Search form for app\models\Genre
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
    /**
     * Bypass scenarios() implementation in the parent class
     */
    public function scenarios()
    {
        return Model::scenarios();
    }
    /**
     * Creates data provider instance with search query applied
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
