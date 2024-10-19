<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="mb-4">
                <a href="{{route('ajouter')}}" class="btn btn-info">Ajouter Tâche</a>
            </div>
            <div>
                <style>
                    .custom-table {
                        width: 100%;
                        border-collapse: collapse;
                        margin: 20px 0;
                        font-size: 1.1em;
                        text-align: left;
                    }
                    .custom-table th, .custom-table td {
                        padding: 12px;
                        border: 1px solid #ddd;
                    }
                    .custom-table th {
                        background-color: #007BFF;
                        color: white;
                        font-weight: bold;
                    }
                    .custom-table tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }
                    .custom-table tr:hover {
                        background-color: #f1f1f1;
                    }
                    .btn-custom {
                        padding: 6px 12px;
                        font-size: 0.9em;
                        border-radius: 4px;
                        text-decoration: none;
                    }
                    .btn-warning {
                        background-color: #ffc107;
                        color: black;
                    }
                    .btn-danger {
                        background-color: #dc3545;
                        color: white;
                    }
                </style>

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Action Modifier</th>
                            <th>Action Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (auth()->user()->tasks->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    Pas de Tâches encore. <a href="" class="text-primary">Créer une tâche ?</a>
                                </td>
                            </tr>
                        @else
                            @foreach (auth()->user()->tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->titre }}</td>
                                    <td>{{ $task->contenu }}</td>
                                    <td><a href="{{route('modifier',$task)}}" class="btn-custom btn-warning">Modifier</a></td>
                                    <td><a href="{{route('supprimer',$task)}}" class="btn-custom btn-danger">Supprimer</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
