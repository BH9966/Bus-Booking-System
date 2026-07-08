<div>
    <style>
        :root {
            --bs-primary: #0d6efd;
            --bs-success: #198754;
        }

        .modern-form {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #212529;
            --modern-border-color: #dee2e6;
        }

        /* Progress Stepper Line Styling */
        .wizard-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 2rem;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
        }
        .wizard-steps::before {
            content: "";
            position: absolute;
            top: 22px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #e3e6ec;
            z-index: 1;
        }
        .wizard-step-item {
            position: relative;
            z-index: 2;
            text-align: center;
            flex: 1;
        }
        .wizard-dot {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: #fff;
            border: 2px solid #e3e6ec;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.65rem;
            font-weight: 600;
            font-size: 1.15rem;
            color: #6c757d;
            transition: all 0.3s ease;
        }
        .wizard-step-item.active .wizard-dot {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            color: #fff;
            box-shadow: 0 0 0 5px rgba(13, 110, 253, 0.15);
        }
        .wizard-step-item.completed .wizard-dot {
            background-color: var(--bs-success);
            border-color: var(--bs-success);
            color: #fff;
        }
        .wizard-label {
            font-size: 0.95rem;
            font-weight: 500;
            color: #6c757d;
        }
        .wizard-step-item.active .wizard-label {
            color: var(--bs-primary);
            font-weight: 600;
        }
        
        /* Content Panel Layout Box */
        .content-box {
            padding: 1.5rem;
            border: 1px solid var(--modern-border-color);
            border-radius: 0.75rem;
            background: #fff;
            margin-bottom: 2rem;
        }
        .step-icon-wrapper {
            background-color: rgba(13, 110, 253, 0.12);
            color: var(--bs-primary);
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.65rem;
            margin-right: 1rem;
        }
        .step-icon-wrapper i {
            font-size: 1.6rem;
        }
        
        /* Unified Wrapper Form Elements */
        .modern-form .form-floating {
            position: relative;
            margin-bottom: 1.25rem;
        }
        .modern-form .form-control, 
        .modern-form .form-select {
            display: block;
            width: 100%;
            height: 3.8rem; /* Uniform standard sizing height */
            padding: 1.6rem 0.75rem 0.6rem 0.75rem; /* Spacious padding layout */
            font-size: 1rem;
            font-weight: 400;
            color: #212529;
            background-color: #fff;
            border: 1.5px solid var(--modern-border-color);
            border-radius: 0.5rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            box-sizing: border-box;
        }
        
        .modern-form .form-control:focus, 
        .modern-form .form-select:focus {
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }

        /* [CRITICAL FIX]: Custom Float Behavior Rules to prevent Overlapping text fields */
        .modern-form .form-floating label {
            position: absolute;
            top: 1.1rem;
            left: 0.75rem;
            pointer-events: none;
            transition: all 0.2s ease-out;
            color: #6c757d;
            font-size: 1rem;
            font-weight: 400;
            margin: 0;
            padding: 0;
        }
        
        /* Forces float styling permanently active for special fields (Date/Time/Selects) */
        .modern-form .form-floating input[type="date"] ~ label,
        .modern-form .form-floating input[type="time"] ~ label,
        .modern-form .form-floating input:focus ~ label,
        .modern-form .form-floating input:not(:placeholder-shown) ~ label,
        .modern-form .form-floating select:focus ~ label,
        .modern-form .form-floating select:not([value=""]) ~ label,
        .modern-form .form-floating select:not([value="-select-"]) ~ label {
            top: 0.35rem;
            left: 0.75rem;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--bs-primary);
        }

        /* UI Styling for buttons */
        .btn-modern-primary {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            color: #fff;
            padding: 0.7rem 1.7rem;
            border-radius: 0.65rem;
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid transparent;
            transition: all 0.2s ease;
        }
        .btn-modern-primary:hover {
            background-color: #0b5ed7;
        }
        .btn-modern-light {
            background-color: #fff;
            color: #212529;
            padding: 0.7rem 1.7rem;
            border-radius: 0.65rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            border: 1px solid #dee2e6;
        }
        .btn-modern-light:hover {
            background-color: #f8f9fa;
        }
        .btn-modern-success {
            background-color: var(--bs-success);
            border-color: var(--bs-success);
            color: #fff;
            padding: 0.7rem 1.7rem;
            border-radius: 0.65rem;
            font-weight: 600;
            border: 1px solid transparent;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.2s;
        }
        .btn-modern-success:hover {
            background-color: #146c43;
        }

        .loading-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            z-index: 1050;
            display: flex; align-items: center; justify-content: center;
            backdrop-filter: blur(3px);
            border-radius: 0.75rem;
        }
        /* Highlights the input border in red when invalid */
.modern-form .is-invalid-field {
    border-color: #dc3545 !important;
}
.modern-form .is-invalid-field:focus {
    box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.15) !important;
}

/* Error text layout styling underneath the element */
.invalid-feedback-custom {
    display: block;
    width: 100%;
    margin-top: 0.35rem;
    margin-left: 0.2rem;
    font-size: 0.825rem;
    color: #dc3545;
    font-weight: 500;
    text-align: left;
}
    </style>

    <div class="position-relative p-2 modern-form">
        
        <div wire:loading.flex wire:target="stepOneNext,stepTwoNext,previousStep,save" class="loading-overlay">
            <div class="text-center bg-white p-5 shadow-lg rounded-xl border-0">
                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                    {{--  <span class="visually-hidden">Loading...</span>  --}}
                </div>
                <h5 class="mt-4 mb-2 font-weight-bold text-dark">Processing Request</h5>
                <p class="text-muted mb-0">Please wait while configuration compiles.</p>
            </div>
        </div>

        <div class="wizard-steps">
            <div class="wizard-step-item {{ $step == 1 ? 'active' : ($step > 1 ? 'completed' : '') }}">
                <div class="wizard-dot">
                    @if($step > 1) <i class="bi bi-check-lg"></i> @else 1 @endif
                </div>
                <div class="wizard-label">Route</div>
            </div>
            <div class="wizard-step-item {{ $step == 2 ? 'active' : ($step > 2 ? 'completed' : '') }}">
                <div class="wizard-dot">
                    @if($step > 2) <i class="bi bi-check-lg"></i> @else 2 @endif
                </div>
                <div class="wizard-label">Stops</div>
            </div>
            <div class="wizard-step-item {{ $step == 3 ? 'active' : '' }}">
                <div class="wizard-dot">3</div>
                <div class="wizard-label">Schedule</div>
            </div>
        </div>

        <hr class="text-muted opacity-25 mb-4">

        @if($step == 1)
<div wire:loading.class="opacity-50" wire:target="stepOneNext" class="content-box">
    <div class="d-flex align-items-center mb-4">
        <div class="step-icon-wrapper">
            <i class="bi bi-bus-front"></i>
        </div>
        <div>
            <h5 class="mb-0 font-weight-bold text-dark">Select Bus & Main Route</h5>
            <p class="text-muted small mb-0">Assign a bus and primary path for this trip</p>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-floating">
            <select wire:model="bus_id" id="bus_id" class="form-select {{ $errors->has('bus_id') ? 'is-invalid-field' : '' }}" wire:loading.attr="disabled" wire:target="stepOneNext">
                <option value="">-select-</option>
                @foreach($buses as $bus)
                    <option value="{{ $bus->id }}">{{ $bus->bus_name ?? '-' }}</option>
                @endforeach
            </select>
            <label for="bus_id">Assign Bus</label>
        </div>
        @error('bus_id')
            <div class="invalid-feedback-custom">
                <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <div class="form-floating">
            <select wire:model="route_id" id="route_id" class="form-select {{ $errors->has('route_id') ? 'is-invalid-field' : '' }}" wire:loading.attr="disabled" wire:target="stepOneNext">
                <option value="">-select-</option>
                @foreach($routes as $route)
                    <option value="{{ $route->id }}">
                        {{ $route->fromRegion->name ?? '-' }} &rarr; {{ $route->toRegion->name ?? '-' }}
                    </option>
                @endforeach
            </select>
            <label for="route_id">Primary Route</label>
        </div>
        @error('route_id')
            <div class="invalid-feedback-custom">
                <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
            </div>
        @enderror
    </div>

    <div class="d-flex justify-content-end mt-4">
        <button wire:click="stepOneNext" wire:loading.attr="disabled" wire:target="stepOneNext" class="btn-modern-primary">
            Continue <i class="bi bi-arrow-right ms-2"></i>
        </button>
    </div>
</div>
@endif

       @if($step == 2)
<div wire:loading.class="opacity-50" wire:target="stepTwoNext,previousStep" class="content-box">
    <div class="d-flex align-items-center mb-4">
        <div class="step-icon-wrapper">
            <i class="bi bi-geo-alt"></i>
        </div>
        <div>
            <h5 class="mb-0 font-weight-bold text-dark">Pickup & Drop Details</h5>
            <p class="text-muted small mb-0">Set precise terminal locations</p>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-floating">
            <select wire:model="boarding_point_id" id="boarding_point_id" class="form-select {{ $errors->has('boarding_point_id') ? 'is-invalid-field' : '' }}" wire:loading.attr="disabled" wire:target="stepTwoNext">
                <option value="">-select-</option>
                @foreach($pickupLocations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
            <label for="boarding_point_id">Boarding Terminal</label>
        </div>
        @error('boarding_point_id')
            <div class="invalid-feedback-custom">
                <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <div class="form-floating">
            <select wire:model="dropping_point_id" id="dropping_point_id" class="form-select {{ $errors->has('dropping_point_id') ? 'is-invalid-field' : '' }}" wire:loading.attr="disabled" wire:target="stepTwoNext">
                <option value="">-select-</option>
                @foreach($dropoffLocations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
            <label for="dropping_point_id">Destination Stop</label>
        </div>
        @error('dropping_point_id')
            <div class="invalid-feedback-custom">
                <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
            </div>
        @enderror
    </div>

    <div class="d-flex justify-content-between mt-4">
        <button wire:click="previousStep" wire:loading.attr="disabled" wire:target="previousStep" class="btn-modern-light">
            <i class="bi bi-arrow-left me-2"></i> Back
        </button>

        <button wire:click="stepTwoNext" wire:loading.attr="disabled" wire:target="stepTwoNext" class="btn-modern-primary">
            Continue <i class="bi bi-arrow-right ms-2"></i>
        </button>
    </div>
</div>
@endif

       @if($step == 3)
<div class="content-box"
     wire:loading.class="opacity-50"
     wire:target="save,previousStep">

    <div class="d-flex align-items-center mb-4">
        <div class="step-icon-wrapper">
            <i class="bi bi-calendar2-check"></i>
        </div>

        <div>
            <h5 class="mb-0 fw-bold text-dark">
                Trip Schedule & Pricing
            </h5>

            <small class="text-muted">
                Define departure, arrival and fare details.
            </small>
        </div>
    </div>

    {{-- Departure Date --}}
    <div class="mb-3">

        <div class="form-floating">

            <input
                type="date"
                id="departure_date"
                wire:model.defer="departure_date"
                class="form-control @error('departure_date') is-invalid @enderror"
                wire:loading.attr="disabled"
                wire:target="save"
                placeholder=" ">

            <label for="departure_date">
                <i class="bi bi-calendar-event me-2"></i>
                Departure Date
            </label>

        </div>

        @error('departure_date')
            <div class="text-danger small mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Time --}}
    <div class="row">

        <div class="col-md-6 mb-3">

            <div class="form-floating">

                <input
                    type="time"
                    id="departure_time"
                    wire:model.defer="departure_time"
                    class="form-control @error('departure_time') is-invalid @enderror"
                    wire:loading.attr="disabled"
                    wire:target="save"
                    placeholder=" ">

                <label for="departure_time">
                    <i class="bi bi-clock-history me-2"></i>
                    Departure Time
                </label>

            </div>

            @error('departure_time')
                <div class="text-danger small mt-1">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="col-md-6 mb-3">

            <div class="form-floating">

                <input
                    type="time"
                    id="arrival_time"
                    wire:model.defer="arrival_time"
                    class="form-control @error('arrival_time') is-invalid @enderror"
                    wire:loading.attr="disabled"
                    wire:target="save"
                    placeholder=" ">

                <label for="arrival_time">
                    <i class="bi bi-clock-fill me-2"></i>
                    Arrival Time
                </label>

            </div>

            @error('arrival_time')
                <div class="text-danger small mt-1">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>


    {{-- Price & Status --}}
    <div class="row">

        <div class="col-md-6 mb-3">

            <label class="form-label fw-semibold">
                <i class="bi bi-cash-stack me-2"></i>
                Fare Price
            </label>

            <div class="input-group">

                <span class="input-group-text">
                    TZS
                </span>

                <input
                    type="number"
                    wire:model.defer="price"
                    class="form-control @error('price') is-invalid @enderror"
                    wire:loading.attr="disabled"
                    wire:target="save"
                    min="1000">

            </div>

            @error('price')
                <div class="text-danger small mt-1">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="col-md-6 mb-3">

            <div class="form-floating">

                <select
                    wire:model.defer="trip_status"
                    id="trip_status"
                    class="form-select @error('trip_status') is-invalid @enderror"
                    wire:loading.attr="disabled"
                    wire:target="save">

                    <option value="">Select Status</option>

                    <option value="scheduled">
                        Scheduled
                    </option>

                    <option value="cancelled">
                        Cancelled
                    </option>

                    <option value="completed">
                        Completed
                    </option>

                </select>

                <label for="trip_status">
                    <i class="bi bi-flag-fill me-2"></i>
                    Trip Status
                </label>

            </div>

            @error('trip_status')
                <div class="text-danger small mt-1">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>


    {{-- Summary Card --}}
    <div class="card border-0 shadow-sm bg-light mb-4">

        <div class="card-body">

            <h6 class="fw-bold mb-3">
                <i class="bi bi-info-circle-fill text-primary me-2"></i>
                Trip Summary
            </h6>

            <div class="row">

                <div class="col-md-6">
                    <strong>Bus:</strong><br>
                    {{ optional($buses->firstWhere('id',$bus_id))->bus_name ?? '-' }}
                </div>

                <div class="col-md-6">
                    <strong>Fare:</strong><br>
                    TZS {{ number_format($price ?? 0) }}
                </div>

            </div>

        </div>

    </div>


    {{-- Buttons --}}
    <div class="d-flex justify-content-between">

        <button
            wire:click="previousStep"
            wire:loading.attr="disabled"
            wire:target="previousStep"
            class="btn btn-outline-secondary px-4">

            <i class="bi bi-arrow-left me-2"></i>

            Previous

        </button>


        <button
            wire:click="save"
            wire:loading.attr="disabled"
            wire:target="save"
            class="btn btn-success px-4">

            <span wire:loading.remove wire:target="save">
                <i class="bi bi-check-circle me-2"></i>
                Save Trip
            </span>

            <span wire:loading wire:target="save">

                <span class="spinner-border spinner-border-sm me-2"></span>

                Saving...

            </span>

        </button>

    </div>

</div>
@endif

    </div>
</div>