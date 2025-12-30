@auth
    @if(!$hasReviewed)
        <form action="{{ route('reviews.store', $game) }}" method="POST" class="mt-6">
            @csrf

            <label class="block mb-2 font-semibold">Your rating</label>
            <input type="number" name="rating" step="0.5" min="0.5" max="5" required class="border rounded px-2 py-1">

            <textarea name="comment" class="w-full border rounded mt-2 p-2" placeholder="Optional comment"></textarea>

            <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded">
                Submit review
            </button>
        </form>
    @endif
@endauth