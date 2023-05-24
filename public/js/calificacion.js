var work = false;

function agregarPuntuacion(table) {
    var select_item, select_text, cant_usa;
    // OBTENEMOS EL VALOR DEL SELECT QUE HEMOS SELECCIONADO.
    select_item = $("#select_Puntuacion_add").val();
    select_text = $("#select_Puntuacion_add option:selected").text();
    cant_usa = Number.parseInt($("#Puntuacion_cant_add").val());
    cant_usa = jsBuscar(table, select_item) + cant_usa;
    if (cant_usa >= 1) {
        var node = table
            .row
            .add([select_item, select_text, cant_usa, botonesOPC()])
            .draw()
            .node();
        input = '<input type="hidden" id="puntuacion_id" name="puntuacion_id[]" value="'+select_item+'"></input>';
        $(node).append(input);
        input = '<input type="hidden" id="puntuacion_id" name="Puntuacion_cant_usa[]" value="'+cant_usa+'"></input>';
        $(node).append(input);
    } else {
        alert("EL nrc debe ser mayor que 0");
    }
}

function eliminarPuntuacion() {
    var table = $("#ingr_table").DataTable();
    $('#form_calificacion tbody').on( 'click', 'span', function () {
        table
            .row( $(this).parents('tr') )
            .remove()
            .draw();
    } );
}

function botonesOPC(id_Puntuacion) {
    return (
        "<td>" +
        '<span class="btn btn-lg btn-primary mx-1" id="btnBorrar" onclick="eliminarPuntuacion()">' +
        '<i class="fas fa-trash-alt"  id="btnBorrar" onclick="eliminarPuntuacion()"></i>' +
        "</span>" +
        "</td>"
    );
}

//función que realiza la busqueda
function jsBuscar(table,id_Puntuacion) {
    nrc = 0;
    //realizamos el recorrido solo por las celdas que contienen el código, que es la primera
    $("#ingr_table tr")
        .find("td:eq(0)")
        .each(function () {
            //obtenemos el codigo de la celda
            codigo = $(this).html();

            //comparamos para ver si el código es igual a la busqueda
            if (codigo == id_Puntuacion) {
                //aqui ya que tenemos el td que contiene el codigo utilizaremos parent para obtener el tr.
                trDelResultado = $(this).parent();

                //ya que tenemos el tr seleccionado ahora podemos navegar a las otras celdas con find
                nombre = trDelResultado.find("td:eq(1)").html();
                nrc = trDelResultado.find("td:eq(2)").html();

                //mostramos el resultado en el div
                //$("#mostrarResultado").html("El nombre es: "+nombre+", la edad es: "+edad)

                table
                    .row( $(this).parents('tr') )
                    .remove()
                    .draw();
            }
        });
    return Number.parseInt(nrc);
}


$(document).ready(function () {
    /*$('#ingr_table').on('childRow.dt', function(e, show, row) {
        console.log((show ? "Showing " : "Hiding ") + "row " + row.index());
    });*/
    var table = $("#ingr_table").DataTable({
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty:
                "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
            oAria: {
                sSortAscending:
                    ": Activar para ordenar la columna de manera ascendente",
                sSortDescending:
                    ": Activar para ordenar la columna de manera descendente",
            },
        },
    });
    $("#form_calificacion").submit(function (event) {
        if(!work)
            event.preventDefault();
        else
            event.submit();
    });

    $("#btnSubmit").click(function(event){
        work = true;
        $("#form_calificacion").submit();
    });

    $('#btn_Puntuacion_add').click(function (event) {
        agregarPuntuacion(table);
    });
});
