function desativaBotao(id) {
    $("#" + id).addClass('qt-loader qt-loader-mini qt-loader-right');
    $("#" + id).attr("disabled", true);
}

function ativarBotao(id) {
    $("#" + id).removeClass('qt-loader qt-loader-mini qt-loader-right');
    $("#" + id).attr("disabled", false);
}

function urlAtual() {
    return window.location.href;
}




