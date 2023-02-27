<?php

namespace App\Rules;

use App\Models\Interview;
use Illuminate\Contracts\Validation\Rule;

class UniqueUserInterviewRule implements Rule
{
    /**
     * User id.
     *
     * @var int
     */
    public $user_id;

    /**
     * User type.
     *
     * @var string
     */
    public $user_type;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user_id, $user_type)
    {
        $this->user_id = $user_id;
        $this->user_type = $user_type;
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
        if ($this->user_id === null || $this->user_type === null)
            return false;

        $model = Interview::find($value);
        $count = $model->users()
            ->where('id', $this->user_id)
            ->where('type', $this->user_type)
            ->count();

        return $count === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ya estás registrado a esta entrevista.';
    }
}
