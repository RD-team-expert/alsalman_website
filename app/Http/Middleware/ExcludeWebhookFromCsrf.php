<?php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class ExcludeWebhookFromCsrf extends Middleware
{
    protected $except = [
        '/webhook/cognito-form', // Add your webhook route here
    ];
}
