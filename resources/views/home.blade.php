<x-layout>
    <style>
        td {
            overflow: hidden;
            max-width: 15rem;
        }
    </style>
    Sistema de chamados da galera
    <a href="/create">Criar novo chamado</a>
    @if ($percentage === 0) 
        {{ $message }}
    @else
        <div>
            Percentual de chamados atendidos no mês {{ $percentage }}%
        </div>
    @endif
    <table>
        <tr>
            <th>Titulo </th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Prazo de Solução</th>
            <th>Situação</th>
            <th>Data de criação</th>
            <th>Data de resolução</th>
            <th>Atender</th>
        </tr>
        @foreach($chamados as $chamado) 
            <tr>
                <td>{{ $chamado->title}}</td>
                <td>{{ $chamado->category()->first()->name}}</td>
                <td>{{ $chamado->description}}</td>
                <td>{{ $chamado->limit}}</td>
                <td>{{ $chamado->status()->first()->name}}</td>
                <td>{{ $chamado->created_at }}</td>
                <td>{{ $chamado->resolved }}</td>
                <td>
                    <a href="/show/{{$chamado->id}}">
                        <button>Atender</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

</x-layout>