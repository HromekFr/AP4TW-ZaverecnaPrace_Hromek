<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl ">Nový příspěvek</h1>
            <form method="POST" action="/admin/posts/store" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Nadpis příspěvku
                    </label>

                    <input type="text" class="border border-gray-400 p-2 w-full"
                           name="title" id="title" value="" required>

                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                        Kategorie
                    </label>
                    <select name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Výňatek
                    </label>

                    <input type="text" class="border border-gray-400 p-2 w-full h-32"
                           name="excerpt" id="excerpt" required>

                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                        Článek
                    </label>

                    <input type="text" class="border border-gray-400 p-2 w-full h-96"
                           name="body" id="body" value="" required>

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <button class="bg-yellow-500 text-white rounded py-2 px-4 hover:bg-yellow-600">
                        Publikovat příspěvek
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
