@extends('layouts.app')

@section('title', 'Admin Control Center | LocalMind')

@section('content')
<div class="w-full max-w-6xl mx-auto space-y-8">

    <!-- 1. Admin Welcome Banner -->
    <div class="bg-gradient-to-r from-rose-900/50 to-red-900/50 rounded-3xl p-8 border border-rose-500/20 shadow-xl relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <span class="bg-rose-500/20 text-rose-300 border border-rose-500/30 text-xs font-black px-3 py-1 rounded-full uppercase tracking-widest">
                        <i class="fa-solid fa-shield-halved mr-1"></i> Administrator
                    </span>
                    <span class="text-zinc-400 text-xs uppercase tracking-widest">System Overview</span>
                </div>
                <h1 class="text-3xl font-black text-white italic tracking-tight">
                    Control Center
                </h1>
                <p class="text-rose-100/80 mt-2 text-sm">
                    Manage users, moderate content, and oversee the LocalMind ecosystem.
                </p>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="text-right hidden md:block">
                    <p class="text-white font-bold">{{ Auth::user()->name }}</p>
                    <p class="text-rose-400 text-xs">{{ Auth::user()->email }}</p>
                </div>
                <div class="h-12 w-12 bg-rose-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-rose-900/50">
                    <i class="fa-solid fa-user-shield text-xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Decorative Background -->
        <div class="absolute right-0 top-0 -mt-10 -mr-10 w-64 h-64 bg-rose-500/10 rounded-full blur-3xl"></div>
    </div>

    <!-- 2. Statistics Grid (Live Data Placeholders) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Stats: Users -->
        <div class="bg-zinc-900/50 border border-zinc-800 rounded-2xl p-6 relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <i class="fa-solid fa-users text-6xl text-blue-500"></i>
            </div>
            <p class="text-zinc-400 text-xs font-bold uppercase tracking-widest">Total Users</p>
            <h3 class="text-3xl font-black text-white mt-2">
                --
            </h3>
            <p class="text-emerald-400 text-xs mt-2 flex items-center gap-1">
                <i class="fa-solid fa-arrow-trend-up"></i> Active now
            </p>
        </div>

        <!-- Stats: Questions -->
        <div class="bg-zinc-900/50 border border-zinc-800 rounded-2xl p-6 relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <i class="fa-regular fa-comments text-6xl text-amber-500"></i>
            </div>
            <p class="text-zinc-400 text-xs font-bold uppercase tracking-widest">Questions</p>
            <h3 class="text-3xl font-black text-white mt-2">
                --
            </h3>
            <p class="text-zinc-500 text-xs mt-2">Total posted</p>
        </div>

        <!-- Stats: Responses -->
        <div class="bg-zinc-900/50 border border-zinc-800 rounded-2xl p-6 relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <i class="fa-solid fa-reply-all text-6xl text-purple-500"></i>
            </div>
            <p class="text-zinc-400 text-xs font-bold uppercase tracking-widest">Responses</p>
            <h3 class="text-3xl font-black text-white mt-2">
                --
            </h3>
            <p class="text-zinc-500 text-xs mt-2">Community engagement</p>
        </div>
    </div>

    <!-- 3. Management Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- User Management -->
        <a href="#" class="group bg-zinc-900/50 border border-zinc-800 rounded-2xl p-6 hover:border-rose-500/50 transition-all hover:bg-zinc-900/80">
            <div class="h-12 w-12 bg-zinc-800 rounded-xl flex items-center justify-center mb-4 group-hover:bg-rose-600 transition-colors">
                <i class="fa-solid fa-users-gear text-zinc-400 group-hover:text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Manage Users</h3>
            <p class="text-zinc-400 text-sm">View user list, ban abusive accounts, or promote members.</p>
        </a>

        <!-- Content Moderation -->
        <a href="#" class="group bg-zinc-900/50 border border-zinc-800 rounded-2xl p-6 hover:border-rose-500/50 transition-all hover:bg-zinc-900/80">
            <div class="h-12 w-12 bg-zinc-800 rounded-xl flex items-center justify-center mb-4 group-hover:bg-rose-600 transition-colors">
                <i class="fa-solid fa-list-check text-zinc-400 group-hover:text-white text-xl"></i>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">Moderate Content</h3>
            <p class="text-zinc-400 text-sm">Review reported questions and delete spam.</p>
        </a>
    </div>
</div>
@endsection