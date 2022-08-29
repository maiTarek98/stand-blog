<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|unique:blogs,title,'.$this->blog->id,
            'description' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'status' => 'required|string|in:show,hide',
        ];
    }
}
