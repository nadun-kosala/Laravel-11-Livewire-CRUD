<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if ($isOpenCreateModal)
        <div>
            <div
                class="fixed inset-0 z-40 min-h-full overflow-y-auto overflow-x-hidden transition flex items-center justify-center">
                <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-black/50 cursor-pointer">
                </div>

                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-gray-200 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Modal header -->
                        <div
                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Add Post
                            </h3>
                            <button type="button" wire:click="closeCreatePostModal"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                    Title</label>
                                <input type="text" name="title" id="title" wire:model="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type post title">
                                @error('title')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror

                            </div>
                            <div>
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                    Category</label>
                                <select id="category" wire:model="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected>Select category</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="twitter">Twitter</option>
                                </select>
                                @error('category')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="content"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                    Content</label>
                                <textarea id="content" rows="5" wire:model="content"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Write post content here"></textarea>
                                @error('content')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="button" wire:click="createPost"
                            class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Add new post
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($isOpenEditPostModal)
        <div>
            <div
                class="fixed inset-0 z-40 min-h-full overflow-y-auto overflow-x-hidden transition flex items-center justify-center">
                <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-black/50 cursor-pointer">
                </div>

                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-gray-200 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Modal header -->
                        <div
                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Update Post
                            </h3>
                            <button type="button" wire:click="closeEditPostModal"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                    Title</label>
                                <input type="text" name="title" id="title" wire:model="updateTitle"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type post title">
                                @error('title')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror

                            </div>
                            <div>
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                    Category</label>
                                <select id="category" wire:model="updateCategory"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected>Select category</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="twitter">Twitter</option>
                                </select>
                                @error('category')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="content"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                    Content</label>
                                <textarea id="content" rows="5" wire:model="updateContent"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Write post content here"></textarea>
                                @error('content')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="button" wire:click="updatePost({{ $editPost->id }})"
                            class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Update post
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($isOpenDeletePostModal)
        <div>
            <div
                class="fixed inset-0 z-40 min-h-full overflow-y-auto overflow-x-hidden transition flex items-center justify-center">
                <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-black/50 cursor-pointer">
                </div>

                <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-gray-200 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Modal header -->
                        <div
                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Delete Post
                            </h3>
                            <button type="button" wire:click=""
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="flex justify-center items-center gap-4">
                            <button type="button" wire:click=""
                                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">

                                Delete
                            </button>
                            <button type="button" wire:click=""
                                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">

                                Cancel
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <h1
                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Latest Posts</h1>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Post Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Content
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                </thead>
                @foreach ($posts as $post)
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                #{{ $post->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $post->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->category }}
                            </td>
                            <td class="px-6 py-4">
                                {{ Str::words($post->content, 7) }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button wire:click="openEditPostModal({{ $post->id }})"
                                    class="relative px-5 py-3 overflow-hidden font-medium text-gray-600 bg-gray-100 border border-gray-100 rounded-lg shadow-inner group">
                                    <span
                                        class="absolute top-0 left-0 w-0 h-0 transition-all duration-200 border-t-2 border-blue-600 group-hover:w-full ease"></span>
                                    <span
                                        class="absolute bottom-0 right-0 w-0 h-0 transition-all duration-200 border-b-2 border-blue-600 group-hover:w-full ease"></span>
                                    <span
                                        class="absolute top-0 left-0 w-full h-0 transition-all duration-300 delay-200 bg-blue-600 group-hover:h-full ease"></span>
                                    <span
                                        class="absolute bottom-0 left-0 w-full h-0 transition-all duration-300 delay-200 bg-blue-600 group-hover:h-full ease"></span>
                                    <span
                                        class="absolute inset-0 w-full h-full duration-300 delay-300 bg-blue-900 opacity-0 group-hover:opacity-100"></span>
                                    <span
                                        class="relative transition-colors duration-300 delay-200 group-hover:text-white ease">Edit
                                        Post</span>
                                </button>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button wire:click="openDeletePostModal({{ $post->id }})"
                                    class="relative px-5 py-3 overflow-hidden font-medium text-gray-600 bg-gray-100 border border-gray-100 rounded-lg shadow-inner group">
                                    <span
                                        class="absolute top-0 left-0 w-0 h-0 transition-all duration-200 border-t-2 border-red-600 group-hover:w-full ease"></span>
                                    <span
                                        class="absolute bottom-0 right-0 w-0 h-0 transition-all duration-200 border-b-2 border-red-600 group-hover:w-full ease"></span>
                                    <span
                                        class="absolute top-0 left-0 w-full h-0 transition-all duration-300 delay-200 bg-red-600 group-hover:h-full ease"></span>
                                    <span
                                        class="absolute bottom-0 left-0 w-full h-0 transition-all duration-300 delay-200 bg-red-600 group-hover:h-full ease"></span>
                                    <span
                                        class="absolute inset-0 w-full h-full duration-300 delay-300 bg-red-900 opacity-0 group-hover:opacity-100"></span>
                                    <span
                                        class="relative transition-colors duration-300 delay-200 group-hover:text-white ease">Delete
                                        Post</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

    <div class="mt-5">
        <button wire:click="openCreatePostModal"
            class="relative inline-flex items-center justify-start inline-block px-5 py-3 overflow-hidden font-medium transition-all bg-blue-600 rounded-full hover:bg-white group">
            <span
                class="absolute inset-0 border-0 group-hover:border-[25px] ease-linear duration-100 transition-all border-white rounded-full"></span>
            <span
                class="relative w-full text-left text-white transition-colors duration-200 ease-in-out group-hover:text-blue-600">
                Create Post</span>
        </button>
    </div>

</div>
