<form method="POST" action="{{ route('profile.updateImage') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="image">Виберіть зображення:</label>
        <input type="file" class="form-control-file" id="image" name="image">
        <p class="mt-2 text-sm text-gray-500">Допустимі формати: .jpg, .jpeg. Розмір не більше 5 МБ</p>
    </div>
    <div class="avatar-image d-flex justify-content-center align-items-center rounded overflow-hidden mt-4">
        <img id="avatar-preview" src="{{asset("public/image/avatar/avatar".$user->id.".jpg")}}" alt="Avatar Preview" class="rounded" style="max-width: 220px; max-height: 220px;">
    </div>
    <div class="flex justify-content-center mt-4">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Save
        </button>
    </div>
</form>
