<?php

if (!function_exists('onlyFillable')) {
    function onlyFillable(string $modelClass, $request): array
    {
        $fillable = (new $modelClass)->getFillable();
        return $request->only($fillable);
    }
}
