

<script src="https://checkout.stripe.com/checkout.js"></script>

<form id="myForm" action="<?php echo base_url(); ?>payment/checkout2" method="POST">

    <div class="container">

        <input type="hidden" id="stripeToken" name="stripeToken" />
        <input type="hidden" id="stripeEmail" name="stripeEmail" />
        <input type="hidden" id="amountInCents" name="amountInCents" />
        <input type="hidden" id="amountCostumer" name="amountCostumer" />
        <input type="hidden" id="payment1" name="payment1" />
        <input type="hidden" id="payment2" name="payment2" />
        <input type="hidden" id="payment3" name="payment3" />

        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h3 class="card-header">Slider</h3>
                    <div class="card-body">
                        <div class="display-4">$10.00</div>
                        <div class="font-italic">per week</div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">you will be shown in the Slider </li>
                        <li class="list-group-item">People will find you easier</li>
                        <li class="list-group-item">
                            <input type="checkbox" id="sliderPay" onchange="calculate(this)" value="20">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h3 class="card-header">Price Total </h3>
                    <div class="card-body">
                        <div class="display-4 priceSliderLi"></div>
                        <div  class="display-4 priceSliderLIVal"></div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="display-4 priceFromtLi"></div>
                        <div class="display-4 priceFrontLiVal"></div>
                    </div>
                    <hr>
                    <ul class="list-group list-group-flush">
                        <li>
                            <p>When you click on the "Purchase" button you buy the product are you sure?</p>
                            <input type="checkbox" id="paymentInfoCheck" onchange="paymentinfo(this);" value="20">&nbsp; I agree
                        </li>
                    </ul>
                    <hr>
                    <div class="display-4" style="color: red;">
                        <h5>Price Total</h5>
                        <input type="hidden" id="Totalcost">
                        <div id="Totalcost2"></div>
                    </div>
                    <hr>
                    <div class="pull-right" style="padding-bottom: 10px">
                        <button  disabled id="customButton" style="float: right; ">Purchase</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>




    var total = 0;
    var amount=parseInt(document.getElementById('Totalcost').text);


    function paymentinfo() {
        var ckbox = $('#paymentInfoCheck');
        if (ckbox.is(':checked')) {
            $("#customButton").prop('disabled', false);
        }
    }

    function calculate(item) {
        var calcCutom=0;
        if (item.checked) {
            if(item.id!=="frontpage"){
                $('.priceSliderLi').text('Profile in Slider');
                $('.priceSliderLIVal').text("$"+item.value);
            }
            else if($('#frontpage').is(':checked')&&document.getElementById('frontpageText').value>="500"){
                $('.priceFromtLi').text('Blog on Start Page');
                $('.priceFrontLiVal').text("$"+document.getElementById('frontpageText').value);

            }
            total += parseInt(item.value);
        } else {
            if(item.id==="frontpage"){
                $('.priceFromtLi').text('');
                $('.priceFrontLiVal').text('');
            }else{
                $('.priceSliderLi').text('');
                $('.priceSliderLIVal').text('');
            }

            total -= parseInt(item.value);
        }
        if ($('#frontpage').is(':checked')) {
            if(document.getElementById('frontpageText').value>="500"){
                calcCutom+=parseInt(document.getElementById('frontpageText').value);

            }
            else{
                alert("Amount is too low");
                document.getElementById('frontpageText').value=0;
                $('#frontpage').prop("checked",false);
            }
        }

        calcCutom+=total;
        document.getElementById('Totalcost').innerHTML = calcCutom;
        $('#Totalcost').val(calcCutom);
        $('#Totalcost2').text(calcCutom);
    }

    var handler = StripeCheckout.configure({
        key: 'pk_test_nwZOxBoQJKSmyFS3tAvDiePQ',
        image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
        token: function(token) {
            $("#stripeToken").val(token.id);
            $("#stripeEmail").val(token.email);
            $("#amountInCents").val(Math.floor($("#Totalcost").val() * 100));

            if($("#frontpageText").val()!==""){
                $("#amountCostumer").val($("#frontpageText").val());
            }
            else{
                $("#amountCostumer").val(0);
            }
            if($('#sliderPay').prop('checked')){
                $("#payment1").val(1);
            }
            else{
                $("#payment1").val(0);
            }
            if($('#companyPay').prop('checked')){
                $("#payment2").val(1);
            }
            else {
                $("#payment2").val(0);

            }
            if($('#frontpage').prop('checked')){
                $("#payment3").val(1);
            }
            else {
                $("#payment3").val(0);

            }


            $("#myForm").submit();
        }
    });

    $('#customButton').on('click', function(e) {
        var amountInCents = Math.floor($("#Totalcost").val() * 100);
        var displayAmount = parseFloat(Math.floor($("#Totalcost").val() * 100) / 100).toFixed(2);
        // Open Checkout with further options
        handler.open({
            name: 'Demo Site',
            description: 'Custom amount ($' + displayAmount + ')',
            amount: amountInCents,
        });
        e.preventDefault();
    });

    // Close Checkout on page navigation
    $(window).on('popstate', function() {
        handler.close();
    });

</script>
