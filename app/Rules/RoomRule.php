<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;

class RoomRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @var object
     */
    public $start_time;

    /**
     * Create a new rule instance.
     *
     * @var object
     */
    public $date;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($date, $start_time)
    {
        $this->date = $date;
        $this->start_time = $start_time;
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
        return ValidationRule::unique('interviews', 'room_id')->where(function($query){
            return $query->where('start_time', '>=', $this->start_time)
                ->where('end_time', '<', $this->start_time)
                ->where('date', $this->date);
        });
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
