<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Cadastros</span>
                </a>
                <ul aria-expanded="false">
                    {{-- <li><a href="">Paciente </a></li> --}}
                    <li><a href=" {{ route('triagem_create') }} "> Paciente </a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Listas</span>
                </a>

                <ul aria-expanded="false">
                    <li><a href="{{ route('triagem_index') }}">Listar Triagem </a></li>
                </ul>
            </li>            
        </ul>
    </div>
</div>
