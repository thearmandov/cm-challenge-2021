<?php

namespace App\Rules;

use App\Seller;
use Illuminate\Contracts\Validation\Rule;

class uniquePortfolio implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->seller = new Seller();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // We're calling a method from the model to get any existing entries with a matching 
        // portfolio. If we don't find a match, we're good to continue with the model creation process.
        return !$this->seller->getExistingPortfolio($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You have already submitted your portfolio for review.';
    }
}
