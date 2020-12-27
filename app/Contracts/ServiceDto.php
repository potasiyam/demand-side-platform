<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

class ServiceDto
{
    public $message;
    public $statusCode;
    public $data;

    /**
     * ServiceResponse constructor.
     * @param $message string
     * @param $statusCode integer
     * @param $data Collection|Resource|array|null
     */
    public function __construct(string $message, int $statusCode, $data = null)
    {
        $this->message = $message;
        $this->statusCode = $statusCode;
        $this->data = $data;
    }
}
