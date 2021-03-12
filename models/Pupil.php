<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pupil".
 *
 * @property int $pupil_id
 * @property string $pupil_name
 * @property string|null $mobile
 * @property string|null $email
 * @property int $group_id
 * @property string $address
 * @property string|null $birth_date
 * @property string $date_updated
 *
 * @property Group $group
 * @property PupilParent[] $pupilParents
 * @property Parent[] $parents
 */
class Pupil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pupil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pupil_name', 'group_id', 'address'], 'required'],
            [['group_id'], 'integer'],
            [['birth_date', 'date_updated'], 'safe'],
            [['pupil_name', 'address'], 'string', 'max' => 256],
            [['mobile'], 'string', 'max' => 16],
            [['email'], 'string', 'max' => 128],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'group_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pupil_id' => 'Pupil ID',
            'pupil_name' => 'Pupil Name',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'group_id' => 'Group ID',
            'group' => 'Клас',
            'address' => 'Address',
            'birth_date' => 'Birth Date',
            'date_updated' => 'Date Updated',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['group_id' => 'group_id']);
    }

    /**
     * Gets query for [[PupilParents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPupilParents()
    {
        return $this->hasMany(PupilParent::className(), ['pupil_id' => 'pupil_id']);
    }

    /**
     * Gets query for [[Parents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(Parent::className(), ['parent_id' => 'parent_id'])->viaTable('pupil_parent', ['pupil_id' => 'pupil_id']);
    }
}
