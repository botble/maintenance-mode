/******/ (() => { // webpackBootstrap
/*!******************************************************************************!*\
  !*** ./platform/plugins/maintenance-mode/resources/assets/js/maintenance.js ***!
  \******************************************************************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var MaintenanceMode = /*#__PURE__*/function () {
  function MaintenanceMode() {
    _classCallCheck(this, MaintenanceMode);
    this.$button = null;
    this.$form = null;
    this.$noticeSpan = null;
    this.$modal = null;
    this.$secretLinkInput = null;
  }
  return _createClass(MaintenanceMode, [{
    key: "init",
    value: function init() {
      this.setupElements();
      this.setupEventListeners();
    }
  }, {
    key: "setupElements",
    value: function setupElements() {
      this.$button = $('#btn-maintenance');
      this.$form = this.$button.closest('form');
      this.$noticeSpan = this.$form.find('.maintenance-mode-notice div span');
      this.$modal = $('#bypassMaintenanceMode');
      this.$secretLinkInput = $('#secret-link');
    }
  }, {
    key: "setupEventListeners",
    value: function setupEventListeners() {
      var _this = this;
      $(document).on('click', '#btn-maintenance', function (event) {
        event.preventDefault();
        _this.toggleMaintenanceMode();
      });
    }
  }, {
    key: "toggleMaintenanceMode",
    value: function toggleMaintenanceMode() {
      var _this2 = this;
      this.$button.addClass('button-loading');
      $httpClient.make().post(route('system.maintenance.run'), this.$form.serialize()).then(function (_ref) {
        var data = _ref.data;
        Botble.showSuccess(data.message);
        _this2.updateUI(data.data);
      })["catch"](function (error) {
        Botble.handleError(error);
      })["finally"](function () {
        _this2.$button.removeClass('button-loading');
      });
    }
  }, {
    key: "updateUI",
    value: function updateUI(data) {
      this.$button.text(data.message);
      if (!data.is_down) {
        this.updateForLiveMode(data);
      } else {
        this.updateForMaintenanceMode(data);
      }
    }
  }, {
    key: "updateForLiveMode",
    value: function updateForLiveMode(data) {
      this.$button.removeClass('btn-warning').addClass('btn-info');
      this.$noticeSpan.removeClass('text-danger').addClass('text-success').text(data.notice);
    }
  }, {
    key: "updateForMaintenanceMode",
    value: function updateForMaintenanceMode(data) {
      this.$button.addClass('btn-warning').removeClass('btn-info');
      this.$noticeSpan.addClass('text-danger').removeClass('text-success').text(data.notice);
      if (data.url) {
        this.showBypassModal(data.url);
      }
    }
  }, {
    key: "showBypassModal",
    value: function showBypassModal(url) {
      this.$secretLinkInput.val(url);
      $('.maintenance-mode-bypass').attr('href', url);
      $('#copy-secret-link').attr('data-clipboard-text', url);
      this.$modal.modal('show');
    }
  }]);
}();
$(function () {
  new MaintenanceMode().init();
});
/******/ })()
;