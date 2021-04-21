$(document).ready(function () {
    $(".input-find-in-table").keyup(function () {
        let busqueda = $(this).val().toLowerCase();
        let filas = $("#" + $(this).attr("target-table-id") + " > tbody > tr");

        filas.each(function () {
            let fila = $(this);
            let celdasABuscar = $("td.finder", this);

            let Oculto = true;

            celdasABuscar.each(function () {
                let texto = $(this).text().toLowerCase();

                if (texto.indexOf(busqueda) >= 0) {
                    Oculto = false;
                }
            });

            Oculto ? fila.hide() : fila.show();
        });

        console.log("busqueda: " + $(this).attr("target-table-id"));
    });
});
