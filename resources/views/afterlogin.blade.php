<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    @foreach($texts as $text)
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="flex-1 ml-3 whitespace-nowrap text">
                            {{ $text->text }}
                            {{ $text->created_at }}
                        </span>
                    </a>
                    @endforeach
                </li>
            </ul>
        </div>
    </aside>
    <div class="py-12 pl-64">
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
                                        <div class="p-2 w-full text-center">
                                            <label for="vol" class="col-3 font-weight-bold text-center dark:text-gray-200">
                                                速度:
                                                <span id="speedLabel">({{ old('speed', '1.0') }})</span></label>
                                            <input type="range" id="id_speed" name="speed" class="col-7 offset-1" step="0.1" min="0.1" max="3.0" value="1.0" required>
                                            <div class="mb-4"></div>
                                            <select id="voice-select" class="w-1/2 h-8 text-xs text-black-900"></select>
                                            <div class="mt-7"></div>
                                            <div class="flex justify-center space-x-4 mb-4">
                                                <button id="speak-btn" type="button" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">再生</button>
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
    </div>
</x-app-layout>