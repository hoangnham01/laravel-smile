<?php

namespace App\Smile\Categories;


interface DeleterListener
{

    /**
     * @param array $result
     * @return mixed
     */
    public function deleteSuccessful($result = array());

    /**
     * @param string|array $error
     * @return mixed
     */
    public function deleteFailed($error);
}