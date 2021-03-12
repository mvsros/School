<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pupil_parent".
 *
 * @property int $pupil_id
 * @property int $parent_id
 *
 * @property Pupil $pupil
 * @property Parent $parent
 * @property Pupil $pupil0
 */
class PupilParent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pupil_parent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pupil_id', 'parent_id'], 'required'],
            [['pupil_id', 'parent_id'], 'integer'],
            [['pupil_id', 'parent_id'], 'unique', 'targetAttribute' => ['pupil_id', 'parent_id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parents::className(), 'targetAttribute' => ['parent_id' => 'parent_id']],
            [['pupil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pupil::className(), 'targetAttribute' => ['pupil_id' => 'pupil_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pupil_id' => 'Pupil ID',
            'parent_id' => 'Parent ID',
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
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Parents::className(), ['parent_id' => 'parent_id']);
    }

    /**
     * Gets query for [[Pupil0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupil0()
    {
        return $this->hasOne(Pupil::className(), ['pupil_id' => 'pupil_id']);
    }
}
