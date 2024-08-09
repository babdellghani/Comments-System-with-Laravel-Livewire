<div x-data="{
    isReplying: @entangle('isReplying'),
    isEditing: @entangle('isEditing'),
}">
    <article class="my-6 text-base bg-white rounded-lg">
        {{-- Comment Header --}}
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
                    @if ($comment->updated_at > $comment->created_at)
                        <span class="mx-1">•</span>
                        <span class="text-sm text-gray-400" title="Edited at {{ $comment->updated_at }}">
                            Edited
                        </span>
                    @endif
                </p>
            </div>
        </footer>

        {{-- Comment Body --}}
        <p class="text-gray-500" x-show="!isEditing" x-transition>
            {{ $comment->body }}
        </p>

        {{-- Reply Form Update --}}
        <form x-show="isEditing" x-transition wire:submit.prevent="updateComment">
            <div class="py-2 mb-4">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea wire:model="updateForm.body" placeholder="Write a comment..."
                    class="shadow-sm block rounded-md w-full border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500
                @error('updateForm.body')
                    text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 border-red-300
                @enderror"></textarea>
                @error('updateForm.body')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-blue-800">
                Update
            </button>

            <button @click="isEditing=false" type="button"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg">
                Cancel
            </button>
        </form>

        {{-- Reply, Edit, Delete Section --}}
        <div class="flex items-center mt-4 space-x-4">
            @if (!$comment->parent_id)
                <button type="button" @click="isReplying=!isReplying"
                    class="flex items-center text-sm text-gray-500 hover:underline">
                    <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                    Reply
                </button>
            @endif

            <button type="button" @click="isEditing=!isEditing"
                class="flex items-center text-sm text-gray-500 hover:underline">
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
    </article>

    {{-- Reply Form --}}
    <form class="mb-6 mt-6 ml-6" x-show="isReplying" x-transition wire:submit="storeReply">
        <div class="py-2 mb-4">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea wire:model="replyForm.body" placeholder="Write a comment..."
                class="shadow-sm block rounded-md w-full border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500
                @error('replyForm.body')
                    text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 border-red-300
                @enderror"></textarea>
            @error('replyForm.body')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-blue-800">
            Reply
        </button>

        <button @click="isReplying=false" type="button"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg">
            Cancel
        </button>
    </form>

    {{-- Replies --}}
    <div class="ml-10 mt-10">
        @foreach ($comment->replies as $reply)
            @livewire('comment', ['comment' => $reply], key($reply->id))
        @endforeach
    </div>
</div>
