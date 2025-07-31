<x-layout>
    create page
    <form method="POST" action="/store">
        
        @csrf 

        <label for="title">Título</label>
        <input type="text" name="title" required>
        @error('title')
            <span>Preenchimento obrigatório</span>
        @enderror

        <label for="description">Descrição</label>
        <input type="text" name="description" required>
        @error('description')
            <span>Preenchimento obrigatório</span>
        @enderror

        <label for="category">Categoria</label>
        <input list="categories" type="" name="category" required>
        @error('category')
            <span>Erro em categoria</span>
        @enderror

        <datalist id="categories">
            <option value="TI" >
            <option value="Secretaria" >
            <option value="RH" >
        </datalist>

        <button type="submit">Abrir Novo Chamado</button>

    </form>
</x-layout>