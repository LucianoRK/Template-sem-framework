function desativaBotao(nome) {
    $(nome).addClass('qt-loader qt-loader-mini qt-loader-right');
    $(nome).attr("disabled", true);
}

function ativarBotao(nome) {
    $(nome).removeClass('qt-loader qt-loader-mini qt-loader-right');
    $(nome).attr("disabled", false);
}

function urlAtual() {
    return window.location.href;
}




