<section>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <img src="{{ asset('storage/images/' . $article->image) }}" alt="{{ $article->name }}" class="w-full">
        <div class="p-4 sm:p-6 lg:p-8">
            <h3 class="text-5xl font-bold">{{ $article->title }}</h3>
            <p class="mt-2"><span class="font-bold">Category:</span> {{ $article->category->name }}</p>

            <ul class="flex justify-start items-center gap-2 my-2">
                <li class="font-bold">Tags: </li>
                @foreach ($article->tags as $tag)
                    <li class="p-2 rounded-lg bg-slate-600 dark:text-white">{{ $tag->name }}</li>
                @endforeach
            </ul>
            <p>{!! $article->full_text !!}</p>
        </div>
    </div>
</section>
