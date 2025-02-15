<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('pagina_inicial') }}">Dashboard</a></li>
                </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Cadastros</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('pclinico_create') }}">Pessoal Clínico</a></li>
                    <li><a href="{{ route('especialidade_create') }}">Especialidade</a></li>
                    <li><a href="{{ route('exames') }}">Exames</a></li>
                    <li><a href="{{ route('consultas') }}">Consultas</a></li>
                    <li><a href="">#####</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Listas</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('listar_paciente') }}">Listar Pacientes</a></li>
                    <li><a href="{{ route('listar_pclinico') }}">Listar Pessoal Clínico</a></li>
                    <li><a href="{{ route('especialidade') }}">Listar Especialidade</a></li>
                    <li><a href="{{ route('listar_consulta') }}">Listar Consultas</a></li>
                    <li><a href="{{ route('listar_exame') }}">Listar Exames</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Agendamentos</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('agendamento_consulta') }}">Agendamentos de Consultas</a></li>
                    <li><a href="{{ route('agendamento_exames') }}">Agendamento de Exames</a></li>
                </ul>
            </li>
        </ul>

    </div>
</div>
