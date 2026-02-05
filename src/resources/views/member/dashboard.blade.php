@extends('layouts.app')

@section('title', 'Member Dashboard | LocalMind')

@section('content')

<div class="w-full max-w-5xl mx-auto space-y-8">

    <!-- 1. Welcome Banner -->
    <div class="bg-gradient-to-r from-indigo-900/50 to-violet-900/50 rounded-3xl p-8 border border-indigo-500/20 shadow-xl relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-white italic tracking-tight">
                    Welcome back, {{ Auth::user()->name }}!
                </h1>
                <p class="text-indigo-200 mt-2">
                    You are logged in as a <span class="uppercase font-bold text-emerald-400 bg-emerald-900/30 px-2 py-0.5 rounded text-xs">{{ Auth::user()->role }}</span>
                </p>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="text-zinc-400 text-sm">Member since {{ Auth::user()->created_at->format('M Y') }}</span>
                <div class="h-10 w-10 bg-indigo-500 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </div>
        </div>
        
        <!-- Decorative Background Circle -->
        <div class="absolute right-0 top-0 -mt-10 -mr-10 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl"></div>
    </div>

    <!-- 2. Action Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Card: Browse Questions -->
        <a href="/questions" class="group bg-zinc-900/50 border border-zinc-800 rounded-2xl p-6 hover:border-indigo-500/50 transition-all hover:bg-zinc-900/80">
            <div class="h-12 w-12 bg-zinc-800 rounded-xl flex items-center justify-center mb-4 group-hover:bg-indigo-600 transition-colors">
                <i class="fa-solid fa-compass text-zinc-400 group-hover:text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Explore Community</h3>
            <p class="text-zinc-400 text-sm">See what's happening around you. Filter by location and find answers.</p>
        </a>

        <!-- Card: Ask Question -->
        <a href="/questions/create" class="group bg-zinc-900/50 border border-zinc-800 rounded-2xl p-6 hover:border-emerald-500/50 transition-all hover:bg-zinc-900/80">
            <div class="h-12 w-12 bg-zinc-800 rounded-xl flex items-center justify-center mb-4 group-hover:bg-emerald-600 transition-colors">
                <i class="fa-solid fa-pen-to-square text-zinc-400 group-hover:text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Ask a Question</h3>
            <p class="text-zinc-400 text-sm">Need help? Post a new question to your local neighbors.</p>
        </a>
    </div>

    <!-- 3. Logout Section -->
    <div class="text-center pt-8 border-t border-zinc-800/50">
        <p class="text-zinc-500 text-sm mb-4">Finished for today?</p>
        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="inline-flex items-center gap-2 text-red-400 hover:text-red-300 font-bold transition-colors hover:bg-red-900/20 px-4 py-2 rounded-lg">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Sign Out Securely</span>
            </button>
        </form>
    </div>

</div>
@endsection