<?php

class TwoBitWorks_Autorecurringbilling_Model_Observer {
	public function alert_soip() {
		Mage::log("Caught event: sales_onepage_invoice_pay event");
	}
	public function alert_sopa() {
		Mage::log("Caught event: sales_onepage_place_after");
	}
	public function alert_ccosa() {
		Mage::log("Caught event: checkout_controller_onepage_success_action");
	}
	public function alert_ctoso() {
		Mage::log("Caught event: checkout_type_onepage_save_order");
	}
}

?>
