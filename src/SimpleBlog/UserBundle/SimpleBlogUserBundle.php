<?php

namespace SimpleBlog\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SimpleBlogUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
