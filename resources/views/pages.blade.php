<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Painel dashboard
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="/css/custom.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>


    <div class="wrapper">


        <div class="body-overlay"></div>


        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                @foreach ($pages as $logo)
                    <h3><img src="img/pages/{{ $logo->logo }}" class="img-fluid" /><span>Gráfica fonsêca</span></h3>
                @endforeach
            </div>
            <ul class="list-unstyled components">
                @auth

                    <li class="">
                        <a href="/dashboard">
                            <span class="material-symbols-outlined">
                                shopping_cart
                            </span>Produtos</a>
                    </li>
                    <li class="active">
                        <a href="/pg"><span class="material-symbols-outlined">book</span>Páginas</a>
                    </li>
                    <li class="">
                        <a href="/"><span class="material-symbols-outlined">
                                home
                            </span>Home</a>
                    </li>
                    <li class="item-menu_nav-mob">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout"
                                onclick="event.preventDefault();
                                 this.closest('form').submit();"><span
                                    class="material-symbols-outlined">logout</span>Sair</a>


                        </form>
                    </li>

                @endauth
                @guest

                    <li class="">
                        <a href="/dashboard"><i class="material-icons">user_login</i><span>Entrar</span></a>
                    </li>
                @endguest






            </ul>


        </nav>



        <!-- Page Content  -->
        <div id="content">

            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>

                        <a class="navbar-brand" href="#">Painel Administrativo </a>

                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button"
                            data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">


                            <span class="material-symbols-outlined">
                                menu
                            </span>
                        </button>


                    </div>
                </nav>
            </div>
            @if ($pages->count() > 0)
                @foreach ($pages as $service)
                    <form action="/pages/update/{{ $service->id }}" enctype="multipart/form-data" method="POST"
                        class="">
                        @csrf
                        @method('PUT')
                        <div class="container rounded bg-white mt-12 mb-12 ">
                            <div class="row">

                                <div class="col-md-4 border-right">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-8"><img
                                            class="rounded-circle mt-5" width="150px"
                                            src="img/pages/{{ $logo->logo }}"><span
                                            class="font-weight-bold">{{ $service->titulo }}</span><span
                                            class="text-black-50"></span><span> </span> <input type="file"
                                            id="logo" name="logo" class="form-control-file"></div>
                                </div>
                                <div class="col-md-8 border-right">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">Alterando as Páginas </h4>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-8"><label class="labels">Nome</label><input
                                                    type="text" id="titulo" name="titulo" class="form-control"
                                                    value="{{ $service->titulo }}">

                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-8"><label class="labels">Contato alterando contato quem somos</label><input
                                                    type="text" id="section_contato" name="section_contato"
                                                    class="form-control" value="{{ $service->section_contato }}">

                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-8"><label class="labels">História  alterando a seção historia</label>
                                                <textarea type="text"id="history" name="history" class="form-control">{{ $service->history }}</textarea>
                                            </div>

                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-8"><label class="labels">Quem somos  alterando a seção quem somos</label>
                                                <textarea type="text"id="quemsomos" name="quemsomos" class="form-control">{{ $service->quemsomos }}</textarea>
                                            </div>

                                        </div>
                                        {{-- <div class="row mt-4">
                                            <div class="col-md-6"><label class="labels">Galeria de fotos</label>
                                                    <input type="file" name="galery[]" id="galery[]"  multiple class="form-control-file">
                                                    
                                            </div>
                                        </div> --}}
                                        <div class="mt-5 text-left"><button type="submit"
                                                class="btn btn-success profile-button" type="button"><span
                                                    class="material-symbols-outlined icon">
                                                    edit
                                                </span>Editar Páginas
                                            </button></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                @endforeach
            @else
                <tr>
                    <td colspan="4" style="text-align: center;"><small>Nenhum Paginas
                            encontrada
                        </small>
                    </td>
                </tr>
            @endif
            </form>

        </div>




    </div>





    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <nav class="d-flex">
                        <ul class="m-0 p-0">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
                <div class="col-md-6">
                    <p class="copyright d-flex justify-content-end"> &copy 2021 Design by
                        <a href="#">Vishweb Design</a> BootStrap Admin Dashboard
                    </p>
                </div>
            </div>
        </div>
    </footer>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery-3.3.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-3.3.1.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $('.more-button,.body-overlay').on('click', function() {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });

        });
    </script>

</body>

</html>
