<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lesson;

/**
 * LessonSearch represents the model behind the search form of `app\models\Lesson`.
 */
class LessonSearch extends Lesson
{

    public $discipline;
    public $teacher;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'discipline_id', 'teacher_id'], 'integer'],
            [['date_time', 'theme', 'discipline', 'teacher'], 'safe'],
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
        $query = Lesson::find();

        $query->joinWith(['discipline', 'teacher']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->sort->attributes['discipline'] = [
            'asc' => ['disciplines.disciplines_name' => SORT_ASC],
            'desc' => ['disciplines.disciplines_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['teacher'] = [
            'asc' => ['teacher.teacher_name' => SORT_ASC],
            'desc' => ['teacher.teacher_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'lesson_id' => $this->lesson_id,
            'discipline_id' => $this->discipline_id,
            'date_time' => $this->date_time,
            'teacher_id' => $this->teacher_id,
        ]);

        $query->andFilterWhere(['like', 'theme', $this->theme])
            ->andFilterWhere(['like', 'disciplines.disciplines_name', $this->discipline])
            ->andFilterWhere(['like', 'teacher.teacher_name', $this->teacher]);

        return $dataProvider;
    }
}
