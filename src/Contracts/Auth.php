<?php

namespace Amcms\Contracts;

interface Auth
{

    public function register(array $credential);

    public function check(array $credential);

    public function login(array $credential);

    public function forceAuth(array $credential);

    public function logout(array $credential);
}
