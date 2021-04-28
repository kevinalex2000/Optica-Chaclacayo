$(document).ready(function () {
    function obtenerValoresFiltro(grupoInputs) {
        let inputs = $(".input-finder", grupoInputs);
        let valoresFiltro = {};

        inputs.each(function () {
            let columna = $(this).attr("column-finder");
            let texto = $(this).val();

            valoresFiltro[columna] = texto.toLowerCase();
        });

        return valoresFiltro;
    }

    function buscarPorFiltro(obj) {
        debugger;
        let grupoInputs = obj.closest(".group-inputs-finder");
        let valoresFiltro = obtenerValoresFiltro(grupoInputs);

        let idTabla = grupoInputs.attr("target-table-id");

        $("#" + idTabla + " > tbody > tr").each(function () {
            let fila = $(this);
            let oculto = false;

            $("td", this).each(function () {
                let campo = $(this).attr("column-finder-name");

                if (campo != undefined) {
                    let texto = $(this).text().toLowerCase();

                    if (texto != "" && texto != null) {
                        let textoInput = valoresFiltro[campo];

                        if (texto.indexOf(textoInput) == -1) {
                            oculto = true;
                        }
                    }
                }
            });

            if (oculto) fila.hide();
            else fila.show();
        });
    }

    $(".group-inputs-finder .input-finder[action='keyup']").keyup(function () {
        buscarPorFiltro($(this));
    });

    $(".group-inputs-finder .input-finder[action='change']").change(
        function () {
            buscarPorFiltro($(this));
        }
    );
});
