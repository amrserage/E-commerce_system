<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PayPal JS SDK Standard Integration</title>
    </head>
    <body>
        <div id="paypal-button-container"></div>
        <p id="result-message"></p>
        <!-- Replace the "test" client-id value with your client-id -->
        <script src="https://www.paypal.com/sdk/js?client-id=Ae0GHq5wha9-kpbiYFwOBeqwbE1FPcXiX1fl_TRoh7ndQB5dr6UAiVFlg48WASOCMfMHAKaHg6PyIzEd&currency=USD"></script>
        <script src="{{asset('assets/app.js')}}"></script>
    </body>
    </html>
<script>
paypal.Buttons({
              // Order is created on the server and the order id is returned
                createOrder: (data, actions) => {
                    return fetch("/api/orders", {
                    method: "post",
                    body:JSON.stringify({price:300})
                    // use the "body" param to optionally pass additional order information
                    // like product ids or amount
                    })
                    .then((response) => response.json())
                    .then((order) => order.id);
                },
                // Finalize the transaction on the server after payer approval
                onApprove: (data, actions) => {
                    return fetch(`/api/orders/${data.orderID}/capture`, {
                    method: "post",
                    body:JSON.parse({
                        'email':localStorage.getItem('email'),
                        'firstname':localStorage.getItem('firstname'),
                        'lastname':localStorage.getItem('lastname'),
                        'address1':localStorage.getItem('address1'),
                        'address2':localStorage.getItem('address2'),
                        'phone':localStorage.getItem('phone'),
                    })
                    })
                    .then((response) => response.json())
                    .then((orderData) => {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                    });
                }
                }).render('#paypal-button-container');
            </script>
</script>


