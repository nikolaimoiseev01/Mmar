<main class="flex-1 content">
    @section('title')
        FAQ
    @endsection
    <x-page-title class="mb-12 content">Frequently Asked Questions</x-page-title>
    <div class="flex flex-wrap gap-4 mb-20 mx-auto w-fit md:justify-center">
        @foreach($blocks as $key=>$block)
            <a href="#{{Str::slug($key)}}" class="border border-red-300 rounded-3xl p-2 text-red-300 hover:text-bright-200 hover:bg-red-300 transition cursor-pointer">{{$key}}</a>
        @endforeach
    </div>
    <div class="flex flex-col">
        @foreach($blocks as $key=>$block)
            <div id="{{Str::slug($key)}}" class="border-t border-red-100 flex gap-8 md:flex-col">
                <div class="w-1/2 gap-2 pt-4 md:w-full">
                    <div class="flex gap-2 items-center">
                        <span class="bg-red-700 w-2 h-2 rounded-full block dark:bg-bright-200"></span>
                        <p class="font-bold text-xl">{{$key}}</p>
                    </div>
                </div>
                <div class="flex flex-col w-1/2 md:w-full">
                    @foreach($block as $question)
                        <div x-data="{ open: false }" class="py-4">
                            <!-- Вопрос -->
                            <button
                                @click="open = !open"
                                class="flex w-full justify-between items-center text-left hover:text-purple-700 transition"
                            >
                                <span class="text-lg font-medium">{{$question['question']}}</span>
                                <span class="text-2xl transition-transform duration-300" :class="open ? 'rotate-45' : ''">+</span>
                            </button>

                            <!-- Ответ -->
                            <div
                                x-show="open"
                                x-collapse
                                class="mt-2 text-gray-600"
                            >{{$question['answer']}}</div>
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach
    </div>

</main>
