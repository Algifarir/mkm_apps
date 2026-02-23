<div x-data="{ openModal: false }" x-on:open-modal.window="openModal = true">

    {{-- HEADER --}}
    <header
        class="sticky top-0 z-40 flex items-center justify-between border-b border-slate-100 bg-white/70 px-6 py-4 backdrop-blur-xl">
        <div class="flex items-center gap-3">
            <a href="{{ route('home.index') }}" wire:navigate
                class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600 shadow-sm transition-all hover:bg-slate-200">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <div>
                <h1 class="text-lg font-extrabold leading-none text-slate-800">Master Menu</h1>
                <p class="mt-1 text-[9px] font-bold uppercase tracking-widest text-slate-400">
                    Manajemen Menu Aplikasi
                </p>
            </div>
        </div>

        <button wire:click="create" @click="openModal = true"
            class="bg-app-gradient rounded-xl px-5 py-2.5 font-bold text-white transition-all duration-300 hover:shadow-lg hover:shadow-slate-900/20 active:scale-95">
            <svg class="mr-1 inline-block h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Add Menu
        </button>
    </header>

    {{-- CONTENT --}}
    <main class="mx-auto max-w-6xl px-6 py-8">
        <div class="glass-card overflow-hidden rounded-[2rem] shadow-xl shadow-slate-200">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-slate-100 bg-slate-50">
                            <th class="px-6 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-600">
                                Title
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-600">
                                Category
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-600">
                                Order
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-600">
                                Status
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-600">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse ($menus as $menu)
                            <tr class="transition-colors hover:bg-slate-50/50">
                                <td class="px-6 py-4 text-sm font-semibold text-slate-800">
                                    <div class="flex items-center gap-3">
                                        <i class="{{ $menu->icon }} text-lg text-slate-500"></i>
                                        {{ $menu->title }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-600">
                                    <span
                                        class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">
                                        {{ $menu->category }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-600">
                                    {{ $menu->sort_order }}
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    @if ($menu->is_active)
                                        <span
                                            class="inline-flex rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-600">
                                            Active
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex rounded-full bg-red-50 px-3 py-1 text-xs font-bold text-red-600">
                                            Off
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <button wire:click="edit({{ $menu->id }})"
                                            class="inline-flex items-center rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-bold text-slate-600 transition-all hover:bg-slate-600 hover:text-white">
                                            Edit
                                        </button>

                                        <button wire:click="delete({{ $menu->id }})" wire:confirm="Delete this menu?"
                                            class="inline-flex items-center rounded-lg bg-red-50 px-3 py-1.5 text-xs font-bold text-red-600 transition-all hover:bg-red-600 hover:text-white">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <p class="text-sm font-bold text-slate-400">
                                        No menu found
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    {{-- MODAL --}}
    <div x-cloak x-show="openModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 p-4 backdrop-blur-sm">

        <div @click.away="openModal = false" class="glass-card w-full max-w-lg rounded-[2rem] p-8 shadow-2xl">

            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-xl font-extrabold text-slate-800">
                    {{ $menuId ? 'Edit Menu' : 'Add Menu' }}
                </h3>
                <button @click="openModal = false" class="text-slate-400 hover:text-slate-600">
                    ✕
                </button>
            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                {{-- LEFT COLUMN --}}
                <div class="space-y-5">
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                            Menu Title
                        </label>
                        <input type="text" wire:model="title" placeholder="Enter menu title"
                            wire:change="generateSlug"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium outline-none transition-all focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
                        @error('title')
                            <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                            Icon Class
                        </label>
                        <input type="text" wire:model="icon" placeholder="bi bi-gear"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium outline-none transition-all focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
                        @error('icon')
                            <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                            URL
                        </label>
                        <input type="text" wire:model="url" placeholder="/dashboard"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium outline-none transition-all focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
                        @error('url')
                            <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- RIGHT COLUMN --}}
                <div class="space-y-5">
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                            Category
                        </label>
                        <input type="text" wire:model="category" placeholder="Main / Settings / Admin"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium outline-none transition-all focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
                        @error('category')
                            <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                            Keywords <span class="normal-case text-slate-400">(comma separated)</span>
                        </label>
                        <input type="text" wire:model="keywords" placeholder="menu, navigation, sidebar"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium outline-none transition-all focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
                        @error('keywords')
                            <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-slate-600">
                            Sort Order
                        </label>
                        <input type="number" wire:model="sort_order" placeholder="1"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium outline-none transition-all focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
                        @error('sort_order')
                            <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-3 pt-2">
                        <input type="checkbox" wire:model="is_active"
                            class="h-5 w-5 rounded border-slate-300 text-slate-600 focus:ring-slate-200">
                        <span class="text-sm font-semibold text-slate-600">
                            Active Menu
                        </span>
                    </div>
                </div>

            </div>

            <div class="mt-8 flex justify-end gap-3">
                <button @click="openModal = false"
                    class="rounded-xl border-2 border-slate-200 px-5 py-2.5 font-bold text-slate-600 hover:bg-slate-50">
                    Cancel
                </button>
                <button wire:click="save" @click="openModal = false"
                    class="bg-app-gradient rounded-xl px-5 py-2.5 font-bold text-white transition-all active:scale-95">
                    Save Menu
                </button>
            </div>
        </div>
    </div>
</div>
