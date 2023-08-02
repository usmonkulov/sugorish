<?php

namespace common\bootstrap;

use settings\dispatchers\DeferredEventDispatcher;
use settings\dispatchers\EventDispatcher;
use settings\dispatchers\AsyncEventDispatcher;
use settings\services\newsletter\MailChimp;
use settings\services\newsletter\Newsletter;
use yii\base\BootstrapInterface;
use yii\base\ErrorHandler;
use yii\caching\Cache;
use yii\di\Container;
use yii\mail\MailerInterface;
use yii\queue\Queue;
use yii\rbac\ManagerInterface;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $container = \Yii::$container;

        $container->setSingleton(MailerInterface::class, function () use ($app) {
            return $app->mailer;
        });

        $container->setSingleton(ErrorHandler::class, function () use ($app) {
            return $app->errorHandler;
        });

        $container->setSingleton(Queue::class, function () use ($app) {
            return $app->get('queue');
        });

        $container->setSingleton(Cache::class, function () use ($app) {
            return $app->cache;
        });

        $container->setSingleton('security', function () use ($app) {
            return $app->security;
        });

        $container->setSingleton('request', function () use ($app) {
            return $app->request;
        });

        $container->setSingleton(ManagerInterface::class, function () use ($app) {
            return $app->authManager;
        });

        $container->setSingleton(Newsletter::class, function () use ($app) {
            return new MailChimp(
                new \DrewM\MailChimp\MailChimp($app->params['mailChimpKey']),
                $app->params['mailChimpListId']
            );
        });

        $container->setSingleton(EventDispatcher::class, DeferredEventDispatcher::class);

        $container->setSingleton(\settings\dispatchers\DeferredEventDispatcher::class, function (Container $container) {
            return new DeferredEventDispatcher(new AsyncEventDispatcher($container->get(Queue::class)));
        });
    }
}