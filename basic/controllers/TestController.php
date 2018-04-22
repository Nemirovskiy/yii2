<?php

namespace app\controllers;

use app\components\TestService;
use app\models\Product;
use app\models\User;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class TestController extends Controller
{
    public function actionIndex(){
//        return $this->render('index',[
//            'head'=>'Заголовок',
//            'text'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet deleniti dicta, eaque itaque labore libero minima nemo, optio provident ratione rem rerum sint tempora vitae! Est quaerat ratione tempora.',
//            'list'=>[
//                'Lorem ipsum dolor sit amet.',
//                'Expedita natus nemo quas. Qui!',
//                'Dolorem illo nesciunt quod reprehenderit.',
//                'Distinctio in iste quibusdam totam?',
//                'Illum in provident tenetur voluptas!'
//            ]
//        ]);

        $result = Product::find()->where(['<','id',5])->all();
        _end($result);
        return $this->renderContent('44');
    }
    public function actionInsert(){
        \Yii::$app->db->createCommand("INSERT INTO user".
              "(username,name,password_hash) VALUES ('first','Первый','77777'),('user','User','sssss')".
            ",('login','Login','lllllll'),('last','Last','rrrrrr')")->execute();

        $user = (new Query())->from('user')->select('id,username')->indexBy('username')->column();

        \Yii::$app->db->createCommand()->batchInsert('note',['text','creator_id'],[
            [
                'Идейные соображения высшего порядка, а также новая модель организационной деятельности.',
                $user['user']
            ],
            [
                'Безусловно, сплоченность команды профессионалов однозначно определяет каждого участника.',
                $user['login']
            ],
            [
                'Сложно сказать, почему интерактивные прототипы своевременно верифицированы. С другой стороны.',
                $user['last']
            ],
            [
                'С другой стороны, дальнейшее развитие различных форм деятельности в значительной степени.',
                $user['first']
            ],
            [
                'Значимость этих проблем настолько очевидна, что сплоченность команды профессионалов однозначно.',
                $user['user']
            ]
        ])->execute();
        return $this->renderContent('44');
    }

    public function actionUser()
    {
        $user = User::findOne(3);
        $user->surname = '....ич';
        $user->save();
        return $this->renderContent('44');
    }

    public function actionSelect(){
        $result['first'] = (new Query())->from('user')->where('id = :id',[':id' => 1])->one();
        $result['all'] = (new Query())->from('user')->where('id > :id',[':id' => 1])->orderBy('name')->all();
        $result['count'] = (new Query())->from('user')->count();
        $result['login'] = (new Query())->from('user')->select('id,username')->indexBy('username')->column();
        /**
         * SELECT note.id note_id, text, user.id creator_id, user.username creator_name
         * FROM `note` INNER JOIN `user` ON creator_id = user.id
         */
        $result['note'] = (new Query())->from('note')->select('note.id note_id, text, user.id creator_id, user.username creator_name')->innerJoin('user','creator_id = user.id')->indexBy('note_id')->all();
        _end($result);
    }
}




