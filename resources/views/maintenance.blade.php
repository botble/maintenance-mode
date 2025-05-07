@extends(BaseHelper::getAdminMasterLayoutTemplate())
@section('content')
    <x-core::card>
        <x-core::card.body>
            {!! Form::open() !!}
                <div class="maintenance-mode-notice">
                    <div>
                        <x-core::icon name="ti ti-shield-lock" size="lg" />
                    </div>
                    <div>
                        <span class="@if ($isDownForMaintenance) text-danger @else text-success @endif">@if ($isDownForMaintenance) {{ trans('plugins/maintenance-mode::maintenance-mode.notice_enable') }} @else {{ trans('plugins/maintenance-mode::maintenance-mode.notice_disable') }} @endif</span>
                    </div>
                </div>

                <x-core::form.text-input
                    name="redirect"
                    :label="trans('plugins/maintenance-mode::maintenance-mode.redirect')"
                    :value="old('redirect')"
                    :placeholder="trans('plugins/maintenance-mode::maintenance-mode.redirect_placeholder')"
                    :helper-text="trans('plugins/maintenance-mode::maintenance-mode.redirect_helper')"
                />

                <x-core::form.text-input
                    type="number"
                    name="retry"
                    :label="trans('plugins/maintenance-mode::maintenance-mode.retry_time_in_seconds')"
                    :value="old('retry')"
                    :placeholder="trans('plugins/maintenance-mode::maintenance-mode.retry_time_placeholder')"
                    min="0"
                    max="9999"
                />

                <div class="mb-3">
                    <input type="hidden" value="0" name="use_secret">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="use_secret" id="use_secret" checked>
                        <label class="form-check-label" for="use_secret">
                            {{ trans('plugins/maintenance-mode::maintenance-mode.secret') }}
                        </label>
                        <div class="form-text">
                            {!! trans('plugins/maintenance-mode::maintenance-mode.secret_helper') !!}
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <x-core::button
                        type="button"
                        id="btn-maintenance"
                        :color="$isDownForMaintenance ? 'info' : 'warning'"
                    >
                        {{ $isDownForMaintenance ? trans('plugins/maintenance-mode::maintenance-mode.disable_maintenance_mode') : trans('plugins/maintenance-mode::maintenance-mode.enable_maintenance_mode') }}
                    </x-core::button>
                </div>
            {!! Form::close() !!}

        </x-core::card.body>
    </x-core::card>

    <x-core::modal
        id="bypassMaintenanceMode"
        :title="trans('plugins/maintenance-mode::maintenance-mode.bypass_maintenance_mode')"
        :close-button="true"
        :centered="true"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
    >
        <div class="mb-3">
            <label for="secret-link" class="form-label">{!! BaseHelper::clean(trans('plugins/maintenance-mode::maintenance-mode.bypass_warning')) !!}.</label>
            <input type="text" class="form-control" id="secret-link" readonly>
        </div>
        <p>{!! BaseHelper::clean(trans('plugins/maintenance-mode::maintenance-mode.click_to_bypass_maintenance_mode')) !!}</p>
    </x-core::modal>

    <style>
        .maintenance-mode-notice {
            text-align: center;
            background: #fff;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 3px;
            color: #28a745;
        }
    </style>
@stop
