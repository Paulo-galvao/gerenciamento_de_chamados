<x-layout>

    <style>
        td {
            overflow: hidden;
            max-width: 15rem;
            padding-right: 20px;
            padding-left: 10px;
            border: 2px solid #d1d5dc;
        }

        th {
            min-width: 100px;
            text-align: start;
            padding-left: 10px;
            border: 2px solid #d1d5dc;
        }
    </style>

    <div>
        
        <div class="flex items-center justify-between">
            <a href="/create">
                <x-button>Cadastrar novo chamado</x-button>
            </a>
            <div class="mb-2">
                @if ($percentage === 0)
                    <div>{{ $message }}</div>
                @else
                    <div class="flex items-center gap-2">
                        <i class='bx  bx-target'></i>
                        Percentual de chamados atendidos no mês {{ $percentage }}%
                    </div>
                @endif
            </div>
        </div>

        <table class="bg-white text-sm max-w-5xl ">
            <tr class="h-10 ">
                <th>Titulo </th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Prazo de Solução</th>
                <th>Situação</th>
                <th>Data de criação</th>
                <th>Data de resolução</th>
                <th>Ação</th>
            </tr>
            @foreach ($chamados as $chamado)
                <tr class="h-10 ">
                    <td>{{ $chamado->title }}</td>
                    <td>{{ $chamado->category()->first()->name }}</td>
                    <td>{{ $chamado->description }}</td>
                    <td>{{ $chamado->limit->format('d/m/Y H:i') }}</td>
                    <td>{{ $chamado->status()->first()->name }}</td>
                    <td>{{ $chamado->created_at->format('d/m/Y H:i') }}</td>
                    @if ($chamado->resolved === '')
                        <td>{{ $chamado->resolved }} </td>
                    @else
                        <td>{{ \Carbon\Carbon::parse($chamado->data_criacao)->format('d/m/Y H:i') }}</td>
                    @endif
                    <td>
                        <a href="/show/{{ $chamado->id }}">
                            <button
                                class="flex items-center gap-1 cursor-pointer py-1 px-2 rounded-sm bg-blue-500 text-white hover:bg-blue-400 duration-200">
                                <i class='bx  bx-edit'></i>
                                Atender
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <script>
        const rows = document.querySelectorAll('tr');
        rows.forEach((row) => {
            if (row.rowIndex > 0 && (row.rowIndex % 2 === 0)) {
                row.classList.add('bg-gray-200');
            }
        });
    </script>

</x-layout>
