$(function () {
    $('.money').mask('#.##0,00', {reverse: true});
    $('.money2').mask('#,##0.00', {reverse: true});
    $('._rg_ie').mask('0000000000000');
    $('.cep').mask('MAP00000');
    $('.NIF').mask('000000000');
    $('.cpf').mask('0000000000', {reverse: true});//10 digitos
    $('.cod').mask('00000000', {reverse: true});//8 digitos
    $('.pis').mask('000.00000.00-0', {reverse: true});
    $('.cnpj').mask('000000000', {reverse: true});//9 digitos
    $('.ie').mask('0000000000', {reverse: true});
    $('.en').mask('0000','000','00', {reverse: true});
    $('.phone_with_ddd').mask('+258 00 000 0000');
    $('.uf').mask('AA');
    $('.selectonfocus').mask("00000000", {selectOnFocus: true});

    var MZPhoneMaskBehavior = function (val) {
    var sanitized = val.replace(/\D/g, '');
    var prefix = sanitized.slice(0, 2);

    switch (prefix) {
        case '84':
            return '+258 84 000 0000';
        case '85':
            return '+258 85 000 0000';
        case '87':
            return '+258 87 000 0000';
        case '86':
            return '+258 86 000 0000';
        case '82':
            return '+258 82 000 0000';
        case '83':
            return '+258 83 000 0000';
        default:
            return '+258 84 000 0000'; // Padrão caso não haja correspondência
    }
};

var mzPhoneOptions = {
    onKeyPress: function (val, e, field, options) {
        field.mask(MZPhoneMaskBehavior(val), options); // Corrigido aqui para passar 'val'
    }
};

$('.sp_celphones').mask(MZPhoneMaskBehavior, mzPhoneOptions);

});