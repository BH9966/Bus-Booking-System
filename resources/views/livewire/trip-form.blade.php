<div>
    {{-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant --}}




    <div class="position-relative">

    <!-- Loading Overlay -->
    <div wire:loading.flex
         wire:target="stepOneNext,stepTwoNext,previousStep,save"
         class="loading-overlay">

        <div class="loading-box text-center">
            <div class="spinner-border text-primary loading-spinner" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>

            <h5 class="mt-3 mb-1">Please wait...</h5>
            <small class="text-muted">
                Processing your request
            </small>
        </div>

    </div>


    @if($step == 1)
<div wire:loading.class="opacity-50"
     wire:target="stepOneNext">

    <h5>Step 1: Select Bus and  Route</h5>
{{--  <label class="form-label mb-3">Select Bus</label>  --}}
    <select wire:model="bus_id" class="form-control mb-2"
            wire:loading.attr="disabled"
            wire:target="stepOneNext" required >
        <option value="">-- Select Bus --</option>
        @foreach($buses as $bus)
            <option value="{{ $bus->id }}">{{ $bus->bus_name ?? '-' }}</option>
        @endforeach
    </select>

    {{--  <label class="form-label mb-3 mt-3">Select Route</label>  --}}
    <select wire:model="route_id" class="form-control mb-2"
            wire:loading.attr="disabled"
            wire:target="stepOneNext" required>
        <option value="">-- Select Route --</option>
        @foreach($routes as $route)
            <option value="{{ $route->id }}">
                {{ $route->fromRegion->name ?? '-' }} → {{ $route->toRegion->name ?? '-' }}
            </option>
        @endforeach
    </select>

   <button wire:click="stepOneNext"
        wire:loading.attr="disabled"
        wire:target="stepOneNext"
        class="btn btn-primary">
    Next
</button>
</div>
@endif


@if($step == 2)
<div wire:loading.class="opacity-50"
     wire:target="stepTwoNext,previousStep">

    <h5>Step 2: Pickup & Drop</h5>

    <select wire:model="boarding_point_id" class="form-control mb-2"
            wire:loading.attr="disabled"
            wire:target="stepTwoNext" required >
        <option value="">-- Pickup Point --</option>
        @foreach($pickupLocations as $location)
        <option value="{{ $location->id }}">
            {{ $location->name }}
        </option>
    @endforeach
    </select>

    <select wire:model="dropping_point_id" class="form-control mb-2"
            wire:loading.attr="disabled"
            wire:target="stepTwoNext" required>
        <option value="">-- Dropping Point --</option>
            @foreach($dropoffLocations as $location)
        <option value="{{ $location->id }}">
            {{ $location->name }}
        </option>
    @endforeach

    </select>

    <div class="d-flex justify-content-between">
        <button wire:click="previousStep"
        wire:loading.attr="disabled"
        wire:target="previousStep"
        class="btn btn-secondary">
    Previous
</button>

        <button wire:click="stepTwoNext"
        wire:loading.attr="disabled"
        wire:target="stepTwoNext"
        class="btn btn-primary">
    Next
</button>
    </div>
</div>
@endif


@if($step == 3)
<div wire:loading.class="opacity-50"
     wire:target="save,previousStep">

    <h5>Step 3: Trip Details</h5>

    <input type="date" wire:model="departure_date" class="form-control mb-2"
           wire:loading.attr="disabled" wire:target="save" required>

    <input type="time" wire:model="departure_time" class="form-control mb-2"
           wire:loading.attr="disabled" wire:target="save" required>

    <input type="time" wire:model="arrival_time" class="form-control mb-2"
           wire:loading.attr="disabled" wire:target="save" required>



    <input type="number" wire:model="price" class="form-control mb-2"
           wire:loading.attr="disabled" wire:target="save" required>

           <select wire:model="trip_status" class="form-control mb-2"
            wire:loading.attr="disabled"
            wire:target="stepTwoNext" required>
        <option value="">-- Trip Status --</option>
        <option value="scheduled">Scheduled</option>
        <option value="cancelled">Cancelled</option>
        <option value="completed">Completed</option>
    </select>

    <div class="d-flex justify-content-between">
         <button wire:click="previousStep"
        wire:loading.attr="disabled"
        wire:target="previousStep"
        class="btn btn-secondary">
    Previous
</button>

        <button wire:click="save"
        wire:loading.attr="disabled"
        wire:target="save"
        class="btn btn-success">
    Save Trip
</button>
    </div>
</div>
@endif

</div>
