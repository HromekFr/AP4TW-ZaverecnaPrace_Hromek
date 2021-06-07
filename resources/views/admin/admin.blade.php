<x-layout>
    <a href="/" class="bg-yellow-600 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 float-right">
        Domovská stránka
    </a>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-table :posts="$posts">

            </x-posts-table>
        @else
            <p class="text-center">Zatím zde nejsou žádné příspěvky</p>
        @endif
    </main>
</x-layout>
