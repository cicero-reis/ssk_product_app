<?php

if (! function_exists('authUser')) {
    /**
     * @return object
     */
    function authUser()
    {
        return (object) request()->get('jwt_payload');
    }
}
