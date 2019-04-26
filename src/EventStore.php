<?php
/**
 * This file is part of event-engine/php-event-store.
 * (c) 2018-2019 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace EventEngine\EventStore;

use EventEngine\Messaging\GenericEvent;

interface EventStore
{
    public function createStream(string $streamName): void;

    public function deleteStream(string $streamName): void;

    public function appendTo(string $streamName, GenericEvent ...$events): void;

    /**
     * @param string $streamName
     * @param string $aggregateType
     * @param string $aggregateId
     * @param int $minVersion
     * @param int|null $maxVersion
     * @return \Iterator GenericEvent[]
     */
    public function loadAggregateEvents(
        string $streamName,
        string $aggregateType,
        string $aggregateId,
        int $minVersion = 1,
        int $maxVersion = null
    ): \Iterator;

    /**
     * @param string $streamName
     * @param string $correlationId
     * @return \Iterator GenericEvent[]
     */
    public function loadEventsByCorrelationId(string $streamName, string $correlationId): \Iterator;

    /**
     * @param string $streamName
     * @param string $causationId
     * @return \Iterator GenericEvent[]
     */
    public function loadEventsByCausationId(string $streamName, string $causationId): \Iterator;
}
