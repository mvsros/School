<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parents".
 *
 * @property int $parent_id
 * @property string $parent_name
 * @property string $mobile
 * @property string $email
 *
 * @property PupilParent[] $pupilParents
 * @property Pupil[] $pupils
 */
class Parents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_name', 'mobile', 'email'], 'required'],
            [['mobile'], 'string'],
            [['parent_name', 'email'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'parent_id' => 'Parent ID',
            'parent_name' => 'Parent Name',
            'mobile' => 'Mobile',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[PupilParents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupilParents()
    {
        return $this->hasMany(PupilParent::className(), ['parent_id' => 'parent_id']);
    }

    /**
     * Gets query for [[Pupils]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupils()
    {
        return $this->hasMany(Pupil::className(), ['pupil_id' => 'pupil_id'])->viaTable('pupil_parent', ['parent_id' => 'parent_id']);
    }
}
