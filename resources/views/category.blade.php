<x-app-layout>
    <div class="max-w-3xl mx-auto p-8 bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-4xl text-center font-bold text-white leading-tight mb-2 border-t-4 border-b-4 border-purple-600 py-4">
            {{$categoryTask['name']}}
        </h1> 
        <ul>
            @foreach ($categoryTask['tasks'] as $task)
                <a href="/tasks/{{$task->slug}}" >
                    <li class="text-black bg-zinc-400 px-5 py-3 cursor-pointer">
                        {{ $task->name }}
                    </li>
                </a>
            @endforeach
        </ul> 
        <div class="text-center mt-8">
            <a href="/" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition duration-300">
                Back to Home
            </a>
        </div>
    </div>

</x-app-layout> 