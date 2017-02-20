<?php
/**
 * Created by PhpStorm.
 * User: metalwolfmk
 * Date: 14.02.2017
 * Time: 8:06
 */

namespace app\controllers;


Use Yii;
use yii\rest\ActiveController;
use app\models\LoginForm;
use yii\web\UnauthorizedHttpException;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    protected function verbs()
    {
        return [
            'index' => ['POST'],
//            'view' => ['GET', 'HEAD'],
//            'create' => ['POST'],
//            'update' => ['PUT', 'PATCH'],
//            'delete' => ['DELETE'],
        ];
    }

    public function actionIndex(){
        $model = new LoginForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
            return ['access_token' => Yii::$app->user->identity->getAuthKey()];
        } else {
            if($model->validate()){
            return $model;
            } else {

                throw new UnauthorizedHttpException('Access denied.', 1);
            }
        }

    }
}