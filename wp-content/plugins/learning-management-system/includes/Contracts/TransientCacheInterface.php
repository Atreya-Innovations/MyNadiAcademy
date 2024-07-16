<?php
/**
 * Interface for implementing transient caching.
 *
 * @package Masteriyo\Contracts;
 *
 * @since 1.11.0
 */

namespace Masteriyo\Contracts;

interface TransientCacheInterface {

	/**
	 * Set data in cache.
	 *
	 * @param string $key     The cache key.
	 * @param mixed  $data    The data to be cached.
	 * @param int    $expires Optional. Cache expiration time in seconds. Defaults to 0 (no expiration).
	 *
	 * @since 1.11.0
	 *
	 * @return bool True on success, false on failure.
	 */
	public function set_cache( $key, $data, $expires = 0);

	/**
	 * Get data from cache.
	 *
	 * @param string $key The cache key.
	 *
	 * @since 1.11.0
	 *
	 * @return mixed|null Cached data if available, null otherwise.
	 */
	public function get_cache( $key);

	/**
	 * Check if cache exists.
	 *
	 * @param string $key The cache key.
	 *
	 * @since 1.11.0
	 *
	 * @return bool True if cache exists, false otherwise.
	 */
	public function has_cache( $key);

	/**
	 * Delete cache
	 *
	 * @param string $key The cache key.
	 *
	 * @since 1.11.0
	 *
	 * @return bool True on success, false on failure.
	 */
	public function delete_cache( $key);

	/**
	 * Add prefix to the cache key.
	 *
	 * @param string $key The cache key.
	 *
	 * @since 1.11.0
	 *
	 * @return string Modified cache key with prefix.
	 */
	public function add_prefix( $key );

	/**
	 * Clear all caches with a specific prefix.
	 *
	 * @since 1.11.0
	 *
	 * @return bool True on success, false on failure.
	 */
	public function clear_caches();
}
