<?php
/**
 * Created by PhpStorm.
 * User: Николай
 */

namespace app\components;
use yii\base\Component;

class TestService extends Component
{
    public $name = 'name test component';
    public function showName(){
        return $this->name;
    }

}