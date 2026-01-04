<h2 class="text-2xl font-bold mt-6 mb-2">Reviews</h2>

@forelse ($reviews as $review)
    <div class="mb-4 p-4 border rounded bg-gray-50 dark:bg-gray-800">
        <div class="flex justify-between items-center mb-2">
            <strong>{{ $review->user->name }}</strong>

            <span class="text-yellow-500 font-semibold">
                {{ $review->rating }} ★
            </span>
        </div>

        @if($review->comment)
            <p class="text-gray-700 dark:text-gray-300">
                {{ $review->comment }}
            </p>
        @endif

        @can('update', $review)
            <form action="{{ route('reviews.update', $review) }}" method="POST" class="mt-3">
                @csrf
                @method('PATCH')

                <input type="number" name="rating" step="0.5" min="0.5" max="5" value="{{ $review->rating }}"
                    class="border rounded px-2 py-1">

                <textarea name="comment" class="w-full border rounded mt-2 p-2">{{ $review->comment }}</textarea>

                <button class="mt-2 bg-blue-600 text-white px-3 py-1 rounded">
                    Update
                </button>
            </form>
        @endcan

        @can('delete', $review)
            <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="mt-2"
                onsubmit="return confirm('Are you sure you want to delete this review? This action cannot be undone.')">
                @csrf
                @method('DELETE')

                <button class="text-red-600">
                    Delete
                </button>
            </form>
        @endcan
    </div>
@empty
    <p class="text-gray-500">No reviews yet.</p>
@endforelse