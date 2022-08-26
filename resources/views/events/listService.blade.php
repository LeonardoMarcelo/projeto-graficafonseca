<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/img/image-content/favicon.png" type="image/x-icon">

    <title>Gráfica Fonceca | Tecnologia e qualidade em seus impressos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- --------- LINKS ------------ -->

    <link rel="stylesheet" href="/css/config.css">
    <link rel="stylesheet" href="/css/variables.css">
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/carousel.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/produtos.css">
    <link rel="stylesheet" href="/css/sobre.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>


    <header class="produtos-header">
        <div class="logo-header">
            <img src="/img/image-content/logo-completa.png" alt="" class="img-logo">
        </div>
        <nav class="nav-bar">
            <ul class="menu-nav">
                <li class="nav-menu-itens"><a href="/" class="links-menu-nav ">Início</a></li>
                <li class="nav-menu-itens"><a href="/listService" class="links-menu-nav atual-page">Produtos e
                        Serviços</a></li>
                <li class="nav-menu-itens"><a href="/sobre" class="links-menu-nav">Sobre</a></li>
                <li class="nav-menu-itens"><a href="#footer" class="links-menu-nav">Contato</a></li>

                {{-- @auth
                    <li class="nav-menu-itens">
                        <a href="/dashboard" class="links-menu-nav">Dashboard</a>
                    </li>

                    <li class="nav-menu-itens">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" class="links-menu-nav"
                                onclick="event.preventDefault();
                this.closest('form').submit();">Sair</a>
                        </form>
                    </li>

                @endauth
                @guest
                    <li class="nav-menu-itens">
                        <a href="/dashboard" class="links-menu-nav">Entrar</a>
                    </li>
                @endguest --}}
            </ul>
        </nav>


    </header>








    <main>


        <section class="search-menu container">
            <form method="GET" action="/listService">
                <div class="search-bar">
                    <input type="text" id="search" name="search" placeholder="Pesquise um produto aqui"
                        class="search" required>
                    <button type="submit" class="btn-search">
                        Pesquisar
                    </button>
                </div>
            </form>
            <p class="search-error ">Buscando por: {{ $search }}</p>
        </section>








        @if ($search)

            <section class="listing-products container">

                @foreach ($events as $event)
                    <div class="product-card">
                        <div class="card_img-product">
                            <img class="card_imagem-product"src="/img/events/{{ $event->img }}" alt="">
                        </div>
                        <div class="card_info-product">
                            <h3 class="card_title-product">{{ $event->nome }}</h3>
                            <p class="card_descript-product">
                                {{ $event->description }}</p>
                            <a href="https://wa.me/558136341126?text={{'Olá, vi o produto: *'.$event->nome. '* no site da gráfica. Gostaria de receber mais informações.'  }}"
                                target="_blank"><button class="btn-comprar">Encomendar <img
                                        src="/icons/logo-whatsapp.svg" alt="" class="card_icon-whatz">
                                </button></a>
                            {{-- <a href="http://api.whatsapp.com/send?1=pt_BR&phone=558136341126" target="_blank"><button
                                    class="btn-comprar">Encomendar <img src="/icons/logo-whatsapp.svg" alt=""
                                        class="card_icon-whatz"> </button></a> --}}
                        </div>
                    </div>
                @endforeach
            </section>

            @if (count($events) == 0 && $search)
                <p class="product-error container">Não foi possível encontrar nenhum serviço com {{ $search }}! <a
                        href="/" class="danger">Ver todos!</a>
                </p>
            @elseif(count($events) == 0)
                <p class="product-error container">Não há serviços disponiveis!</p>
            @endif
            </div>
        @else
            <section class="listing-products container">
                @foreach ($events as $event)
                    <div class="product-card">
                        <div class="card_img-product">

                            <img class="card_imagem-product"src="/img/events/{{ $event->img }}" alt="">
                        </div>
                        <div class="card_info-product">
                            <h3 class="card_title-product">{{ $event->nome }}</h3>
                            <p class="card_descript-product">
                                {{ $event->description }}</p>
                            <a href="https://wa.me/558136341126?text={{'Olá, vi o produto: *'.$event->nome. '* no site da gráfica. Gostaria de receber mais informações.'  }}"
                                target="_blank"><button class="btn-comprar">Encomendar <img
                                        src="/icons/logo-whatsapp.svg" alt="" class="card_icon-whatz">
                                </button></a>
                        </div>
                    </div>
                @endforeach

            </section>
            {{ $events->links() }}





        @endif


    </main>


    <!-- ====== QR CODE MOBILE ====== -->
    <button type="button" id="wtz-button" class="btn2 btn-wtz">
        <a href="https://wa.me/558136341126" target="_blank"> <img src="/icons/logo-whatsapp.svg" alt=""
                class="card_icon-whatz"></a>
    </button>

    {{-- <div class="wtz" id="wtz-modal">

        <div class="wtz-content">
            <button class="btn2 btn-left2" id="close-modal">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <img src="/img/image-content/qr-code (1) 1.png" alt="qr code">
            <p class="wtz-text"></i> Escanei aqui para falar conosco</p>

            <span class="dividing-line">
                <p>ou</p>
            </span>

            <a class="btn2 btn-primary" href="http://api.whatsapp.com/send?1=pt_BR&phone=558136341126"
                target="_blank"><i class="wtz-icon fa-brands fa-whatsapp"></i> Clique aqui</a>
        </div>
    </div> --}}


    <!-- ====== QR CODE FOR DESCKTOP ====== -->
    <div class="qr-code">
        <div class="circle">
            <img src="/img/image-content/qr-code (1) 1.png" alt="qr code">
        </div>
        <div class="retangle"></div>
    </div>





    <!-- ----------- FOOTER ---------- -->

    <footer>

        <div class="footer-container" id="footer">
            <div class="action-footer">
                <img src="/img/image-content/logo-completa.png" alt="" class="logo-footer">
                <ul class="social-contacts_footer">
                    <li><a href="" class="link-social-footer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="svg-social footer-icon"
                                viewBox="0 0 512 512">
                                <title>Logo Whatsapp</title>
                                <path
                                    d="M414.73 97.1A222.14 222.14 0 00256.94 32C134 32 33.92 131.58 33.87 254a220.61 220.61 0 0029.78 111L32 480l118.25-30.87a223.63 223.63 0 00106.6 27h.09c122.93 0 223-99.59 223.06-222A220.18 220.18 0 00414.73 97.1zM256.94 438.66h-.08a185.75 185.75 0 01-94.36-25.72l-6.77-4-70.17 18.32 18.73-68.09-4.41-7A183.46 183.46 0 0171.53 254c0-101.73 83.21-184.5 185.48-184.5a185 185 0 01185.33 184.64c-.04 101.74-83.21 184.52-185.4 184.52zm101.69-138.19c-5.57-2.78-33-16.2-38.08-18.05s-8.83-2.78-12.54 2.78-14.4 18-17.65 21.75-6.5 4.16-12.07 1.38-23.54-8.63-44.83-27.53c-16.57-14.71-27.75-32.87-31-38.42s-.35-8.56 2.44-11.32c2.51-2.49 5.57-6.48 8.36-9.72s3.72-5.56 5.57-9.26.93-6.94-.46-9.71-12.54-30.08-17.18-41.19c-4.53-10.82-9.12-9.35-12.54-9.52-3.25-.16-7-.2-10.69-.2a20.53 20.53 0 00-14.86 6.94c-5.11 5.56-19.51 19-19.51 46.28s20 53.68 22.76 57.38 39.3 59.73 95.21 83.76a323.11 323.11 0 0031.78 11.68c13.35 4.22 25.5 3.63 35.1 2.2 10.71-1.59 33-13.42 37.63-26.38s4.64-24.06 3.25-26.37-5.11-3.71-10.69-6.48z"
                                    fill="#fff" stroke-width="42" fill-rule="#fff" />
                            </svg>
                        </a></li>
                    <li><a href="" class="link-social-footer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 528 602""
                                class="svg-social footer-icon">
                                <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path
                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                                    fill="#fff" />
                            </svg></a></li>
                </ul>
            </div>
            <div class="menu-form">
                <ul class="features_footer">
                    <label class="title-footer">Contato</label>
                    <li>Telefone: <a href="" class="footer-links">#55 81 36341126</a></li>
                    <li>E-mail: <a href="" class="footer-links"> atendimentograficafonseca@gmail.com</a></li>
                    <!-- <li><a href="" class="footer-links">Analytics</a></li> -->
                </ul>
                <ul class="company_footer">
                    <label class="title-footer">Endereço</label>
                    <li><a href="" class="footer-links">Rua José Fernandes Duarte, 65 - Rodovia
                            PE-90. Surubim/
                            PE.</a></li>
                    <li><a href="" class="footer-links">CEP: 55750-000</a></li>
                    <li><a href="" class="footer-links">CNPJ: 08.513.512/0001-63</a></li>
                    <li><a href="" class="footer-links">I.E.: 0348878-06</a></li>
                </ul>
            </div>
            <p class="footer_copy">
                ©Gráfica Fonsêca 2022
            </p>
        </div>
    </footer>
    <script src="/js/carousel.js"></script>
    <script src="/js/modal.js"></script>
    <script src="https://kit.fontawesome.com/fdb87ccbc5.js" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>


</body>

</html>
