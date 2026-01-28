@extends('layouts.app')
@section('title', 'Login | LocalMind')
@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-6rem)] w-full">
    <div class="w-full max-w-md">
    <!-- Login Card -->
    <div class="bg-zinc-900/50 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-zinc-800 transition-all hover:border-indigo-500/30">    <!-- Header Section -->
    <div class="bg-gradient-to-br from-indigo-600 to-violet-700 p-8 text-center relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-10 -mt-10 w-32 h-32 bg-white/10 rounded-full blur-2xl font-black italic"></div>
        
        <div class="relative z-10 inline-flex items-center justify-center w-16 h-16 bg-zinc-950 rounded-2xl mb-4 shadow-2xl rotate-3 transform hover:rotate-0 transition-transform duration-500">
            <i class="fa-solid fa-key text-indigo-400 text-2xl"></i>
        </div>
        <h1 class="relative z-10 text-2xl font-black text-white uppercase tracking-tighter italic">LocalMind</h1>
        <p class="relative z-10 text-indigo-100 text-xs font-medium tracking-widest uppercase opacity-80 mt-1">Authorized Access Only</p>
    </div>

    <!-- Form Section -->
    <div class="p-8">
        <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">            <!-- CSRF protection -->
            @csrf 

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-zinc-500 group-focus-within:text-indigo-400 transition-colors">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input type="email" id="email" name="email" required 
                        placeholder="your@email.com"
                        class="block w-full pl-12 pr-4 py-3.5 bg-zinc-800/50 border border-zinc-700 rounded-xl text-zinc-200 placeholder-zinc-600 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all outline-none">
                </div>
            </div>

            <!-- Password Input -->
            <div>
                <div class="flex justify-between items-center mb-2 ml-1">
                    <label for="password" class="block text-xs font-bold text-zinc-400 uppercase tracking-widest">Password</label>
                    <a href="#" class="text-xs text-indigo-400 hover:text-indigo-300 transition-colors">Recover?</a>
                </div>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-zinc-500 group-focus-within:text-indigo-400 transition-colors">
                        <i class="fa-solid fa-shield-halved"></i>
                    </span>
                    <input type="password" id="password" name="password" required 
                        placeholder="••••••••••••"
                        class="block w-full pl-12 pr-4 py-3.5 bg-zinc-800/50 border border-zinc-700 rounded-xl text-zinc-200 placeholder-zinc-600 focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all outline-none">
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center ml-1">
                <input type="checkbox" id="remember" name="remember" 
                    class="h-5 w-5 text-indigo-600 focus:ring-indigo-500/50 border-zinc-700 bg-zinc-800 rounded-md cursor-pointer appearance-none border checked:bg-indigo-600 checked:border-transparent transition-all relative after:content-['✓'] after:absolute after:hidden checked:after:block after:text-white after:text-xs after:left-1">
                <label for="remember" class="ml-3 block text-sm text-zinc-400 cursor-pointer hover:text-zinc-300 transition-colors">
                    Remember this device
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-black py-4 px-6 rounded-xl shadow-lg shadow-indigo-900/20 transition-all active:scale-[0.97] flex items-center justify-center space-x-3 group">
                <span class="uppercase tracking-widest text-sm">Sign In</span>
                <i class="fa-solid fa-chevron-right text-xs group-hover:translate-x-1 transition-transform"></i>
            </button>
        </form>

        <!-- Social/Register Links -->
        <div class="mt-8 pt-6 border-t border-zinc-800/50 text-center">
            <p class="text-sm text-zinc-500">
                New here? 
                <a href="/register" class="text-emerald-400 hover:text-emerald-300 font-bold ml-1 transition-colors underline decoration-emerald-400/30 underline-offset-4">Create Account</a>
            </p>
        </div>
    </div>
</div>
</div>

@endsection