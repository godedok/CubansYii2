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
        return array_merge(parent::attributes(), ['Genre.Name']);
    }
    /**
     * Add rules of validation
     */
    public function rules()
    {
        return [
            [['Id', 'IdGenre', 'IsInGroup'], 'integer'],
            [['FirstName', 'LastName', 'Gender', 'YearOfBirth', 'Genre.Name'], 'safe'],
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

        $query ->joinWith('genre')
            ->joinWith("group")
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'LastName', $this->LastName]);

        $query->andFilterWhere([
            'YearOfBirth' => $this->YearOfBirth,
            'Gender' => $this->Gender,
            'IsInGroup' => $this->IsInGroup,
            'IdGenre' => $this->IdGenre
        ]);

        return $dataProvider;
    }
}
