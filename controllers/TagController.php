<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;

class TagController extends ActiveController
{
    public $modelClass = 'app\models\Tag';

//    public static function allowedDomains()
//    {
//        return [
//             '*',                        // star allows all domains
////            'http://78.140.59.34',
//        ];
//    }
//
//
//    public function behaviors()
//    {
//        return array_merge(parent::behaviors(), [
//
//
//            'corsFilter'  => [
//                'class' => \yii\filters\Cors::className(),
//                'cors'  => [
//
//                    'Origin'                           => static::allowedDomains(),
//                    'Access-Control-Request-Method'    => ['GET', 'OPTIONS', 'DELETE' , 'PUT'],
//                    'Access-Control-Allow-Credentials' => true,
//                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
//                ],
//            ],
//
//        ]);
//    }
}
