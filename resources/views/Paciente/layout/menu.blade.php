<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Marcação</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('triagem_create') }}"> Consulta   </a></li>
                    <li><a href="{{ route('triagem_create') }}"> Exame   </a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Listas</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('triagem_index') }}">Ver exames</a></li>
                    <li><a href="{{ route('triagem_index') }}">Ver Consulta</a></li>
                    <li><a href="{{ route('triagem_index') }}">Historico Clinico</a></li>
                </ul>
            </li>            
        </ul>
    </div>
</div>
