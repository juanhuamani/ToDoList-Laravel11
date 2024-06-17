<x-app-layout>
    <div class="max-w-3xl mx-auto text-center mb-5">
        <h1 class="text-4xl font-bold text-white leading-tight mb-2 border-t-4 border-b-4 border-purple-600 py-4">
            Edit Task
        </h1>
    </div>
    <form action="/tasks/{{$task->slug}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="sr-only">Name</label>
            <input type="text" name="name" id="name" placeholder="Task name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{$task->name}}">
            @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="sr-only">Description</label>
            <textarea name="description" id="description" placeholder="Task description" class="bg-gray-100 border-2 w-full h-72 p-4 rounded-lg @error('description') border-red-500 @enderror">{{ $task->description }}</textarea>
            @error('description')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="date" class="sr-only">Date</label>
            <input type="date" name="date" id="date" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('date') border-red-500 @enderror" value="{{ $task->date }}">
            @error('date')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Edit Task</button>
        </div>
    </form>
</x-app-layout>
