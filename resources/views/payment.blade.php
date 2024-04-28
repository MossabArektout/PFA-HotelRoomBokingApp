<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .credit-card-input input[type="text"] {
            width: 100%;
            padding-left: 40px;
            padding-right: 40px;
            border-radius: 5px;
            font-size: 16px;
            line-height: 2.2;
        }

        .credit-card-input input[type="text"]::placeholder {
            color: #ccc;
            font-family: 'Arial', sans-serif;
        }

        .credit-card-input .cc-icon {
            position: absolute;
            top: 10%;
            left: 25px;
            transform: translateY(-75%);
            font-size: 10px;
            color: #aaa;
            pointer-events: none;
        }

        .card-header,
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center mb-0">Payment Details</h3>
                    </div>
                    <div class="card-body">
                        <form id="paymentForm"
                            action="{{ route('process.payment', ['roomId' => $roomId, 'amount' => $amount]) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $roomId }}">
                            <input type="hidden" name="amount" value="{{ $amount }}">
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
                                        placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" required>
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
                                <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
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
</body>

</html>
