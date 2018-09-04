<?php

namespace app\models;

use Yii;
use app\models\Group;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Search form for app\models\Group
 */
class GroupSearch extends Group
{
    /**
     * Attribute verification rules
     */
    public function rules()
    {
        return [
            [['idGroup'], 'integer'],
            [['NameGroup'], 'safe'],
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
        $query = Group::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        if (!( $this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'NameGroup', $this->NameGroup]);

        return $dataProvider;
    }
}
