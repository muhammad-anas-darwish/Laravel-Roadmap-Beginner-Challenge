<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Article') }}
        </h2>
    </header>

    <form method="post" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $article->title)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="full_text" :value="__('Full Text')" />
            <x-textarea id="full_text" name="full_text" type="text" class="mt-1 block w-full" required autofocus>{{ old('full_text', $article->full_text) }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('full_text')" />
        </div>
        
        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" :value="old('image', $article->image)" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div>
            <x-input-label for="category_id" :value="__('Categories')" />
            <x-select id="category_id" name="category_id" class="mt-1 block w-full" required autofocus>
                <option>-------------</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $article->category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
        </div>

        <div>
            <x-input-label for="tag_ids" :value="__('Select Tags')" />
            <x-select id="tag_ids" name="tag_ids[]" class="mt-1 block w-full" autofocus multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" @selected(collect(old('tag_ids', $article->tags->pluck('id')))->contains($tag->id))>{{ $tag->name }}</option>
                @endforeach
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('tag_ids[]')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'article-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
