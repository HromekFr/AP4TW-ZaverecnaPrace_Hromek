<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl ">Registrační formulář</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        Jméno
                    </label>

                    <input type="text" class="border border-gray-400 p-2 w-full"
                           name="name" id="name" value="{{old('name')}}" required>

                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                        Přezdívka
                    </label>

                    <input type="text" class="border border-gray-400 p-2 w-full"
                           name="username" id="username" value="{{old('username')}}" required>

                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Email
                    </label>

                    <input type="email" class="border border-gray-400 p-2 w-full"
                           name="email" id="email" value="{{old('email')}}" required>

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        Heslo
                    </label>

                    <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" required>

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button class="bg-yellow-500 text-white rounded py-2 px-4 hover:bg-yellow-600">
                        Registrovat se
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
