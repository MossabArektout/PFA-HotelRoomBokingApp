<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="common.css">
    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35;
            }
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        .h-font {
            font-family: 'Merienda', cursive;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-upload-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-bg {
            background-color: #2ec1ac;
            border: 1px solid #2ec1ac;
        }

        .custom-bg:hover {
            background-color: #279e8c;
            border-color: #279e8c;
        }
    </style>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">HOTEL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active me-2" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        Login
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal"
                        data-bs-target="#registerModal">
                        Register
                    </button>
                </div>
            </div>
        </div>
    </nav>



    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ Route('login') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-circle fs-3 me-2"></i>User Login
                        </h1>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control shadow-none" id="email" name="email"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none" id="password" name="password"
                                required>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">Login</button>
                            <a href="jacascript: void(0)" class="text-secondary text-decoration-none">Forgot
                                Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/register" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i>User Registration
                        </h1>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 test-wrap lh-base">

                        </span>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label for="firstname" class="form-label">Firstname</label>
                                    <input type="text" class="form-control shadow-none" id="firstname"
                                        name="firstname" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label for="lastname" class="form-label">Lastname</label>
                                    <input type="text" class="form-control shadow-none" id="lastname"
                                        name="lastname" required>
                                </div>
                                <div class="col-md-12 p-0 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control shadow-none" id="email"
                                        name="email" required></input>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control shadow-none" id="password"
                                        name="password" required>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Confirm password</label>
                                    <input type="password" class="form-control shadow-none"
                                        id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shadow-none">Register</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
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
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3  mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3  mb-3">
                            <label class="form-label" style="font-weight: 500">Type</label>
                            <select class="form-select shadow-none">
                                {{-- <option value="1">Standard</option>
                                <option value="2">Double</option>
                                <option value="3">Familiale</option>
                                <option value="4">Suite</option> --}}
                                <option value="">Select Room Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->type }}">{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-2 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Chercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Rooms-->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="{{ asset('images/rooms/1.jpg') }}" class="card-img-top">
                    <div class="card-body">
                        <h5>Family Room</h5>
                        <h6 class="mb-4">450 MAD per night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Rooms
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Sofa
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                TV
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AC
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Room header
                            </span>
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

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="{{ asset('images/rooms/2.png') }}" class="card-img-top">
                    <div class="card-body">
                        <h5>Standard Room</h5>
                        <h6 class="mb-4">200 MAD per night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Rooms
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Sofa
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                TV
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AC
                            </span>
                        </div>
                        <div class="rating nb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
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

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="{{ asset('images/rooms/6.png') }}" class="card-img-top">
                    <div class="card-body">
                        <h5>Deluxe Room</h5>
                        <h6 class="mb-4">350 MAD per night</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Rooms
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                workSpace
                            </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Wifi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                TV
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AC
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                Room header
                            </span>
                        </div>
                        <div class="rating nb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
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
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms>>></a>
            </div>
        </div>
    </div>

    <!--facilities-->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>

    <div class="container">
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

    <!--Footer-->
    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-lg-4 p-4">
                <h3 class="h-font fw-bold fs-3 mb-2">HOTEL</h3>
                <p>
                    Experience luxury in the heart of Morocco at Bayview Hotel.
                    Our attentive staff and meticulously designed rooms ensure a comfortable stay,
                    while our on-site dining and spa facilities provide ultimate relaxation. Whether you're here for
                    business or
                    leisure, our convenient location and top-notch amenities make us the perfect choice.
                    Book your stay now and indulge in a truly unforgettable experience
                </p>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Links</h5>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a><br>
                <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">About us</a>
            </div>
            <div class="col-lg-4 p-4">
                <h5 class="mb-3">Follow us</h5>
                <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
                    <i class="bi bi-twitter-x me-1"></i> Twitter
                </a><br>
                <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
                    <i class="bi bi-facebook me-1"></i> Facebook
                </a><br>
                <a href="#" class="d-inline-block text-dark text-decoration-none">
                    <i class="bi bi-instagram me-1"></i> Instagram
                </a><br>
            </div>
        </div>
    </div>

    <h6 class="text-center bg-dark text-white p-3 m-0">Bayview Hotel wishes you a wonderfull stay.</h6>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });

        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grapCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>
</body>

</html>
