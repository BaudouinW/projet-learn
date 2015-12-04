<?php

namespace Learn\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LearnUserBundle extends Bundle
{
    function getParent() 
    {   
        return 'FOSUserBundle';
    }
}
