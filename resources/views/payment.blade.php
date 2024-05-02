<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold">Confirm Boking</h2>
                <div style="font-size: 14px;">
                    <a href="#" class="text-secondary text-decoration-none">Home</a>
                    <span class="text-secondary"> -> </span>
                    <a href="#" class="text-secondary text-decoration-none">Rooms</a>
                    <span class="text-secondary"> -> </span>
                    <a href="#" class="text-secondary text-decoration-none">Confirm</a>


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
                                <img src="{{ asset($image) }}" class="img-fluid runded mb-3" style="height: 100%;"
                                    alt="Image {{ $index }}">
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <h5>{{ $room->feature->type }}</h5>
                        <h6>{{ $room->price }} MAD/nuit</h6>
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
                        <form id="paymentForm"
                            action="{{ route('process.payment', ['roomId' => $room->id, 'amount' => $room->price, 'startdate' => $startdate, 'enddate' => $enddate]) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <input type="hidden" name="amount" value="{{ $room->price }}">
                            <input type="hidden" name="startdate" value="{{ $startdate }}">
                            <input type="hidden" name="endtdate" value="{{ $enddate }}">
                            <div class="form-group position-relative credit-card-input mb-4">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber"
                                    placeholder="XXXX XXXX XXXX XXXX" required>
                                <i class="cc-icon fas fa-credit-card"></i>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="expiryDate">Expiry Date</label>
                                    <input type="text" class="form-control" id="expiryDate" name="expiryDate"
                                        placeholder="MM/YY" required>
                                    <small id="expiryDateMessage" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cvv">CVV</label>
                                    <input type="text" class="form-control" id="cvv" name="cvv"
                                        placeholder="CVV" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cardholderName">Cardholder Name</label>
                                <input type="text" class="form-control" id="cardholderName" name="cardholderName"
                                    placeholder="Enter cardholder name" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn w-100 text-white custom-bg shadow-none mb-1">Pay
                                    Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Custom JavaScript -->
    <script>
        document.getElementById('cardNumber').addEventListener('input', function(e) {
            let target = e.target;
            target.value = target.value.replace(/\D/g, '').substring(0, 16);
        });

        document.getElementById('expiryDate').addEventListener('input', function(e) {
            let target = e.target;
            target.value = target.value.replace(/[^\d\/]/g, '');
        });

        document.getElementById('expiryDate').addEventListener('change', function(e) {
            let enteredDate = e.target.value;
            let currentDate = new Date();
            let currentYear = currentDate.getFullYear() % 100; // Get last two digits of the year
            let currentMonth = currentDate.getMonth() + 1; // Month is zero-based, so add 1

            if (enteredDate.length === 5) {
                let month = parseInt(enteredDate.substring(0, 2));
                let year = parseInt(enteredDate.substring(3));

                if (year < currentYear || (year === currentYear && month < currentMonth)) {
                    document.getElementById('expiryDateMessage').textContent = 'Card is expired.';
                    document.getElementById('expiryDate').classList.add('is-invalid');
                } else {
                    document.getElementById('expiryDateMessage').textContent = '';
                    document.getElementById('expiryDate').classList.remove('is-invalid');
                }
            }
        });
    </script>
</x-layout>
