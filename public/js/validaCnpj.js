//verifica o algoritmo do cpnj
verifica = function (c) {
    var b = [6,5,4,3,2,9,8,7,6,5,4,3,2];
    if(/0{14}/.test(c))
        return false;
    if((c = c.replace(/[^\d]/g,"")).length != 14)
        return false;
    for (var i = 0, n = 0; i < 12; n += c[i] * b[++i]);
    if(c[12] != (((n %= 11) < 2) ? 0 : 11 - n))
        return false;
    for (var i = 0, n = 0; i <= 12; n += c[i] * b[i++]);
    if(c[13] != (((n %= 11) < 2) ? 0 : 11 - n))
        return false;
    return true;
};
valida = function (cnpj) {
    //valida se o cnpj é valido ou não e atribui no span
    document.getElementById('resultado').innerHTML = verifica(cnpj.value)? '<span style="color:green"> CNPJ válido</span>' : '<span style="color:red"> CNPJ inválido</span>';
    //desabilita o botão se cadastrar se o cnpj for invalido
    verifica(cnpj.value)? $('#button').prop('disabled', false) : $('#button').prop('disabled', true);
    //só verifica se o cnpj for vazio
    if(cnpj.value=='') document.getElementById('resultado').innerHTML = '';
}