@extends('layouts.app')

@section('title', 'Post a Question | LocalMind')

@section('content')
<div class="w-full max-w-2xl mx-auto">
    <!-- Breadcrumb / Back Link -->
    <div class="mb-6 flex items-center gap-2">
        <a href="{{ route('questions.index') }}" class="text-zinc-500 hover:text-indigo-400 text-xs font-bold uppercase tracking-widest transition-colors flex items-center gap-2">
            <i class="fa-solid fa-arrow-left text-[10px]"></i>
            Back to Feed
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-zinc-900/50 backdrop-blur-xl rounded-3xl border border-zinc-800 p-8 shadow-2xl relative overflow-hidden group">
        <!-- Subtle Glow Effect -->
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-indigo-500/5 rounded-full blur-3xl pointer-events-none group-hover:bg-indigo-500/10 transition-colors duration-700"></div>

        <div class="mb-10">
            <h1 class="text-2xl font-black text-white italic uppercase flex items-center gap-3 tracking-tighter">
                <i class="fa-solid fa-pen-to-square text-indigo-500"></i>
                Broadcast Inquiry
            </h1>
            <p class="text-zinc-500 text-xs mt-1 uppercase tracking-[0.2em] font-bold">Initiate Community intelligence request</p>
        </div>

        <form action="{{ route('questions.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Question Title -->
            <div class="space-y-2">
                <label class="block text-[10px] font-black text-zinc-400 uppercase tracking-widest ml-1">
                    Question Headline
                </label>
                <div class="relative">
                    <input type="text" name="title" required value="{{ old('title') }}"
                        placeholder="e.g., Where is the most reliable fiber internet in Sector 4?"
                        class="block w-full px-4 py-4 bg-zinc-800/30 border border-zinc-800 rounded-2xl text-zinc-200 placeholder-zinc-600 focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 outline-none transition-all shadow-inner">
                </div>
                @error('title') 
                    <p class="text-red-400 text-[10px] font-bold uppercase mt-1 ml-1 tracking-wider">{{ $message }}</p> 
                @enderror
            </div>

            <!-- Location Tag -->
            <div class="space-y-2">
                <label class="block text-[10px] font-black text-zinc-400 uppercase tracking-widest ml-1">
                    Target Location / District
                </label>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-zinc-600 group-focus-within:text-indigo-400 transition-colors">
                        <i class="fa-solid fa-location-dot text-xs"></i>
                    </span>
                    <input type="text" name="location" required value="{{ old('location') }}"
                        placeholder="e.g., Downtown, Manhattan"
                        class="block w-full pl-10 pr-4 py-4 bg-zinc-800/30 border border-zinc-800 rounded-2xl text-zinc-200 placeholder-zinc-600 focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 outline-none transition-all shadow-inner">
                </div>
                @error('location') 
                    <p class="text-red-400 text-[10px] font-bold uppercase mt-1 ml-1 tracking-wider">{{ $message }}</p> 
                @enderror
            </div>

            <!-- Content Details -->
            <div class="space-y-2">
                <label class="block text-[10px] font-black text-zinc-400 uppercase tracking-widest ml-1">
                    Details & Context
                </label>
                <textarea name="content" rows="6" required
                    placeholder="Provide specific details to help the community provide accurate intel..."
                    class="block w-full px-4 py-4 bg-zinc-800/30 border border-zinc-800 rounded-2xl text-zinc-200 placeholder-zinc-600 focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 outline-none transition-all shadow-inner resize-none leading-relaxed text-sm">{{ old('content') }}</textarea>
                @error('content') 
                    <p class="text-red-400 text-[10px] font-bold uppercase mt-1 ml-1 tracking-wider">{{ $message }}</p> 
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-black py-4 rounded-2xl shadow-xl shadow-indigo-900/20 transition-all active:scale-[0.98] uppercase tracking-[0.2em] text-xs flex items-center justify-center gap-3 group">
                    <span>Broadcast to Network</span>
                    <i class="fa-solid fa-paper-plane text-[10px] group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                </button>
                <p class="text-center text-zinc-600 text-[10px] mt-4 uppercase font-bold tracking-widest">
                    Your inquiry will be visible to all verified members.
                </p>
            </div>
        </form>
    </div>
</div>
@endsection