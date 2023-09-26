jQuery(document).ready(function ($) {
    // Rederiza uma notificação por 5 segundos
    var notifyTimeout, notifyRemoveTimeout, notifyConfirmCallback;

    function produce_native_notify({
        msg,
        type = "msg",
        time = 10000,
        callback = false,
    }) {
        // Reinicia as notificações
        window.clearTimeout(notifyTimeout);
        window.clearTimeout(notifyRemoveTimeout);
        $(".riverlab_native_notify_system").remove();

        let textoContexto = "";
        let title = "";
        if (type == "msg") {
            title = "mensagem";
        } else if (type == "alert") {
            title = "alerta!";
        } else if (type == "error") {
            title = "erro!";
        } else if (type == "confirm") {
            title = "alerta!";
        } else {
            title = "sucesso!";
        }
        textoContexto += `
	<div class="riverlab_native_notify_system show ${type}">
        <div class="RNNS_left">
            <div class="RNNS_header">
                ${title}
            </div>
            <div class="RNNS_content">
                ${msg}
            </div>
        </div>`;

        if (
            type == "alert" ||
            type == "error" ||
            type == "msg" ||
            type == "confirm"
        ) {
            textoContexto += `
            <div class="RNNS_right">`;

            if (type == "alert" || type == "error") {
                textoContexto += `
            <div class="RNNS_close" ${
                callback != false ? `data-callback="${callback}"` : ""
            }>Ok</div>`;
            } else if (type == "msg") {
                textoContexto += `
            <div class="RNNS_close" ${
                callback != false ? `data-callback="${callback}"` : ""
            }>Fechar</div>`;
            } else if (type == "confirm") {
                textoContexto += `
            <div class="RNNS_close">Não</div>`;
                textoContexto += `
            <div class="RNNS_confirm" ${
                callback != false ? `data-callback="${callback}"` : ""
            }>Sim!</div>`;
            }
            textoContexto += `
            </div>`;
        }

        textoContexto += `
	</div>`;

        // Renderiza
        $("body").append(textoContexto);

        // Callback
        if (callback != false) {
            notifyConfirmCallback = new Promise((resolve, reject) => {
                resolve(callback);
            });
        }

        // Some com a mensagem
        if (time > 0) {
            notifyTimeout = setTimeout(() => {
                $(".riverlab_native_notify_system")
                    .removeClass("show")
                    .addClass("hide");
                notifyRemoveTimeout = setTimeout(() => {
                    $(".riverlab_native_notify_system").remove();
                }, 700);
            }, time);
        }
    }

    // Remove a RNNS
    $(document).on("click", ".RNNS_close", function () {
        $(".riverlab_native_notify_system")
            .removeClass("show")
            .addClass("hide");
        notifyRemoveTimeout = setTimeout(() => {
            // Restart Notifications
            window.clearTimeout(notifyTimeout);
            window.clearTimeout(notifyRemoveTimeout);
            $(".riverlab_native_notify_system").remove();
        }, 700);
    });

    // Confirm, close RNNS and callback
    $(document).on("click", ".RNNS_confirm, .RNNS_close", function () {
        let th = $(this);
        let callback = th.data("callback");

        // If has callback
        if (callback != undefined) {
            // Callback Notify Confirm
            notifyConfirmCallback.then(function (callback) {
                callback();
            });

            $(".riverlab_native_notify_system")
                .removeClass("show")
                .addClass("hide");
            notifyRemoveTimeout = setTimeout(() => {
                // Restart Notifications
                window.clearTimeout(notifyTimeout);
                window.clearTimeout(notifyRemoveTimeout);
                $(".riverlab_native_notify_system").remove();
            }, 700);
        }
    });
});
