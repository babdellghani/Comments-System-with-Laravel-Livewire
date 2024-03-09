<section class="bg-white py-8 lg:py-16">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-xl text-gray-900">
                Comments ({{ $model->comments()->count() }})
            </h2>
        </div>
        {{-- Comment Body --}}

        @foreach ($comments as $comment)
            @livewire('comment', ['comment' => $comment], key($comment->id))
        @endforeach

        {{-- Replies --}}
        <div>
            <article class="p-6 mb-6 ml-10 lg:ml-12 text-base bg-white rounded-lg">

                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900">
                            <img class="mr-2 w-6 h-6 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="Michael Gough">
                            Some name
                        </p>
                        <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-08">Feb. 8, 2022</time></p>

                    </div>
                </footer>

                <p class="text-gray-500">
                    Cpmment body
                </p>

                {{-- Edit, Delete Section --}}
                <div class="flex items-center mt-4 space-x-4">

                    <button type="button" class="flex items-center text-sm text-gray-500 hover:underline">
                        <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                            </path>
                        </svg>
                        Edit
                    </button>

                    <button type="button" class="flex items-center text-sm text-gray-500 hover:underline">
                        <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                        Delete
                    </button>

                </div>

            </article>
        </div>

        <form class="mb-6" wire:submit="postComment">
            <div class="py-2 mb-4">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea wire:model="form.body" style="resize: none"  rows="4" placeholder="Write a comment..."
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
