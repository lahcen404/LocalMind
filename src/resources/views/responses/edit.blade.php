@extends('layouts.app')

@section('title', 'Edit Response | LocalMind')

@section('content')
<div class="w-full max-w-2xl mx-auto space-y-6">

    {{-- Navigation --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('questions.show', $response->question_id) }}"
           class="text-zinc-500 hover:text-white text-xs font-black uppercase tracking-widest transition-colors flex items-center gap-2">
            <i class="fa-solid fa-arrow-left text-[10px]"></i>
            Return to Question
        </a>

        
    </div>

    {{-- Edit Card --}}
    <div class="bg-zinc-900/60 border border-zinc-800 rounded-3xl p-8 shadow-2xl relative overflow-hidden group">

        {{-- Glow --}}
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 bg-emerald-500/5 rounded-full blur-3xl pointer-events-none group-hover:bg-emerald-500/10 transition-colors duration-700"></div>

        {{-- Header --}}
        <div class="mb-8 relative z-10">
            <h1 class="text-2xl font-black text-white italic uppercase flex items-center gap-3 tracking-tighter">
                <i class="fa-solid fa-pen text-emerald-500"></i>
                Update Question
            </h1>
           
        </div>

        {{-- Form --}}
        <form action="{{ route('responses.update', $response) }}" method="POST" class="space-y-6 relative z-10">
            @csrf
            @method('PUT')

            {{-- Inquiry Context --}}
            <div class="bg-zinc-950/50 border border-zinc-800/50 rounded-2xl p-4">
                <p class="text-[10px] font-black text-zinc-600 uppercase tracking-widest mb-1">
                    Question Context
                </p>
                <p class="text-zinc-400 text-sm italic line-clamp-1">
                    "{{ $response->question->title }}"
                </p>
            </div>

            {{-- Content --}}
            <div class="space-y-2">
                <label class="block text-[10px] font-black text-zinc-400 uppercase tracking-widest ml-1">
                    Your Response Content
                </label>

                <textarea
                    name="content"
                    rows="8"
                    required
                    placeholder="Update your assistance details..."
                    class="block w-full px-5 py-5 bg-zinc-800/30 border border-zinc-800 rounded-2xl text-zinc-200 placeholder-zinc-700 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 outline-none transition-all shadow-inner resize-none leading-relaxed text-sm"
                >{{ old('content', $response->content) }}</textarea>

                @error('content')
                    <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1 tracking-wider">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row items-center gap-4 pt-4">
                <button
                    type="submit"
                    class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-500 text-white font-black px-10 py-4 rounded-2xl shadow-xl shadow-emerald-900/20 transition-all active:scale-[0.98] uppercase tracking-[0.2em] text-xs flex items-center justify-center gap-3 group"
                >
                    <span>Sync Changes</span>
                    <i class="fa-solid fa-rotate text-[10px] group-hover:rotate-180 transition-transform duration-500"></i>
                </button>

                <a href="{{ route('questions.show', $response->question_id) }}"
                   class="text-zinc-600 hover:text-white text-xs font-black uppercase tracking-widest transition-colors py-4 px-6">
                    Discard Edits
                </a>
            </div>
        </form>
    </div>

    

</div>
@endsection
