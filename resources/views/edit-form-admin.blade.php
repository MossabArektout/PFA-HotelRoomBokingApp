<x-dashboard-layout>
    <section class="panel important">
        <h2>Add a New Room</h2>
        <form action="{{ route('admin.store_room') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="twothirds">
                Room Numero:<br />
                <input value="{{ old('') }}" type="text" name="numero" size="40" /><br /><br />
                Price:<br />
                <input type="text" name="price" /><br /><br />
                Type:
                <select name="type">
                    <option value="">Select Room Type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                    @endforeach
                </select><br /><br />
                Images:<br />
                <input type="file" name="images[]" accept="image/*" multiple /><br />
                <!-- Change name to images[] -->
            </div>
            <div>
                <input type="submit" name="submit" value="Add Room" />
            </div>
        </form>
    </section>
</x-dashboard-layout>
