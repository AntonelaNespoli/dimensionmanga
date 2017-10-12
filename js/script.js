'use strict';
$(document).ready(function () {
    navigate('http://localhost/dimensionmanga/listaMangas');
});

function navigate(url) {
    $.get(url, function (data) {
        $('.main-content').html(data);
    });
}

function mangaModal(id) {
    $.post('http://localhost/dimensionmanga/descripcionManga', {id_manga: id}, function (data) {
        $('.modal-body').html(data);
        $('#manga-modal').modal('show');
    });
}

