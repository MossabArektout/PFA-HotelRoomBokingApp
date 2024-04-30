<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Rooms</h2>

        <div class="container">
            <div class="row">
                @foreach ($rooms as $room)
                    @if ($room->avalibility == 1)
                        <div class="col-lg-4 col-md-6 my-3">
                            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                @php
                                    $images = json_decode($room->images);
                                    $firstImage = reset($images); // Get the first image from the array
                                @endphp
                                <img src="{{ asset($firstImage) }}" class="card-img-top" style="height: 200px;">
                                <div class="card-body">
                                    <h5>{{ $room->numero }}</h5>
                                    <h6 class="mb-4">{{ $room->feature->price }} MAD per night</h6>
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
                                        <h6 class="mb-1">Facilities</h6>
                                        @if ($room->feature->TV == 1)
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">TV</span>
                                        @endif
                                        @if ($room->feature->wifi == 1)
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                                        @endif
                                        <!-- Add more facility badges as needed -->
                                    </div>
                                    <div class="rating nb-4">
                                        <h6 class="mb-1">Rating</h6>
                                        <span class="badge rounded-pill bg-light">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-evenly mb-2">
                                        <a href="{{ route('payment.form', ['roomId' => $room->id, 'amount' => $room->feature->price]) }}"
                                            class="btn btn-sm text-white custom-bg shadow-none">Reserve</a>
                                        <a href="{{ route('room.details', ['roomId' => $room->id]) }}"
                                            class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>



        {{-- <div class="container">
            <div class="row">
                @foreach ($rooms as $room)
                    @if ($room->avalibility == 1)
                        <div class="col-lg-4 col-md-6 my-3">
                            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                @php
                                    $images = json_decode($room->images);
                                    $firstImage = reset($images); // Get the first image from the array
                                @endphp
                                <img src="{{ asset($firstImage) }}" class="card-img-top">
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
                                        <h6 class="mb-1">Facilities</h6>
                                        @if ($room->feature->TV == 1)
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">TV</span>
                                        @endif
                                        @if ($room->feature->wifi == 1)
                                            <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                                        @endif
                                        <!-- Add more facility badges as needed -->
                                    </div>
                                    <div class="rating nb-4">
                                        <h6 class="mb-1">Rating</h6>
                                        <span class="badge rounded-pill bg-light">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-evenly mb-2">
                                        <a href="{{ route('payment.form', ['roomId' => $room->id, 'amount' => $room->feature->price]) }}"
                                            class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                                        <a href="{{ route('room.details', ['roomId' => $room->id]) }}"
                                            class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div> --}}


        {{-- <div class="row">
            @foreach ($rooms as $room)
                @if ($room->avalibility == 1)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                @php
                                    $images = json_decode($room->images);
                                    $firstImage = reset($images); // Get the first image from the array
                                @endphp
                                <img src="{{ asset($firstImage) }}" class="img-fluid" alt="Room Image">
                                <h5 class="card-title">{{ $room->numero }}</h5>
                                <ul>
                                    @if ($room->feature->number_of_rooms)
                                        <li>{{ $room->feature->number_of_rooms }} Rooms</li>
                                    @endif
                                    @if ($room->feature->number_of_beds)
                                        <li>{{ $room->feature->number_of_beds }} Beds</li>
                                    @endif
                                    @if ($room->feature->bathroom)
                                        <li>{{ $room->feature->bathroom }} Bathroom</li>
                                    @endif
                                    @if ($room->feature->balcony)
                                        <li>{{ $room->feature->balcony }} Balcony</li>
                                    @endif
                                    @if ($room->feature->workspace)
                                        <li>{{ $room->feature->workspace }} Workspace</li>
                                    @endif
                                    @if ($room->feature->TV == 1)
                                        <li>TV</li>
                                    @endif
                                    @if ($room->feature->wifi == 1)
                                        <li>WiFi</li>
                                    @endif
                                    @if ($room->feature->minibar == 1)
                                        <li>Minibar</li>
                                    @endif
                                    @if ($room->feature->price)
                                        <li>Price: {{ $room->feature->price }} MAD</li>
                                    @endif
                                </ul>
                                <div class="container mt-3">
                                    <!-- Pass room_id and amount to payment form -->
                                    <a href="{{ route('payment.form', ['roomId' => $room->id, 'amount' => $room->feature->price]) }}"
                                        class="btn btn-primary btn-sm mr-2">Reserve</a>
                                    <a href="{{ route('room.details', ['roomId' => $room->id]) }}"
                                        class="btn btn-success btn-sm">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div> --}}
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
