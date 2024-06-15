<x-app-layout>
    <div class="max-w-3xl mx-auto text-center mt-16 mb-10">
        <h1 class="text-4xl font-bold text-white leading-tight mb-2 border-t-4 border-b-4 border-purple-600 py-4">
          Create a new task
        </h1>
    </div>
    <form action="/tasks" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="sr-only">Name</label>
            <input type="text" name="name" id="name" placeholder="Task name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
            @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="sr-only">Description</label>
            <textarea name="description" id="description" placeholder="Task description" class="bg-gray-100 border-2 w-full h-72 p-4 rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="date" class="sr-only">Date</label>
            <input type="date" name="date" id="date" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('date') border-red-500 @enderror" value="{{ old('date') }}">
            @error('date')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="category" class="sr-only">Category</label>
            <div name="category" id="category" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('category') border-red-500 @enderror">
                <label for="category">Category</label>
                @foreach ($categories as $category)
                    <input name="category[]" type="checkbox" value="{{ $category->id }}">{{ $category->name }}</input>
                @endforeach
            </div>
            @error('category')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <input type="hidden" name="completed" value="0">
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Create Task</button>
        </div>
    </form>
</x-app-layout>