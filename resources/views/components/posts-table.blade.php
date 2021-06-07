@props(['posts'])

<a href="/admin/posts/create" class="bg-yellow-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-3 hover:bg-yellow-600">
    Nový příspěvek
</a>

<table class="bg-white flex justify-center">
    <tr>
        <th class="bg-yellow-600 text-white border text-left px-4 py-4">ID</th>
        <th class="bg-yellow-600 text-white border text-left px-4 py-4">Category</th>
        <th class="bg-yellow-600 text-white border text-left px-4 py-4">Slug</th>
        <th class="bg-yellow-600 text-white border text-left px-4 py-4">Title</th>
        <th class="bg-yellow-600 text-white border text-left px-4 py-4">Excerpt</th>
        <th class="bg-yellow-600 text-white border text-left px-4 py-4">Body</th>
        <th class="bg-yellow-600 text-white border text-left px-6 py-4" colspan="3">Úpravy</th>
        <th></th>
    </tr>
    @foreach($posts as $post)
        <tr>
            <td class="border px-4 py-4">{{$post->id}}</td>
            <td class="border px-4 py-4">{{$post->category->name}}</td>
            <td class="border px-4 py-4">{{$post->slug}}</td>
            <td class="border px-4 py-4">{{$post->title}}</td>
            <td class="border px-4 py-4">
                <div class="h-80 overflow-hidden">
                    {{$post->excerpt}}
                </div>
            </td>
            <td class="border px-4 py-4">
                <div class="h-80 overflow-hidden">
                    {{$post->body}}
                </div>
            </td>

            <td class="border px-6 py-4">
                <a href="/posts/{{$post->slug}}" class="bg-blue-400 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Zobrazit
                </a>
            </td>
            <td class="border px-6 py-4">
                <a href="/admin/posts/edit/{{$post->slug}}" class="bg-yellow-400 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Upravit
                </a>
            </td>
            <td class="border px-6 py-4">
                <form method="post" action="/admin/posts/delete/{{$post->id}}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" class="border border-gray-400 p-2 w-full"
                           name="id" id="id" value="{{$post->id}}" required>
                    <button>
                        <a class="bg-red-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                            Odstranit
                        </a>
                    </button>

                </form>

            </td>
        </tr>
    @endforeach
</table>
