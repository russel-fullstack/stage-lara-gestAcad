@extends('layouts.app')
@section('title', 'Niveaux')
@section('actions')
    <a href="{{ route('academic.levels.create') }}"
       class="inline-flex items-center gap-1.5 px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Nouveau niveau
    </a>
@endsection
@section('content')

    <x-page-header title="Niveaux" subtitle="Niveaux d'études par filière et spécialité." />

    <div class="flex gap-3 mb-4">
        <select class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
            <option>Toutes les filières</option>
            @foreach($programs as $program)
                <option>{{ $program->libelle }}</option>
            @endforeach
        </select>
        <select class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
            <option>Toutes les spécialités</option>
            @foreach($specialties as $specialty)
                <option>{{ $specialty->libelle }}</option>
            @endforeach
        </select>
    </div>

    <div class="bg-white border border-gray-200 rounded-md overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-50">
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Code</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Libellé</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Filière</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Spécialité</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Ordre</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Semestres</th>
                    <th class="text-right px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @forelse($levels as $level)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-mono text-xs text-gray-500">{{ $level->code }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $level->libelle }}</td>
                    <td class="px-4 py-3 text-gray-600"> {{ $level->program->libelle  }}</td>
                    <td class="px-4 py-3">
                        @if($level->specialty->libelle)
                            <x-bagde color="purple">{{ $level->specialty->libelle }}</x-bagde>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-gray-600">{{ $level->ordre }}</td>
                    <td class="px-4 py-3 text-gray-600"></td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('academic.levels.edit', $level) }}"
                               class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">Modifier</a>
                            <form action="{{ route('academic.levels.destroy', $level) }}" method="post">
                                @method('DELETE')
                                <x-confirm-delete></x-confirm-delete>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <td colspan="7">
                    <x-empty-field action-url="{{ route('academic.levels.create') }}" action-label="Ajouter un niveau"/>
                </td>
            @endforelse
            </tbody>
        </table>
        <div class="my-5 flex justify-center items-center">
            {{ $levels->links() }}
        </div>
    </div>

@endsection
