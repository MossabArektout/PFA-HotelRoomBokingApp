<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Invoice</title>
    <style>
        /* Define your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .invoice-header {
            margin-bottom: 20px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .invoice-table th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-header">
        <h2>Reservation Invoice</h2>
    </div>
    <div class="invoice-details">
        <p><strong>User Information:</strong></p>
        <p>Name: {{ $user->firstname }} {{ $user->lastname }}</p>
        <p>Email: {{ $user->email }}</p>
        <hr>
        <p><strong>Room Information:</strong></p>
        <p>Room Number: {{ $room->numero }}</p>
        <p>Room Type: {{ $type->type }}</p>
        <hr>
        <p><strong>Reservation Information:</strong></p>
        {{-- <p>Check-in Date: {{ $reservation->check_in_date }}</p>
        <p>Check-out Date: {{ $reservation->check_out_date }}</p> --}}
        <p>Total Amount: {{ $room->price }}</p>
    </div>
    <!-- You can add more details or customize the layout as needed -->
</body>

</html>
