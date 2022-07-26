<?php

namespace App\Interfaces;

interface ConnectionPlatformInterface
{
    public function updateConnectionPlatform($id, array  $data);
    public function getConnectionPlatform($id);
}