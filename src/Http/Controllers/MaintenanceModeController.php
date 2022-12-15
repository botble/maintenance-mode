<?php

namespace Botble\MaintenanceMode\Http\Controllers;

use Assets;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\MaintenanceMode\Supports\MaintenanceMode;
use Botble\MaintenanceMode\Http\Requests\MaintenanceModeRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MaintenanceModeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        page_title()->setTitle(trans('plugins/maintenance-mode::maintenance-mode.maintenance_mode'));

        Assets::addScriptsDirectly(['vendor/core/plugins/maintenance-mode/js/maintenance.js']);

        $isDownForMaintenance = app()->isDownForMaintenance();

        return view('plugins/maintenance-mode::maintenance', compact('isDownForMaintenance'));
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @param MaintenanceMode $maintenanceMode
     * @return BaseHttpResponse
     */
    public function postRun(
        MaintenanceModeRequest $request,
        BaseHttpResponse $response,
        MaintenanceMode $maintenanceMode
    ) {
        if (app()->isDownForMaintenance()) {
            $maintenanceMode->up();

            return $response
                ->setMessage(trans('plugins/maintenance-mode::maintenance-mode.application_live'))
                ->setData([
                    'is_down' => false,
                    'notice' => trans('plugins/maintenance-mode::maintenance-mode.notice_disable'),
                    'message' => trans('plugins/maintenance-mode::maintenance-mode.enable_maintenance_mode'),
                ]);
        }

        $secret = $maintenanceMode->down($request);

        return $response
            ->setMessage(trans('plugins/maintenance-mode::maintenance-mode.application_down'))
            ->setData([
                'is_down' => true,
                'notice' => trans('plugins/maintenance-mode::maintenance-mode.notice_enable'),
                'message' => trans('plugins/maintenance-mode::maintenance-mode.disable_maintenance_mode'),
                'url' => $secret ? url($secret) : null,
            ]);
    }
}
