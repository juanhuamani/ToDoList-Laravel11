<x-app-layout>
    <h2 class="flex flex-row flex-nowrap items-center mt-24 w-[100%] mb-10">
        <span class="flex-grow block border-t border-black"></span>
        <span class="flex-none block mx-4 px-4 py-2.5 text-4xl rounded leading-none font-extrabold bg-black text-white">
            To Do List
        </span>
        <span class="flex-grow block border-t border-black"></span>
    </h2>

    <a href="/tasks/create" class="relative inline-flex items-center justify-center p-0.5 mb-10 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            CREATE NEW TASK
        </span>
    </a>
    <ul class="list-none p-0 divide-y divide-purple-300 min-w-[54rem]">
    @foreach ($tasks as $task)
        <li class="py-2 px-5 hover:bg-gray-100 flex items-center @if ($task->completed) text-gray-400 line-through @endif ">
            <a href="/tasks/{{$task->slug}}" class="text-gray-400 text-2xl flex-grow ">
                {{ $task->name }}
            </a>
            <div class="flex row ml-2">
                @if (!$task->completed)
                    <form action="/tasks/{{$task->slug}}/complete" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit"><x-check/></button>
                    </form>
                @endif
                <form action="/tasks/{{$task->slug}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><x-delete/></button>
                </form>
            </div>
        </li>
    @endforeach
    </ul>
</x-app-layout>
