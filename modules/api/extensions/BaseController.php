<?php

namespace app\modules\api\extensions;

use Yii;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\rest\Controller;
use yii\web\Response;

/**
 * Class BaseController
 *
 * @package app\modules\api\extensions
 * @author hiscaler <hiscaler@gmail.com>
 */
class BaseController extends Controller
{

    /**
     * 是否为调试模式
     *
     * @var boolean
     */
    protected $debug = false;

    /**
     *  数据缓存时间（秒）
     *
     * @var integer
     */
    protected $dbCacheTime = 3600;

    /**
     * @var array
     */
    public $serializer = [
        'class' => '\yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function init()
    {
        parent::init();
        $this->dbCacheTime = isset(Yii::$app->params['api.db.cache.time']) ? (int) Yii::$app->params['api.db.cache.time'] : null;
        $this->debug = strtolower(trim(Yii::$app->getRequest()->get('debug'))) == 'y';
    }

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                    'text/javascript' => Response::FORMAT_JSONP,
                    'application/xml' => Response::FORMAT_XML,
                ],
            ],
            'corsFilter' => [
                'class' => Cors::class,
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 86400, // One day
                ],
            ],
        ];
    }

    protected function send($data)
    {
        return new Response([
            'format' => Response::FORMAT_JSON,
            'data' => $data,
        ]);
    }

}