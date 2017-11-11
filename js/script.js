'use strict';
$(document).ready(function () {
    navigate('http://localhost/dimensionmanga/listaMangas');
});

function navigate(url) {
    $.get(url, function (data) {
        $('.main-content').html(data);
    });
}

function navigatePost(url, data) {
    $.post(url, data, function (res) {
        $('.main-content').html(res);
    });
}

function mangaModal(id) {
    $.post('http://localhost/dimensionmanga/descripcionManga', {id_manga: id}, function (data) {
        $('.modal-body').html(data);
        $('#manga-modal').modal('show');
    });
}

function login() {

    var mail = $('form.login input[name=mail]').val();
    var clave = $('form.login input[name=clave]').val();

    var request = $.post('http://localhost/dimensionmanga/verificarUsuario', {
        mail: mail,
        clave: clave
    }, function (res) {
        res = JSON.parse(res);
        if (res.url) {
            window.location = res.url;
        } else if (res.error) {
            $(".login").append($('<div class="alert alert-danger" role="alert"></div>').html(res.error));
        }
    });
    request.fail(function(err){
        console.error(err);
    });
}

function deleteManga(id_manga){

    $.ajax({
        url:'http://localhost/dimensionmanga/eliminarManga/' +id_manga,
        type: "DELETE",
        success:function(res){
            $('#'+id_manga).remove();
            console.log(JSON.parse(res));
            res = JSON.parse(res);
            if (res.message) {
                $("#mensaje").append($('<div class="alert alert-success " role="alert"></div>').html(res.message));
            } else if (res.error) {
                $("#mensaje").append($('<div class="alert alert-danger" role="alert"></div>').html(res.error));
            }
        },
        error:function(err) {
            console.error(err);
         }
    })
}

function grabarManga(form, event) {

        event.preventDefault();
    
        var form_data = new FormData(form);

        $.ajax({
            url:'http://localhost/dimensionmanga/guardarManga',
            contentType: false,
            processData: false,
            data: form_data,
            type: "POST",
            success:  function (res) {
                console.log(JSON.parse(res));
                res = JSON.parse(res);
                if (res.message) {
                    $(".formManga").append($('<div class="alert alert-success " role="alert"></div>').html(res.message));
                } else if (res.error) {
                    $(".formManga").append($('<div class="alert alert-danger" role="alert"></div>').html(res.error));
                }
            },
            error:function(err){
                console.error(err);
            }
        });
    }
/*
        var nombre = $('form.formManga input[name=nombre]').val();
        var autor = $('form.formManga input[name=autor]').val();
        var imagen = $('form.formManga input[name=imagen]').val();
        var descripcion = $('form.formManga input[name=descripcion]').val();
        var categoria = $('form.formManga input[name=categoria]').val();
        console.log(nombre, autor, imagen, descripcion, categoria);
            var request = $.post('http://localhost/dimensionmanga/guardarManga', {
                nombre: nombre,
                autor: autor,
                imagen: imagen,
                descripcion: descripcion,
                categoria: categoria
            }, function (res) {
                console.log(JSON.parse(res));
                res = JSON.parse(res);

                if (res.message) {
                    $(".formManga").append($('<div class="alert alert-success " role="alert"></div>').html(res.message));
                } else if (res.error) {
                    $(".formManga").append($('<div class="alert alert-danger" role="alert"></div>').html(res.error));
                }
            });
        
    request.fail(function(err){
        console.error(err);
    });*/



function guardarCategoria() {
    
        var categoria = $('form.formCategoria input[name=nombre]').val();

        var request = $.post('http://localhost/dimensionmanga/guardarCategoria', {
            nombre: nombre,
        }, function (res) {
            res = JSON.parse(res);
            if (res.message) {
                $(".formManga").append($('<div class="alert alert-success " role="alert"></div>').html(res.message));
            } else if (res.error) {
                $(".formManga").append($('<div class="alert alert-danger" role="alert"></div>').html(res.error));
            }
        });
        request.fail(function(err){
            console.error(err);
        });
    }
