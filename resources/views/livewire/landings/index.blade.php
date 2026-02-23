<div>
    <style>
        body {
            background: linear-gradient(135deg, rgba(13, 79, 93, 0.75) 0%, rgba(20, 140, 148, 0.7) 50%, rgba(13, 79, 93, 0.75) 100%),
                url({{ asset('images/backgroud_maps.jpg') }});
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
            overflow-x: hidden;
        }

        /* Subtle animated overlay - more transparent to show map */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 30% 50%, rgba(20, 184, 166, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 70% 50%, rgba(6, 182, 212, 0.08) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
            animation: gradientShift 20s ease infinite;
        }

        @keyframes gradientShift {

            0%,
            100% {
                opacity: 0.4;
            }

            50% {
                opacity: 0.7;
            }
        }

        /* Perfect Hexagon */
        .hexagon {
            clip-path: polygon(30% 0%, 70% 0%, 100% 50%, 70% 100%, 30% 100%, 0% 50%);
            position: relative;
        }

        /* Honeycomb Container - Clean Grid Layout */
        .honeycomb-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 30px;
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
            justify-items: center;
            align-items: center;
        }

        @media (max-width: 768px) {
            .honeycomb-grid {
                grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
                gap: 20px;
                padding: 30px 15px;
            }
        }

        @media (max-width: 480px) {
            .honeycomb-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
        }

        /* Hexagon Item */
        .hex-item {
            width: 160px;
            height: 180px;
            position: relative;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .hex-item {
                width: 130px;
                height: 145px;
            }
        }

        @media (max-width: 480px) {
            .hex-item {
                width: 110px;
                height: 125px;
            }
        }

        /* Hexagon Content - Back to cyan/teal colors */
        .hex-content {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(13, 79, 93, 0.6);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(20, 184, 166, 0.4);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            color: white;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 20px;
        }

        /* Hover Glow Effect - Cyan */
        .hex-content::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(20, 184, 166, 0.5) 0%, transparent 70%);
            transform: translate(-50%, -50%);
            transition: all 0.6s ease;
            z-index: 0;
        }

        .hex-item:hover .hex-content::before {
            width: 250%;
            height: 250%;
        }

        .hex-item:hover .hex-content {
            background: rgba(20, 184, 166, 0.7);
            border-color: rgba(20, 184, 166, 1);
            box-shadow:
                0 0 30px rgba(20, 184, 166, 0.7),
                inset 0 0 30px rgba(20, 184, 166, 0.3);
            transform: scale(1.08) translateY(-5px);
        }

        .hex-item:hover .hex-icon {
            transform: scale(1.2) rotate(360deg);
            color: #fff;
            filter: drop-shadow(0 0 10px rgba(20, 184, 166, 1));
        }

        /* Icon */
        .hex-icon {
            font-size: 3rem;
            margin-bottom: 12px;
            color: rgba(255, 255, 255, 0.9);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 1;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.5));
        }

        @media (max-width: 768px) {
            .hex-icon {
                font-size: 2.5rem;
                margin-bottom: 8px;
            }
        }

        @media (max-width: 480px) {
            .hex-icon {
                font-size: 2rem;
                margin-bottom: 6px;
            }
        }

        /* Text */
        .hex-title {
            font-size: 0.8rem;
            font-weight: 600;
            text-align: center;
            line-height: 1.3;
            position: relative;
            z-index: 1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.7);
            word-wrap: break-word;
            max-width: 90%;
        }

        @media (max-width: 768px) {
            .hex-title {
                font-size: 0.7rem;
            }
        }

        @media (max-width: 480px) {
            .hex-title {
                font-size: 0.6rem;
                letter-spacing: 0.3px;
            }
        }

        /* Fade In Animation */
        .fade-in {
            animation: fadeInUp 0.8s ease-in forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Staggered Animation */
        .hex-item:nth-child(1) {
            animation-delay: 0.05s;
        }

        .hex-item:nth-child(2) {
            animation-delay: 0.1s;
        }

        .hex-item:nth-child(3) {
            animation-delay: 0.15s;
        }

        .hex-item:nth-child(4) {
            animation-delay: 0.2s;
        }

        .hex-item:nth-child(5) {
            animation-delay: 0.25s;
        }

        .hex-item:nth-child(6) {
            animation-delay: 0.3s;
        }

        .hex-item:nth-child(7) {
            animation-delay: 0.35s;
        }

        .hex-item:nth-child(8) {
            animation-delay: 0.4s;
        }

        .hex-item:nth-child(9) {
            animation-delay: 0.45s;
        }

        .hex-item:nth-child(10) {
            animation-delay: 0.5s;
        }

        .hex-item:nth-child(11) {
            animation-delay: 0.55s;
        }

        .hex-item:nth-child(12) {
            animation-delay: 0.6s;
        }

        .hex-item:nth-child(13) {
            animation-delay: 0.65s;
        }

        .hex-item:nth-child(14) {
            animation-delay: 0.7s;
        }

        .hex-item:nth-child(15) {
            animation-delay: 0.75s;
        }

        .hex-item:nth-child(16) {
            animation-delay: 0.8s;
        }

        .hex-item:nth-child(17) {
            animation-delay: 0.85s;
        }

        .hex-item:nth-child(18) {
            animation-delay: 0.9s;
        }

        .hex-item:nth-child(19) {
            animation-delay: 0.95s;
        }

        .hex-item:nth-child(20) {
            animation-delay: 1s;
        }

        .hex-item:nth-child(21) {
            animation-delay: 1.05s;
        }

        /* Search Bar */
        .search-container {
            transition: all 0.3s ease;
        }

        .search-container:focus-within {
            transform: scale(1.02);
        }

        /* Category Pills - Cyan colors */
        .category-pill {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-pill:hover {
            transform: translateY(-2px);
            background: rgba(20, 184, 166, 0.3);
        }

        .category-pill.active {
            background: linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%);
            box-shadow: 0 4px 12px rgba(20, 184, 166, 0.5);
            border-color: rgba(20, 184, 166, 0.8);
        }

        /* Scrollbar - Cyan */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(13, 79, 93, 0.5);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(20, 184, 166, 0.6);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(20, 184, 166, 0.8);
        }

        /* Pulse Animation */
        .pulse-dot {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.7;
                transform: scale(1.15);
            }
        }

        /* Header Glass Effect */
        .glass-header {
            background: rgba(13, 79, 93, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(20, 184, 166, 0.2);
        }

        /* Footer Glass Effect */
        .glass-footer {
            background: rgba(13, 79, 93, 0.85);
            backdrop-filter: blur(20px);
            border-top: 1px solid rgba(20, 184, 166, 0.2);
        }

        /* Logo color - Cyan */
        .logo-icon {
            color: #14b8a6;
        }

        .logo-icon:hover {
            color: #0ea5e9;
        }

        /* Status indicators */
        .status-online {
            color: #10b981;
        }

        .status-count {
            color: #14b8a6;
        }
    </style>


    <header class="glass-header sticky top-0 z-50 w-full">
        <nav class="container mx-auto px-4 py-4 md:px-6">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="#" class="group flex items-center gap-3">
                    <div class="relative">
                        <i class="bi bi-hexagon-fill logo-icon text-4xl transition-colors duration-300"></i>
                        <div class="pulse-dot absolute -right-1 -top-1 h-3 w-3 rounded-full bg-green-400"></div>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold tracking-wide md:text-xl">MKM APPLICATION PORTAL</h1>
                        <p class="-mt-1 text-xs text-white/70">PT Mitsubishi Krama Yudha Motors & Manufacturing</p>
                    </div>
                </a>

                <!-- User Info & Help -->
                <div class="flex items-center gap-4">
                    <div
                        class="hidden items-center gap-2 rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm backdrop-blur-md md:flex">
                        <i class="bi bi-person-circle text-cyan-300"></i>
                        <span class="text-white/80">Welcome, User</span>
                    </div>
                    <div class="relative">
                        <button id="help-button"
                            class="flex h-10 w-10 items-center justify-center rounded-full text-white/80 transition-all duration-300 hover:bg-white/10 hover:text-white">
                            <i class="bi bi-question-circle-fill text-2xl"></i>
                        </button>
                        <div id="help-popover"
                            class="absolute right-0 z-50 mt-3 hidden w-72 -translate-y-2 transform rounded-xl border border-cyan-400/30 bg-[#0d4f5d]/95 p-5 text-sm opacity-0 shadow-2xl backdrop-blur-md transition-all duration-300">
                            <div class="mb-3 flex items-start gap-3">
                                <i class="bi bi-info-circle-fill text-xl text-cyan-300"></i>
                                <div>
                                    <h3 class="mb-1 text-base font-semibold">Help Center</h3>
                                    <p class="text-xs leading-relaxed text-white/80">Welcome to MKM Application Portal.
                                        Click on any application icon to access it.</p>
                                </div>
                            </div>
                            <div class="mt-4 border-t border-white/10 pt-4">
                                <p class="text-xs text-white/70">💡 Use the search bar to find applications quickly</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="relative z-10 flex-grow px-4 py-8 md:py-12">
        <div class="container mx-auto max-w-7xl">

            <!-- Welcome Section -->
            <div class="mb-8 text-center md:mb-10">
                <div class="mb-4 inline-block">
                    <div class="flex items-center gap-3">
                        <i class="bi bi-hexagon text-2xl text-cyan-300"></i>
                        <i class="bi bi-hexagon-fill text-3xl text-cyan-400"></i>
                        <i class="bi bi-hexagon text-2xl text-cyan-300"></i>
                    </div>
                </div>
                <h2
                    class="mb-3 bg-gradient-to-r from-cyan-300 via-teal-300 to-cyan-300 bg-clip-text text-3xl font-bold text-transparent md:text-5xl">
                    Application Hub
                </h2>
                <p class="mx-auto mb-4 max-w-2xl text-sm text-white/70 md:text-base">
                    Access all internal applications and systems from one central location
                </p>
                <div class="flex items-center justify-center gap-6 text-sm">
                    <div class="flex items-center gap-2">
                        <div class="h-2 w-2 animate-pulse rounded-full bg-green-400"></div>
                        <span class="text-white/60">All Systems Online</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="bi bi-hexagon-fill text-xs text-cyan-400"></i>
                        <span class="text-white/60" id="app-count">21 Applications</span>
                    </div>
                </div>
            </div>

            <!-- Search & Filter -->
            <div class="mb-10">
                <!-- Search Bar -->
                <div class="search-container mx-auto mb-6 max-w-2xl px-4">
                    <div class="relative">
                        <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-lg text-white/50"></i>
                        <input type="text" id="search-input"
                            placeholder="Search applications... (e.g., audit, energy, monitoring)"
                            class="w-full rounded-xl border border-cyan-400/20 bg-white/10 py-4 pl-12 pr-12 text-white placeholder-white/50 backdrop-blur-md transition-all duration-300 focus:border-cyan-400/50 focus:outline-none focus:ring-2 focus:ring-cyan-400/50" />
                        <button id="clear-search"
                            class="absolute right-4 top-1/2 hidden -translate-y-1/2 text-white/50 transition-colors hover:text-white">
                            <i class="bi bi-x-circle-fill text-lg"></i>
                        </button>
                    </div>
                </div>

                <!-- CATEGORY -->
                <div class="mb-10 flex flex-wrap justify-center gap-3">
                    <button class="category-pill active rounded-full bg-white/10 px-4 py-2"
                        data-category="all">All</button>
                    <button class="category-pill rounded-full bg-white/10 px-4 py-2"
                        data-category="production">Production</button>
                    <button class="category-pill rounded-full bg-white/10 px-4 py-2"
                        data-category="monitoring">Monitoring</button>
                    <button class="category-pill rounded-full bg-white/10 px-4 py-2"
                        data-category="quality">Quality</button>
                    <button class="category-pill rounded-full bg-white/10 px-4 py-2"
                        data-category="management">Management</button>
                    <button class="category-pill rounded-full bg-white/10 px-4 py-2"
                        data-category="other">Others</button>
                </div>

                <!-- Honeycomb Grid -->
                <div class="honeycomb-grid">
                    @foreach ($menus as $menu)
                        <div class="hex-item fade-in" data-category="{{ $menu->category }}"
                            data-name="{{ $menu->title }}" data-keywords="{{ $menu->keywords }}">

                            <a href="{{ $menu->url }}" target="_blank" class="hex-content hexagon">
                                <i class="{{ $menu->icon }} hex-icon"></i>
                                <span class="hex-title">{{ $menu->title }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- No Results -->
                <div id="no-results" class="hidden py-16 text-center">
                    <i class="bi bi-search mb-4 text-6xl text-white/20"></i>
                    <h3 class="mb-2 text-xl font-semibold">No Applications Found</h3>
                    <p class="text-white/60">Try different keywords or select another category</p>
                </div>

            </div>
    </main>

    <!-- Footer -->
    <footer class="glass-footer relative z-10 px-6 py-6">
        <div class="container mx-auto">
            <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                <div class="text-center md:text-left">
                    <p class="flex items-center justify-center gap-2 text-sm text-white/70 md:justify-start">
                        <i class="bi bi-hexagon-fill text-xs text-cyan-400"></i>
                        &copy; {{ now()->year }} PT Mitsubishi Krama Yudha Motors and Manufacturing
                    </p>
                    <p class="mt-1 text-xs text-white/50">Digitalization Team • Portal Version 2.0</p>
                </div>
            </div>
        </div>
    </footer>
</div>
