<?php

namespace Botble\MaintenanceMode\Supports;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class to wrap Artisan Maintenance mode logic
 */
class MaintenanceMode
{
    public function up(): bool
    {
        if (is_file(storage_path('framework/down'))) {
            unlink(storage_path('framework/down'));

            if (is_file(storage_path('framework/maintenance.php'))) {
                unlink(storage_path('framework/maintenance.php'));
            }

            return true;
        }

        return false;
    }

    public function down(Request $request): bool|string
    {
        $secret = '';
        $params = [
            'status' => 503,
            'template' => null,
        ];

        if ($request->has('redirect')) {
            $params['redirect'] = $request->input('redirect');
        }

        if ($request->has('retry')) {
            $params['retry'] = $request->input('retry');
        }

        $useSecret = $request->input('use_secret');
        if ($useSecret) {
            $secret = (string)Str::uuid();
            $params['secret'] = $secret;
        }

        if (! is_file(storage_path('framework/down'))) {
            file_put_contents(
                storage_path('framework/down'),
                json_encode($params, JSON_PRETTY_PRINT)
            );

            file_put_contents(
                storage_path('framework/maintenance.php'),
                file_get_contents(base_path('vendor/laravel/framework/src/Illuminate/Foundation/Console/stubs/maintenance-mode.stub'))
            );
        }

        return $secret;
    }
}
