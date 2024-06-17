<x-app-layout>
    <div class="max-w-3xl mx-auto p-8 bg-gray-800 rounded-lg shadow-lg relative">
        <a href="/" class="text-white absolute rounded-lg font-medium">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">
                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                        <path d="M 45 0 c 24.813 0 45 20.187 45 45 c 0 24.813 -20.187 45 -45 45 C 20.186 90 0 69.813 0 45 C 0 20.187 20.186 0 45 0 z M 51.263 73.4 l 8.6 -8.6 L 40.064 45 l 19.799 -19.799 l -8.6 -8.6 L 22.864 45 L 51.263 73.4 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    </g>
                </svg>
        </a>
        <h1 class="text-5xl font-bold text-center mt-5 mb-8 text-purple-400 border-b-4 border-purple-600 pb-4">
            TO DO LIST
        </h1>

        <div class="mb-6">
            <h2 class="text-3xl font-semibold text-purple-300 mb-2">
                Task
            </h2>
            <ul class="list-disc list-inside text-lg text-gray-300">
                <li>{{ $task->name }}</li>
            </ul>
        </div>

        <div class="mb-6">
            <h2 class="text-3xl font-semibold text-purple-300 mb-2">
                Details
            </h2>
            <ul class="list-disc list-inside text-lg text-gray-300">
                <li>{{ $task->description }}</li>
            </ul>
        </div>

        <div class="mb-6">
            <h2 class="text-3xl font-semibold text-purple-300 mb-2">
                Date
            </h2>
            <ul class="list-disc list-inside text-lg text-gray-300">
                <li>{{ \Carbon\Carbon::parse($task->date)->format('d \d\e\ F \d\e\ Y') }}</li>
            </ul>
        </div>

        <div>
            <h2 class="text-3xl font-semibold text-purple-300 mb-2">
                Status
            </h2>
            <ul class="list-disc list-inside text-lg text-gray-300">
                <li>
                    @if ($task->completed)
                        <span class="text-green-400">Completed</span>
                    @else
                        <span class="text-red-400">Incomplete</span>
                    @endif
                </li>
            </ul>
        </div>
        <div class="flex justify-center gap-10 align-items-center">
            <div class="text-center mt-8">
                @if (!$task->completed)
                    <form action="/tasks/{{$task->slug}}/complete" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-700 transition duration-300">
                            Complete Task
                        </button>
                    </form>
                @endif
            </div>
            <div class="text-center mt-8">
                <form action="/tasks/{{$task->slug}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-red-700 transition duration-300">
                        Delete Task
                    </button>
                </form>
            </div>
            <div class="text-center mt-8">
                <form action="/tasks/{{$task->slug}}/edit" method="GET">
                    @csrf
                    <button type="submit" class="bg-cyan-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-cyan-700 transition duration-300">
                        Edit Task
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>