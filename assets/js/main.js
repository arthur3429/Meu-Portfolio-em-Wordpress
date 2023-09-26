jQuery(document).ready(function ($) {
    var processando_email = false;
    var recebeToken = (token) => {
        if (!processando_email) {
            processando_email = true;

            // Load
            $(".right button").html(
                `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 3a9 9 0 0 1 9 9h-2a7 7 0 0 0-7-7V3z"/></svg>`
            );

            // Formulario
            let email = $('input[name="email"]').val();
            let nome = $('input[name="nome"]').val();
            let msg = $('textarea[name="msg"]').val();

            $.ajax({
                url: "https://riverlab.org/arthur/sendmail.php",
                method: "POST",
                data: {
                    email: email,
                    nome: nome,
                    msg: msg,
                    recaptcha: token,
                },
                success: (response) => {
                    setTimeout(() => {
                        processando_email = false;
                    }, 10000);

                    $(".right button").html("Enviar Mensagem");

                    if (response.msg == "Sucesso") {
                        produce_native_notify({
                            msg: "E-mail enviado",
                            type: "success",
                        });

                        email.val("");
                        nome.val("");
                        msg.val("");
                    } else {
                        produce_native_notify({
                            msg: "E-mail não enviado",
                            type: "error",
                        });
                    }
                },
                error: () => {
                    setTimeout(() => {
                        processando_email = false;
                    }, 10000);

                    $(".right button").html("Enviar Mensagem");

                    produce_native_notify({
                        msg: "Houve um erro ao tentar enviar o e-mail",
                        type: "error",
                    });
                },
            });
        }
    };

    // Fixar o header quando scrollar para baixo
    let headerHeight = document.querySelector("header").clientHeight;
    let mqScroll = 100;
    if (window.innerWidth < 768) {
        mqScroll = 49;
    }

    $(window).scroll(function () {
        if ($(window).scrollTop() > mqScroll) {
            $("header").css({
                position: "fixed",
                height: "auto",
                borderBottom: "1px solid rgba(238, 238, 238, 0.1)",
            });
            $(".holdsections").css({
                display: "block",
                height: `${headerHeight}px`,
            });
        }

        if ($(window).scrollTop() == 0) {
            $("header").css({
                position: "static",
                height: `${headerHeight}px`,
                border: "none",
            });
            $(".holdsections").css({ display: "none" });
        }
    });

    // Abrir Menu
    $(".menu").click(function () {
        $(".menu-container, .menu-overlay").removeClass("hide");
        $(".menu-container, .menu-overlay").addClass("show");
    });

    // Fechar Menu
    $(".menu-overlay, .menu-container .close").click(function () {
        $(".menu-container, .menu-overlay").removeClass("show");
        $(".menu-container, .menu-overlay").addClass("hide");
    });

    // Ir para as divs quando clicas nos elementos do menu
    $("#menu-about").click(function () {
        $("html, body").animate(
            {
                scrollTop: $("#section-about").offset().top,
            },
            "slow"
        );
    });

    $("#menu-skills").click(function () {
        $("html, body").animate(
            {
                scrollTop: $("#section-skills").offset().top,
            },
            "slow"
        );
    });

    $("#menu-projects").click(function () {
        $("html, body").animate(
            {
                scrollTop: $("#section-projects").offset().top,
            },
            "slow"
        );
    });

    $("#menu-contact").click(function () {
        $("html, body").animate(
            {
                scrollTop: $("#section-contact").offset().top,
            },
            "slow"
        );
    });
});

// Detectar se o user está com tema escuro no sistema e iniciar o dark theme no meu css.
// Alternar entre tema claro e escuro e manter preferência salva em localStorage

const toggleSwitch = document.querySelector(
    '.toggler-wrapper input[type="checkbox"]'
);
const togglerBackground = document.querySelector(".toggler-knob");
const currentTheme = localStorage.getItem("theme");

if (currentTheme) {
    document.documentElement.setAttribute("data-theme", currentTheme);
    if (currentTheme === "dark") {
        toggleSwitch.checked = true;
    }
}

// Verifica se é a primeira vez que o user está acessando e se for e estiver com o tema dark, ele aplica o tema dark
function firstTimeDetect() {
    const verify = localStorage.getItem("firstTime");
    if (verify != null) {
        return;
    } else {
        localStorage.setItem("firstTime", "no");
        const detectUserTheme = window.matchMedia(
            "(prefers-color-scheme:dark)"
        ).matches;
        if (detectUserTheme) {
            document.documentElement.setAttribute("data-theme", "dark");
            localStorage.setItem("theme", "dark");
            toggleSwitch.checked = true;
        }
    }
}

firstTimeDetect();

// Verifica o tema que o usuário prefere
function detectTheme() {
    const preferido = localStorage.getItem("preferido");

    if (preferido === null) {
        return;
    } else if (preferido === "escuro") {
        document.documentElement.setAttribute("data-theme", "dark");
        toggleSwitch.checked = true;
    } else if (preferido === "claro") {
        document.documentElement.setAttribute("data-theme", "light");
    }
}

detectTheme();

// Muda o tema no evento de click na checkbox que está no menu
function switchTheme(event) {
    if (event.target.checked) {
        document.documentElement.setAttribute("data-theme", "dark");
        localStorage.setItem("theme", "dark");
        localStorage.setItem("preferido", "escuro");
    } else {
        document.documentElement.setAttribute("data-theme", "light");
        localStorage.setItem("theme", "light");
        localStorage.setItem("preferido", "claro");
    }
}

toggleSwitch.addEventListener("change", switchTheme, false);

// Muda o formato de visualização do meu container de tecnologias
const skillContainer = document.querySelector(".skills-container");
const skillCard = document.querySelectorAll(".skill-card");

function showAllTechs() {
    skillContainer.classList.toggle("active");
    Array.from(skillCard).forEach((card) => {
        card.classList.toggle("active");
    });

    if (skillContainer.classList.contains("active")) {
        document.querySelector(".showAllTechs").innerHTML = "Ocultar";
    } else {
        document.querySelector(".showAllTechs").innerHTML = "Exibir Tudo";
    }
}
