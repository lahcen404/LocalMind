<nav class="fixed top-0 left-0 w-full z-50 bg-zinc-950/50 backdrop-blur-md border-b border-zinc-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-2 group">
                <div class="transform group-hover:rotate-12 transition-transform duration-300">
                    <i class="fa-solid fa-brain text-indigo-500 text-2xl"></i>
                </div>
                <span class="text-white font-black tracking-tighter uppercase italic">LocalMind</span>
            </a>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <!-- Public Link -->
                <a href="/questions" class="text-zinc-400 hover:text-white text-sm font-medium transition-colors">Browse</a>
                
                
                @auth
                    @if(Auth::user()->role === \App\Enums\UserRole::ADMIN)
                        
                        <a href="{{ route('admin.dashboard') }}" class="text-rose-400 hover:text-rose-300 text-sm font-bold transition-colors">Admin Panel</a>
                    @else
                        
                        <a href="{{ route('dashboard') }}" class="text-zinc-400 hover:text-white text-sm font-medium transition-colors">Dashboard</a>
                        <a href="{{ route('favorites.index') }}" class="text-zinc-400 hover:text-white text-sm font-medium transition-colors">Favorites                                                   </a>
                    @endif
                @endauth
            </div>

            <!-- as a guest -->
            <div class="flex items-center space-x-4">
                
                @guest
                    
                    <a href="{{ route('login') }}" class="text-zinc-400 hover:text-white text-sm font-medium transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg text-sm font-bold transition-all shadow-lg shadow-indigo-500/20 hover:scale-105">
                        Join
                    </a>
                @endguest

                @auth
                    
                    <div class="flex items-center gap-4">
                        
                        <!-- Profile Link -->
                        <a href="{{ Auth::user()->role === \App\Enums\UserRole::ADMIN ? route('admin.dashboard') : route('dashboard') }}" class="flex items-center gap-2 group">
                            <div class="w-8 h-8 {{ Auth::user()->role === \App\Enums\UserRole::ADMIN ? 'bg-rose-500/20 border-rose-500/30 text-rose-400' : 'bg-indigo-500/20 border-indigo-500/30 text-indigo-400' }} rounded-full flex items-center justify-center font-bold border group-hover:border-opacity-100 transition-colors">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="hidden sm:inline text-zinc-300 group-hover:text-white text-sm font-medium transition-colors">
                                {{ Auth::user()->name }}
                            </span>
                        </a>

                        <!-- Divider -->
                        <div class="h-4 w-px bg-zinc-800"></div>

                        <!-- Secure Logout Button -->
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-zinc-500 hover:text-red-400 transition-colors p-2 rounded-full hover:bg-red-500/10" title="Sign Out">
                                <i class="fa-solid fa-power-off"></i>
                            </button>
                        </form>
                    </div>
                @endauth

            </div>
        </div>
    </div>
</nav>