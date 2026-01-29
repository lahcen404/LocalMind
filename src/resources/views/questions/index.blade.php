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
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Ask Question</span>
            </a>
        @endauth
    </div>

    {{-- Questions List --}}
    <div class="space-y-4">

        @forelse ($questions as $question)
            <div class="bg-zinc-900/40 border border-zinc-800 rounded-2xl p-6 hover:border-zinc-700 transition-all group relative">

                {{-- Clickable Card --}}
                <a href="{{ route('questions.show', $question) }}"
                   class="absolute inset-0 rounded-2xl z-0"></a>

                <div class="flex items-start justify-between gap-4 relative z-10 pointer-events-none">

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

                        <h2 class="text-xl font-bold text-white group-hover:text-indigo-400 transition-colors pointer-events-auto">
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
                <div class="mt-6 pt-4 border-t border-zinc-800/50 flex flex-wrap items-center justify-between gap-4 relative z-10">

                    <div class="flex items-center gap-6">

                        {{-- Responses --}}
                        <div class="flex items-center gap-2 text-zinc-500">
                            <i class="fa-regular fa-comment text-sm"></i>
                            <span class="text-[10px] font-black uppercase tracking-widest">
                                {{ $question->responses->count() }} responses
                            </span>
                        </div>

                        {{-- Favorites --}}
                        @auth
                            <form action="{{ route('questions.favorite', $question) }}" method="POST" class="pointer-events-auto">
                                @csrf
                                <button type="submit"
                                    class="flex items-center gap-2 transition-colors
                                    {{ $question->isFavoritedBy(Auth::user()) ? 'text-rose-500' : 'text-zinc-500 hover:text-rose-400' }}">
                                    
                                    <i class="{{ $question->isFavoritedBy(Auth::user()) ? 'fa-solid' : 'fa-regular' }} fa-heart text-sm"></i>

                                    <span class="text-[10px] font-black uppercase tracking-widest">
                                        {{ $question->favoritedBy->count() }} saves
                                    </span>
                                </button>
                            </form>
                        @else
                            <div class="flex items-center gap-2 text-zinc-600">
                                <i class="fa-regular fa-heart text-sm"></i>
                                <span class="text-[10px] font-black uppercase tracking-widest">
                                    {{ $question->favoritedBy->count() }} saves
                                </span>
                            </div>
                        @endauth
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-3 pointer-events-auto">
                        @auth
                            @if (Auth::id() === $question->user_id)
                                <a href="{{ route('questions.edit', $question) }}"
                                   class="text-zinc-500 hover:text-indigo-400 transition-colors p-1"
                                   title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-sm"></i>
                                </a>
                            @endif

                            @if (Auth::id() === $question->user_id || Auth::user()->role === \App\Enums\UserRole::ADMIN)
                                <form action="{{ route('questions.destroy', $question) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this question?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-zinc-500 hover:text-rose-500 transition-colors p-1"
                                            title="Delete">
                                        <i class="fa-solid fa-trash-can text-sm"></i>
                                    </button>
                                </form>
                            @endif
                        @endauth

                        <div class="text-zinc-700 group-hover:text-indigo-500 transition-colors ml-2">
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <div class="text-center py-20 bg-zinc-900/20 rounded-3xl border-2 border-dashed border-zinc-800">
                <i class="fa-solid fa-comment-slash text-zinc-800 text-5xl mb-4"></i>
                <p class="text-zinc-500 italic uppercase tracking-widest text-xs font-bold">
                    No Question found !!!
                </p>
            </div>
        @endforelse

    </div>
</div>
@endsection
