@extends('layouts.app')
@section('title', 'Join LocalMind')
@section('content')

<div class="flex flex-col items-center justify-center min-h-[70vh]">
    <div class="max-w-md w-full bg-zinc-900/50 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-zinc-800 transition-all hover:border-emerald-500/30">    
    <div class="bg-gradient-to-br from-emerald-600 to-teal-800 p-8 text-center relative overflow-hidden">
        <!-- Decorative Blur -->
        <div class="absolute top-0 left-0 -ml-10 -mt-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
        
        <!-- Icon -->
        <div class="relative z-10 inline-flex items-center justify-center w-16 h-16 bg-zinc-950 rounded-2xl mb-4 shadow-2xl -rotate-3 transform hover:rotate-0 transition-transform duration-500">
            <i class="fa-solid fa-user-plus text-emerald-400 text-2xl"></i>
        </div>
        <h1 class="relative z-10 text-2xl font-black text-white uppercase tracking-tighter italic">Join LocalMind</h1>
        <p class="relative z-10 text-emerald-100 text-xs font-medium tracking-widest uppercase opacity-80 mt-1">Initialize New Identity</p>
    </div>

    <!-- Form Section -->
    <div class="p-8">
        <form action="{{ route('register.submit') }}" method="POST" class="space-y-5">
            @csrf 

            <!-- Full Name -->
            <div>
                <label for="name" class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2 ml-1">Full Name</label>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-zinc-500 group-focus-within:text-emerald-400 transition-colors">
                        <i class="fa-regular fa-user"></i>
                    </span>
                    <input type="text" id="name" name="name" required 
                        placeholder="Amine Doe"
                        class="block w-full pl-12 pr-4 py-3 bg-zinc-800/50 border border-zinc-700 rounded-xl text-zinc-200 placeholder-zinc-600 focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all outline-none">
                </div>
            </div>

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-zinc-500 group-focus-within:text-emerald-400 transition-colors">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <input type="email" id="email" name="email" required 
                        placeholder="amine@example.com"
                        class="block w-full pl-12 pr-4 py-3 bg-zinc-800/50 border border-zinc-700 rounded-xl text-zinc-200 placeholder-zinc-600 focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all outline-none">
                </div>
            </div>

            <!-- Password Row -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-bold text-zinc-400 uppercase tracking-widest mb-2 ml-1">Password</label>
                    <input type="password" id="password" name="password" required 
                        placeholder="••••••••"
                        class="block w-full px-4 py-3 bg-zinc-800/50 border border-zinc-700 rounded-xl text-zinc-200 placeholder-zinc-600 focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all outline-none text-sm">
                </div>
               
            </div>

            <!-- Terms Checkbox -->
            <div class="flex items-center ml-1">
                <input type="checkbox" id="terms" name="terms" required 
                    class="h-4 w-4 text-emerald-600 focus:ring-emerald-500/50 border-zinc-700 bg-zinc-800 rounded appearance-none border checked:bg-emerald-600 checked:border-transparent relative after:content-['✓'] after:absolute after:hidden checked:after:block after:text-white after:text-xs after:left-0.5">
                <label for="terms" class="ml-3 block text-xs text-zinc-400 cursor-pointer hover:text-zinc-300 transition-colors">
                    I agree to the <a href="#" class="text-emerald-400 underline decoration-emerald-400/30">Terms of Service</a>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-black py-4 px-6 rounded-xl shadow-lg shadow-emerald-900/20 transition-all active:scale-[0.97] flex items-center justify-center space-x-3 group">
                <span class="uppercase tracking-widest text-sm">Initialize Account</span>
                <i class="fa-solid fa-arrow-right-to-bracket text-xs group-hover:translate-x-1 transition-transform"></i>
            </button>
        </form>

        <!-- Login Link -->
        <div class="mt-8 pt-6 border-t border-zinc-800/50 text-center">
            <p class="text-sm text-zinc-500">
                Already a member? 
                <a href="/login" class="text-indigo-400 hover:text-indigo-300 font-bold ml-1 transition-colors underline decoration-indigo-400/30 underline-offset-4">Access Login</a>
            </p>
        </div>
    </div>
</div>
</div>
@endsection