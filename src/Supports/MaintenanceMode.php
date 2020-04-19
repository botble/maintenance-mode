<?php

namespace Botble\MaintenanceMode\Supports;

use Illuminate\Http\Request;

/**
 * Class to wrap Artisan Maintenance mode logic
 */
class MaintenanceMode
{
    /**
     * Bring Application out of Maintenance Mode
     *
     * @return bool
     */
    public function up()
    {
        return unlink(storage_path('framework/down'));
    }

    /**
     * Put Application into Maintenance Mode
     *
     * @param Request $request
     * @return boolean
     */
    public function down($request)
    {
        $props = $request->only(['message', 'retry', 'allow', 'include_current_ip']);

        $retry = data_get($props, 'retry');

        $retrySeconds = is_numeric($retry) && $retry > 0 ? (int)$retry : null;

        $allowedIps = [];

        if (!empty(data_get($props, 'allow'))) {
            $allowedIpList = str_replace(' ', '', data_get($props, 'allow'));
            $allowedIps = explode(',', $allowedIpList);
        }

        if ($request->input('include_current_ip', true)) {
            $allowedIps[] = $request->ip();
        }

        $payload = [
            'time'    => now()->timestamp,
            'message' => data_get($props, 'message'),
            'retry'   => $retrySeconds,
            'allowed' => array_unique($allowedIps),
        ];

        return save_file_data(storage_path('framework/down'), $payload);
    }
}
