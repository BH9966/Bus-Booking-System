<div>
    {{-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci --}}


    <div>

    @if($show)

        <div
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">

            <!-- Modal -->
            <div
 <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-5xl h-[90vh] flex flex-col overflow-hidden" wire:loading.class="opacity-50" wire:target="confirmSeats">


    <!-- Loading Overlay -->
            <!-- Professional Loading Overlay -->
<div
    wire:loading.flex
    wire:target="confirmSeats"
    class="absolute inset-0 z-50 items-center justify-center bg-white/70 backdrop-blur-md">

    <div class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl border border-slate-200 px-10 py-8 w-96 text-center">

        <!-- Animated Spinner -->
        <div class="relative mx-auto w-20 h-20">

            <!-- Outer Ring -->
            <div
                class="absolute inset-0 rounded-full border-[5px] border-blue-100">
            </div>

            <!-- Rotating Ring -->
            <div
                class="absolute inset-0 rounded-full border-[5px] border-transparent border-t-blue-600 border-r-blue-500 animate-spin">
            </div>

            <!-- Center -->
            <div
                class="absolute inset-4 rounded-full bg-blue-50 flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-8 h-8 text-blue-600"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 17L4 13m0 0l4-4m-4 4h16"/>

                </svg>

            </div>

        </div>

        <!-- Title -->
        <h2 class="mt-6 text-xl font-bold text-slate-800">
            Reserving Your Seats
        </h2>

        <!-- Description -->
        <p class="mt-2 text-sm text-slate-500 leading-relaxed">
            Please wait while we securely reserve your selected seats and prepare the passenger information page.
        </p>

        <!-- Animated Dots -->
        <div class="flex justify-center gap-2 mt-6">

            <span class="w-2.5 h-2.5 bg-blue-600 rounded-full animate-bounce"></span>

            <span class="w-2.5 h-2.5 bg-blue-500 rounded-full animate-bounce [animation-delay:.15s]"></span>

            <span class="w-2.5 h-2.5 bg-blue-400 rounded-full animate-bounce [animation-delay:.3s]"></span>

        </div>

    </div>

</div>

                <!-- Header -->
                <div class="flex items-center justify-between border-b px-6 py-5">

                    <div>

                        <h2 class="text-xl font-bold text-slate-800">
                            Select Your Seat
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            {{ $trip->bus->bus_name }}
                        </p>

                    </div>

                    <button
                        wire:click="close"
                        class="w-10 h-10 rounded-full hover:bg-slate-100 transition">

                        <i class="bi bi-x-square"></i>

                    </button>

                </div>

                <!-- Body -->
                
               <div class="flex-1 overflow-y-auto p-6 hide-scrollbar scroll-smooth">

                    <!-- Trip Information -->
                    <div
                        class="grid md:grid-cols-4 gap-4 mb-6">

                        <div class="bg-slate-50 rounded-xl p-4">

                            <p class="text-xs text-slate-500">
                                Route
                            </p>

                            <p class="font-semibold">
                                {{ $trip->route->fromRegion->name }}
                                <i class="bi bi-arrow-right"></i>
                                {{ $trip->route->toRegion->name }}
                            </p>

                        </div>

                        <div class="bg-slate-50 rounded-xl p-4">

                            <p class="text-xs text-slate-500">
                                Departure
                            </p>

                            <p class="font-semibold">
                                {{ $trip->departure_time->format('H:i') }}
                            </p>

                        </div>

                        <div class="bg-slate-50 rounded-xl p-4">

                            <p class="text-xs text-slate-500">
                                Arrival
                            </p>

                            <p class="font-semibold">
                                {{ $trip->arrival_time->format('H:i') }}
                            </p>

                        </div>

                        <div class="bg-slate-50 rounded-xl p-4">

                            <p class="text-xs text-slate-500">
                                Price
                            </p>

                            <p class="font-bold text-blue-700">
                                TZS {{ number_format($trip->price) }}
                            </p>

                        </div>

                    </div>

                    <!-- Seat Legend -->

                    <!-- Seat Legend -->

                    <div class="flex flex-wrap gap-6 mb-6">

                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg border-2 border-blue-600 bg-blue-50"></div>
                            <span class="text-sm">Available</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg bg-green-500"></div>
                            <span class="text-sm">Selected</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg bg-red-500"></div>
                            <span class="text-sm">Booked</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg bg-yellow-400"></div>
                            <span class="text-sm">Locked</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-lg bg-gray-400"></div>
                            <span class="text-sm">Disabled</span>
                        </div>

                    </div>

                    <!-- Selected Seats Counter -->



                

                    <!-- Driver -->

                    <div
                        class="bg-slate-200 rounded-xl py-3 text-center text-sm font-semibold text-slate-600 mb-6">

                        DRIVER — FRONT

                    </div>

                    <!-- Seat Layout -->
                       <!-- Seat Layout -->

                <div class="bg-slate-50 rounded-2xl p-6">

                    @foreach($rows as $letter => $cells)

                        <div class="flex items-center gap-3 mb-3">

                            <!-- Row Letter -->
                            <div class="w-8 text-center font-bold">
                                {{ $letter }}
                            </div>

                            @foreach($cells as $cell)

                                @if($cell['type'] === 'aisle')

                                    <!-- Bus aisle -->
                                    <div class="w-10"></div>

                                @else

                            @php

                                $seat = $cell['seat'];

                                $status = $cell['status'];

                            @endphp
                            <button type="button" wire:key="seat-{{ $seat->id }}" wire:click="toggleSeat({{ $seat->id }})" wire:loading.attr="disabled"
                           wire:target="confirmSeats" @disabled(in_array($status, ['booked','locked','disabled'])) class="seat

                                {{ $status === 'available' ? 'seat-available' : '' }}

                                {{ $status === 'selected' ? 'seat-selected' : '' }}

                                {{ $status === 'booked' ? 'seat-booked' : '' }}

                                {{ $status === 'locked' ? 'seat-locked' : '' }}

                                {{ $status === 'disabled' ? 'seat-disabled' : '' }}

                                "

                            >

                                {{ $seat->seat_number }}

                            </button>

                                @endif

                            @endforeach

                        </div>

                    @endforeach

                </div>
                {{--  comfirm   --}}
                <div class="border-t px-6 py-5 flex items-center justify-between bg-white">

                @if(count($selectedSeats) > 0)

                <div class="mb-6 bg-green-50 rounded-xl p-4">

                    <p class="text-sm text-slate-600 mb-2">
                        Your Selected Seats:
                    </p>


                    <div class="flex flex-wrap gap-2">

                        @foreach($rows as $cells)

                            @foreach($cells as $cell)

                                @if(
                                    $cell['type'] === 'seat' &&
                                    $cell['status'] === 'selected'
                                )

                                    <span
                                        class="px-3 py-1 rounded-full bg-green-500 text-white text-sm">

                                        {{ $cell['seat']->seat_number }}

                                    </span>

                                @endif

                            @endforeach

                        @endforeach

                    </div>

                </div>

                @endif
                {{--  max error  --}}
                    @if(session()->has('seat_limit'))

                    <div class="text-sm text-red-600 font-semibold">
                        {{ session('seat_limit') }}
                    </div>

                @endif


                {{--  end  --}}


                <div class="flex gap-3">


                    <!-- Cancel -->

                    <button
                        type="button"
                        wire:click="close"
                        wire:loading.attr="disabled"
                        wire:target="confirmSeats"
                        class="px-5 py-2 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 transition">

                        Cancel

                    </button>



                    <!-- Confirm -->

                    <button
                        type="button"
                        wire:click="confirmSeats"
                        wire:loading.attr="disabled"
                        wire:target="confirmSeats"
                        @disabled(count($selectedSeats) === 0)
                        class="px-6 py-2 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition disabled:opacity-50 disabled:cursor-not-allowed">

                        Confirm Seats

                    </button>


                </div>

            </div>

                </div>

            </div>

        </div>

    @endif

</div>
</div>
