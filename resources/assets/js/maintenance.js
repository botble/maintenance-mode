class MaintenanceMode {
    init() {
        $(document).on('click', '#btn-maintenance', (event) => {
            event.preventDefault();
            let _self = $(event.currentTarget);
            _self.addClass('button-loading');

            $.ajax({
                type: 'POST',
                url: route('system.maintenance.run'),
                cache: false,
                data: _self.closest('form').serialize(),
                success: res => {
                    if (!res.error) {
                        Botble.showSuccess(res.message);
                        const data = res.data;
                        _self.text(data.message);
                        if (!data.is_down) {
                            _self.removeClass('btn-warning').addClass('btn-info');
                            _self.closest('form').find('.maintenance-mode-notice div span').removeClass('text-danger').addClass('text-success').text(data.notice);
                        } else {
                            _self.addClass('btn-warning').removeClass('btn-info');
                            _self.closest('form').find('.maintenance-mode-notice div span').addClass('text-danger').removeClass('text-success').text(data.notice);
                            if (data.url) {
                                $('#bypassMaintenanceMode .maintenance-mode-bypass').attr('href', data.url);
                                $('#bypassMaintenanceMode #secret-link').val(data.url);
                                $('#bypassMaintenanceMode').modal('show');
                            }
                        }
                    } else {
                        Botble.showError(res.message);
                    }
                },
                error: res => {
                    Botble.handleError(res);
                },
                complete: () => {
                    _self.removeClass('button-loading');
                }
            });
        });
    }
}

$(document).ready(() => {
    new MaintenanceMode().init();
});
