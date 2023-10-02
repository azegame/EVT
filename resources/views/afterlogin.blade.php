<x-app-layout>
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <div class="flex justify-center text-gray-900 dark:text-white mb-5 border border-transparent border-gray-300 dark:border-gray-700">
                保存したテキスト一覧
            </div>
            <ul class="space-y-2 font-medium">
                <li>
                    @foreach($texts as $text)
                    <span class="flex-1 ml-3 text-sm text-gray-500 dark:text-gray-400 rounded-lg">
                        {{ $text->created_at }}
                    </span>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="icon-sm" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap truncate ... text">
                            {{ $text->text }}
                        </span>
                    </a>
                    <form method="post" action="{{ route('texts.destroy', ['id' => $text->id])}}">
                        @csrf
                        <div class="p-2 w-full">

                            <button class="flex text-gray-900 dark:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    @endforeach
                </li>
            </ul>
        </div>
    </aside>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-600">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                </div>
                <section class="text-gray-600 body-font relative">
                    <form method="post" action="{{ route('texts.store') }}">
                        @csrf
                        <div class="container px-5 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="text" class="leading-7 text-sm text-gray-600 dark:text-gray-300">テキスト</label>
                                            <textarea id="text" name="text" class="w-full bg-gray-100 dark:bg-gray-400 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:dark:bg-gray-400 focus:ring-2 focus:ring-indigo-200 focus:dark:ring-gray-50 h-32 text-base outline-none text-gray-700 dark:text-white py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">Hello World</textarea>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full text-center mt-5">
                                        <label for="vol" class="col-3 font-weight-bold text-center dark:text-gray-200">
                                            速度:
                                            <span id="speedLabel">({{ old('speed', '1.0') }})</span></label>
                                        <input type="range" id="id_speed" name="speed" class="col-7 offset-1" step="0.1" min="0.1" max="2.0" value="1.0" required>
                                        <div class="mb-4"></div>
                                        <!--<select id="voice-select" class="w-1/2 h-8 text-xs text-black-900"></select>-->
                                        <div class="mt-7"></div>
                                        <div class="flex justify-center space-x-4 mb-4">
                                            <button id="speak-btn" type="button" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">再生</button>
                                            <button id="stop-btn" type="button" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">一時停止</button>
                                            <button class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">保存する</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>