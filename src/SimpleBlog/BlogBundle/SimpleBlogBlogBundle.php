<?php

namespace SimpleBlog\BlogBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SimpleBlogBlogBundle extends Bundle
{
    public function getParent()
    {
        return 'SmartBlogBundle';
    }
}
