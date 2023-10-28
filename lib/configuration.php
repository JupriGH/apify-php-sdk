<?php
namespace apify;

/**
A class for specifying the configuration of an actor.

Can be used either globally via `Configuration.get_global_configuration()`,
or it can be specific to each `Actor` instance on the `actor.config` property.
*/
class Configuration {
	
	static $_default_instance = null;

	/**
	Create a `Configuration` instance.

	All the parameters are loaded by default from environment variables when running on the Apify platform.
	You can override them here in the Configuration constructor, which might be useful for local testing of your actors.

	Args:
		api_base_url (str, optional): The URL of the Apify API.
			This is the URL actually used for connecting to the API, so it can contain an IP address when running in a container on the platform.
		api_public_base_url (str, optional): The public URL of the Apify API.
			This will always contain the public URL of the API, even when running in a container on the platform.
			Useful for generating shareable URLs to key-value store records or datasets.
		container_port (int, optional): The port on which the container can listen for HTTP requests.
		container_url (str, optional): The URL on which the container can listen for HTTP requests.
		default_dataset_id (str, optional): The ID of the default dataset for the actor.
		default_key_value_store_id (str, optional): The ID of the default key-value store for the actor.
		default_request_queue_id (str, optional): The ID of the default request queue for the actor.
		input_key (str, optional): The key of the input record in the actor's default key-value store
		max_used_cpu_ratio (float, optional): The CPU usage above which the SYSTEM_INFO event will report the CPU is overloaded.
		metamorph_after_sleep_millis (int, optional): How long should the actor sleep after calling metamorph.
		persist_state_interval_millis (int, optional): How often should the actor emit the PERSIST_STATE event.
		persist_storage (bool, optional): Whether the actor should persist its used storages to the filesystem when running locally.
		proxy_hostname (str, optional): The hostname of Apify Proxy.
		proxy_password (str, optional): The password for Apify Proxy.
		proxy_port (str, optional): The port of Apify Proxy.
		proxy_status_url (str, optional): The URL on which the Apify Proxy status page is available.
		purge_on_start (str, optional): Whether the actor should purge its default storages on startup, when running locally.
		token (str, optional): The API token for the Apify API this actor should use.
		system_info_interval_millis (str, optional): How often should the actor emit the SYSTEM_INFO event when running locally.
	*/		
	function __construct(
		$api_base_url = null,
		$api_public_base_url = null,
		$container_port = null,
		$container_url = null,
		$default_dataset_id = null,
		$default_key_value_store_id = null,
		$default_request_queue_id = null,
		$input_key = null,
		$max_used_cpu_ratio = null,
		$metamorph_after_sleep_millis = null,
		$persist_state_interval_millis = null,
		$persist_storage = null,
		$proxy_hostname = null,
		$proxy_password = null,
		$proxy_port = null,
		$proxy_status_url = null,
		$purge_on_start = null,
		$token = null,
		$system_info_interval_millis = null
	) {
		$this->actor_build_id 					= _getenv(ActorEnvVars::BUILD_ID);
		$this->actor_build_number 				= _getenv(ActorEnvVars::BUILD_NUMBER);
		$this->actor_events_ws_url 				= _getenv(ActorEnvVars::EVENTS_WEBSOCKET_URL);
		$this->actor_id							= _getenv(ActorEnvVars::ID);
		$this->actor_run_id						= _getenv(ActorEnvVars::RUN_ID);
		$this->actor_task_id					= _getenv(ActorEnvVars::TASK_ID);
		$this->api_base_url						= rtrim($api_base_url ?? _getenv(ApifyEnvVars::API_BASE_URL, 'https://api.apify.com'), '/');
		$this->api_public_base_url 				= rtrim($api_public_base_url ?? _getenv(ApifyEnvVars::API_PUBLIC_BASE_URL, 'https://api.apify.com'), '/');
		$this->chrome_executable_path 			= _getenv(ApifyEnvVars::CHROME_EXECUTABLE_PATH);
		$this->container_port 					= $container_port ?? _getenv(ActorEnvVars::WEB_SERVER_PORT, 4321);
		$this->container_url					= rtrim($container_url ?? _getenv(ActorEnvVars::WEB_SERVER_URL, 'http://localhost:4321'), '/');
		$this->dedicated_cpus 					= _getenv(ApifyEnvVars::DEDICATED_CPUS);
		$this->default_browser_path				= _getenv(ApifyEnvVars::DEFAULT_BROWSER_PATH);
		$this->default_dataset_id 				= $default_dataset_id ?? _getenv(ActorEnvVars::DEFAULT_DATASET_ID, 'default');
		$this->default_key_value_store_id 		= $default_key_value_store_id ?? _getenv(ActorEnvVars::DEFAULT_KEY_VALUE_STORE_ID, 'default');
		$this->default_request_queue_id			= $default_request_queue_id ?? _getenv(ActorEnvVars::DEFAULT_REQUEST_QUEUE_ID, 'default');
		$this->disable_browser_sandbox 			= _getenv(ApifyEnvVars::DISABLE_BROWSER_SANDBOX, false);
		$this->headless							= _getenv(ApifyEnvVars::HEADLESS, true);
		$this->input_key						= $input_key ?? _getenv(ActorEnvVars::INPUT_KEY, 'INPUT');
		$this->input_secrets_private_key_file			= _getenv(ApifyEnvVars::INPUT_SECRETS_PRIVATE_KEY_FILE);
		$this->input_secrets_private_key_passphrase		= _getenv(ApifyEnvVars::INPUT_SECRETS_PRIVATE_KEY_PASSPHRASE);
		$this->is_at_home						= _getenv(ApifyEnvVars::IS_AT_HOME, false);
		$this->max_used_cpu_ratio 				= $max_used_cpu_ratio ?? _getenv(ApifyEnvVars::MAX_USED_CPU_RATIO, 0.95);
		$this->memory_mbytes					= _getenv(ActorEnvVars::MEMORY_MBYTES);
		$this->meta_origin 						= _getenv(ApifyEnvVars::META_ORIGIN);
		$this->metamorph_after_sleep_millis		= $metamorph_after_sleep_millis ?? _getenv(ApifyEnvVars::METAMORPH_AFTER_SLEEP_MILLIS, 300000);   #noqa: E501
		$this->persist_state_interval_millis	= $persist_state_interval_millis ?? _getenv(ApifyEnvVars::PERSIST_STATE_INTERVAL_MILLIS, 60000);   #noqa: E501
		$this->persist_storage 					= is_bool($persist_storage) ? $persist_storage : _getenv(ApifyEnvVars::PERSIST_STORAGE, true);
		$this->proxy_hostname 					= $proxy_hostname ?? _getenv(ApifyEnvVars::PROXY_HOSTNAME, 'proxy.apify.com');
		$this->proxy_password 					= $proxy_password ?? _getenv(ApifyEnvVars::PROXY_PASSWORD);
		$this->proxy_port 						= $proxy_port ?? _getenv(ApifyEnvVars::PROXY_PORT, 8000);
		$this->proxy_status_url 				= $proxy_status_url ?? _getenv(ApifyEnvVars::PROXY_STATUS_URL, 'http://proxy.apify.com');
		$this->purge_on_start 					= is_bool($purge_on_start) ? $purge_on_start : _getenv(ApifyEnvVars::PURGE_ON_START, false);
		$this->started_at 						= _getenv(ActorEnvVars::STARTED_AT);
		$this->timeout_at 						= _getenv(ActorEnvVars::TIMEOUT_AT);	
		$this->token 							= $token ?? _getenv(ApifyEnvVars::TOKEN);
		$this->user_id 							= _getenv(ApifyEnvVars::USER_ID);
		$this->xvfb 							= _getenv(ApifyEnvVars::XVFB, false);
		$this->system_info_interval_millis 		= $system_info_interval_millis ?? _getenv(ApifyEnvVars::SYSTEM_INFO_INTERVAL_MILLIS, 60000);
	}
	
	/**
	### Addiotional API by JUPRI
	def to_json = to_h.to_json
	def to_h = instance_variables.map { |a| [a, instance_variable_get(a)] }.to_h	
	def getenv(*args) = Utils::_fetch_and_parse_env_var(*args)
	*/
	
	#static function._get_default_instance = static::_default_instance ||= new static()
	
	/**
	Retrive the global configuration.

	The global configuration applies when you call actor methods via their static versions, e.g. `Actor.init()`.
	Also accessible via `Actor.config`.
	*/		
	#static function get_global_configuration() { return class._get_default_instance(); }
}

### Helpers
function _getenv(... $args) { return Utils\_fetch_and_parse_env_var(... $args); }