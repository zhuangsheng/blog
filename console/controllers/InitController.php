<?php
/**
 * Created by PhpStorm.
 * User: zhuangsheng
 * Date: 2015/4/15
 * Time: 14:37
 */
namespace console\controllers;

use common\models\User;

class InitController extends \yii\console\Controller
{
    /**
     * create user
     */
    public function actionUser()
    {
        echo "Create init user ...\n";
        $username = $this->prompt('User Name:');
        $email = $this->prompt('Email:');
        $password = $this->prompt('Password:');

        $model = new User();
        $model->username = $username;
        $model->email = $email;
        $model->password = $password;

        if(!$model->save()){
            foreach($model->getErrors() as $error){
                foreach($error as $e){
                    echo $e."\n";
                }
            }
            return 1;
        }
        return 0;
    }
}