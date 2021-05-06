<div class="container-fluid p-0">
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scrioll-heigth: 100px">
                    <li class="nav-item">
                        <a href="{{route('meus_dados')}}" class="nav-link active">Meus Dados</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('convite.convidar')}}" class="nav-link">Enviar Convite</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <a href="{{route('logout')}}" class="btn btn-outline-light btn-sm" title="Efetuar logout"><i class="fas fa-sign-out-alt me-2"></i>Sair</a>
            </div>
        </div>
    </nav>
</div>
