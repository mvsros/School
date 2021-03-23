<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplines".
 *
 * @property int $disciplines_id
 * @property string $disciplines_name
 *
 * @property Lesson[] $lessons
 */
class Disciplines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['disciplines_name'], 'required'],
            [['disciplines_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'disciplines_id' => 'Disciplines ID',
            'disciplines_name' => 'Disciplines Name',
        ];
    }

    /**
     * Gets query for [[Lessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lesson::className(), ['discipline_id' => 'disciplines_id']);
    }
}
