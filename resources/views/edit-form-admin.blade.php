<x-dashboard-layout>
    <section class="panel important">
        <h2>Update Room</h2>
        <form action="{{ route('admin.actuallyUpdate', $room) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="twothirds">
                Room Numero:<br />
                <input type="text" name="numero" size="40" value="{{ $room->numero }}" /><br /><br />
                Price:<br />
                <input type="text" name="price" value="{{ $room->price }}" /><br /><br />
                Type:
                <select name="type">
                    <option value="">Select Room Type</option>
                    @foreach ($types as $type)
                        <option selected value="{{ $type->type }}">
                            {{ $type->type }}</option>
                    @endforeach
                </select><br /><br />
                Images:<br />
                <input type="file" name="images[]" accept="image/*" multiple />
                <input type="text" class="form-control" name="hidden_fileupload" value="{{ $room->images }}"><br />
                <!-- Change name to images[] -->

                {{-- <label>File Upload</label>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="fileupload">
                    <input type="text" class="form-control" name="hidden_fileupload"
                        value="{{ $bookingEdit->fileupload }}"> <label class="custom-file-label" for="customFile">Choose
                        file</label>
                </div> --}}
            </div>
            <div>
                <input type="submit" name="submit" value="Update Room" />
            </div>
        </form>
    </section>
</x-dashboard-layout>
