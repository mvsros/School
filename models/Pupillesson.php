<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pupil_lesson".
 *
 * @property int $pupil_id
 * @property int $lesson_id
 * @property int $grade
 *
 * @property Pupil $pupil
 * @property Lesson $lesson
 */
class Pupillesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pupil_lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pupil_id', 'lesson_id'], 'required'],
            [['pupil_id', 'lesson_id', 'grade'], 'integer'],
//            [['pupil_id', 'lesson_id'], 'unique', 'targetAttribute' => ['pupil_id', 'lesson_id']],
//            [['pupil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pupil::className(), 'targetAttribute' => ['pupil_id' => 'pupil_id']],
//            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::className(), 'targetAttribute' => ['lesson_id' => 'lesson_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pupil_id' => 'Pupil ID',
            'lesson_id' => 'Lesson ID',
            'grade' => 'Оцінка',
        ];
    }

    /**
     * Gets query for [[Pupil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupil()
    {
        return $this->hasOne(Pupil::className(), ['pupil_id' => 'pupil_id']);
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::className(), ['lesson_id' => 'lesson_id']);
    }
}
