class MaintenanceMode {
    constructor() {
        this.$button = null;
        this.$form = null;
        this.$noticeSpan = null;
        this.$modal = null;
        this.$secretLinkInput = null;
    }

    init() {
        this.setupElements();
        this.setupEventListeners();
    }

    setupElements() {
        this.$button = $('#btn-maintenance');
        this.$form = this.$button.closest('form');
        this.$noticeSpan = this.$form.find('.maintenance-mode-notice div span');
        this.$modal = $('#bypassMaintenanceMode');
        this.$secretLinkInput = $('#secret-link');
    }

    setupEventListeners() {
        $(document).on('click', '#btn-maintenance', (event) => {
            event.preventDefault();
            this.toggleMaintenanceMode();
        });
    }

    toggleMaintenanceMode() {
        this.$button.addClass('button-loading');

        $httpClient
            .make()
            .post(route('system.maintenance.run'), this.$form.serialize())
            .then(({ data }) => {
                Botble.showSuccess(data.message);
                this.updateUI(data.data);

            })
            .catch(error => {
                Botble.handleError(error);
            })
            .finally(() => {
                this.$button.removeClass('button-loading');
            });
    }

    updateUI(data) {
        this.$button.text(data.message);
        if (!data.is_down) {
            this.updateForLiveMode(data);
        } else {
            this.updateForMaintenanceMode(data);
        }
    }

    updateForLiveMode(data) {
        this.$button.removeClass('btn-warning').addClass('btn-info');
        this.$noticeSpan.removeClass('text-danger').addClass('text-success').text(data.notice);
    }

    updateForMaintenanceMode(data) {
        this.$button.addClass('btn-warning').removeClass('btn-info');
        this.$noticeSpan.addClass('text-danger').removeClass('text-success').text(data.notice);

        if (data.url) {
            this.showBypassModal(data.url);
        }
    }

    showBypassModal(url) {
        this.$secretLinkInput.val(url);

        $('.maintenance-mode-bypass').attr('href', url)

        $('#copy-secret-link').attr('data-clipboard-text', url);

        this.$modal.modal('show');
    }
}

$(() => {
    new MaintenanceMode().init();
});
