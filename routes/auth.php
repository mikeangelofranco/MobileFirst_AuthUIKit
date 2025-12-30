<?php

if (env('AUTH_UI_ONLY', true)) {
    require __DIR__.'/auth-ui.php';
} else {
    require __DIR__.'/auth-breeze.php';
}

