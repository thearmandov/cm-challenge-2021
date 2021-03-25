<?php

namespace App\Http\Requests;

use App\Rules\uniquePortfolio;
use App\Rules\portfolioOwnership;
use Illuminate\Foundation\Http\FormRequest;

class CustomFormRequest extends FormRequest
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
            'firstName' => 'required',
            'lastName' => 'required',
            'shopCategory' => 'required',
            'qualityPerspective' => 'required',
            'businessMarketingExp' => 'required',
            'onlineSalesExperience' => 'required',
            'portfolioLink' => ['required', new uniquePortfolio], // Using our custom rule as an extra layer of validation
            'confirmAuthor' => [new portfolioOwnership] // Using our custom rule as an extra layer of validation
        ];
    }
}
