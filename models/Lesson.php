<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $lesson_id
 * @property string $lesson_name
 * @property int $discipline_id
 * @property string $date_time
 * @property int $teacher_id
 * @property string $theme
 *
 * @property Disciplines $discipline
 * @property Teacher $teacher
 * @property PupilLesson[] $pupilLessons
 * @property Pupil[] $pupils
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discipline_id', 'date_time', 'teacher_id'], 'required'],
            [['discipline_id', 'teacher_id'], 'integer'],
            [['date_time'], 'safe'],
            [['theme','lesson_name'], 'string'],
            [['discipline_id'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplines::className(), 'targetAttribute' => ['discipline_id' => 'disciplines_id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'teacher_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lesson_id'     => 'Lesson ID',
            'lesson_name'   => 'Lesson Name',
            'discipline_id' => 'Discipline ID',
            'discipline'    => 'Назва дисц.', //'.disciplines_name',
            'date_time'     => 'Date Time',
            'teacher_id'    => 'Teacher ID',
            'theme'         => 'Theme',
        ];
    }

    /**
     * Gets query for [[Discipline]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscipline()
    {
        return $this->hasOne(Disciplines::className(), ['disciplines_id' => 'discipline_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['teacher_id' => 'teacher_id']);
    }

    /**
     * Gets query for [[PupilLessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupilLessons()
    {
        return $this->hasMany(PupilLesson::className(), ['lesson_id' => 'lesson_id']);
    }

    /**
     * Gets query for [[Pupils]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupils()
    {
        return $this->hasMany(Pupil::className(), ['pupil_id' => 'pupil_id'])->viaTable('pupil_lesson', ['lesson_id' => 'lesson_id']);
    }
}
