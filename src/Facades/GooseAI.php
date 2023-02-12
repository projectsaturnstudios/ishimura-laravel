<?php

declare(strict_types=1);

namespace OpenAI\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \OpenAI\Resources\Completions completions()
 * @method static \OpenAI\Resources\Models models()
 * @method static \OpenAI\Resources\Models engines()
 */
final class GooseAI extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'goose';
    }
}
