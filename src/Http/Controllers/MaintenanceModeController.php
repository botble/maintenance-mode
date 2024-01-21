<?php

namespace Botble\MaintenanceMode\Http\Controllers;

use Assets;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\MaintenanceMode\Http\Requests\MaintenanceModeRequest;
use Botble\MaintenanceMode\Supports\MaintenanceMode;
use Illuminate\Routing\Controller;

class MaintenanceModeController extends Controller
{
    public function getIndex()
    {
        page_title()->setTitle(trans('plugins/maintenance-mode::maintenance-mode.maintenance_mode'));

        Assets::addScriptsDirectly(['vendor/core/plugins/maintenance-mode/js/maintenance.js']);

        $isDownForMaintenance = app()->isDownForMaintenance();

        return view('plugins/maintenance-mode::maintenance', compact('isDownForMaintenance'));
    }

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
