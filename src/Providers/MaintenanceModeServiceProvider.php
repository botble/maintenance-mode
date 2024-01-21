<?php

namespace Botble\MaintenanceMode\Providers;

use Botble\Base\Supports\Helper;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class MaintenanceModeServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot(): void
    {
        $this->setNamespace('plugins/maintenance-mode')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web'])
            ->publishAssets();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-core-system-maintenance-mode',
                'priority' => 9990,
                'parent_id' => 'cms-core-platform-administration',
                'name' => 'plugins/maintenance-mode::maintenance-mode.maintenance_mode',
                'icon' => version_compare('7.0.0', get_core_version(), '<=') ? 'ti ti-shield-lock' : 'fa fa-shield',
                'url' => route('system.maintenance.index'),
                'permissions' => [ACL_ROLE_SUPER_USER],
            ]);
        });
    }
}
