<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <div class="space-y-1.5" x-data="{ open: false }" @click.away="open = false">
            <label class="text-xs font-600 text-slate-500 uppercase tracking-wide">From</label>
            <div class="relative">
                
                <button 
                    type="button"
                    @click="open = !open; if(open) { setTimeout(() => $refs.fromSearch.focus(), 100) }"
                    class="w-full pl-9 pr-10 py-3 text-sm border-2 border-slate-200 rounded-xl bg-white text-left transition-all font-500 flex items-center justify-between focus:outline-none"
                    :class="open ? 'border-blue-600 ring-4 ring-blue-50/50' : 'hover:border-slate-300'"
                >
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="3"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                        </svg>
                    </span>
                    <span class="{{ $selected_from_id ? 'text-slate-800 font-600' : 'text-slate-400' }}">
                        {{ $selected_from_name }}
                    </span>
                    <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="open" x-cloak class="absolute left-0 right-0 mt-2 bg-white border border-slate-100 rounded-xl shadow-xl z-50 overflow-hidden">
                    
                    <div class="p-2 bg-slate-50 border-b border-slate-100 relative">
                        <input 
                            type="text" 
                            wire:model.live="from_search"
                            placeholder="Type to search region..."
                            autocomplete="off"
                            x-ref="fromSearch"
                            class="w-full px-3 py-1.5 pl-8 text-xs border border-slate-200 rounded-lg bg-white text-slate-700 focus:border-blue-500 focus:outline-none font-500"
                        >
                      @error('selected_from_id')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35"/>
                            </svg>
                        </div>
                    </div>

                    <div class="max-h-52 overflow-y-auto divide-y divide-slate-50">
                        @forelse($departureRegions as $region)
                            <div 
                                @click="open = false" 
                                wire:click="selectFromRegion({{ $region->id }}, '{{ $region->name }}')" 
                                class="px-4 py-2.5 text-sm text-slate-700 hover:bg-blue-50 hover:text-blue-700 cursor-pointer font-500 transition-colors"
                            >
                                {{ $region->name }}
                            </div>
                        @empty
                            <div class="px-4 py-4 text-xs text-center text-slate-400 font-500">No terminal routes scheduled here</div>
                        @endforelse
                    </div>
                </div>
                
            </div>
            @error('selected_from_id')
          <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        

        <div class="space-y-1.5" x-data="{ open: false }" @click.away="open = false">
            <label class="text-xs font-600 text-slate-500 uppercase tracking-wide">To</label>
            <div class="relative">
                
                <button 
                    type="button"
                    @click="open = !open; if(open) { setTimeout(() => $refs.toSearch.focus(), 100) }"
                    class="w-full pl-9 pr-10 py-3 text-sm border-2 border-slate-200 rounded-xl bg-white text-left transition-all font-500 flex items-center justify-between focus:outline-none"
                    :class="open ? 'border-blue-600 ring-4 ring-blue-50/50' : 'hover:border-slate-300'"
                >
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </span>
                    <span class="{{ $selected_to_id ? 'text-slate-800 font-600' : 'text-slate-400' }}">
                        {{ $selected_to_name }}
                    </span>
                    <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="open" x-cloak class="absolute left-0 right-0 mt-2 bg-white border border-slate-100 rounded-xl shadow-xl z-50 overflow-hidden">
                    
                    <div class="p-2 bg-slate-50 border-b border-slate-100 relative">
                        <input 
                            type="text" 
                            wire:model.live="to_search"
                            placeholder="Type to search region..."
                            autocomplete="off"
                            x-ref="toSearch"
                            class="w-full px-3 py-1.5 pl-8 text-xs border border-slate-200 rounded-lg bg-white text-slate-700 focus:border-blue-500 focus:outline-none font-500"
                        >
                  @error('selected_to_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35"/>
                            </svg>
                        </div>
                    </div>
                    

                    <div class="max-h-52 overflow-y-auto divide-y divide-slate-50">
                        @forelse($destinationRegions as $region)
                            <div 
                                @click="open = false" 
                                wire:click="selectToRegion({{ $region->id }}, '{{ $region->name }}')" 
                                class="px-4 py-2.5 text-sm text-slate-700 hover:bg-blue-50 hover:text-blue-700 cursor-pointer font-500 transition-colors"
                            >
                                {{ $region->name }}
                            </div>
                        @empty
                            <div class="px-4 py-4 text-xs text-center text-slate-400 font-500">No terminal routes scheduled here</div>
                        @endforelse
                    </div>
                    
                </div>
                @error('selected_to_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        

        <div class="space-y-1.5">
            <label class="text-xs font-600 text-slate-500 uppercase tracking-wide">Travel Date</label>
            <div class="relative">
                <div class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>
                <input
                    type="date"
                    wire:model.defer="travel_date"
                    min="{{ now()->toDateString() }}"
                    class="w-full pl-9 pr-4 py-3 text-sm border-2 border-slate-200 rounded-xl bg-white text-slate-700 cursor-pointer focus:border-blue-600 focus:outline-none transition-all font-500">
                    @error('travel_date')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
            </div>
        </div>

        <div class="space-y-1.5">
            <label class="text-xs font-600 text-transparent uppercase tracking-wide select-none">Search</label>
            <button
            type="button"
            wire:click="findBus"
            wire:loading.attr="disabled"
            wire:target="findBus"
            class="w-full py-3 bg-blue-600 hover:bg-blue-700 disabled:opacity-70 disabled:cursor-not-allowed text-white text-sm font-700 rounded-xl transition-all flex items-center justify-center gap-2 shadow-lg shadow-blue-600/20">

            <span wire:loading.remove wire:target="findBus" class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35"/>
                </svg>

                Find Bus
            </span>

            <span wire:loading wire:target="findBus" class="flex items-center gap-2">
                <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" opacity=".25"/>
                    <path d="M22 12a10 10 0 00-10-10" stroke="currentColor" stroke-width="3"/>
                </svg>

                Searching...
            </span>

        </button>
        </div>

    </div>
</div>