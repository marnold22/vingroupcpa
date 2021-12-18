<!-- Paypal Variable Amount Method -->
<div id="smart-button-container" class="text-center">
    <!-- Description Field -->
    <div class="paypal"><label for="description">Description or Invoice # </label><input type="text" name="descriptionInput" id="description" maxlength="127" value=""></div>

        <p id="descriptionError" style="visibility: hidden; color:red; text-align: center;">Please enter a description or invoice number</p>

    <!-- Amount Field -->
    <div class="paypal"><label for="amount">Amount Due </label><input name="amountInput" type="number" id="amount" value=""></div>

        <p id="priceLabelError" style="visibility: hidden; color:red; text-align: center;">Please enter a price</p>

    <!-- Inovice Number Field -->
    <div id="invoiceidDiv" class="paypal" style="text-align: center; display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value=""></div>

        <p id="invoiceidError" style="visibility: hidden; color:red; text-align: center;">Please enter an Invoice ID</p>

    <!-- List of buttons -->
    <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
</div>




<!-- Script for Paypal Interaction -->
<script src="https://www.paypal.com/sdk/js?client-id=sb&disable-funding=card,credit,venmo" data-sdk-integration-source="button-factory"></script>
<script>
    function initPayPalButton() {
        var description = document.querySelector('#smart-button-container #description');
        var amount = document.querySelector('#smart-button-container #amount');
        var descriptionError = document.querySelector('#smart-button-container #descriptionError');
        var priceError = document.querySelector('#smart-button-container #priceLabelError');
        var invoiceid = document.querySelector('#smart-button-container #invoiceid');
        var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
        var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

        var elArr = [description, amount];

        if (invoiceidDiv.firstChild.innerHTML.length > 1) {
            invoiceidDiv.style.display = "block";
        }

        var purchase_units = [];
        purchase_units[0] = {};
        purchase_units[0].amount = {};

        function validate(event) {
            return event.value.length > 0;
        }

        paypal.Buttons({
            style: {
                color: 'gold',
                shape: 'pill',
                label: 'paypal',
                layout: 'vertical',

            },

            onInit: function(data, actions) {
                actions.disable();

                if (invoiceidDiv.style.display === "block") {
                    elArr.push(invoiceid);
                }

                elArr.forEach(function(item) {
                    item.addEventListener('keyup', function(event) {
                        var result = elArr.every(validate);
                        if (result) {
                            actions.enable();
                        } else {
                            actions.disable();
                        }
                    });
                });
            },

            onClick: function() {
                if (description.value.length < 1) {
                    descriptionError.style.visibility = "visible";
                } else {
                    descriptionError.style.visibility = "hidden";
                }

                if (amount.value.length < 1) {
                    priceError.style.visibility = "visible";
                } else {
                    priceError.style.visibility = "hidden";
                }

                if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
                    invoiceidError.style.visibility = "visible";
                } else {
                    invoiceidError.style.visibility = "hidden";
                }

                purchase_units[0].description = description.value;
                purchase_units[0].amount.value = amount.value;

                if (invoiceid.value !== '') {
                    purchase_units[0].invoice_id = invoiceid.value;
                }
            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: purchase_units,
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    // Full available details
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                    // Redirect to another URL: 
                    actions.redirect('http://localhost/thank_you.php');

                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');
    }
    initPayPalButton();
</script>