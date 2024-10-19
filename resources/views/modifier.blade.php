<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier Tâche') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{route('modifier',$task)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="titre" class="block text-sm font-medium text-gray-700">Titre</label>
                        <input type="text" name="titre" id="titre" value="{{ old('titre', $task->titre) }}" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <div class="mb-4">
                        <label for="contenu" class="block text-sm font-medium text-gray-700">Contenu</label>
                        <textarea name="contenu" id="contenu" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">{{ old('contenu', $task->contenu) }}</textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-warning">Modifier Tâche</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
