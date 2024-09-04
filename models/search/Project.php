<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project as ProjectModel;

/**
 * Project represents the model behind the search form of `app\models\Project`.
 */
class Project extends ProjectModel
{
    public $userId;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'userId'], 'integer'],
            [['title', 'date_start', 'date_end'], 'safe'],
            [['price'], 'number'],
            [['dateBegin', 'dateFinish'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ProjectModel::find()->joinWith('user');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'id',
                    'title',
                    'price',
                    'userId' => [
                        'asc' => ['user.full_name' => SORT_ASC],
                        'desc' => ['user.full_name' => SORT_DESC],
                    ],
                    'dateBegin' => [
                        'asc' => ['date_start' => SORT_ASC],
                        'desc' => ['date_start' => SORT_DESC],
                    ],
                    'dateFinish' => [
                        'asc' => ['date_end' => SORT_ASC],
                        'desc' => ['date_end' => SORT_DESC],
                    ],
                ],
            ],
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
            'price' => $this->price,
            'user_id' => $this->userId,
        ]);
        if(!empty($this->dateBegin) && !empty(strtotime($this->dateBegin))) {
            $query->andFilterWhere([
                'date_start' => strtotime($this->dateBegin),
            ]);
        }
        //echo $this->dateFinish;die;
        if(!empty($this->dateFinish) && !empty(strtotime($this->dateFinish))) {
            $query->andFilterWhere([
                'date_end' => strtotime($this->dateFinish),
            ]);
        }
        /*$query->andFilterWhere(['>=', 'date_start',$this->dateBegin ? strtotime($this->dateBegin) : null]);
        $query->andFilterWhere(['<', 'date_start',$this->dateBegin ? strtotime($this->dateBegin) + 3600 * 24 : null]);*/

        $query->andFilterWhere(['like', 'title', $this->title]);
        //echo $query->createCommand()->rawSql;die;

        return $dataProvider;
    }
}
