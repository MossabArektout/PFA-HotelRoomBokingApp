<x-dashboard-layout>
    <section class="room-list">
        <h2>Room List</h2>
        <table>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->numero }}</td>
                        <td>{{ $room->feature->type }}</td>
                        <td>{{ $room->price }}</td>
                        <td>
                            <form action="{{ route('admin.destroy', $room) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn"
                                    onclick="return confirm('Are you sure you want to delete this incident?')">Supprimer</button>
                            </form>
                            <button>Update</button>
                        </td>
                    </tr>
                @endforeach
                <!-- Add more rows for additional rooms -->
            </tbody>
        </table>
    </section>
</x-dashboard-layout>
