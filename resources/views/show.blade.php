<x-app-layout>
    <div class="max-w-3xl mx-auto p-8 bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-5xl font-bold text-center mb-8 text-purple-400 border-b-4 border-purple-600 pb-4">
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
        <div class="text-center mt-8">
            <a href="/" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-300">
                Back to Home
            </a>
        </div>
    </div>
</x-app-layout>