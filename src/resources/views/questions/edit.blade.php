@extends('layouts.app')

@section('title', 'Edit Inquiry | LocalMind')

@section('content')
    <div class="w-full max-w-2xl mx-auto">
        <div class="bg-zinc-900/60 border border-zinc-800 rounded-3xl p-8 shadow-2xl">
            
            <h1 class="text-2xl font-black text-white italic uppercase mb-8">
                Edit Broadcast
            </h1>

            <form action="{{ route('questions.update', $question) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Location --}}
                <div>
                    <label class="block text-zinc-500 text-[10px] font-black uppercase tracking-widest mb-2">
                        Location Context
                    </label>
                    <input
                        type="text"
                        name="location"
                        value="{{ old('location', $question->location) }}"
                        required
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:border-indigo-500 outline-none transition-all"
                    >
                </div>

                {{-- Title --}}
                <div>
                    <label class="block text-zinc-500 text-[10px] font-black uppercase tracking-widest mb-2">
                        Inquiry Title
                    </label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $question->title) }}"
                        required
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:border-indigo-500 outline-none transition-all"
                    >
                </div>

                {{-- Content --}}
                <div>
                    <label class="block text-zinc-500 text-[10px] font-black uppercase tracking-widest mb-2">
                        Detailed Content
                    </label>
                    <textarea
                        name="content"
                        rows="6"
                        required
                        class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:border-indigo-500 outline-none transition-all"
                    >{{ old('content', $question->content) }}</textarea>
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-4 pt-4">
                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-500 text-white font-black px-8 py-3 rounded-xl transition-all uppercase tracking-widest text-xs"
                    >
                        Update Broadcast
                    </button>

                    <a
                        href="{{ route('questions.show', $question) }}"
                        class="text-zinc-500 hover:text-white text-xs font-black uppercase tracking-widest"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
