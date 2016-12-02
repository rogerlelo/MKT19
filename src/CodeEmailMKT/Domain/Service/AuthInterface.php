<?php
declare(strict_types=1);

namespace CodeEmailMKT\Domain\Service;

use CodeEmailMKT\Domain\Entity\User;

interface AuthInterface
{
    public function authenticate($email, $password);//:bool;
    public function isAuth();//:bool;//se está autenticado
    public function getUser();//:User;
    public function destroy();//destrói autenticação 'logoff'
}