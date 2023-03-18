<?php

declare(strict_types=1);

namespace OCA\Notion\Listener;

use OCA\Notion\AppInfo\Application;
use OCP\AppFramework\Http\Events\BeforeTemplateRenderedEvent;
use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\IEventListener;
use OCP\Util;

/**
 * @template-implements IEventListener<Event>
 */
class UnifiedSearchCSSLoader implements IEventListener {
	public function handle(Event $event): void {
		if (!$event instanceof BeforeTemplateRenderedEvent) {
			return;
		}

		if ($event->isLoggedIn()) {
			Util::addStyle(Application::APP_ID, 'unified-search');
		}
	}
}
