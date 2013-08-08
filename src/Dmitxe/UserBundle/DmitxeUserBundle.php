<?php

namespace Dmitxe\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DmitxeUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
