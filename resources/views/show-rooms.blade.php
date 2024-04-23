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
        <div class="row">
            @foreach($rooms as $room)
                @if($room->avalibility == 1)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->numero }}</h5>
                            <ul>
                                @if($room->feature->number_of_rooms)
                                <li>{{ $room->feature->number_of_rooms }} Rooms</li>
                                @endif
                                @if($room->feature->number_of_beds)
                                <li>{{ $room->feature->number_of_beds }} Beds</li>
                                @endif
                                @if($room->feature->bathroom)
                                <li>{{ $room->feature->bathroom }} Bathroom</li>
                                @endif
                                @if($room->feature->balcony)
                                <li>{{ $room->feature->balcony }} Balcony</li>
                                @endif
                                @if($room->feature->workspace)
                                <li>{{ $room->feature->workspace }} Workspace</li>
                                @endif
                                @if($room->feature->TV == 1)
                                <li>TV</li>
                                @endif
                                @if($room->feature->wifi == 1)
                                <li>WiFi</li>
                                @endif
                                @if($room->feature->minibar == 1)
                                <li>Minibar</li>
                                @endif
                                @if($room->feature->price)
                                <li>Price: {{ $room->feature->price }} MAD</li>
                                @endif
                            </ul>
                            <div class="container mt-3">
                                <!-- Pass room_id and amount to payment form -->
                                <a href="{{ route('payment.form', ['roomId' => $room->id, 'amount' => $room->feature->price]) }}" class="btn btn-primary btn-sm mr-2">Reserve</a>
                                <button type="button" class="btn btn-success btn-sm">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
