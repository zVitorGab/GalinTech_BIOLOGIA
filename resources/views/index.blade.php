@extends('template.main', ['menu' => "Projeto Multidisciplinar: ", "submenu" => "Principal"])

@section('titulo') Desenvolvimento Web @endsection

@section('conteudo')
<div class="row">
    <div class="col">
        <div class="card text-center border-success card-bg-success">
            <div class="card-header text-white" style="background-color: #198754;">
              Eixos
            </div>
            <div class="card-body">
                <a href="{{route('eixo.index')}}" class="dropdown-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="#198754" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-center border-success card-bg-success">
            <div class="card-header text-white" style="background-color: #198754;">
              Cursos
            </div>
            <div class="card-body">
                <a href="{{route('curso.index')}}" class="dropdown-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="#198754" class="bi bi-hr" viewBox="0 0 16 16">
                        <path d="M12 3H4a1 1 0 0 0-1 1v2.5H2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2.5h-1V4a1 1 0 0 0-1-1zM2 9.5h1V12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V9.5h1V12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.5zm-1.5-2a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-center border-success card-bg-success">
            <div class="card-header text-white" style="background-color: #198754;">
              Disciplinas
            </div>
            <div class="card-body">
                <a href="{{route('disciplina.index')}}" class="dropdown-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="#198754" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-center border-success card-bg-success">
            <div class="card-header text-white" style="background-color: #198754;">
              Professores
            </div>
            <div class="card-body">
                <a href="{{route('professor.index')}}" class="dropdown-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="#198754" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-center border-success card-bg-success">
            <div class="card-header text-white" style="background-color: #198754;">
              Alunos
            </div>
            <div class="card-body">
                <a href="{{route('aluno.index')}}" class="dropdown-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="#198754" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card text-center border-success card-bg-success">
            <div class="card-header text-white" style="background-color: #198754;">
              Professor-Disciplina
            </div>
            <div class="card-body">
                <a href="{{route('professor.vinculo')}}" class="dropdown-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="#198754" class="bi bi-box-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection