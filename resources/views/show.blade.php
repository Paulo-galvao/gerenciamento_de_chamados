<x-layout>
    
    <form method="POST" action="/update/{{$chamado->id}}">
        @csrf
        @method('PATCH')
        <span>Titulo: {{ $chamado->title }}</span>
        <span>Categoria: {{ $chamado->category()->first()->name }}</span>
        <span>Prazo de Solução: {{ $chamado->limit->format('d/m/Y H:i') }}</span>
        
        <label for="status">Situação: </label>
        <select name="status" id="status">
            @foreach ($statuses as $status)
                @if ($status->name !== 'Novo')
                    <option value={{$status->name}}>{{$status->name}}</option>
                @endif
            @endforeach
        </select>
        <x-button type="submit">Salvar alterações</x-button>
    </form>
    <form method="POST" action="/destroy/{{$chamado->id}}">
        @csrf
        @method('DELETE')
        <button 
            class="w-41 text-sm pl-4 py-2 cursor-pointer border-2 border-red-900 bg-red-700 text-white rounded-md hover:bg-red-600 duration-300 inline-flex items-center gap-2" 
            type="submit">
            <i class='bx  bx-alert-triangle'  ></i> 
            Excluir chamado
        </button>
    </form>
</x-layout>
