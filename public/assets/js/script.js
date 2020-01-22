function desativaBotao(nome) {
    $(nome).addClass('qt-loader qt-loader-mini qt-loader-right');
    $(nome).children().hide();
    $(nome).attr("disabled", true);
}

function ativarBotao(nome) {
    $(nome).removeClass('qt-loader qt-loader-mini qt-loader-right');
    $(nome).children().show();
    $(nome).attr("disabled", false);
}

function urlAtual() {
    return "http://localhost/raiz";
}

function select2OpcaoUm() {
    $("#s2_demo1").select2();
}



