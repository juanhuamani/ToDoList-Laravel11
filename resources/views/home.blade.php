<x-app-layout>
    <div class="absolute" >
        @if (session()->has('message'))
            <div class="bg-teal-50 border-s-4 border-teal-500 p-4 dark:bg-teal-800/30 alert" role="alert" x-data="{show: true}" x-effect="setTimeout(() => show = false, 3000)" x-show="show">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-400">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="ms-3">
                        <h3 class="text-gray-800 font-semibold dark:text-white">
                            Successfully!
                        </h3>
                        <p class="text-sm text-gray-700 dark:text-neutral-400">
                            {{ session('message') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
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
    <form method="GET" action="/tasks/search" class="mb-8">
        <input type="text" name="search" placeholder="Buscar tareas" value="{{ request('search') }}" class="border rounded p-2">
        <button type="submit" class="bg-blue-500 text-white rounded p-2">Buscar</button>
    </form>
    @if($tasks->isEmpty())
        <p class="text-center text-gray-500">No hay tareas disponibles.</p>
    @else
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
        <div class="mt-8">
            {{ $tasks->links() }}
        </div>
    @endif
    <ul class="flex row gap-10 mt-20 mb-5"> 
        @foreach ($categories as $category)
            <a href="/tasks/category/{{$category->name}}" >
                <li class="text-black bg-zinc-400 px-5 py-3 cursor-pointer">
                    {{ $category->name }}
                </li>
            </a>    
        @endforeach
    </ul>
</x-app-layout>
