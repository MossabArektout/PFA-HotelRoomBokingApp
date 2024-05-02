<x-dashboard-layout>
    <section class="panel important">
        <h2>Add a New Type</h2>
        <form action="{{ route('admin.store-type') }}" method="POST">
            @csrf
            <div class="twothirds">
                <label for="type">Type:</label><br />
                <input type="text" id="type" name="type" size="40" required /><br /><br />

                <label for="number_of_rooms">Number of Rooms:</label><br />
                <input type="number" id="number_of_rooms" name="number_of_rooms" required /><br /><br />

                <label for="number_of_beds">Number of Beds:</label><br />
                <input type="number" id="number_of_beds" name="number_of_beds" required /><br /><br />

                <label for="bathroom">Bathroom:</label>
                <input type="hidden" name="bathroom" value="0">
                <input type="checkbox" id="bathroom" name="bathroom" value="1"><br /><br />

                <label for="balcony">Balcony:</label>
                <input type="hidden" name="balcony" value="0">
                <input type="checkbox" id="balcony" name="balcony" value="1"><br /><br />

                <label for="workspace">Workspace:</label>
                <input type="hidden" name="workspace" value="0">
                <input type="checkbox" id="workspace" name="workspace" value="1"><br /><br />

                <label for="TV">TV:</label>
                <input type="hidden" name="TV" value="0">
                <input type="checkbox" id="TV" name="TV" value="1"><br /><br />

                <label for="wifi">WiFi:</label>
                <input type="hidden" name="wifi" value="0">
                <input type="checkbox" id="wifi" name="wifi" value="1"><br /><br />

                <label for="minibar">Minibar:</label>
                <input type="hidden" name="minibar" value="0">
                <input type="checkbox" id="minibar" name="minibar" value="1"><br /><br />
            </div>
            <div>
                <button type="submit">Add Type</button>
            </div>
        </form>
    </section>
</x-dashboard-layout>
