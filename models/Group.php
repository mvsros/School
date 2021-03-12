<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $group_id
 * @property string $group_name
 * @property int|null $teacher_id
 *
 * @property Teacher $teacher
 * @property Pupil[] $pupils
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_name'], 'required'],
            [['teacher_id'], 'integer'],
            [['group_name'], 'string', 'max' => 32],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'teacher_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'group_name' => 'Group Name',
            'teacher_id' => 'Teacher ID',
        ];
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
     * Gets query for [[Pupils]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupils()
    {
        return $this->hasMany(Pupil::className(), ['group_id' => 'group_id']);
    }
}
