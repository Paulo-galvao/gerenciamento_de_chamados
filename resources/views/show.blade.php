<x-layout>

    <form class="text-sm " method="POST" action="/update/{{ $chamado->id }}">
        @csrf
        @method('PATCH')

        <ul class="flex justify-between my-5">

            <li>
                <div>Titulo: </div>
                <x-item>{{ $chamado->title }}</x-item>
            </li>
            <li>
                <div>Categoria: </div>
                
                <x-item>{{ $chamado->category()->first()->name }}</x-item>
            </li>
            <li>
                <div>Prazo de Solução: </div>
                <x-item>{{ $chamado->limit->format('d/m/Y H:i') }}</x-item>
            </li>

        </ul>

        <ul class="flex gap-28 mb-5">
            
            <li>
                <div>Data de Criação:</div>
                
                <x-item>{{ $chamado->created_at->format('d/m/Y H:i') }}</x-item>
            </li>
            @if ($chamado->resolved === '')
                <li>
                    Data de Resolução: 
                    <x-item>Não resolvido</x-item>
                </li>
            @else
                <li>
                    Data de Resolução: 
                    <x-item>{{ \Carbon\Carbon::parse($chamado->data_criacao)->format('d/m/Y H:i') }}</x-item>
                </li>
            @endif
        </ul>
        
        <div>
            <div>Descrição: </div>
                <textarea disabled class="mb-5 bg-white border-1 border-gray-400 pl-1 rounded-sm h-20 w-full">{{ $chamado->description }}</textarea>
            
        </div>

        <label for="status">Situação: </label>
        <select class="flex items-center bg-white border-1 border-gray-400 pl-1 rounded-sm w-60 h-7" name="status" id="status">
            @foreach ($statuses as $status)
                @if ($status->name !== 'Novo')
                    <option value={{ $status->name }}>{{ $status->name }}</option>
                @endif
            @endforeach
        </select>
        <x-button type="submit">Salvar alterações</x-button>

        <x-cancel-button>Cancelar</x-cancel-button>
    </form>

    <form class="relative " method="POST" action="/destroy/{{ $chamado->id }}">
        @csrf
        @method('DELETE')
        <button
            class="absolute right-1 bottom-15 w-47 text-sm pl-4 py-2 cursor-pointer border-2 border-red-900 bg-red-700 text-white rounded-md hover:bg-red-600 duration-300 inline-flex items-center gap-2"
            type="submit">
            <i class='bx  bx-alert-triangle'></i>
            Excluir chamado
        </button>
    </form>
</x-layout>
