<?php

namespace Botble\MaintenanceMode\Supports;

use Illuminate\Http\Request;
use Botble\Base\Supports\Helper;
use Illuminate\Support\Str;

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
        Helper::executeCommand('up');
    }

    /**
     * Put Application into Maintenance Mode
     *
     * @param Request $request
     * @return boolean
     */
    public function down($request)
    {
        $secret = '';
        $params = [];

        if ($request->has('redirect')) {
            $params['--redirect'] = $request->get('redirect');
        }

        if ($request->has('retry')) {
            $params['--retry'] = $request->get('retry');
        }

        $use_secret = $request->get('use_secret');
        if ($use_secret) {
            $secret = (string) Str::uuid();
            $params['--secret'] = $secret;
        }

        Helper::executeCommand('down', $params);

        return $secret;
    }
}
