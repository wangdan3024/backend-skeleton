<?php

namespace app\modules\admin\modules\wxpay\controllers;

use app\modules\admin\extensions\BaseController;
use yii\filters\AccessControl;

/**
 * Default controller for the `wxpay` module
 */
class DefaultController extends BaseController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->redirect(['orders/index']);
    }
}
