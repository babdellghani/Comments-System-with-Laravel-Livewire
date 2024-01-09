<div>
    <article class="my-6 text-base bg-white rounded-lg">
        <footer class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 capitalize">
                    <img class="mr-2 w-6 h-6 rounded-full" src="{{ $comment->user->avatar() }}"
                        alt="{{ $comment->user->name }}">
                    {{ $comment->user->name }}
                </p>

                <p class="text-sm text-gray-600">
                    <time pubdate
                        datetime="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </div>
        </footer>
        <p class="text-gray-500">
            {{ $comment->body }}
        </p>

        {{-- Reply, Edit, Delete Section --}}
        <div class="flex items-center mt-4 space-x-4">
            <button type="button" class="flex items-center text-sm text-gray-500 hover:underline">
                <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                    </path>
                </svg>
                Reply
            </button>

            <button type="button" class="flex items-center text-sm text-gray-500 hover:underline">
                <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                    </path>
                </svg>
                Edit
            </button>

            <button type="button" class="flex items-center text-sm text-gray-500 hover:underline">
                <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
                Delete
            </button>

        </div>

        <form class="mb-6 mt-6 ml-6" wire:submit="replyComment">
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" style="resize: none"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none" placeholder="Write a comment..."></textarea>

            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-blue-800">
                Reply
            </button>

            <button
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg">
                Cancel
            </button>
        </form>

    </article>
</div>
