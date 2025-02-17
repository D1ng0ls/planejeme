<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Criar Nova Tarefa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-100">
                <form action="{{ route('tarefas.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="titulo" class="block text-sm font-medium">Título</label>
                        <input type="text" id="titulo" name="titulo" class="mt-1 block w-full p-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100" required>
                    </div>

                    <div class="mb-4">
                        <label for="descricao" class="block text-sm font-medium">Descrição</label>
                        <textarea id="descricao" name="descricao" class="mt-1 block w-full p-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="prazo" class="block text-sm font-medium">Prazo</label>
                        <input type="date" id="prazo" name="prazo" class="mt-1 block w-full p-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                    </div>

                    <div class="mb-4">
                        <label for="responsavel_id" class="block text-sm font-medium">Responsável (por e-mail)</label>
                        <input type="email" id="responsavel_id" name="responsavel_id" class="mt-1 block w-full p-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100" placeholder="Digite o e-mail do responsável">
                        @error('responsavel_id')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status_id" class="block text-sm font-medium">Status</label>
                        <select id="status_id" name="status_id" class="mt-1 block w-full p-2 bg-gray-700 border border-gray-600 rounded-md text-gray-100">
                            @foreach ($status as $statu)
                                <option value="{{ $statu->id}}">{{ $statu->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 px-4 py-2 rounded-md">Criar Tarefa</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
