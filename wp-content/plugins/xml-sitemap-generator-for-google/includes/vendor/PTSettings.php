<?php

namespace GRIM_SG;

class PTSettings {
	public $include     = true;
	public $priority    = 3;
	public $frequency   = 'weekly';
	public $google_news = false;

	// Frequencies
	public static $ALWAYS  = 'always';
	public static $HOURLY  = 'hourly';
	public static $DAILY   = 'daily';
	public static $WEEKLY  = 'weekly';
	public static $MONTHLY = 'monthly';
	public static $YEARLY  = 'yearly';
	public static $NEVER   = 'never';

	/**
	 * DefaultSettings constructor.
	 *
	 * @param int $priority
	 * @param int $frequency
	 */
	public function __construct( $priority = 3, $frequency = 1 ) {
		$this->priority  = $priority;
		$this->frequency = $frequency;
	}
}
