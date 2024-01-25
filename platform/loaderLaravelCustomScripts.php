<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use App\Models\User;

$app = require Application::inferBasePath().'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

dump(User::first());