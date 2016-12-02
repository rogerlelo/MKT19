<?php

namespace CodeEmailMKT\Domain\Service;

interface FlashMessageInterface
{
    const MESSAGE_SUCCESS = 0;

    public function setNamespace($name);

    public function setMessage($key,$value);

    public function getMessage($key);

}