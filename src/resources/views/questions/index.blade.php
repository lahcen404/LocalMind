@extends('layouts.app')

@section('title', 'Community Feed | LocalMind')

@section('content')
<div class="w-full max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-black text-white italic tracking-tighter uppercase">
                Community Feed
            </h1>
            <p class="text-zinc-500 text-sm tracking-widest uppercase mt-1">
                Local Intelligence Exchange
            </p>
        </div>

        @auth
            <a href="{{ route('questions.create') }}"
               class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg shadow-indigo-900/40 flex items-center justify-center gap-2">
                <i class="fa-solid fa-plus"></i>
                <span>Ask Question</span>
            </a>
        @endauth
    </div>

    {{-- Questions List --}}
    <div class="space-y-4">

        @forelse($questions as $question)
            <a href="{{ route('questions.show', $question) }}"
               class="block bg-zinc-900/40 border border-zinc-800 rounded-2xl p-6 hover:border-zinc-600 transition-all group">

                <div class="flex items-start justify-between gap-4">

                    {{-- Question Content --}}
                    <div class="flex-grow">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-[10px] font-black text-indigo-400 bg-indigo-500/10 px-2 py-0.5 rounded border border-indigo-500/20 uppercase tracking-widest">
                                <i class="fa-solid fa-location-dot mr-1 text-[10px]"></i>
                                {{ $question->location }}
                            </span>

                            <span class="text-zinc-600 text-[10px] uppercase font-bold tracking-widest">
                                {{ $question->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <h2 class="text-xl font-bold text-white group-hover:text-indigo-400 transition-colors">
                            {{ $question->title }}
                        </h2>

                        <p class="text-zinc-400 mt-3 line-clamp-2 text-sm leading-relaxed">
                            {{ $question->content }}
                        </p>
                    </div>

                    {{-- User --}}
                    <div class="flex flex-col items-center flex-shrink-0">
                        <div class="w-10 h-10 bg-zinc-800 rounded-xl flex items-center justify-center text-zinc-500 font-bold border border-zinc-700 mb-1 group-hover:border-indigo-500/50 transition-colors">
                            {{ substr($question->user->name, 0, 1) }}
                        </div>

                        <span class="text-[10px] text-zinc-600 font-bold uppercase tracking-tighter">
                            {{ $question->user->name }}
                        </span>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="mt-4 pt-4 border-t border-zinc-800/50 flex items-center gap-4">
                    <div class="flex items-center gap-1.5 text-zinc-500 text-xs">
                        <i class="fa-regular fa-comment"></i>
                        <span>{{ $question->responses->count() }} responses</span>
                    </div>
                </div>
            </a>

        @empty
            <div class="text-center py-20 bg-zinc-900/20 rounded-3xl border-2 border-dashed border-zinc-800">
                <i class="fa-solid fa-comment-slash text-zinc-800 text-5xl mb-4"></i>
                <p class="text-zinc-500 italic">
                    No questions found. Be the first to ask!
                </p>
            </div>
        @endforelse

    </div>
</div>
@endsection
