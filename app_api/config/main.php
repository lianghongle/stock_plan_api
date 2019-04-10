<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'defaultRoute'=>'base/index', //默认访问的控制器
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',

            //api 关闭Csrf验证
            'enableCsrfValidation' => false,
        ],
        'response' => [
            'class'         => 'yii\web\Response',
            'format' => \yii\web\Response::FORMAT_JSON,
            'on beforeSend' => function ($event) {

                /*var_dump(
                    Yii::$app->module->id,
                    Yii::$app->controller->id,
                    Yii::$app->controller->action->id
                );
                die;*/
                //调试模式，不用 json 返回。todo 感觉判断不对
                if(Yii::$app->controller->id !== 'default'){

                    $response = $event->sender;

                    if($response->getStatusCode() != 200){
                        if(!YII_DEBUG){
                            $response->data = [
                                'code'    => $response->getStatusCode(),
                                'data'    => '',
                                'message' => $response->statusText
                            ];
                            $response->format = yii\web\Response::FORMAT_JSON;
                        }
                    }else{
                        $response->data = [
                            'code'    => $response->getStatusCode(),
                            'data'    => $response->data,
                            'message' => $response->statusText
                        ];
                        $response->format = yii\web\Response::FORMAT_JSON;
                    }
                }
            },
            'on afterSend' => function ($event) {

                //{{ 请求、相应日志
                //          todo 请求需要记录的参数
//                $request = Yii::$app->request->getParams();
                $response = Yii::$app->response->data;

                $data = [
                    'request' => [],
                    //                    'response' => json_decode($response, true),
                    'response' => $response,
                ];

//                $log = PHP_EOL . json_encode($data);
                $log = $data;

                Yii::info($log,'user');
                //}}
            }
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-backend',
                'httpOnly' => true
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'base/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
