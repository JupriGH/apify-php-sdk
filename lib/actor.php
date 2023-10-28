<?php
namespace apify;

/* The main class of the SDK, through which all the actor operations should be done. */
class Actor {
	/*
	Create an Actor instance.

	Note that you don't have to do this, all the methods on this class function as classmethods too,
	and that is their preferred usage.

	Args:
		config (Configuration, optional): The actor configuration to be used. If not passed, a new Configuration instance will be created.
	*/	
	function __construct($config=null) {
		$this->config = $config ?? new Configuration();
		$this->apify_client = $this->new_client();
		$this->event_manager = new EventManager($this->config);

		$this->_is_initialized = false;
		$this->_is_exiting = false;
		$this->_send_system_info_interval_task = null;
		$this->_send_persist_state_interval_task = null;
		$this->_was_final_persist_state_emitted = false;
	}
	function new_client() {
	}
	function get_input() {
	}
}