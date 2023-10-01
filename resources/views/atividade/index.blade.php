@extends('template.main', ['menu' => "admin", 'submenu' => "Atividades",  'rota'=>"atividade.create"])

@section('titulo') Desenvolvimento Web @endsection

@section('conteudo')

<div class="row">
    <div class="col">
        <table class="table align-middle caption-top table-striped">
            <caption>Tabela de <b>Atividades</b></caption>
            <thead>
            <tr>
                <th scope="col" class="d-none d-md-table-cell">ID</th>
                <th scope="col">NOME</th>
                <th scope="col" class="d-none d-md-table-cell">DESCRIÇÃO</th>
                <th scope="col">DATA</th>
                <th scope="col">FOTO</th>
                <th scope="col">AÇÕES</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td d-none d-md-table-cell>{{ $item->id }}</td>
                        <td>{{ $item->nome }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->descricao }}</td>
                        <td>{{ $item->data }}</td>
                        <td>
                            <a nohref style="cursor:pointer" onclick="showFotoModal('{{ asset('storage/') }}', '{{ $item->foto }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#198754" class="bi bi-camera" viewBox="0 0 16 16">
                                    <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                                    <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href= "{{ route('atividade.edit', $item->id) }}" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                                </svg>
                            </a>
                            <a nohref style="cursor:pointer" onclick="showRemoveModal('{{ $item->id }}', '{{ $item->nome }}')" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                </svg>
                            </a>
                        </td>
                        <form action="{{ route('atividade.destroy', $item->id) }}" method="POST" id="form_{{$item->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection