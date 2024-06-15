<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold">{{ $room->feature->type }}</h2>
                <div style="font-size: 14px;">
                    <a href="#" class="text-secondary text-decoration-none">Home</a>
                    <span class="text-secondary"> / </span>
                    <a href="#" class="text-secondary text-decoration-none">Rooms</a>
                </div>
            </div>

            <div class="col-lg-7 col-md-12 px-4">
                <div id="roomCarousel" class="carousel slide">
                    <div class="carousel-inner" style="height: 400px;">
                        @php
                            $images = json_decode($room->images);
                        @endphp
                        @foreach ($images as $index => $image)
                            <div class="carousel-item @if ($index === 0) active @endif">
                                <img src="{{ asset($image) }}" class="d-block w-100" style="height: 100%;"
                                    alt="Image {{ $index }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 px-4">
                <div class="card md-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <h5 class="mb-4">{{ $room->numero }}</h5>
                        <h4 class="mb-4">{{ $room->price }} MAD/nuit</h4>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Description</h6>
                            <p>Un hébergement luxueux offrant un espace et un confort supérieurs. Elle se compose
                                généralement de plusieurs pièces, incluant un salon séparé avec canapé, fauteuils, table
                                basse, et télévision à écran plat.</p>
                        </div>
                        <div class="features mb-4">
                            <h6 class="mb-1">Caractéristiques</h6>
                            @if ($room->feature->number_of_rooms)
                                <span
                                    class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->feature->number_of_rooms }}
                                    Chambres</span>
                            @endif
                            @if ($room->feature->number_of_beds)
                                <span
                                    class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->feature->number_of_beds }}
                                    Lits</span>
                            @endif
                            @if ($room->feature->bathroom)
                                <span
                                    class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->feature->bathroom }}
                                    Salle de bain</span>
                            @endif
                            @if ($room->feature->balcony)
                                <span
                                    class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->feature->balcony }}
                                    Balcon</span>
                            @endif
                            @if ($room->feature->workspace)
                                <span
                                    class="badge rounded-pill bg-light text-dark text-wrap">{{ $room->feature->workspace }}
                                    Espace de travail</span>
                            @endif
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Équipements</h6>
                            @if ($room->feature->TV == 1)
                                <span class="badge rounded-pill bg-light text-dark text-wrap">TV</span>
                            @endif
                            @if ($room->feature->wifi == 1)
                                <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                            @endif
                        </div>
                        <a href="{{ route('payment.form', ['roomId' => $room->id, 'amount' => $room->price, 'startdate' => $startdate, 'enddate' => $enddate]) }}"
                            class="btn w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
