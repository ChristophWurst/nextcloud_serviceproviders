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

use OCP\AppFramework\App;
use OCP\AppFramework\IAppContainer;

abstract class ServiceProvider {

	/**
	 * Overwrite this method to register your application's service
	 * provider
	 *
	 * @param App $app
	 * @param IAppContainer $container
	 */
	public function register(App $app, IAppContainer $container) {
		// empty by default
	}

	/**
	 * This method is called when the application starts
	 *
	 * @param App $app
	 * @param IAppContainer $container
	 */
	public function boot(App $app, IAppContainer $container) {
		// empty by default
	}

}
