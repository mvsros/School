<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $teacher_id
 * @property string $teacher_name
 * @property string|null $teacher_degree
 * @property string|null $birth_date
 *
 * @property Group[] $groups
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teacher_name'], 'required'],
            [['teacher_degree'], 'string'],
            [['birth_date'], 'safe'],
            [['teacher_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'teacher_id' => 'Teacher ID',
            'teacher_name' => 'ПІБ вчителя',
            'teacher_degree' => 'Teacher Degree',
            'birth_date' => 'Birth Date',
        ];
    }

    /**
     * Gets query for [[Groups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['teacher_id' => 'teacher_id']);
    }
}
