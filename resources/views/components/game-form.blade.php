@csrf

<div class="mb-4">
    <label class="block font-medium">Title</label>
    <input type="text" name="title" value="{{ old('title', $game?->title) }}" class="w-full border rounded p-2">
    @error('title')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block font-medium">Description</label>
    <textarea name="description" class="w-full border rounded p-2" rows="5">
        {{ old('description', $game?->description) }}
    </textarea>
    @error('description')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block font-medium">Developer</label>
    <input type="text" name="developer" value="{{ old('developer', $game?->developer) }}"
        class="w-full border rounded p-2">
    @error('developer')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block font-medium">Release date</label>
    <input type="date" name="release_date" value="{{ old('release_date', $game?->release_date) }}"
        class="w-full border rounded p-2">
    @error('release_date')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block font-medium">Cover image</label>
    <input type="file" name="cover_image">
    @error('cover_image')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="genres" class="block font-medium">Genres</label>
    <select name="genres[]" id="genres" multiple class="mt-1 block w-full border rounded p-2 bg-white text-gray-900">
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}" @if(isset($game) && $game->genres->contains($genre->id)) selected @endif>
                {{ $genre->name }}
            </option>
        @endforeach
    </select>
    @error('genres')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
    <p class="mt-1 text-sm text-gray-500">Hold Ctrl (Windows) or Cmd (Mac) to select multiple genres</p>
</div>

<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
    Save
</button>