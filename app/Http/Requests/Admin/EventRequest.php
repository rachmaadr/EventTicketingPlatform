<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            //
            'name' => 'required|string|max:255|unique:events,name,',
            'headline' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'location' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:online,offline',
            'files' => 'required|array',
            'files.*' => 'image|max:2048',
            'is_popular' => 'boolean'
        ];

        if ($this->isMethod('put')){
            $rules['name'] = 'string|max:255|unique:events,name,' . $this->route('event');
            $rules['files'] = 'array';
            $rules['files.*'] = 'image|max:2048';
            
        }

        return $rules;
    }
}
