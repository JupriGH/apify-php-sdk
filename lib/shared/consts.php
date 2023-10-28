<?php
namespace apify;

class ActorJobStatus {
	/** Available statuses for actor jobs (runs or builds). */
	# Actor job initialized but not started yet
	const READY = 'READY';
	# Actor job in progress
	const RUNNING = 'RUNNING';
	# Actor job finished successfully
	const SUCCEEDED = 'SUCCEEDED';
	# Actor job or build failed
	const FAILED = 'FAILED';
	# Actor job currently timing out
	const TIMING_OUT = 'TIMING-OUT';
	# Actor job timed out
	const TIMED_OUT = 'TIMED-OUT';
	# Actor job currently being aborted by user
	const ABORTING = 'ABORTING';
	# Actor job aborted by user
	const ABORTED = 'ABORTED';

	/** Whether this actor job status is terminal. */
	#def self._is_terminal(status) = [SUCCEEDED, FAILED, TIMED_OUT, ABORTED].include?(status)
}

class ActorSourceType {
	/** Available source types for actors. */
	# Actor source code is comprised of multiple files
	const SOURCE_FILES = 'SOURCE_FILES';
	# Actor source code is cloned from a Git repository
	const GIT_REPO = 'GIT_REPO';
	# Actor source code is downloaded using a tarball or Zip file
	const TARBALL = 'TARBALL';
	# Actor source code is taken from a GitHub Gist
	const GITHUB_GIST = 'GITHUB_GIST';
}

class ActorEventTypes {
	/** Possible values of actor event type. */
	# Info about resource usage of the actor
	const SYSTEM_INFO = 'systemInfo';
	# Sent when the actor is about to migrate
	const MIGRATING = 'migrating';
	# Sent when the actor should persist its state (every minute or when migrating)
	const PERSIST_STATE = 'persistState';
	# Sent when the actor is aborting
	const ABORTING = 'aborting';
}

class ActorEnvVars {
	/** Possible Apify-specific environment variables prefixed with "ACTOR_". */
	# TODO: document these

	const BUILD_ID = 'ACTOR_BUILD_ID';
	const BUILD_NUMBER = 'ACTOR_BUILD_NUMBER';
	const DEFAULT_DATASET_ID = 'ACTOR_DEFAULT_DATASET_ID';
	const DEFAULT_KEY_VALUE_STORE_ID = 'ACTOR_DEFAULT_KEY_VALUE_STORE_ID';
	const DEFAULT_REQUEST_QUEUE_ID = 'ACTOR_DEFAULT_REQUEST_QUEUE_ID';
	const EVENTS_WEBSOCKET_URL = 'ACTOR_EVENTS_WEBSOCKET_URL';
	const ID = 'ACTOR_ID';
	const INPUT_KEY = 'ACTOR_INPUT_KEY';
	const MAX_PAID_DATASET_ITEMS = 'ACTOR_MAX_PAID_DATASET_ITEMS';
	const MEMORY_MBYTES = 'ACTOR_MEMORY_MBYTES';
	const RUN_ID = 'ACTOR_RUN_ID';
	const STARTED_AT = 'ACTOR_STARTED_AT';
	const TASK_ID = 'ACTOR_TASK_ID';
	const TIMEOUT_AT = 'ACTOR_TIMEOUT_AT';
	const WEB_SERVER_PORT = 'ACTOR_WEB_SERVER_PORT';
	const WEB_SERVER_URL = 'ACTOR_WEB_SERVER_URL';
}

class ApifyEnvVars {
	/** Possible Apify-specific environment variables prefixed with "APIFY_". */

	# TODO: document these

	const API_BASE_URL = 'APIFY_API_BASE_URL';
	const API_PUBLIC_BASE_URL = 'APIFY_API_PUBLIC_BASE_URL';
	const CHROME_EXECUTABLE_PATH = 'APIFY_CHROME_EXECUTABLE_PATH';
	const DEDICATED_CPUS = 'APIFY_DEDICATED_CPUS';
	const DEFAULT_BROWSER_PATH = 'APIFY_DEFAULT_BROWSER_PATH';
	const DISABLE_BROWSER_SANDBOX = 'APIFY_DISABLE_BROWSER_SANDBOX';
	const DISABLE_OUTDATED_WARNING = 'APIFY_DISABLE_OUTDATED_WARNING';
	const FACT = 'APIFY_FACT';
	const HEADLESS = 'APIFY_HEADLESS';
	const INPUT_SECRETS_PRIVATE_KEY_FILE = 'APIFY_INPUT_SECRETS_PRIVATE_KEY_FILE';
	const INPUT_SECRETS_PRIVATE_KEY_PASSPHRASE = 'APIFY_INPUT_SECRETS_PRIVATE_KEY_PASSPHRASE';
	const IS_AT_HOME = 'APIFY_IS_AT_HOME';
	const LOCAL_STORAGE_DIR = 'APIFY_LOCAL_STORAGE_DIR';
	const LOG_FORMAT = 'APIFY_LOG_FORMAT';
	const LOG_LEVEL = 'APIFY_LOG_LEVEL';
	const MAX_USED_CPU_RATIO = 'APIFY_MAX_USED_CPU_RATIO';
	const META_ORIGIN = 'APIFY_META_ORIGIN';
	const METAMORPH_AFTER_SLEEP_MILLIS = 'APIFY_METAMORPH_AFTER_SLEEP_MILLIS';
	const PERSIST_STATE_INTERVAL_MILLIS = 'APIFY_PERSIST_STATE_INTERVAL_MILLIS';
	const PERSIST_STORAGE = 'APIFY_PERSIST_STORAGE';
	const PROXY_HOSTNAME = 'APIFY_PROXY_HOSTNAME';
	const PROXY_PASSWORD = 'APIFY_PROXY_PASSWORD';
	const PROXY_PORT = 'APIFY_PROXY_PORT';
	const PROXY_STATUS_URL = 'APIFY_PROXY_STATUS_URL';
	const PURGE_ON_START = 'APIFY_PURGE_ON_START';
	const SDK_LATEST_VERSION = 'APIFY_SDK_LATEST_VERSION';
	const SYSTEM_INFO_INTERVAL_MILLIS = 'APIFY_SYSTEM_INFO_INTERVAL_MILLIS';
	const TOKEN = 'APIFY_TOKEN';
	const USER_ID = 'APIFY_USER_ID';
	const WORKFLOW_KEY = 'APIFY_WORKFLOW_KEY';
	const XVFB = 'APIFY_XVFB';

	# Replaced by ActorEnvVars, kept for backward compatibility:
	const ACTOR_BUILD_ID = 'APIFY_ACTOR_BUILD_ID';
	const ACTOR_BUILD_NUMBER = 'APIFY_ACTOR_BUILD_NUMBER';
	const ACTOR_EVENTS_WS_URL = 'APIFY_ACTOR_EVENTS_WS_URL';
	const ACTOR_ID = 'APIFY_ACTOR_ID';
	const ACTOR_RUN_ID = 'APIFY_ACTOR_RUN_ID';
	const ACTOR_TASK_ID = 'APIFY_ACTOR_TASK_ID';
	const CONTAINER_PORT = 'APIFY_CONTAINER_PORT';
	const CONTAINER_URL = 'APIFY_CONTAINER_URL';
	const DEFAULT_DATASET_ID = 'APIFY_DEFAULT_DATASET_ID';
	const DEFAULT_KEY_VALUE_STORE_ID = 'APIFY_DEFAULT_KEY_VALUE_STORE_ID';
	const DEFAULT_REQUEST_QUEUE_ID = 'APIFY_DEFAULT_REQUEST_QUEUE_ID';
	const INPUT_KEY = 'APIFY_INPUT_KEY';
	const MEMORY_MBYTES = 'APIFY_MEMORY_MBYTES';
	const STARTED_AT = 'APIFY_STARTED_AT';
	const TIMEOUT_AT = 'APIFY_TIMEOUT_AT';

	# Deprecated, kept for backward compatibility:
	const ACT_ID = 'APIFY_ACT_ID';
	const ACT_RUN_ID = 'APIFY_ACT_RUN_ID';
} 

class ActorExitCodes {
	/** Usual actor exit codes. */

	# The actor finished successfully
	const SUCCESS = 0;

	# The main function of the actor threw an Exception
	const ERROR_USER_FUNCTION_THREW = 91;
}

class WebhookEventType {
	/** Events that can trigger a webhook. */

	# The actor run was created
	const ACTOR_RUN_CREATED = 'ACTOR.RUN.CREATED';
	# The actor run has succeeded
	const ACTOR_RUN_SUCCEEDED = 'ACTOR.RUN.SUCCEEDED';
	# The actor run has failed
	const ACTOR_RUN_FAILED = 'ACTOR.RUN.FAILED';
	# The actor run has timed out
	const ACTOR_RUN_TIMED_OUT = 'ACTOR.RUN.TIMED_OUT';
	# The actor run was aborted
	const ACTOR_RUN_ABORTED = 'ACTOR.RUN.ABORTED';
	# The actor run was resurrected
	const ACTOR_RUN_RESURRECTED = 'ACTOR.RUN.RESURRECTED';

	# The actor build was created
	const ACTOR_BUILD_CREATED = 'ACTOR.BUILD.CREATED';
	# The actor build has succeeded
	const ACTOR_BUILD_SUCCEEDED = 'ACTOR.BUILD.SUCCEEDED';
	# The actor build has failed
	const ACTOR_BUILD_FAILED = 'ACTOR.BUILD.FAILED';
	# The actor build has timed out
	const ACTOR_BUILD_TIMED_OUT = 'ACTOR.BUILD.TIMED_OUT';
	# The actor build was aborted
	const ACTOR_BUILD_ABORTED = 'ACTOR.BUILD.ABORTED';

	# MetaOrigin
	/** Possible origins for actor runs, i.e. how were the jobs started. */

	# Job started from Developer console in Source section of actor
	const DEVELOPMENT = 'DEVELOPMENT';
	# Job started from other place on the website (either console or task detail page)
	const WEB = 'WEB';
	# Job started through API
	const API = 'API';
	# Job started through Scheduler
	const SCHEDULER = 'SCHEDULER';
	# Job started through test actor page
	const TEST = 'TEST';
	# Job started by the webhook
	const WEBHOOK = 'WEBHOOK';
	# Job started by another actor run
	const ACTOR = 'ACTOR';
}


class MetaOrigin {
	/** Possible origins for actor runs, i.e. how were the jobs started. */

	#: Job started from Developer console in Source section of actor
	const DEVELOPMENT = 'DEVELOPMENT';
	#: Job started from other place on the website (either console or task detail page)
	const WEB = 'WEB';
	#: Job started through API
	const API = 'API';
	#: Job started through Scheduler
	const SCHEDULER = 'SCHEDULER';
	#: Job started through test actor page
	const TEST = 'TEST';
	#: Job started by the webhook
	const WEBHOOK = 'WEBHOOK';
	#: Job started by another actor run
	const ACTOR = 'ACTOR';
}

const INTEGER_ENV_VARS = [
	# Actor env vars
	ActorEnvVars::MAX_PAID_DATASET_ITEMS,
	ActorEnvVars::MEMORY_MBYTES,
	ActorEnvVars::WEB_SERVER_PORT,
	# Apify env vars
	ApifyEnvVars::CONTAINER_PORT,
	ApifyEnvVars::DEDICATED_CPUS, # <jupri> float ?
	ApifyEnvVars::LOG_LEVEL,
	ApifyEnvVars::MEMORY_MBYTES,
	ApifyEnvVars::METAMORPH_AFTER_SLEEP_MILLIS,
	ApifyEnvVars::PERSIST_STATE_INTERVAL_MILLIS,
	ApifyEnvVars::PROXY_PORT,
	ApifyEnvVars::SYSTEM_INFO_INTERVAL_MILLIS
];

const FLOAT_ENV_VARS = [
	ApifyEnvVars::MAX_USED_CPU_RATIO,
	#ApifyEnvVars::DEDICATED_CPUS
];

const BOOL_ENV_VARS = [
	ApifyEnvVars::DISABLE_BROWSER_SANDBOX,
	ApifyEnvVars::DISABLE_OUTDATED_WARNING,
	ApifyEnvVars::HEADLESS,
	ApifyEnvVars::IS_AT_HOME,
	ApifyEnvVars::PERSIST_STORAGE,
	ApifyEnvVars::PURGE_ON_START,
	ApifyEnvVars::XVFB,
];

const DATETIME_ENV_VARS = [
	# Actor env vars
	ActorEnvVars::STARTED_AT,
	ActorEnvVars::TIMEOUT_AT,
	# Apify env vars
	ApifyEnvVars::STARTED_AT,
	ApifyEnvVars::TIMEOUT_AT,
];

const STRING_ENV_VARS = [
	# Actor env vars
	ActorEnvVars::BUILD_ID,
	ActorEnvVars::BUILD_NUMBER,
	ActorEnvVars::DEFAULT_DATASET_ID,
	ActorEnvVars::DEFAULT_KEY_VALUE_STORE_ID,
	ActorEnvVars::DEFAULT_REQUEST_QUEUE_ID,
	ActorEnvVars::EVENTS_WEBSOCKET_URL,
	ActorEnvVars::ID,
	ActorEnvVars::INPUT_KEY,
	ActorEnvVars::RUN_ID,
	ActorEnvVars::TASK_ID,
	ActorEnvVars::WEB_SERVER_URL,
	# Apify env vars
	ApifyEnvVars::ACT_ID,
	ApifyEnvVars::ACT_RUN_ID,
	ApifyEnvVars::ACTOR_BUILD_ID,
	ApifyEnvVars::ACTOR_BUILD_NUMBER,
	ApifyEnvVars::ACTOR_EVENTS_WS_URL,
	ApifyEnvVars::ACTOR_ID,
	ApifyEnvVars::ACTOR_RUN_ID,
	ApifyEnvVars::ACTOR_TASK_ID,
	ApifyEnvVars::API_BASE_URL,
	ApifyEnvVars::API_PUBLIC_BASE_URL,
	ApifyEnvVars::CHROME_EXECUTABLE_PATH,
	ApifyEnvVars::CONTAINER_URL,
	ApifyEnvVars::DEFAULT_BROWSER_PATH,
	ApifyEnvVars::DEFAULT_DATASET_ID,
	ApifyEnvVars::DEFAULT_KEY_VALUE_STORE_ID,
	ApifyEnvVars::DEFAULT_REQUEST_QUEUE_ID,
	ApifyEnvVars::FACT,
	ApifyEnvVars::INPUT_KEY,
	ApifyEnvVars::INPUT_SECRETS_PRIVATE_KEY_FILE,
	ApifyEnvVars::INPUT_SECRETS_PRIVATE_KEY_PASSPHRASE,
	ApifyEnvVars::LOCAL_STORAGE_DIR,
	ApifyEnvVars::LOG_FORMAT,
	ApifyEnvVars::META_ORIGIN,
	ApifyEnvVars::PROXY_HOSTNAME,
	ApifyEnvVars::PROXY_PASSWORD,
	ApifyEnvVars::PROXY_STATUS_URL,
	ApifyEnvVars::SDK_LATEST_VERSION,
	ApifyEnvVars::TOKEN,
	ApifyEnvVars::USER_ID,
	ApifyEnvVars::WORKFLOW_KEY,
];
