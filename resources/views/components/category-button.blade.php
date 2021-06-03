@props(["category"])

<a href="/categories/{{$category->slug}}"
   class="px-3 py-1 border border-yellow-600 rounded-full text-yellow-600 text-xs uppercase font-semibold"
   style="font-size: 10px">{{$category->name}}
</a>
