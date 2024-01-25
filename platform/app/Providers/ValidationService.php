<?php

declare(strict_types=1);

namespace App\Providers;
use App\Rules\DbString;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\InvokableValidationRule;

class ValidationService extends ServiceProvider
{
    public function boot(): void
    {
        $this->addDBString();
    }

    /**
     * @see https://laracasts.com/discuss/channels/laravel/validatorextend-custom-validationrule-laravel-10-example
     */
    private function addDBString(): void
    {
        Validator::extend('db_string', function ($attribute, $value, $parameter, $validator) {
            //$rule = new DbString();
            //$rule->validate($attribute, $value);
            $rule = InvokableValidationRule::make(new DbString)->setValidator($validator);
            $result = $rule->passes($attribute, $value);

            if ($result == false) {
                $validator->setCustomMessages([
                    $attribute => Arr::first($rule->message())
                ]);
            }

            return $result;
        });
    }
}
