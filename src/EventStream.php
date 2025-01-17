<?php
/**
 * This file is part of event-engine/php-event-store.
 * (c) 2018-2021 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace EventEngine\EventStore;

use EventEngine\EventStore\Stream\WatcherId;

interface EventStream
{
    public function watch(string $streamName, callable $onEvent, ?string $lastEventId = null): WatcherId;

    public function stopWatcher(WatcherId $watcherId): void;
}
