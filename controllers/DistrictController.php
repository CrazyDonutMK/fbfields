<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;

class DistrictController extends ActiveController
{
    public $modelClass = 'app\models\District';

    public static function allowedDomains()
    {
        return [
            '*',                        // star allows all domains
//            'http://78.140.59.34',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['GET', 'OPTIONS', 'DELETE' , 'PUT'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }
}
