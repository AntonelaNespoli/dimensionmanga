'use strict';
$(document).ready(function () {
    let tplComments;
    $.ajax({ url: 'js/templates/comentarios.mst'}).done( template => tplComments = template);
    navigate('http://localhost/dimensionmanga/listaMangas');
});

//Funciones Basicas

function navigate(url) {
    $.get(url, function (data) {
        $('.main-content').html(data);
        $('.cboxSuperUser').change(function () {
            let id_user = this.getAttribute('data-id');
            if (this.checked) {
                $.ajax({
                    url: 'http://localhost/dimensionmanga/permisoSuperUser/'+ id_user + '/1',
                    type: "POST",
                    success: function (res) {
                        console.log(JSON.parse(res));
                        res = JSON.parse(res);
                        if (res.message) {
                            $("#mensaje").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
                        } else if (res.error) {
                            $("#mensaje").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
                        }
                    },
                    error: function (err) {
                        console.error(err);
                    }
                })
            }else{
                $.ajax({
                    url: 'http://localhost/dimensionmanga/permisoSuperUser/'+ id_user + '/0',
                    type: "POST",
                    success: function (res) {
                        console.log(JSON.parse(res));
                        res = JSON.parse(res);
                        if (res.message) {
                            $("#mensaje").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
                        } else if (res.error) {
                            $("#mensaje").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
                        }
                    },
                    error: function (err) {
                        console.error(err);
                    }
                })
            }
        });
    });
}

function navigatePost(url, data) {
    $.post(url, data, function (res) {
        $('.main-content').html(res);
    });
}

function mangaModal(id) {
    $.post('http://localhost/dimensionmanga/descripcionManga', { id_manga: id }, function (data) {
        $('.modal-body').html(data);
        $('.modal-body .carousel').carousel();
        $('#manga-modal').modal('show');
    });
}

//Funciones Login, Registro

function login(form, event) {
    event.preventDefault();

    let form_data = new FormData(form);

    $.ajax({
        url: 'http://localhost/dimensionmanga/verificarUsuario',
        contentType: false,
        processData: false,
        data: form_data,
        type: "POST",
        success: function (res) {
            console.log(JSON.parse(res));
            res = JSON.parse(res);
            if (res.url) {
                window.location = res.url;
            } else if (res.error) {
                $("#mensajeLogin").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
            }
        },
        error: function (err) {
            console.error(err);
        }
    });
}

function crearUser(form, event) {
    event.preventDefault();

    let form_data = new FormData(form);
    console.log(form, form_data);
    $.ajax({
        url: 'http://localhost/dimensionmanga/crearUsuario',
        contentType: false,
        processData: false,
        data: form_data,
        type: "POST",
        success: function (res) {
            console.log(JSON.parse(res));
            res = JSON.parse(res);
            if (res.url) {
                window.location = res.url;
            } else if (res.error) {
                $("#mensajeRegistro").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
            }
        },
        error: function (err) {
            console.error(err);
        }
    });
}

function deleteUser(id_usuario) {

    $.ajax({
        url: 'http://localhost/dimensionmanga/eliminarUsuario/' + id_usuario,
        type: "DELETE",
        success: function (res) {
            $('#' + id_usuario).remove();
            console.log(JSON.parse(res));
            res = JSON.parse(res);
            if (res.message) {
                $("#mensaje").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
            } else if (res.error) {
                $("#mensaje").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
            }
        },
        error: function (err) {
            console.error(err);
        }
    });
}

//Funciones Items

function deleteManga(id_manga) {

    $.ajax({
        url: 'http://localhost/dimensionmanga/eliminarManga/' + id_manga,
        type: "DELETE",
        success: function (res) {
            $('#' + id_manga).remove();
            console.log(JSON.parse(res));
            res = JSON.parse(res);
            if (res.message) {
                $("#mensaje").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
            } else if (res.error) {
                $("#mensaje").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
            }
        },
        error: function (err) {
            console.error(err);
        }
    })
}

function grabarManga(form, event) {
    event.preventDefault();

    var form_data = new FormData(form);

    $.ajax({
        url: 'http://localhost/dimensionmanga/guardarManga',
        contentType: false,
        processData: false,
        data: form_data,
        type: "POST",
        success: function (res) {
            console.log(JSON.parse(res));
            res = JSON.parse(res);
            if (res.message) {
                $("#mensajeForm").html($('<div class="alert alert-success " role="alert"></div>').append(res.message));
            } else if (res.error) {
                $("#mensajeForm").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
            }
        },
        error: function (err) {
            console.error(err);
        }
    });
}

function editManga(id_manga) {
    navigate('http://localhost/dimensionmanga/editarManga/' + id_manga);
}

function deleteImagen(id_imagen) {

    $.ajax({
        url: 'http://localhost/dimensionmanga/eliminarImagen/' + id_imagen,
        type: "DELETE",
        success: function (res) {
            $('#' + id_imagen).remove();
            console.log(JSON.parse(res));
            res = JSON.parse(res);
            if (res.message) {
                $("#mensajeForm").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
            } else if (res.error) {
                $("#mensajeForm").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
            }
        },
        error: function (err) {
            console.error(err);
        }
    })
}

//Funciones Categorias

function guardarCategoria(form, event) {
    event.preventDefault();

    let form_data = new FormData(form);

    $.ajax({
        url: 'http://localhost/dimensionmanga/guardarCategoria',
        contentType: false,
        processData: false,
        data: form_data,
        type: "POST",
        success: function (res) {
            console.log(JSON.parse(res));
            res = JSON.parse(res);
            if (res.message) {
                $("#mensajeCategoria").html($('<div class="alert alert-success " role="alert"></div>').append(res.message));
            } else if (res.error) {
                $("#mensajeCategoria").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
            }
        },
        error: function (err) {
            console.error(err);
        }
    });
}

function deleteCategoria(id_categoria) {

    $.ajax({
        url: 'http://localhost/dimensionmanga/eliminarCategoria/' + id_categoria,
        type: "DELETE",
        success: function (res) {
            $('#' + id_categoria).remove();
            console.log(JSON.parse(res));
            res = JSON.parse(res);
            if (res.message) {
                navigate('http://localhost/dimensionmanga/listaCategorias');
                $("#mensaje").html($('<div class="alert alert-success" role="alert"></div>').append(res.message));
            } else if (res.error) {
                $("#mensaje").html($('<div class="alert alert-danger" role="alert"></div>').append(res.error));
            }
        },
        error: function (err) {
            console.error(err);
        }
    })
}

function editCategoria(id_categoria) {
    navigate('http://localhost/dimensionmanga/editarCategoria/' + id_categoria);
}

//Funciones Comentarios 
//cambiar LAS FUNCIONES para servir con los verbos GET, POST Y DELETE, con AJAX por medio de la API

function mostrarComentarios(id_manga){
    $.ajax({
        method: "GET",
        url:"api/comentario/" + id_manga
    }).done(function(comentarios){
        $('.media').remove();
        for (let coment of comentarios.comentarios){
            let date1 = new Date(null);
            date1.setTime(coment.fecha*1000);
            let fechaParseada = date1.toLocaleString();
            coment.fecha = fechaParseada;
        }
        let rendered = Mustache.render(templateComentarios, comentarios);
        $('#listaComentarios').append(rendered);

        let date = Math.floor(new Date().getTime() / 1000)
        setInterval(function() {
            let fechaActualizada;
            cargarUltimosComentarios(id, fechaActulizada, comentarios);
        }, 2000);
    }).fail(function() {
        $('#listaComentarios').append('<div class="alert alert-danger" role="alert">No es posible cargar la lista de comentarios</div>');
    });
}

