<?php

namespace CodeEmailMKT\Application\Middleware;

use CodeEmailMKT\Domain\Service\AuthInterface;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AuthenticationMiddleware
{
    /**
     * @var AuthInterface
     */
    private $authService;
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(RouterInterface $router, AuthInterface $authService)
    {
        $this->authService = $authService;
        $this->router = $router;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {  //echo 'authentication';
        $routeResult = $request->getAttribute('Zend\Expressive\Router\RouteResult');////cccc
        $routeName   = $routeResult?? '' ??$routeResult->getMatchedRouteName();///cccc
        if(!$this->authService->isAuth() && $routeName!='auth.login'){//se não estiver logado   //cccccccccccc
            $uri = $this->router->generateUri('auth.login');
            return new RedirectResponse($uri);
        }
        return $next($request,$response);
    }
}