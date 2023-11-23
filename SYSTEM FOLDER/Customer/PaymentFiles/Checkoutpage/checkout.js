// This is your test publishable API key.
const stripe = Stripe("pk_test_51OB5ihItcjCbiluxZDtldEeHdpNCGv5bU1eeLVZ57yq4x0ZxtUhM9eOiCbF8tjQo6BiRYCZcYOac5Z1VaIt7OMT800xhKrCbFf");

initialize();

// Create a Checkout Session as soon as the page loads
async function initialize() {
const queryString = window.location.search.substring(1)
const urlParams = new URLSearchParams(queryString)
  const clientSecret = urlParams.get("client_secret")
  console.log(clientSecret)

  const checkout = await stripe.initEmbeddedCheckout({
    clientSecret,
  });

  // Mount Checkout
  checkout.mount('#checkout');
}