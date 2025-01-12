<?php

namespace App\Services;

interface DataSanitizacaoServiceInterface
{
    public function sanitize(array $data): array;
}
