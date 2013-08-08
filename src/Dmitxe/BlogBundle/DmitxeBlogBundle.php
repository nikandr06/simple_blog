<?php

namespace Dmitxe\BlogBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DmitxeBlogBundle extends Bundle
{
    public function getParent()
    {
        return 'SmartBlogBundle';
    }
}
