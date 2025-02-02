<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Cadastros</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('atendimento_create') }}"> Paciente </a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Listas</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('atendimento_index') }}">Listar Pacientes</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Marcações</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="#">Consulta</a></li>
                    <li><a href="#">Exame</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Agendamentos</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('atendimento_consuta') }}">Agendamentos de Consultas</a></li>
                    <li><a href="{{ route('atendimento_exame') }}">Agendamento de Exames</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
