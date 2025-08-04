<x-layout>
    <form class="text-sm mt-5 " method="POST" action="/store">
        
        @if($errors->any())
            <x-error/>
        @endif
        
        @csrf

        <div class="mb-5">

            <x-label for="title">Título</x-label>
            <input id="title"
                class="bg-white border-1 border-gray-400 ml-2 pl-1 rounded-sm focus:border-2 focus:border-blue-500 outline-none w-60 h-7"
                type="text" name="title" 
                placeholder="título do chamado">
            
            
            <x-label for="category">Categoria</x-label>
            <select
                class="bg-white border-1 border-gray-400 ml-2 pl-1 rounded-sm focus:border-2 focus:border-blue-500 outline-none w-60 h-7"
                name="category" id="category">
                @foreach ($categories as $category)
                    <option value={{ $category->name }}>{{ $category->name }}</option>
                @endforeach
            </select>
            

        </div>

        <div>
            <x-label for="description">Descrição</x-label>
            <textarea
                class="block bg-white border-1 border-gray-400 rounded-sm focus:border-2 focus:border-blue-500 outline-none h-30 w-156"
                id="description" 
                type="text" 
                name="description" 
                ></textarea>
            
        </div>

        <x-button type="submit">Abrir Novo Chamado</x-button>
           
    </form>
    <a href="/">
        <x-cancel-button>Cancelar</x-cancel-button>
    </a>
</x-layout>
