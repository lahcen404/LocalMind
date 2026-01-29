@extends('layouts.app')

@section('title', $question->title)

@section('content')
<div class="w-full max-w-4xl mx-auto space-y-10">

    {{-- 1. ALERT MESSAGES --}}
    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/50 p-4 rounded-2xl flex items-center gap-3 animate-in fade-in slide-in-from-top-4 duration-500">
            <i class="fa-solid fa-circle-check text-emerald-500"></i>
            <p class="text-emerald-200 text-xs font-black uppercase tracking-widest">
                {{ session('success') }}
            </p>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500/10 border border-red-500/50 p-4 rounded-2xl flex items-center gap-3">
            <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
            <p class="text-red-200 text-xs font-black uppercase tracking-widest">
                {{ session('error') }}
            </p>
        </div>
    @endif

    {{-- 2. MAIN QUESTION --}}
    <article class="bg-zinc-900/60 border border-zinc-800 rounded-3xl p-8 shadow-2xl relative overflow-hidden group">
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-indigo-500/5 rounded-full blur-3xl"></div>

        <div class="flex items-center gap-3 mb-6 relative z-10">
            <span class="bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">
                <i class="fa-solid fa-location-dot mr-1"></i>
                {{ $question->location }}
            </span>

            <span class="text-zinc-500 text-[10px] font-bold uppercase tracking-widest">
                Identified {{ $question->created_at->diffForHumans() }}
            </span>
        </div>

        <h1 class="text-3xl md:text-4xl font-black text-white italic tracking-tight mb-8 leading-tight relative z-10">
            {{ $question->title }}
        </h1>

        <div class="text-zinc-300 text-lg leading-relaxed mb-10 pb-10 border-b border-zinc-800/50 relative z-10">
            {{ $question->content }}
        </div>

        <div class="flex items-center justify-between relative z-10">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-lg">
                    {{ substr($question->user->name, 0, 1) }}
                </div>
                <div>
                    <p class="text-white font-bold">{{ $question->user->name }}</p>
                    <p class="text-zinc-500 text-[10px] uppercase tracking-widest font-black mt-1">
                        Community Source
                    </p>
                </div>
            </div>

            <div class="text-zinc-600 text-[10px] font-black uppercase tracking-[0.2em] hidden sm:block">
                Reference: LM-{{ str_pad($question->id, 5, '0', STR_PAD_LEFT) }}
            </div>
        </div>
    </article>

    {{-- 3. RESPONSES --}}
    <div class="space-y-6">
        <div class="flex items-center gap-3 border-b border-zinc-800 pb-4">
            <i class="fa-solid fa-comments text-emerald-500"></i>
            <h3 class="text-white font-black italic uppercase tracking-widest">
                Community Intelligence ({{ $question->responses->count() }})
            </h3>
        </div>

        <div class="grid gap-4">
            @forelse($question->responses as $response)
                <div class="bg-zinc-900/30 border border-zinc-800/50 rounded-2xl p-6 hover:border-zinc-700 transition-all">
                    <div class="flex gap-5">
                        <div class="w-10 h-10 bg-zinc-800 rounded-xl flex items-center justify-center text-zinc-500 font-bold border border-zinc-700">
                            {{ substr($response->user->name, 0, 1) }}
                        </div>

                        <div class="flex-grow">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-white font-bold text-sm">
                                    {{ $response->user->name }}
                                </span>
                                <span class="text-zinc-600 text-[10px] uppercase font-bold">
                                    {{ $response->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <p class="text-zinc-400 text-sm leading-relaxed">
                                {{ $response->content }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16 bg-zinc-900/10 rounded-3xl border-2 border-dashed border-zinc-800">
                    <p class="text-zinc-600 italic text-sm">
                        No intelligence received yet. Be the first to assist.
                    </p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- 4. RESPONSE FORM --}}
    @auth
        <div class="bg-zinc-950/80 rounded-3xl p-8 border border-emerald-500/20 shadow-2xl">
            <h4 class="text-white font-black uppercase text-xs tracking-[0.2em] mb-4">
                <i class="fa-solid fa-reply text-emerald-500"></i>
                Contribute Information
            </h4>

            <form action="{{ route('responses.store', $question) }}" method="POST" class="space-y-4">
                @csrf

                <textarea
                    name="content"
                    rows="4"
                    required
                    placeholder="Provide detailed intelligence for this inquiry..."
                    class="w-full px-5 py-5 bg-zinc-900 border border-zinc-800 rounded-2xl text-zinc-200 focus:ring-2 focus:ring-emerald-500/30 outline-none text-sm"
                ></textarea>

                <div class="flex items-center justify-between">
                    <p class="text-zinc-600 text-[10px] uppercase font-bold">
                        Verified as: {{ Auth::user()->name }}
                    </p>

                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-black px-8 py-3 rounded-xl uppercase tracking-widest text-xs">
                        Broadcast Response
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="bg-zinc-900/40 rounded-3xl p-8 border border-zinc-800 text-center">
            <p class="text-zinc-500 text-sm">
                Identity verification required.
                <a href="{{ route('login') }}" class="text-indigo-400 font-bold hover:underline ml-1">
                    Login
                </a>
            </p>
        </div>
    @endauth

</div>
@endsection
