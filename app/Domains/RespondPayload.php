<?php

namespace App\Domains;

use ArrayAccess;
use Exception;
use JsonSerializable;
use stdClass;

class RespondPayload implements ArrayAccess, JsonSerializable
{
    /**
     * @var bool
     */
    private $success;
    /**
     * @var array|ArrayAccess
     */
    private $data;
    /**
     * @var string
     */
    private $errorCode;
    /**
     * @var string
     */
    private $errorMessage;


    /**
     * ActionPayload constructor.
     */
    private function __construct()
    {
    }

    public static function exception(Exception $e, string $errorCode = 'B0001', string $errorMessage = null, array $data = []): RespondPayload
    {
        $resp = new RespondPayload();
        $resp->success = false;
        $resp->errorCode = $errorCode;
        $resp->errorMessage = is_null($errorMessage) ? $e->getMessage() : $errorMessage;
        $resp->data['stackTrace'] = $e->getTrace();
        if (!empty($data)) {
            $resp->data['data'] = $data;
        }

        return $resp;
    }

    public static function error(string $errorCode = 'B0001', string $errorMessage = null, array $data = []): RespondPayload
    {
        $resp = new RespondPayload();
        $resp->success = false;
        $resp->errorCode = $errorCode;
        $resp->errorMessage = $errorMessage;
        $resp->data = $data;

        return $resp;
    }

    public static function success(array $data = [], bool $needCode = false): RespondPayload
    {
        $resp = new RespondPayload();
        $resp->success = true;
        $resp->data = $data;
        if ($needCode) {
            $resp->errorCode = '00000';
            $resp->errorMessage = 'SUCCESS';
        }

        return $resp;
    }

    public function setErrorMessage(string $errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function toArray(): array
    {
        $arr = [];
        foreach (get_object_vars($this) as $attribute => $value) {
            if (isset($this->$attribute)) {
                $arr[$attribute] = $value;
            }
        }

        return $arr;
    }

    public function toJson(): string
    {
        $arr = $this->toArray();
        $arr = empty($arr) ? new stdClass() : $arr;

        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }

    public function __toString(): string
    {
        return $this->toJson();
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function offsetExists($offset): bool
    {
        return isset($this->$offset);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->$offset : null;
    }

    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->$offset);
        }
    }
}
