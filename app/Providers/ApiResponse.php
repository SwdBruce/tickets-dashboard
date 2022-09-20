<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ApiResponse extends ServiceProvider
{
    const SUCCESS = 'success';
    const ERROR = 'error';
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $this->macro($factory, self::SUCCESS);
        $this->macro($factory, self::ERROR);
    }

    private function macro(ResponseFactory $factory, string $type)
    {
        $factory->macro($type, function (string $message = '', array $extra = []) use ($factory, $type) {
            return $factory->make([
                'type' => $type,
                'message' => $message,
                'extra' => $extra
            ]);
        });
    }
}
