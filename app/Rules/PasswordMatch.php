<?php

namespace Wdi\Rules;

use Hash;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class PasswordMatch
 * @package Wdi\Rules
 */
final class PasswordMatch implements Rule
{
    /** @var string */
    private $password;
    
    /**
     * Create a new rule instance.
     * @param string $password
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }
    
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value, $this->password);
    }
    
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "La password non corrisponde.";
    }
}
