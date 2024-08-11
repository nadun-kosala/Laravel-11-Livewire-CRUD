<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div
        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700  flex justify-center items-center mt-10">
        @if ($qu)
            @if ($qu['questionNumber'] == 1)
                <div>
                    <div class="max-w-sm mx-auto">
                        <div>
                            <div class="mb-5">
                                <h1>{{ $qu['question'] }}</h1>
                            </div>
                            <div class="mb-5">
                                @foreach ($qu['answers'] as $item)
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $item }}</label>
                                    <input type="text" id="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                @endforeach
                            </div>

                            <button type="submit" wire:click="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>
                    </div>
                </div>
            @elseif($qu['questionNumber'] == 2)
                <div>
                    <div class="max-w-sm mx-auto">
                        <div>
                            <div class="mb-5">
                                <h1>Quetion 2</h1>
                            </div>
                            <div class="mb-5">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    Answer</label>
                                <input type="checkbox" id="checkbox"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>

                            <button type="submit" wire:click="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>
                    </div>
                </div>
            @elseif($qu['questionNumber'] == 3)
                <div>
                    <div class="max-w-sm mx-auto">
                        <div>
                            <div class="mb-5">
                                <h1>{{ $qu['question'] }}</h1>
                            </div>
                            <div class="mb-5">
                                @foreach ($qu['answers'] as $item)
                                    <label for="text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $item }}</label>
                                    <input type="text" id="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                @endforeach
                            </div>

                            <button type="submit" wire:click="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
