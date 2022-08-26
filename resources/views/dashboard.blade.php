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

                    <li class="active">
                        <a href="/dashboard" >
                            <span class="material-symbols-outlined" >
                                shopping_cart
                                </span>Produtos</a>
                    </li>
                    <li class="">
                        <a href="/pg"><span
                            class="material-symbols-outlined">book</span>Páginas</a>
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

            <div class="top-navbar ">
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


            <div class="main-content">
                <div class="row ">
                    <div class="col-lg-12 col-md-12">
                        <div class="card" style="min-height: 485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Serviços/Produtos</h4>
                                <button class="btn btn-success" style="float: right;" data-toggle="modal"
                                    data-target="#addStudentModal">Adicionar novo Serviço</button>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>descrição</th>
                                            <th>Imagem</th>
                                            <th>Categoria</th>
                                            <th>Tipo</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($events->count() > 0)
                                            @foreach ($events as $service)
                                                <tr>
                                                    
                                                    <td>{{ $service->id }}</td>
                                                    <td>{{ $service->nome }}</td>
                                                    <td>{{ $service->description }}</td>
                                                    <td> <img src="img/events/{{ $service->img }}" width="90px"
                                                            alt="{{ $service->nome }}"></td>
                                                    <td>{{ $service->categoria }}</td>
                                                    <td>{{ $service->tipo }}</td>
                                                    <td style="text-align: center; display:flex; gap:10px;">
                                                        {{-- <button class="btn btn-sm btn-primary" wire:click="editStudentModal({{ $service->id }})">Edit</button> --}}
                                                        {{-- <a href="/events/edit/{{ $service->id }}"
                                                            class="btn btn-info edit-btn ">
                                                            <ion-icon name="create-outline"></ion-icon>Editar
                                                        </a> --}}
                                                        <button type="submit" data-toggle="modal"
                                                            data-target="#editModal{{ $service->id }}"
                                                            class="btn btn-info edit-btn ">
                                                            <span class="material-symbols-outlined icon">
                                                                edit
                                                            </span>Editar
                                                        </button>

                                                        <button type="submit" data-toggle="modal"
                                                            data-target="#deleteModal{{$service->id}}"
                                                            class="btn btn-danger delete-btn">
                                                            <span class="material-symbols-outlined icon">
                                                                delete
                                                            </span>Deletar
                                                        </button>


                                                        <!-- Modal DELETE -->
                                                        <div class="modal fade" id="deleteModal{{$service->id}}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">Aviso!!</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h2 class="modal-title">Tem certeza que deseja
                                                                            excluir?</h2>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="/events/{{ $service->id }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" data-toggle="modal"
                                                                                data-target="#deleteModal{{ $service->id }}"
                                                                                class="btn btn-danger delete-btn">
                                                                                <ion-icon name="trash-outline">
                                                                                </ion-icon>Deletar
                                                                            </button>

                                                                        </form>
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Modal EDIT -->
                                                        <div class="modal fade" id="editModal{{ $service->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">Editando
                                                                            {{ $service->nome }}
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">


                                                                        <form
                                                                            action="/events/update/{{ $service->id }}"
                                                                            enctype="multipart/form-data"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('PUT')

                                                                            <div class="form-group ">
                                                                                <label for="image"
                                                                                    class="col-form-label">Imagem</label>
                                                                                <div class="col-12">
                                                                                    <input type="file"
                                                                                        id="img" name="img"
                                                                                        class="form-control-file">
                                                                                    <img src="/img/events/{{ $service->img }}"
                                                                                        width="100px"
                                                                                        alt="{{ $service->title }}"
                                                                                        class="img-preview">

                                                                                    @error('image')
                                                                                        <span class="text-danger"
                                                                                            style="font-size: 11px">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label for="nome"
                                                                                    class="col-form-label">Nome</label>
                                                                                <div class="col-12">
                                                                                    <input type="text"
                                                                                        id="nome" name="nome"
                                                                                        class="form-control"
                                                                                        value="{{ $service->nome }}">
                                                                                    @error('nome')
                                                                                        <span class="text-danger"
                                                                                            style="font-size: 11px">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label for="nome"
                                                                                    class="col-form-label">Descrição</label>
                                                                                <div class="col-12">
                                                                                    <input type="text"
                                                                                        id="description"
                                                                                        name="description"
                                                                                        class="form-control"
                                                                                        value="{{ $service->description }}">
                                                                                    @error('nome')
                                                                                        <span class="text-danger"
                                                                                            style="font-size: 11px">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label for="nome"
                                                                                    class="col-form-label">Tipo</label>
                                                                                <div class="col-12">
                                                                                    <input type="text"
                                                                                        id="tipo" name="tipo"
                                                                                        class="form-control"
                                                                                        value="{{ $service->tipo }}">
                                                                                    @error('nome')
                                                                                        <span class="text-danger"
                                                                                            style="font-size: 11px">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-12">
                                                                                    <label for="nome"
                                                                                        class="col-form-label ">Categoria</label>

                                                                                    <input type="text"
                                                                                        id="categoria"
                                                                                        name="categoria"
                                                                                        class="form-control"value="{{ $service->categoria }}">
                                                                                    @error('nome')
                                                                                        <span class="text-danger"
                                                                                            style="font-size: 11px">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group ">
                                                                                <label for="id_service"
                                                                                    class="col"></label>
                                                                                <div class="col-9 ">
                                                                                    <button type="submit"
                                                                                        class="btn  btn-primary">Editar
                                                                                        Serviço</button>

                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Cancelar</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>





                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" style="text-align: center;"><small>Nenhum Serviço
                                                        encontrado
                                                    </small>
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>





                <!-- Modal Adicionar -->
                <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adicionar Serviço</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/events" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    <div class="form-group ">
                                        <label for="image" class="col-3">Imagem</label>
                                        <div class="col-9">
                                            <input type="file" id="image" name="image"
                                                class="form-control-file">
                                            @error('image')
                                                <span class="text-danger"
                                                    style="font-size: 11px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nome" class="col-3">Nome</label>
                                        <div class="col-9">
                                            <input type="text" id="nome" name="nome"
                                                class="form-control">
                                            @error('nome')
                                                <span class="text-danger"
                                                    style="font-size: 11px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nome" class="col-3">Descrição</label>
                                        <div class="col-9">
                                            <input type="text" id="description" name="description"
                                                class="form-control">
                                            @error('nome')
                                                <span class="text-danger"
                                                    style="font-size: 11px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nome" class="col-3">Tipo</label>
                                        <div class="col-9">
                                            <input type="text" id="tipo" name="tipo"
                                                class="form-control">
                                            @error('nome')
                                                <span class="text-danger"
                                                    style="font-size: 11px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nome" class="col-3">Categoria</label>
                                        <div class="col-9">
                                            <input type="text" id="categoria" name="categoria"
                                                class="form-control">
                                            @error('nome')
                                                <span class="text-danger"
                                                    style="font-size: 11px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <label for="id_service" class="col-3"></label>
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-sm btn-primary">Novo
                                                Serviço</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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



        </div>
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
