<?php

namespace app\modules\admin\widgets;

use app\models\Module;
use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

/**
 * 全局管理控制面板
 *
 * @author hiscaler <hiscaler@gmail.com>
 */
class GlobalControlPanel extends Widget
{

    public function getItems()
    {
        $items = [];
        $request = Yii::$app->getRequest();
        $controller = Yii::$app->controller;
        $controllerId = $controller->id;
        $actionId = $controller->action->id;
        $moduleId = $controller->module->id;
        $builtinModules = ArrayHelper::getValue(Yii::$app->params, 'modules', []);

        foreach ($builtinModules as $group => $ms) {
            $rawItems = [];
            foreach ($ms as $key => $value) {
                if ((isset($value['forceEmbed']) && $value['forceEmbed'])) {
                    $url = $value['url'];
                    $urlControllerId = null;
                    foreach (explode('/', $url[0]) as $d) {
                        if (!empty($d)) {
                            $urlControllerId = $d;
                            break;
                        }
                    }
                    $url[0] = '/admin/' . $url[0];
                    $activeConditions = isset($value['activeConditions']) ? in_array($controllerId, $value['activeConditions']) : $controllerId == $urlControllerId;
                    $rawItems[] = [
                        'label' => Yii::t('app', $value['label']),
                        'url' => $url,
                        'active' => $activeConditions,
                    ];
                }
            }

            if ($rawItems) {
                $items[$group] = [
                    'label' => Yii::t('app', Yii::t('app', $group)),
                ];
                $items[$group]['items'] = $rawItems;
            }
        }

        // 启用的模块
        $installedModules = Module::getInstalledModules();
        if ($installedModules) {
            foreach ($installedModules as $module) {
                $t = [
                    'label' => $module['name'],
                    'url' => ['/admin/' . $module['alias'] . '/default/index'],
                    'template' => '<a id="control-panel-module-' . $module['alias'] . '" href="{url}">{label}</a>',
                    'active' => $moduleId == $module['alias'],
                ];
                if (!empty($module['menus']) && ($moduleMenus = json_decode($module['menus'], true))) {
                    foreach ($moduleMenus as $key => $menu) {
                        if (isset($menu['url'][0])) {
                            if (isset($menu['active'])) {
                                $active = $moduleId == $module['alias'];
                                if ($active) {
                                    parse_str(trim($menu['active']), $conditions);
                                    foreach ($conditions as $kk => $value) {
                                        switch ($kk) {
                                            case 'controllerId':
                                                if ($controllerId != $value) {
                                                    $active = false;
                                                    break 2;
                                                }
                                                break;

                                            case 'actionId':
                                                if ($actionId != $value) {
                                                    $active = false;
                                                    break 2;
                                                }
                                                break;

                                            default:
                                                if ($value != $request->get($kk)) {
                                                    $active = false;
                                                    break 2;
                                                }
                                                break;
                                        }
                                    }
                                }

                                $moduleMenus[$key]['active'] = $active;
                            }
                        }
                    }
                    $t['items'] = $moduleMenus;
                    $t['url'] = $moduleMenus[0]['url'];
                }
                $items[] = $t;
            }
        }

        return $items;
    }

    public function run()
    {
        return $this->render('ControlPanel', [
            'items' => $this->getItems(),
        ]);
    }

}
