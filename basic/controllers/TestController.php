<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class TestController extends Controller
{
    public function actionIndex(){
        return $this->render('index',[
            'head'=>'Заголовок',
            'text'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet deleniti dicta, eaque itaque labore libero minima nemo, optio provident ratione rem rerum sint tempora vitae! Est quaerat ratione tempora.',
            'list'=>[
                'Lorem ipsum dolor sit amet.',
                'Expedita natus nemo quas. Qui!',
                'Dolorem illo nesciunt quod reprehenderit.',
                'Distinctio in iste quibusdam totam?',
                'Illum in provident tenetur voluptas!'
            ]
        ]);
    }
}




