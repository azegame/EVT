<x-app-layout>
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
                                            <label for="text" class="leading-7 text-sm text-gray-600 dark:text-gray-300">テキスト(ログインすれば保存できます。)</label>
                                            <textarea id="text" name="text" class="w-full bg-gray-100 dark:bg-gray-400 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:dark:bg-gray-400 focus:ring-2 focus:ring-indigo-200 focus:dark:ring-gray-50 h-32 text-base outline-none text-gray-700 dark:text-white py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">Hello World</textarea>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full text-center">
                                        <label for="vol" class="col-3 font-weight-bold text-center dark:text-gray-200">
                                            速度:
                                            <span id="speedLabel">({{ old('speed', '1.0') }})</span></label>
                                        <input type="range" id="id_speed" name="speed" class="col-7 offset-1" step="0.1" min="0.1" max="2.0" value="1.0" required>
                                        <div class="mb-4"></div>
                                        <!--<select id="voice-select" class="w-1/2 h-8 text-xs text-black-900"></select>-->
                                        <div class="mt-7"></div>
                                        <div class="flex justify-center space-x-4 mb-4">
                                            <button id="speak-btn" type="button" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">再生</button>
                                            <button id="stop-btn" type="button" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">停止</button>
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