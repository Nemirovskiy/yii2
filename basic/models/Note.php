<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "note".
 *
 * @property int $id
 * @property string $text
 * @property int $creator_id
 * @property int $created_at
 *
 * @property Access[] $accesses
 * @property User $creator
 * @mixin \yii\behaviors\TimestampBehavior
 */
class Note extends \yii\db\ActiveRecord
{
    const RELATION_ACCESS_USER = 'creator';

    public function behaviors(){
        return [
            //   \yii\behaviors\TimestampBehavior::class
            TimestampBehavior::class
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['creator_id'], 'required'],
            [['creator_id', 'created_at'], 'integer'],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'creator_id' => 'Creator ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesses()
    {
        return $this->hasMany(Access::className(), ['note_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\NoteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\NoteQuery(get_called_class());
    }
}
