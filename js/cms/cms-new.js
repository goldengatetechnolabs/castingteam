$(document).ready(function() {
    check_input_fields();
    $("body")
        .on("focus", "[data-input] input", function() {
            let _this = $(this),
                _form_input = _this.parents('[data-input]');
            _form_input.addClass('is-focus');
            if (_form_input.parents('.cms-input-phone').length > 0)
                _form_input.parents('.cms-input-phone').removeClass('is-disabled');
        })
        .on("blur", "[data-input] input", function() {
            let _this = $(this),
                _form_input = _this.parents('[data-input]');
            _form_input.removeClass('is-focus');
            if(_this.val() != '') {
                _form_input.addClass('is-value');
                if (_form_input.parents('.cms-input-phone').length > 0)
                    _form_input.parents('.cms-input-phone').removeClass('is-disabled');
            }
            else {
                _form_input.removeClass('is-value');
                if (_form_input.parents('.cms-input-phone').length > 0) {}
                    // _form_input.parents('.cms-input-phone').addClass('is-disabled');
            }
        })
        .on("focus", "[data-textarea] textarea", function() {
            let _this = $(this),
                _form_input = _this.parents('[data-textarea]');
            _form_input.addClass('is-focus');
        })
        .on("blur", "[data-textarea] textarea", function() {
            let _this = $(this),
                _form_input = _this.parents('[data-textarea]');
            _form_input.removeClass('is-focus');
            if(_this.val() != '') _form_input.addClass('is-value');
            else _form_input.removeClass('is-value');
        })
        .on("click", "[data-select] .cms-field, [data-select] .cms-select-arrow", function() {
            let _this = $(this),
                _form_select = _this.parents('[data-select]');
            
            if (_form_select.parents('.cms-input-phone').length > 0 && _form_select.parents('.cms-input-phone').hasClass('is-disabled')) {
                return false;
            }
            else {
                if(_form_select.hasClass('is-open')) _form_select.removeClass('is-open');
                else _form_select.addClass('is-open');
                if(_form_select.find('[data-select-value]').val() != '') _form_select.addClass('is-value');
                else _form_select.removeClass('is-value');
            }
        })
        .on("click", ".cms-select-optional", function() {
            let _this = $(this),
                _this_value = _this.text(),
                _form_select = _this.parents('[data-select]');
            _form_select.find('[data-select-value]').val(_this_value);
            _form_select.find('[data-select-value]').trigger("change");
            if(_form_select.hasClass('is-open')) _form_select.removeClass('is-open');
            else _form_select.addClass('is-open');
            if(_form_select.find('[data-select-value]').val() != '') _form_select.addClass('is-value');
            else _form_select.removeClass('is-value');
        })
        .mouseup(function (e) {
            let _form_select = $("[data-select]");
            if (!_form_select.is(e.target) && _form_select.has(e.target).length === 0) {
                _form_select.removeClass('is-open');
            }
            var _modal_content = $(".modal-content");
            if (!_modal_content.is(e.target) && _modal_content.has(e.target).length === 0) {
                _modal_content.parents('.cms-modal').removeClass('is-open');
            }
            var _modal = $(".cms-modal-container");
            if (!_modal.is(e.target) && _modal.has(e.target).length === 0) {
                _modal.parents('.cms-modal').removeClass('is-open');
            }
            var _modal_close = $(".close");
            
                _modal_close.parents('.cms-modal').removeClass('is-open');
            
        })
        .on("click", "[data-modal]", function() {
            let _this = $(this),
                _modal = _this.data('modal');
            $('#' + _modal).addClass('is-open');
        })
        .on("click", ".cms-grid-row .cms-grid-head", function() {
            let _this = $(this).parents('.cms-grid-row');
            _this.hasClass('is-open') ? _this.removeClass('is-open') : _this.addClass('is-open');
        })
        .on("click", ".cms-grid-more-close", function() {
            let _this = $(this);
            _this.parents('.cms-grid-row').removeClass('is-open');
        });
});
function check_input_fields() {
    let _inputs = $('[data-input]');
    let _textarea = $('[data-textarea]');
    let _selects = $("[data-select]");
    _inputs.each(function(index, element) {
        if( $(element).find('input.cms-field-value').val() != '') {
            $(element).addClass('is-value');
            if ($(element).parents('.cms-input-phone').length > 0)
                $(element).parents('.cms-input-phone').removeClass('is-disabled');
        }
        else {
            $(element).removeClass('is-value');
            if ($(element).parents('.cms-input-phone').length > 0) {}
                // $(element).parents('.cms-input-phone').addClass('is-disabled');
        }
    });
    _textarea.each(function(index, element) {
        if( $(element).find('textarea.cms-field-value').val() != '') $(element).addClass('is-value');
        else $(element).removeClass('is-value');
    });
    _selects.each(function(index, element) {
        if( $(element).find('input.cms-field-value').val() != '') $(element).addClass('is-value');
        else $(element).removeClass('is-value');
    });
}