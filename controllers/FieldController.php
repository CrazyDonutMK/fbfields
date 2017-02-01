<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;

class FieldController extends ActiveController
{
    public $modelClass = 'app\models\Field';

//    public static function allowedDomains()
//    {
//        return [
//            '*',                        // star allows all domains
////            'http://78.140.59.34',
//        ];
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function behaviors()
//    {
//        return array_merge(parent::behaviors(), [
//
//            // For cross-domain AJAX request
//            'corsFilter'  => [
//                'class' => \yii\filters\Cors::className(),
//                'cors'  => [
//                    // restrict access to domains:
//                    'Origin'                           => static::allowedDomains(),
//                    'Access-Control-Request-Method'    => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
//                    'Access-Control-Allow-Credentials' => null,
//                    'Access-Control-Max-Age'           => 84600,                 // Cache (seconds)
//                ],
//            ],
//
//        ]);
//    }
}
