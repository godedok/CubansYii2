<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cubans;

/**
 * Search form for app\models\Cubans
 */

class CubansSearch extends Cubans
{
    /**
     * 
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), ['genre.Name']);
    }
    /**
     * Add rules of validation
     */
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['IdGenre', 'IsInGroup'], 'string'],
            [['FirstName', 'LastName', 'Gender', 'YearOfBirth', 'genre.Name'], 'safe'],
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
        $query = Cubans::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'YearOfBirth' => $this->YearOfBirth,
        ]);

        $query ->joinWith('genre')//["genre" => function ($query) {
              //  $query->from(['genre' => 'Genre']);
            //} ])
            ->joinWith("group")
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'Gender', $this->Gender])
            ->andFilterWhere(['like', 'Group.NameGroup', $this->IsInGroup])
            ->andFilterWhere(['like', 'Genre.Name', $this->getAttribute('genre.Name')]);

        $dataProvider->sort->attributes['Genre.Name'] = [
            'asc' => ['genre.Name' => SORT_ASC],
            'desc' => ['genre.Name' => SORT_DESC],
        ];

        return $dataProvider;
    }
}
