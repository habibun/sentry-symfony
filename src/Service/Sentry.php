<?php

namespace App\Service;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Sentry
{
    public function getBeforeSend(): callable
    {
        return function (\Sentry\Event $event, ?\Sentry\EventHint $hint): ?\Sentry\Event {
            if (null !== $hint && $hint->exception instanceof NotFoundHttpException) {
                return null;
            }

            return $event;
        };
    }
}
