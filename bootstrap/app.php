<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->booting(function () {
        // KONFIGURASI POLA STORAGE UNTUK LARAVEL 12 DI SERVERLESS VERCEL
        if (env('VERCEL_JOB_ID') || env('NOW_REGION')) {
            
            // 1. Definisikan folder /tmp khusus untuk Laravel 12
            $tmpPath = '/tmp/storage/framework';
            
            config([
                'view.compiled' => $tmpPath . '/views',
                'cache.stores.file.path' => $tmpPath . '/cache/data',
                'session.files' => $tmpPath . '/sessions',
            ]);

            // 2. Buat folder-folder tersebut secara rekursif jika belum ada di sandbox Vercel
            if (!is_dir($tmpPath . '/views')) {
                mkdir($tmpPath . '/views', 0755, true);
            }
            if (!is_dir($tmpPath . '/cache/data')) {
                mkdir($tmpPath . '/cache/data', 0755, true);
            }
            if (!is_dir($tmpPath . '/sessions')) {
                mkdir($tmpPath . '/sessions', 0755, true);
            }
        }
    })
    ->create();