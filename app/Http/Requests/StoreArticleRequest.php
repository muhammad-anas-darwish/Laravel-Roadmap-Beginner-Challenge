<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:128',
            'full_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2024',
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
            'tag_ids' => 'array|nullable',
            'tag_ids.*' => [Rule::exists(Tag::class, 'id')],
        ];
    }
}
