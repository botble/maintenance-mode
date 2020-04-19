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
                success: (res) => {
                    if (!res.error) {
                        Botble.showSuccess(res.message);
                        _self.text(res.data.message);
                        if (!res.data.is_down) {
                            _self.removeClass('btn-warning').addClass('btn-info');
                        } else {
                            _self.addClass('btn-warning').removeClass('btn-info');
                        }

                        if (res.data.is_down) {
                            _self.closest('form').find('.maintenance-mode-notice div span').addClass('text-danger').removeClass('text-success').text(res.data.notice);
                        } else {
                            _self.closest('form').find('.maintenance-mode-notice div span').removeClass('text-danger').addClass('text-success').text(res.data.notice);
                        }
                    } else {
                        Botble.showError(res.message);
                    }
                    _self.removeClass('button-loading');
                },
                error: (res) => {
                    Botble.handleError(res);
                    _self.removeClass('button-loading');
                }
            });
        });
    }
}

$(document).ready(() => {
    new MaintenanceMode().init();
});
