<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * LessonSearch represents the model behind the search form of `app\models\Lesson`.
 */
class PupillessonSearch extends Pupillesson
{

    public $pupil;
    public $lesson;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'pupil_id', 'grade'], 'integer'],
            [['lesson', 'pupil'], 'safe'],
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
        $query = Pupillesson::find();

        $query->joinWith([ 'lesson']);//'pupil',

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->sort->attributes['pupil'] = [
            'asc' => ['pupil.pupil_name' => SORT_ASC],
            'desc' => ['pupil.pupil_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['lesson'] = [
            'asc' => ['lesson.lesson_name' => SORT_ASC],
            'desc' => ['lesson.lesson_name' => SORT_DESC],
        ];

        var_dump($params);

        $this->load($params);
//        die();
//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to return any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }

        // grid filtering conditions
//        $query->andFilterWhere([
//            'lesson_id' => $this->lesson_id,
//            'pupil_id' => $this->pupil_id,
//        ]);
//
//        $query->andFilterWhere(['like', 'theme', $this->theme])
//            ->andFilterWhere(['like', 'pupil.pupil_name', $this->pupil])
//            ->andFilterWhere(['like', 'grade', $this->grade])
//            ->andFilterWhere(['like', 'lesson.lesson_name', $this->lesson]);

        return $dataProvider;
    }
}
