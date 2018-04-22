<?php

namespace app\models\query;
use app\models\Note;

/**
 * This is the ActiveQuery class for [[\app\models\Note]].
 *
 * @see \app\models\Note
 */
class NoteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Note[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Note|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param int userId
     * @return mixed
     */
    public function byCreator($userId){
        return Note::find()->where(['creator_id' => $userId]);
    }
}
