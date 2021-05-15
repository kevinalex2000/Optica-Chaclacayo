$(document).ready(function () {
    /*  Show/Hidden Submenus */
    $(".nav-btn-submenu").on("click", function (e) {
        e.preventDefault();
        var SubMenu = $(this).next("ul");
        var iconBtn = $(this).children(".fa-chevron-down");
        if (SubMenu.hasClass("show-nav-lateral-submenu")) {
            $(this).removeClass("active");
            iconBtn.removeClass("fa-rotate-180");
            SubMenu.removeClass("show-nav-lateral-submenu");
        } else {
            $(this).addClass("active");
            iconBtn.addClass("fa-rotate-180");
            SubMenu.addClass("show-nav-lateral-submenu");
        }
    });

    /*  Show/Hidden Nav Lateral */
    $(".show-nav-lateral").on("click", function (e) {
        e.preventDefault();
        var NavLateral = $(".nav-lateral");
        var PageConten = $(".page-content");
        if (NavLateral.hasClass("active")) {
            NavLateral.removeClass("active");
            PageConten.removeClass("active");
        } else {
            NavLateral.addClass("active");
            PageConten.addClass("active");
        }
    });

    /*  Exit system buttom */
    $(".btn-exit-system").on("click", function (e) {
        e.preventDefault();
        Swal.fire({
            title: "¿Esta seguro que desea cerrar sesión?",
            text: "Está a punto de cerrar la sesión y salir del sistema.",
            type: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Salir!",
            cancelButtonText: "No, Cancelar",
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById("logout-form").submit();
            }
        });
    });

    $("#select_category_order").change(function () {
        if ($(this).val() != "") {
            location.href =
                "/orders/create/" +
                $(this).val() +
                "/" +
                $("option:selected", this).text();
        }
    });

    $(".value-details").change(function () {
        let arr = {};

        let count = 0;
        $(".value-details").each(function () {
            debugger;
            count++;

            const name = $(this).attr("name");

            let value = $("input[name='" + name + "']:checked").val();

            if (value == undefined) {
                value = $("input[name='" + name + "']").val();
            }

            arr[name] = value;

            if ($(".value-details").length == count) {
                $("#order_details").val(JSON.stringify(arr));
            }
        });
    });
});
(function ($) {
    $(window).on("load", function () {
        $(".nav-lateral-content").mCustomScrollbar({
            theme: "light-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons: { enable: true },
        });
        $(".page-content").mCustomScrollbar({
            theme: "dark-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons: { enable: true },
        });
    });
})(jQuery);

$(function () {
    $('[data-toggle="popover"]').popover();
});
