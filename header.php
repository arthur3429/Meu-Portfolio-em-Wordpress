<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="description"
            content="Portfólio de um Desenvolvedor Front-End Júnior em Alagoas"
        />
        <title>
            Arthur Ruan - Desenvolvedor Front-End em Alagoas - Portfólio
        </title>

        <!-- Favicon -->
        <link rel="icon" href="./img/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" href="./img/android-chrome-192x192" sizes="192x192" />
        <link rel="apple-touch-icon" href="./img/apple-touch-icon.png" />
        <?php wp_head(); ?>
    </head>
    <body>
        <!-- Header -->
        <header>
            <div class="wrap">
                <div class="logo">
                    <h1>art</h1>
                    <h1>.</h1>
                    <h1>dev</h1>
                </div>
                <div class="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </header>

        <!-- Menu -->
        <div class="menu-overlay"></div>
        <div class="menu-container">
            <a id="menu-about">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="16"
                    height="16"
                >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"
                    />
                </svg>
                Sobre
            </a>
            <a id="menu-skills">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="16"
                    height="16"
                >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M12 10.202L9.303 12 12 13.798 14.697 12 12 10.202zm4.5.596L19.197 9 13 4.869v3.596l3.5 2.333zm3.5.07L18.303 12 20 13.131V10.87zm-3.5 2.334L13 15.535v3.596L19.197 15 16.5 13.202zM11 8.465V4.869L4.803 9 7.5 10.798 11 8.465zM4.803 15L11 19.131v-3.596l-3.5-2.333L4.803 15zm.894-3L4 10.869v2.262L5.697 12zM2 9a1 1 0 0 1 .445-.832l9-6a1 1 0 0 1 1.11 0l9 6A1 1 0 0 1 22 9v6a1 1 0 0 1-.445.832l-9 6a1 1 0 0 1-1.11 0l-9-6A1 1 0 0 1 2 15V9z"
                    />
                </svg>
                Tecnologias & Habilidades
            </a>
            <a id="menu-projects">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="16"
                    height="16"
                >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M16.33 13.5A6.988 6.988 0 0 0 19 8h2a8.987 8.987 0 0 1-3.662 7.246l2.528 4.378a2 2 0 0 1-.732 2.732l-3.527-6.108A8.97 8.97 0 0 1 12 17a8.97 8.97 0 0 1-3.607-.752l-3.527 6.108a2 2 0 0 1-.732-2.732l5.063-8.77A4.002 4.002 0 0 1 11 4.126V2h2v2.126a4.002 4.002 0 0 1 1.803 6.728L16.33 13.5zM14.6 14.502l-1.528-2.647a4.004 4.004 0 0 1-2.142 0l-1.528 2.647c.804.321 1.68.498 2.599.498.918 0 1.795-.177 2.599-.498zM12 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                    />
                </svg>
                Projetos & Trabalhos
            </a>
            <div class="switch-themes">
                <!-- Toggle Button Style 25 -->
                <p>Tema Claro</p>
                <label class="toggler-wrapper style-25">
                    <input type="checkbox" />

                    <div class="toggler-slider">
                        <div class="toggler-knob"></div>
                    </div>
                </label>
                <p>Tema Escuro</p>

            </div>

            <!-- Backdrop -->
            <div class="backdrop"></div>

            <!-- Contact -->
            <a id="menu-contact" class="special">Contato</a>

            <!-- Close -->
            <div class="close">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2a9.985 9.985 0 0 1 8 4h-2.71a8 8 0 1 0 .001 12h2.71A9.985 9.985 0 0 1 12 22zm7-6v-3h-8v-2h8V8l5 4-5 4z"
                    />
                </svg>
            </div>
        </div>

        <div class="holdsections"></div>
    </body>
</html>
