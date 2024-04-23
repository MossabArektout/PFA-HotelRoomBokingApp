<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Payment Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('process.payment', ['roomId' => $roomId, 'amount' => $amount]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $roomId }}">
                            <input type="hidden" name="amount" value="{{$amount }}">
                            <div class="form-group">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Enter card number">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="expiryDate">Expiry Date</label>
                                    <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cvv">CVV</label>
                                    <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cardholderName">Cardholder Name</label>
                                <input type="text" class="form-control" id="cardholderName" name="cardholderName" placeholder="Enter cardholder name">
                            </div>
                            <div class="text-center">
                                <button  type="submit" class="btn btn-primary">Pay Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
