<?php

declare(strict_types=1);

namespace OpenAI\Laravel;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use OpenAI;
use OpenAI\OpenAIClient;
use OpenAI\GooseAIClient;
use OpenAI\Laravel\Exceptions\ApiKeyIsMissing;

/**
 * @internal
 */
final class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(OpenAIClient::class, static function (): OpenAIClient {
            $apiKey = config('openai.openai_api_key');
            $organization = config('openai.organization');

            if (! is_string($apiKey) || ($organization !== null && ! is_string($organization))) {
                throw ApiKeyIsMissing::create();
            }

            return OpenAI::client($apiKey, 'api.openai.com/v1', $organization);
        });

        $this->app->singleton(GooseAIClient::class, static function (): GooseAIClient {
            $apiKey = config('openai.goose_api_key');
            //$organization = config('openai.organization');

            if (! is_string($apiKey) /*|| ($organization !== null && ! is_string($organization))*/) {
                throw ApiKeyIsMissing::create();
            }

            return OpenAI::client($apiKey, 'api.goose.ai/v1', null, [
                'completions' => true,
                'edits' => false,
                'embeddings' => false,
                'files' => false,
                'fine_tunes' => false,
                'images' => false,
                'models' => false,
                'engines' => true,
                'moderations' => false,
            ]);
        });

        $this->app->alias($openai, 'openai');
        $this->app->alias($gooseai, 'goose');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/openai.php' => config_path('openai.php'),
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            Client::class,
        ];
    }
}
