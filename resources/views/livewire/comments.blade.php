<section class="bg-white py-8 lg:py-16">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-xl text-gray-900">
                Comments ({{ $model->comments()->count() }})
            </h2>
        </div>

        @if ($c²omments->count() == 0)
            {{-- Comment Body --}}
            @foreach ($comments as $comment)
                @livewire('comment', ['comment' => $comment], key($comment->id))
            @endforeach

            {{-- Pagination --}}
            <div class="my-5">
                {{ $comments->links() }}
            </div>
        @else
            <div class="my-5 text-center">
                No comments yet
            </div>
        @endif

        {{-- Comment Form --}}
        <form class="mb-6" wire:submit="postComment">
            <div class="py-2 mb-4">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea wire:model="form.body" style="resize: none" rows="4" placeholder="Write a comment..."
                    class="shadow-sm block rounded-md w-full border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500
                    @error('form.body')
                    text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 border-red-300
                    @enderror"></textarea>

                @error('form.body')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-blue-800">
                Comment
            </button>
        </form>

    </div>
</section>
