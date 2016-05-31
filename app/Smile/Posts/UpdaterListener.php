<?php

namespace App\Smile\Posts;


interface UpdaterListener
{
    /**
     * @param array $result
     * @return mixed
     */
    public function updaterSuccessful($result = array());

    /**
     * @param string|array $error
     * @return mixed
     */
    public function updaterFailed($error);
}