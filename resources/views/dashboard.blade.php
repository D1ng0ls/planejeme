<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('PlanejeMe!') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex space-x-4 overflow-x-auto pb-4" id="kanban-container">
            <div class="min-w-[300px] overflow-hidden sm:rounded-lg text-gray-100 kanban-column" id="1">
                <h2 class="text-lg bg-gray-800 font-semibold p-4 pb-2 text-danger d-flex flex-row justify-content-between">
                    A fazer 
                    <i class="bi bi-list-check"></i>
                </h2>

                <div class="tarefas-container bg-gray-800 p-4">
                    @foreach ($tarefasPorStatus['a_fazer'] as $tarefa)
                        <div class="bg-gray-700 p-4 rounded-lg mb-4 tarefa" data-id="{{ $tarefa->id }}">
                            <h3 class="font-semibold">{{ $tarefa->titulo }}</h3>
                            <p class="text-truncate">{{ $tarefa->descricao }}</p>
                            <p class="text-sm text-gray-400">Prazo: {{ \Carbon\Carbon::parse($tarefa->prazo)->format('d/m/Y') }}</p>
                            <p class="text-sm text-gray-400">Autor: {{ $tarefa->usuario->nome}}</p>
                            @if ($tarefa->responsavel->nome != $tarefa->usuario->nome)
                                <p class="text-sm text-gray-400">Responsável: {{ $tarefa->responsavel->nome}}</p>
                            @endif
                            <div class="actions pt-4 d-flex flex-row justify-content-evenly">
                                <a href="edit?id={{ $tarefa->id }}" class="btn btn-primary" title="Editar tarefa"><i class="bi bi-pencil"></i></a>
                                <a href="{{ route('tarefas.destroy', $tarefa->id) }}" class="btn btn-danger" title="Excluir tarefa"><i class="bi bi-trash"></i></a>
                                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode($tarefa->titulo) }}&details={{ urlencode($tarefa->descricao) }}&dates={{ \Carbon\Carbon::parse($tarefa->prazo)->format('Ymd') }}T090000Z/{{ \Carbon\Carbon::parse($tarefa->prazo)->format('Ymd') }}T100000Z" target="blank_" class="btn btn-warning" title="Adicionar no Google Calendar"><i class="bi bi-calendar-plus"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="bg-gray-800 p-4 pt-0 rounded-bottom-3">
                    <a href="/create" class="btn btn-danger w-100">
                        <i class="bi bi-plus-lg"></i> Adicionar tarefa
                    </a>
                </div>
            </div>

            <div class="min-w-[300px] overflow-hidden sm:rounded-lg text-gray-100 kanban-column" id="2">
                <h2 class="text-lg bg-gray-800 font-semibold p-4 pb-2 text-primary d-flex flex-row justify-content-between">
                    Em progresso 
                    <i class="bi bi-hourglass"></i>
                </h2>
                <div class="tarefas-container bg-gray-800 p-4">
                    @foreach ($tarefasPorStatus['em_progresso'] as $tarefa)
                        <div class="bg-gray-700 p-4 rounded-lg mb-4 tarefa" data-id="{{ $tarefa->id }}">
                            <h3 class="font-semibold">{{ $tarefa->titulo }}</h3>
                            <p class="text-truncate">{{ $tarefa->descricao }}</p>
                            <p class="text-sm text-gray-400">Prazo: {{ \Carbon\Carbon::parse($tarefa->prazo)->format('d/m/Y') }}</p>
                            <p class="text-sm text-gray-400">Autor: {{ $tarefa->usuario->nome}}</p>
                            @if ($tarefa->responsavel->nome != $tarefa->usuario->nome)
                                <p class="text-sm text-gray-400">Responsável: {{ $tarefa->responsavel->nome}}</p>
                            @endif
                            <div class="actions pt-4 d-flex flex-row justify-content-evenly">
                                <a href="edit?id={{ $tarefa->id }}" class="btn btn-primary" title="Editar tarefa"><i class="bi bi-pencil"></i></a>
                                <a href="{{ route('tarefas.destroy', $tarefa->id) }}" class="btn btn-danger" title="Excluir tarefa"><i class="bi bi-trash"></i></a>
                                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode($tarefa->titulo) }}&details={{ urlencode($tarefa->descricao) }}&dates={{ \Carbon\Carbon::parse($tarefa->prazo)->format('Ymd') }}T090000Z/{{ \Carbon\Carbon::parse($tarefa->prazo)->format('Ymd') }}T100000Z" target="blank_" class="btn btn-warning" title="Adicionar no Google Calendar"><i class="bi bi-calendar-plus"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="bg-gray-800 p-4 pt-0 rounded-bottom-3">
                    <a href="/create" class="btn btn-primary w-100">
                        <i class="bi bi-plus-lg"></i> Adicionar tarefa
                    </a>
                </div>
            </div>

            <div class="min-w-[300px] overflow-hidden sm:rounded-lg text-gray-100 kanban-column" id="3">
                <h2 class="text-lg bg-gray-800 font-semibold p-4 pb-2 text-success d-flex flex-row justify-content-between">
                    Concluídas 
                    <i class="bi bi-check-circle"></i>
                </h2>
                <div class="tarefas-container bg-gray-800 p-4">
                    @foreach ($tarefasPorStatus['concluidas'] as $tarefa)
                        <div class="bg-gray-700 p-4 rounded-lg mb-4 tarefa" data-id="{{ $tarefa->id }}">
                            <h3 class="font-semibold">{{ $tarefa->titulo }}</h3>
                            <p>{{ $tarefa->descricao }}</p>
                            <p class="text-sm text-gray-400">Prazo: {{ \Carbon\Carbon::parse($tarefa->prazo)->format('d/m/Y') }}</p>
                            <p class="text-sm text-gray-400">Autor: {{ $tarefa->usuario->nome}}</p>
                            @if ($tarefa->responsavel->nome != $tarefa->usuario->nome)
                                <p class="text-sm text-gray-400">Responsável: {{ $tarefa->responsavel->nome}}</p>
                            @endif
                            <div class="actions pt-4 d-flex flex-row justify-content-evenly">
                                <a href="edit?id={{ $tarefa->id }}" class="btn btn-primary" title="Editar tarefa"><i class="bi bi-pencil"></i></a>
                                <a href="{{ route('tarefas.destroy', $tarefa->id) }}" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');" class="btn btn-danger" title="Excluir tarefa"><i class="bi bi-trash"></i></a>
                                <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode($tarefa->titulo) }}&details={{ urlencode($tarefa->descricao) }}&dates={{ \Carbon\Carbon::parse($tarefa->prazo)->format('Ymd') }}T090000Z/{{ \Carbon\Carbon::parse($tarefa->prazo)->format('Ymd') }}T100000Z" target="blank_" class="btn btn-warning" title="Adicionar no Google Calendar"><i class="bi bi-calendar-plus"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="bg-gray-800 p-4 pt-0 rounded-bottom-3">
                    <a href="/create" class="btn btn-success w-100">
                        <i class="bi bi-plus-lg"></i> Adicionar tarefa
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
            document.addEventListener('DOMContentLoaded', function() {
            const tarefasContainers = document.querySelectorAll('.tarefas-container');

            tarefasContainers.forEach(function(container) {
                new Sortable(container, {
                    group: 'kanban',
                    animation: 150,
                    handle: '.tarefa',
                    onEnd: function(evt) {
                        const tarefaId = evt.item.getAttribute('data-id');
                        
                        const novaColuna = evt.to.closest('.kanban-column').getAttribute('id');

                        updateTarefaStatus(tarefaId, novaColuna);
                    }
                });
            });

            function updateTarefaStatus(tarefaId, novaColuna) {
                fetch('/tarefas/' + tarefaId + '/status', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ status_id: novaColuna })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Status da tarefa atualizado com sucesso!');
                    } else {
                        console.log('Erro ao atualizar status');
                    }
                });
            }
        });

    </script>
</x-app-layout>
