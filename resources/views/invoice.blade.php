<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation of Reservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .invoice-container {
            max-width: 800px;
            /* Adjust as needed */
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .invoice-header {
            text-align: center;
            padding: 30px 0;
            background-color: #6c5ce7;
            color: #fff;
        }

        .invoice-header h1 {
            font-size: 32px;
            margin: 0;
        }

        .invoice-details {
            padding: 20px 40px;
            border-bottom: 1px solid #eee;
        }

        .invoice-details p {
            margin: 10px 0;
            color: #555;
        }

        /* Increase font size for titles */
        .invoice-details p strong {
            font-size: 20px;
        }

        .total-amount {
            padding: 10px 40px;
            text-align: right;
            background-color: #f2f2f2;
            font-size: 18px;
            font-weight: bold;
            color: #555;
        }

        .footer {
            padding: 20px 40px;
            text-align: center;
            font-size: 16px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Confirmation of Reservation</h1>
        </div>
        <div class="invoice-details">
            <p><strong>User Information:</strong></p>
            <p>Name: {{ $user->firstname }} {{ $user->lastname }}</p>
            <p>Email: {{ $user->email }}</p>
        </div>
        <div class="invoice-details">
            <p><strong>Room Information:</strong></p>
            <p>Room Number: {{ $room->numero }}</p>
            <p>Room Type: {{ $type->type }}</p>
        </div>
        <div class="invoice-details">
            <p><strong>Reservation Information:</strong></p>
            <p>Start Date: {{ $startdate }}</p>
            <p>End Date: {{ $enddate }}</p>
        </div>
        <div class="total-amount">
            <p>Total Amount: {{ $amount }} MAD</p>
        </div>
        <div class="footer">
            <p>Thank you for choosing our service!</p>
        </div>
    </div>
</body>

</html>
