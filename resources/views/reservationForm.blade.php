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
    <h2 class="mt-5 mb-4">Room Reservation Form</h2>
    <form action="{{ route('reservation.showRooms') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="start_date">Start Date:</label>
        <input type="date" class="form-control" id="start_date" name="start_date" required>
      </div>
      <div class="form-group">
        <label for="end_date">End Date:</label>
        <input type="date" class="form-control" id="end_date" name="end_date" required>
      </div>
      <div class="form-group">
        <label for="room_type">Room Type:</label>
        <select class="form-control" id="room_type" name="room_type" required>
          <option value="">Select Room Type</option>
          @foreach($types as $type)
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