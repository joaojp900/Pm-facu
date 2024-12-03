@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-black">Lista de Aulas</h1>

    <div class="mb-4">
        <a href="{{ route('aulas.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
            Criar Nova Aula
        </a>
    </div>
    <br>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-gray-800 rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-700 text-gray-300">
                    <th class="py-3 px-4 text-center">ID do Curso</th>
                    <th class="py-3 px-4 text-center">Titulo da Aula</th>
                    <th class="py-3 px-4 text-center">URL da Aula</th>
                    <th class="py-3 px-4 text-center">Ordem</th>
                    <th class="py-3 px-4 text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aulas as $aula)
                <tr class="border-t border-gray-700 hover:bg-gray-600">
                    <td class="py-3 px-4 text-white">{{ $aula->curso_id}}</td>
                    <td class="py-3 px-4 text-white"> {{$aula->titulo }}</td>
                    <td class="py-3 px-4 text-white"> {{$aula->conteudo }}</td>
                    <td class="py-3 px-4 text-white"> {{$aula->order }}</td>
                    <td class="py-3 px-4">
                        <div class="flex items-center space-x-2">
                            
                            <a href="{{ route('aulas.edit', ['aula' => $aula->id]) }}" class="bg-blue-400 hover:bg-blue-500 text-white text-sm font-medium py-1 px-3 rounded">
                                Editar Aula
                            </a>
                            <form action="{{ route('aulas.destroy', ['aula' => $aula->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium py-1 px-3 rounded">
                                    Excluir
                                </button>
                            </form>
                         
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
