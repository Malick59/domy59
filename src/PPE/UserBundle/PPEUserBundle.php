<?php

namespace PPE\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PPEUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
