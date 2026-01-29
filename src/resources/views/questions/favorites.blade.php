@extends('layouts.app')

@section('title', 'My Favorites | LocalMind')

@section('content')
<div class="w-full max-w-4xl mx-auto space-y-10 animate-in fade-in duration-500">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black text-white italic tracking-tighter uppercase flex items-center gap-3">
                <i class="fa-solid fa-heart text-rose-500"></i>
                Saved Intelligence
            </h1>
            <p class="text-zinc-500 text-sm tracking-widest uppercase mt-1">
                Your curated collection of community inquiries
            </p>
        </div>

        <a href="{{ route('questions.index') }}"
           class="text-zinc-400 hover:text-white text-xs font-bold uppercase tracking-widest transition-colors flex items-center gap-2 group">
            <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            Back to Feed
        </a>
    </div>

    {{-- Questions List --}}
    <div class="space-y-4">

        @forelse($questions as $question)
            <div class="bg-zinc-900/40 border border-zinc-800 rounded-2xl p-6 hover:border-rose-500/30 transition-all group relative">

                {{-- Clickable Card --}}
                <a href="{{ route('questions.show', $question) }}"
                   class="absolute inset-0 z-0 rounded-2xl"></a>

                <div class="flex items-start justify-between gap-4 relative z-10 pointer-events-none">

                    {{-- Question Content --}}
                    <div class="flex-grow">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-[10px] font-black text-rose-400 bg-rose-500/10 px-2 py-0.5 rounded border border-rose-500/20 uppercase tracking-widest">
                                <i class="fa-solid fa-location-dot mr-1 text-[10px]"></i>
                                {{ $question->location }}
                            </span>

                            <span class="text-zinc-600 text-[10px] uppercase font-bold tracking-widest">
                                Saved {{ $question->pivot->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <h2 class="text-xl font-bold text-white group-hover:text-rose-400 transition-colors pointer-events-auto">
                            {{ $question->title }}
                        </h2>

                        <p class="text-zinc-400 mt-3 line-clamp-2 text-sm leading-relaxed">
                            {{ $question->content }}
                        </p>
                    </div>

                    {{-- Original Author --}}
                    <div class="flex flex-col items-center flex-shrink-0">
                        <div class="w-10 h-10 bg-zinc-800 rounded-xl flex items-center justify-center text-zinc-500 font-bold border border-zinc-700 mb-1 group-hover:border-rose-500/50 transition-colors">
                            {{ substr($question->user->name, 0, 1) }}
                        </div>
                        <span class="text-[10px] text-zinc-600 font-bold uppercase tracking-tighter">
                            {{ $question->user->name }}
                        </span>
                    </div>
                </div>

                {{-- Card Footer --}}
                <div class="mt-6 pt-4 border-t border-zinc-800/50 flex items-center justify-between relative z-10">

                    <div class="flex items-center gap-6">

                        {{-- Responses --}}
                        <div class="flex items-center gap-2 text-zinc-500">
                            <i class="fa-regular fa-comment text-sm"></i>
                            <span class="text-[10px] font-black uppercase tracking-widest">
                                {{ $question->responses->count() }} responses
                            </span>
                        </div>

                        {{-- Remove Favorite --}}
                        <form action="{{ route('questions.favorite', $question) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-2 text-rose-500 hover:text-rose-400 transition-colors pointer-events-auto group">
                                <i class="fa-solid fa-heart text-sm group-hover:scale-110 transition-transform"></i>
                                <span class="text-[10px] font-black uppercase tracking-widest">
                                    Remove from saved
                                </span>
                            </button>
                        </form>
                    </div>

                    {{-- Arrow --}}
                    <div class="text-zinc-700 group-hover:text-rose-500 transition-colors">
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </div>
                </div>
            </div>

        @empty
            <div class="text-center py-24 bg-zinc-900/20 rounded-3xl border-2 border-dashed border-zinc-800">
                <i class="fa-regular fa-heart text-zinc-800 text-5xl mb-4 opacity-50"></i>
                <p class="text-zinc-500 italic uppercase tracking-widest text-xs font-bold">
                    No intelligence saved yet.
                </p>
                <a href="{{ route('questions.index') }}"
                   class="mt-6 inline-block bg-zinc-800 hover:bg-zinc-700 text-white px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-widest transition-all">
                    Browse Feed
                </a>
            </div>
        @endforelse

    </div>
</div>
@endsection
