<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cubans;

class CubansSearch extends Cubans
{
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['IdGenre'], 'string'],
            [['FirstName', 'LastName', 'Gender', 'YearOfBirth', 'IsInGroup'], 'safe'],
        ];
    }
    public function scenarios()
    {
        return Model::scenarios();
    }
    public function search($params)
    {
        $query = Cubans::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'YearOfBirth' => $this->YearOfBirth,
            
        ]);

        $query ->joinWith("genre")
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'Gender', $this->Gender])
            ->andFilterWhere(['like', 'IsInGroup', $this->IsInGroup])
            ->andFilterWhere(['like', 'Genre.Name', $this->IdGenre]);

        return $dataProvider;
    }
}
