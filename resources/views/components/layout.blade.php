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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
    @auth
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
                            <a class="nav-link active me-2" aria-current="page" href="#">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="#">Chambres</a>
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
                        <a href="/profile/{{ auth()->user()->username }}" class="mr-2"><img title="My Profile"
                                data-toggle="tooltip" data-placement="bottom"
                                style="width: 32px; height: 32px; border-radius: 16px"
                                src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
                        @if (auth()->user()->isAdmin)
                            <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary">Dashboard</a>
                        @endif
                        <form action="/logout" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-secondary">Sign Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    @else
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
                            <a class="nav-link active me-2" aria-current="page" href="#">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="#">Chambres</a>
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
                        <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3"
                            data-bs-toggle="modal" data-bs-target="#registerModal">
                            Register
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    @endauth

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

    @if (session()->has('failure'))
        <div class="container container--narrow">
            <div class="alert alert-warning text-center">
                {{ session('failure') }}
            </div>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="container container--narrow">
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{ $slot }}


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
