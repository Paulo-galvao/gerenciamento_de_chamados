<x-layout>
    Chamado: <br />
    <span>Titulo: {{ $chamado->title }}</span>
    <form method="POST" action="/update/{{$chamado->id}}">
        @csrf
        @method('PATCH')
        <label for="status">Situação: </label>
        <input list="statuses" type="text" name="status" required>
        <datalist id="statuses">
            <option value="Pendente">
            <option value="Resolvido">
        </datalist>
        <button type="submit">Salvar alterações</button>
    </form>
    <form method="POST" action="/destroy/{{$chamado->id}}">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir chamado</button>
    </form>
</x-layout>
