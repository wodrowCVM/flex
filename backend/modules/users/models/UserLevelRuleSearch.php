<?php

namespace backend\modules\users\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\users\models\UserLevelRule;

/**
 * UserLevelRuleSearch represents the model behind the search form about `backend\modules\users\models\UserLevelRule`.
 */
class UserLevelRuleSearch extends UserLevelRule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'begin', 'end'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserLevelRule::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'begin' => $this->begin,
            'end' => $this->end,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
