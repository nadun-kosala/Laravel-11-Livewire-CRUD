<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if ($post)
        <div class="mx-auto px-2 py-4 max-w-2xl my-20">
            <div class="bg-white shadow-2xl rounded-lg mb-6 tracking-wide">
                <div class="md:flex-shrink-0">
                    <img src='{{ $post->imagePath ? env('APP_URL') . '/' . $post->imagePath : 'https://wingandaprayer.live/wp-content/uploads/2018/07/no-image-available.jpg?w=640' }}'
                        alt="mountains" class="rounded-lg" >
                </div>
                <div class="px-4 py-2 mt-2">
                    <h2 class="font-bold text-2xl text-gray-800 tracking-normal">{{ $post->title }}
                    </h2>
                    <p class="text-sm text-gray-700 px-2 mr-1 mt-5">
                        {{ $post->content }}
                    </p>
                    <div class="flex items-center justify-between mt-2 mx-6">
                        <a href="#" class="text-blue-500 text-xs -ml-3 "></a>
                        <a href="#" class="flex text-gray-700">
                            <svg fill="none" viewBox="0 0 24 24" class="w-6 h-6 text-blue-500" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            5
                        </a>
                    </div>
                    <div class="author flex items-center -ml-3 my-3">
                        <div class="user-logo">
                            <img class="w-12 h-12 object-cover rounded-full mx-4  shadow"
                                src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=731&q=80"
                                alt="avatar">
                        </div>
                        <h2 class="text-sm tracking-tighter text-gray-900">
                            <a href="#">{{auth()->user()->name}}</a> <span class="text-gray-600">{{$post->created_at}}</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>Select a post to view details.</p>
    @endif
</div>
