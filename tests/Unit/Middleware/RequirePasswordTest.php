<?php

namespace Tests\Unit\Middleware;

use App\Enums\SocialiteProvider;
use App\Http\Middleware\RequirePassword;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class RequirePasswordTest extends TestCase
{
    use RefreshDatabase;

    /**
     * RequirePassword 미들웨어 테스트
     *
     * @return void
     */
    public function testRequirePassword()
    {
        $requirePasswordMiddleware = app(RequirePassword::class);

        $request = app(Request::class);
        $request->setLaravelSession(app(Session::class));

        $response = $requirePasswordMiddleware->handle($request, function () {
        });

        $this->assertEquals($response->getStatusCode(), 302);
    }

    /**
     * RequirePassword 미들웨어 테스트 (Socialite)
     *
     * @return void
     */
    public function testRequirePasswordNotRedirect()
    {
        $requirePasswordMiddleware = app(RequirePassword::class);

        $request = app(Request::class);
        $request->setLaravelSession(app(Session::class));
        $request->session()->put('Socialite', SocialiteProvider::GITHUB->name);

        $response = $requirePasswordMiddleware->handle($request, function () {
        });

        $this->assertEquals($response, null);
    }
}