<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'slug' => 'string|unique:posts|min:2|max:255',
            'title' => 'required|string|unique:posts|min:2|max:255',
            'post_body' => 'required|string|min:2',
            'is_archived' => 'sometimes|boolean',
        ];
    }
}
