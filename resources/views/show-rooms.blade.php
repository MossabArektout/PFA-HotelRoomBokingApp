<x-layout>
    <div class="container mt-5">
        <div class="container availability-form">
            <div class="row">
                <div class="col-lg-12 bg-white shadow p-4 rounded">
                    <h5 class="mb-4">Check reservation availability</h5>
                    <form action="{{ route('reservation.showRooms') }}" method="POST">
                        @csrf
                        <div class="row align-items-end">
                            <div class="col-lg-3 mb-3">
                                <label for="startdate" class="form-label" style="font-weight: 500;">Arrival</label>
                                <input type="date" class="form-control shadow-none" id="startdate" name="startdate"
                                    required>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="enddate" class="form-label" style="font-weight: 500;">Departure</label>
                                <input type="date" class="form-control shadow-none" id="enddate" name="enddate"
                                    required>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="room_type" class="form-label" style="font-weight: 500">Room type</label>
                                <select class="form-select shadow-none" id="room_type" name="room_type" required>
                                    <option value="">Sselect room type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 mb-lg-3 mt-2">
                                <button type="submit"
                                    class="btn text-white shadow-none custom-bg w-100">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($rooms as $room)
                @if ($room->avalibility == 1)
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            @php
                                $images = json_decode($room->images);
                                $firstImage = reset($images);
                            @endphp
                            <img src="{{ asset($firstImage) }}" class="card-img-top" style="height: 200px;">
                            <div class="card-body">
                                <h5>{{ $room->numero }}</h5>
                                <h6 class="mb-4">{{ $room->price }} MAD per night</h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                    @if ($room->feature->number_of_rooms)
                                        <span
                                            class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->feature->number_of_rooms }}
                                            Rooms</span>
                                    @endif
                                    @if ($room->feature->number_of_beds)
                                        <span
                                            class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->feature->number_of_beds }}
                                            Beds</span>
                                    @endif
                                    @if ($room->feature->bathroom)
                                        <span
                                            class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->feature->bathroom }}
                                            Bathroom</span>
                                    @endif
                                    @if ($room->feature->balcony)
                                        <span
                                            class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->feature->balcony }}
                                            Balcony</span>
                                    @endif
                                    @if ($room->feature->workspace)
                                        <span
                                            class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->feature->workspace }}
                                            Workspace</span>
                                    @endif
                                </div>
                                <div class="facilities mb-4">
                                    <h6 class="mb-1">Equipment</h6>
                                    @if ($room->feature->TV == 1)
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">TV</span>
                                    @endif
                                    @if ($room->feature->wifi == 1)
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                                    @endif
                                </div>
                                <div class="rating nb-4">
                                    <h6 class="mb-1">Assessment</h6>
                                    <span class="badge rounded-pill bg-light">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </span>
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                    <a href="{{ route('payment.form', ['roomId' => $room->id, 'amount' => $room->price, 'startdate' => $startdate, 'enddate' => $enddate]) }}"
                                        class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                                    <a href="{{ route('room.details', ['roomId' => $room->id, 'amount' => $room->price, 'startdate' => $startdate, 'enddate' => $enddate]) }}"
                                        class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-layout>
