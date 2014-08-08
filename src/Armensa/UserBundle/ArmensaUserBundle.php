<?php
namespace Armensa\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ArmensaUserBundle extends Bundle
{
    public function getParent(){
        return 'FOSUserBundle';
    }
}
