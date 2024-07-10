<section>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Article title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Full text
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $article->display_text }}
                        </th>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('articles.edit', $article->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <form method="post" action="{{ route('articles.destroy', $article->id) }}">
                                @csrf
                                @method('delete')

                                <input type="submit" value="Delete" class="hover:cursor-pointer font-medium text-red-600 dark:text-red-500 hover:underline">
                                <div class="flex items-center gap-4">
                                    @if (session('status') === 'article-deleted')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Deleted.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-4">{{ $articles->links() }}</div>
    </div>
</section>
