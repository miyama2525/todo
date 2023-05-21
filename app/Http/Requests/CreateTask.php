<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'due_date' => 'required|date|after_or_equal:today',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'due_date' => '期限日',
        ];
    }

    public function messages()
    {
        return [
            // messages メソッド
            // キーでメッセージが表示されるべきルールを指定する。
            // ドット区切りで左側が項目、右側がルールを意味する。
            'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}
