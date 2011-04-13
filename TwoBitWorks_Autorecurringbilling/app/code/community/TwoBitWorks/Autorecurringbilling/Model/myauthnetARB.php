<?php
// Include AuthnetARB class.
require('libs/net.johnconde/AuthnetARB.class.php');

function createAccount() {
	// Set up the subscription. Use the developer account for testing..
	$subscription = new AuthnetARB('myapilogin', 'mYtRaNsaCTiOnKEy', AuthnetARB::USE_DEVELOPMENT_SERVER);
 
	// Set subscription information
	$subscription->setParameter('amount', 29.99);
	$subscription->setParameter('cardNumber', '4111111111111111');
	$subscription->setParameter('expirationDate', '2016-16');
	$subscription->setParameter('firstName', 'John');
   	$subscription->setParameter('lastName', 'Conde');
	$subscription->setParameter('address', '123 Main Street');
	$subscription->setParameter('city', 'Townsville');
	$subscription->setParameter('state', 'NJ');
	$subscription->setParameter('zip', '12345');
	$subscription->setParameter('email', 'fakemail@example.com');
 
	// Set the billing cycle for every one months
	$subscription->setParameter('interval_length', 1);
	$subscription->setParameter('startDate', date("Y-m-d", strtotime("+ 1 months")));
 
	// Set up a trial subscription for one months at a reduced price
	$subscription->setParameter('trialOccurrences', 1);
	$subscription->setParameter('trialAmount', 20.00);
 
	// Use try/catch so if an exception is thrown we can catch it and figure out what happened
	try
	{
		// Create the subscription
		$subscription->createAccount();
 
		// Check the results of our API call
		if ($subscription->isSuccessful()) {
			// Get the subscription ID
			$subscription_id = $subscription->getSubscriberID();
		} else {
    	    // The subscription was not created!
		}
	} catch (AuthnetARBException $e) {
		echo $e;
		echo $subscription;
	}
}

function updateAccount() {
	$subscription = new AuthnetARB('myapilogin', 'mYtRaNsaCTiOnKEy');
	$subscription->setParameter('subscriptionId', $subscription_id);
	$subscription->setParameter('cardNumber', '4111111111111111');
	$subscription->setParameter('expirationDate', '2016-16');
	$subscription->setParameter('firstName', 'John');
	$subscription->setParameter('lastName', 'Conde');
	$subscription->setParameter('address', '123 Main Street');
	$subscription->setParameter('city', 'Townsville');
	$subscription->setParameter('state', 'NJ');
	$subscription->setParameter('zip', '12345');
	$subscription->setParameter('email', 'fakemail@example.com');

	// Use try/catch so if an exception is thrown we can catch it and figure out what happened
	try
	{
		// Create the subscription
		$subscription->updateAccount();
 
		// Check the results of our API call
		if ($subscription->isSuccessful()) {
			// Get the subscription ID
			$subscription_id = $subscription->getSubscriberID();
		} else {
    	    // The subscription was not created!
		}
	} catch (AuthnetARBException $e) {
		echo $e;
		echo $subscription;
	}
}

function deleteAccount() {
	$subscription = new AuthnetARB('myapilogin', 'mYtRaNsaCTiOnKEy');
	$subscription->setParameter('subscriptionId', $subscription_id);

	// Use try/catch so if an exception is thrown we can catch it and figure out what happened
	try
	{
		// Create the subscription
		$subscription->deleteAccount();
 
		// Check the results of our API call
		if ($subscription->isSuccessful()) {
			// Get the subscription ID
			$subscription_id = $subscription->getSubscriberID();
		} else {
    	    // The subscription was not created!
		}
	} catch (AuthnetARBException $e) {
		echo $e;
		echo $subscription;
	}
}

function approveCC( $creditcard, $expiration ) {
	$authorization = new AuthnetAIM('myapilogin', 'mYtRaNsaCTiOnKEy');
	$authorization->setTransaction($creditcard, $expiration, 0.00);
	$authorization->setTransactionType('AUTH_ONLY');
 
	// Use try/catch so if an exception is thrown we can catch it and figure out what happened
	try
	{
		// pre-approve card
		$authorization->process();
 
		// Check the results of our API call
		if ($subscription->isSuccessful()) {
			// Get the subscription ID
			$subscription_id = $subscription->getSubscriberID();
		} else {
    	    // The subscription was not created!
		}
	} catch (AuthnetARBException $e) {
		echo $e;
		echo $subscription;
	}
	return $authorization->isApproved();
}

?>
