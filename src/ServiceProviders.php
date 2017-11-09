<?php

/**
 * @author Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace ChristophWurst\Nextcloud\ServiceProviders;

use Generator;
use OCP\AppFramework\IAppContainer;

trait ServiceProviders {

	/**
	 * @return Generator|ServiceProvider[]
	 */
	private function getProviders() {
		if (property_exists($this, 'providers')) {
			$providers = $this->providers;
		} else {
			$providers = [];
		}

		foreach ($providers as $provider) {
			$providerInstance = new $provider();
			/* @var $providerInstance ServiceProvider */
			yield $providerInstance;
		}
	}

	/**
	 * Call 'register' an all registered providers
	 */
	protected function registerServiceProviders() {
		/* @var $container IAppContainer */
		$container = $this->getContainer();

		foreach ($this->getProviders() as $provider) {
			$provider->register($container);
		}
	}

	/**
	 * Call 'boot' on all registered providers
	 */
	protected function bootServiceProviders() {
		/* @var $container IAppContainer */
		$container = $this->getContainer();

		foreach ($this->getProviders() as $provider) {
			$provider->boot($container);
		}
	}

}
