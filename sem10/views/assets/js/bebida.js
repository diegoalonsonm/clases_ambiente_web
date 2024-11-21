function listarBebidas() {
    $.ajax({
        url: '../../',
        method: 'GET',
        success: function (res) {
            $('#tablaBebidas').html(res);
        }
    });
}