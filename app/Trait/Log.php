<?php

namespace App\Trait;

use Exception;
use Illuminate\Support\Facades\Log as FacadesLog;

trait Log
{
    public function logError(string $context, Exception $exception, array $additionalInfo = [])
    {
        $logDetail = [
            'status_code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'line' => $exception->getLine(),
            'file' => $exception->getFile()
        ];
        if (!empty($additionalInfo)) {
            $logDetail = array_merge($logDetail, $additionalInfo);
        }
        return FacadesLog::error($context, $logDetail);
    }

    public function logInfo(string $context, array $additionalInfo = [])
    {
        return FacadesLog::info($context, $additionalInfo);
    }
}
