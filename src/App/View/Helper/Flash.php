<?php
// src/App/View\Helper\Flash.php

declare(strict_types=1);

namespace App\View\Helper;

use Zend\Expressive\Flash\FlashMessages;
use Zend\Expressive\Session\Session;
use Zend\View\Helper\AbstractHelper;

class Flash extends AbstractHelper
{
    public function __invoke() : array
    {
        if (\session_status() == \PHP_SESSION_NONE){
            \session_start();
        }

        return FlashMessages::createFromSession(
            new Session($_SESSION)
        )->getFlashes();
    }
}