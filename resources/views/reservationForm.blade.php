<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-sm btn-secondary">Sign Out</button>
        </form>
        <h2 class="mt-5 mb-4">Room Reservation Form</h2>
        <form action="{{ route('reservation.showRooms') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="startdate">Start Date:</label>
                <input type="date" class="form-control" id="startdate" name="startdate" required>
            </div>
            <div class="form-group">
                <label for="enddate">End Date:</label>
                <input type="date" class="form-control" id="enddate" name="enddate" required>
            </div>
            <div class="form-group">
                <label for="room_type">Room Type:</label>
                <select class="form-control" id="room_type" name="room_type" required>
                    <option value="">Select Room Type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
