<?php
use Illuminate\Support\Str;

if (!function_exists('onlyFillable')) {
    function onlyFillable(string $modelClass, $request): array
    {
        $fillable = (new $modelClass)->getFillable();
        return $request->only($fillable);
    }
}
if (!function_exists('rutaRelativa')) {
    function rutaRelativa(string $url)
    {
        return Str::after($url, '/storage/');
    }
}
