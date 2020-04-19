@extends('core/base::layouts.master')
@section('content')
    {!! Form::open() !!}
        <div class="maintenance-mode-notice">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M320 32C196.3 32 96 132.3 96 256c0 123.76 100.3 224 224 224s224-100.24 224-224c0-123.7-100.3-224-224-224zm0 400c-97.05 0-176-78.95-176-176S222.95 80 320 80s176 78.95 176 176-78.95 176-176 176zm0-112c-17.67 0-32 14.33-32 32s14.33 32 32 32 32-14.33 32-32-14.33-32-32-32zm22.32-192h-44.64c-9.47 0-16.86 8.17-15.92 17.59l12.8 128c.82 8.18 7.7 14.41 15.92 14.41h19.04c8.22 0 15.1-6.23 15.92-14.41l12.8-128c.94-9.42-6.45-17.59-15.92-17.59zM48 256c0-59.53 19.55-117.38 55.36-164.51 5.18-6.81 4.48-16.31-2.03-21.86l-12.2-10.41c-6.91-5.9-17.62-5.06-23.15 2.15C23.32 117.02 0 185.5 0 256c0 70.47 23.32 138.96 65.96 194.62 5.53 7.21 16.23 8.05 23.15 2.16l12.19-10.4c6.51-5.55 7.21-15.04 2.04-21.86C67.55 373.37 48 315.53 48 256zM572.73 59.71c-5.58-7.18-16.29-7.95-23.17-2l-12.15 10.51c-6.47 5.6-7.1 15.09-1.88 21.87C572.04 137.47 592 195.81 592 256c0 60.23-19.96 118.57-56.46 165.95-5.22 6.78-4.59 16.27 1.88 21.87l12.15 10.5c6.87 5.95 17.59 5.18 23.17-2C616.21 396.38 640 327.31 640 256c0-71.27-23.79-140.34-67.27-196.29z"/></svg>
            </div>
            <div>
                <span class="@if ($isDownForMaintenance) text-danger @else text-success @endif">@if ($isDownForMaintenance) {{ trans('plugins/maintenance-mode::maintenance-mode.notice_enable') }} @else {{ trans('plugins/maintenance-mode::maintenance-mode.notice_disable') }} @endif</span>
            </div>
        </div>
        <div class="form-group">
            <label for="message" class="control-label">{{ trans('plugins/maintenance-mode::maintenance-mode.message') }}</label>
            <input type="text" name="message" class="form-control" value="{{ old('message') }}" placeholder="{{ trans('plugins/maintenance-mode::maintenance-mode.message_placeholder') }}">
        </div>
        <div class="form-group">
            <label for="retry" class="control-label">{{ trans('plugins/maintenance-mode::maintenance-mode.retry_time') }} <span class="text-sm">({{ trans('plugins/maintenance-mode::maintenance-mode.secs') }})</span></label>
            <input type="number" name="retry" class="form-control" value="{{ old('retry') }}" placeholder="{{ trans('plugins/maintenance-mode::maintenance-mode.retry_time_placeholder') }}"  min="0" max="9999">
        </div>
        <div class="form-group">
            <label for="allow" class="control-label">{{ trans('plugins/maintenance-mode::maintenance-mode.allowed_ip_address') }}</label>
            <textarea name="allow" id="allow" class="form-control" rows="4" placeholder="127.0.0.1, 192.168.0.1">{{ old('allow') }}</textarea>
        </div>
        <div class="form-group">
            <input type="hidden" value="0" name="include_current_ip">
            <label><input type="checkbox" value="1" name="include_current_ip" checked>{{ trans('plugins/maintenance-mode::maintenance-mode.allowed_your_current_ip') }}</label>
            {!! Form::helper(trans('plugins/maintenance-mode::maintenance-mode.allowed_your_current_ip_helper')) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-sm @if ($isDownForMaintenance) btn-info @else btn-warning @endif" id="btn-maintenance">{{ $isDownForMaintenance ? trans('plugins/maintenance-mode::maintenance-mode.disable_maintenance_mode') : trans('plugins/maintenance-mode::maintenance-mode.enable_maintenance_mode') }}</button>
        </div>
    {!! Form::close() !!}

    <style>
        .maintenance-mode-notice {
            text-align : center;
            background: #fff;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 3px;
            color: #28a745;
        }
        .maintenance-mode-notice svg {
            width : 40px;
        }
    </style>
@stop
