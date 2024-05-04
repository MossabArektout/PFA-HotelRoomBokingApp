<x-layout>
    <!--hada carouled-->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('images/carousel/1.png') }}" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/carousel/2.png') }}" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/carousel/3.png') }}" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/carousel/4.png') }}" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/carousel/5.png') }}" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/carousel/6.png') }}" class="w-100 d-block" />
                </div>
            </div>
        </div>
    </div>

    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Availability</h5>
                <form action="{{ route('reservation.showRooms') }}" method="POST">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label for="startdate" class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none" id="startdate" name="startdate"
                                required>
                        </div>
                        <div class="col-lg-3  mb-3">
                            <label for="enddate" class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none" id="enddate" name="enddate"
                                required>
                        </div>
                        <div class="col-lg-3  mb-3">
                            <label for="room_type" class="form-label" style="font-weight: 500">Type</label>
                            <select class="form-select shadow-none" id="room_type" name="room_type" required>
                                <option value="">Select Room Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->type }}">{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg w-100">Chercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Rooms-->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>

    <div class="container" id="rooms">
        <div class="row">
            @foreach ($randomRooms as $room)
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        @php
                            $images = json_decode($room->images);
                            $firstImage = reset($images);
                        @endphp
                        <img src="{{ asset($firstImage) }}" class="card-img-top" style="height: 200px;">
                        <div class="card-body">
                            <h5>{{ $room->feature->type }}</h5>
                            <h6 class="mb-4">{{ $room->price }} MAD/night</h6>
                            <div class="features mb-4">
                                <h6 class="mb-1">Features</h6>
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
                                <h6 class="mb-1">Facilities</h6>
                                @if ($room->feature->TV == 1)
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">TV</span>
                                @endif
                                @if ($room->feature->wifi == 1)
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">Wifi</span>
                                @endif
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
                                <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                                <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More
                    Rooms>>></a>
            </div>
        </div>
    </div>

    <!--facilities-->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>

    <div class="container" id="facilities">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="{{ asset('images/facilities/WIFI.svg') }}" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="{{ asset('images/facilities/Geyser.svg') }}" width="80px">
                <h5 class="mt-3">Geyser</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="{{ asset('images/facilities/Massage.svg') }}" width="80px">
                <h5 class="mt-3">Massage</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="{{ asset('images/facilities/TV.svg') }}" width="80px">
                <h5 class="mt-3">TV</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="{{ asset('images/facilities/RoomHeater.svg') }}" width="80px">
                <h5 class="mt-3">Room Heater</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities
                    >>></a>
            </div>
        </div>
    </div>

    <!--Testemonials-->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>

    <div class="container mt-5">
        <div class="swiper swiper-testimonials"> I
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="{{ asset('images/features/star.png') }}" width="30px">
                        <h6 class="m-0 ms-2">Mossab Arektout</h6>
                    </div>
                    <p>
                        An absolute gem! Impeccably clean rooms, warm hospitality, and delicious breakfast. Can't wait
                        to return!
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="{{ asset('images/features/star.png') }}" width="30px">
                        <h6 class="m-0 ms-2">Abdrrahim Mabrouk</h6>
                    </div>
                    <p>
                        Outstanding experience! From the elegant rooms to the top-notch service, every aspect exceeded
                        my expectations. Highly recommend.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="{{ asset('images/features/star.png') }}" width="30px">
                        <h6 class="m-0 ms-2">Maryem Tahouli</h6>
                    </div>
                    <p>
                        Exceptional stay, Luxurious accommodations, attentive staff, and unbeatable location. A truly
                        memorable experience!
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!--Reach Us-->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 rounded">
                <iframe class="w-100 rounded" height="450"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105884.8945318752!2d-6.939664907188945!3d33.969333764973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda76b871f50c5c1%3A0x7ac946ed7408076b!2sRabat!5e0!3m2!1sfr!2sma!4v1712932333606!5m2!1sfr!2sma"
                    loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call Us</h5>
                    <a href="tel: +212650198808" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +212650198808
                    </a>
                    <br>
                    <a href="tel: +212650198808" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +221601123589
                    </a>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow Us</h5>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter-x me-1"></i> Twitter
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>


</x-layout>
