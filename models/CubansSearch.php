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
     * Add rules of validation
     */
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['IdGenre', 'IsInGroup'], 'string'],
            [['FirstName', 'LastName', 'Gender', 'YearOfBirth'], 'safe'],
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

        $query ->joinWith("genre")
            ->joinWith("group")
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'Gender', $this->Gender])
            ->andFilterWhere(['like', 'Group.NameGroup', $this->IsInGroup])
            ->andFilterWhere(['like', 'Genre.Name', $this->IdGenre]);

        return $dataProvider;
    }
}
