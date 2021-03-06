<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pupil;

/**
 * PupilSearch represents the model behind the search form of `app\models\Pupil`.
 */
class PupilSearch extends Pupil
{

    public $group;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pupil_id', 'group_id'], 'integer'],
            [['pupil_name', 'mobile', 'email', 'address', 'birth_date', 'date_updated', 'group'], 'safe'],
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
        $query = Pupil::find();

        $query->joinWith(['group']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->sort->attributes['group'] = [
            'asc' => ['group.group_name' => SORT_ASC],
            'desc' => ['group.group_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pupil_id' => $this->pupil_id,
            'group_id' => $this->group_id,
            'birth_date' => $this->birth_date,
            'date_updated' => $this->date_updated,
        ]);

        $query->andFilterWhere(['like', 'pupil_name', $this->pupil_name])
            ->andFilterWhere(['like', 'group.group_name', $this->group])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
