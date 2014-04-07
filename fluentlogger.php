<?php
/**
 * LightPHP Framework
 * LitePHP is a framework that has been designed to be lite waight, extensible and fast.
 * 
 * @author Robert Pitt <robertpitt1988@gmail.com>
 * @category core
 * @copyright 2013 Robert Pitt
 * @license GPL v3 - GNU Public License v3
 * @version 1.0.0
 */

/**
 * Validate dependancies
 */
if(class_exists("Fluent\\Logger\\FluentLogger") === false)
{
	throw new Exception("Please install fluent\\logger to your application root");			
}

/**
 * Wrapper class for Fluent\Logger interface.
 */
class FluentLogger_Library extends Fluent\Logger\FluentLogger
{
	/**
	 * Applicatyion Config
	 * @var FluentLogger_Config
	 */
	protected $logger_config = null;

	/**
	 * Valdiate hte logger is installed
	 */
	public function __construct()
	{
		/**
		 * Read the fluentlogger configuration object
		 * @var FluentLogger_Config
		 */
		$this->logger_config = Registry::get("ConfigLoader")->FluentLogger;

		/**
		 * Cal the FluentLogger constructor
		 */
		parent::__construct(
			$this->logger_config->host,
			$this->logger_config->port,
			$this->logger_config->options
		);
	}
}