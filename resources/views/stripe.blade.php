<!DOCTYPE html>
<html>
<head>
<title>Mokejimas</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style type="text/css">
.panel-title {
display: inline;
font-weight: bold;
}
.display-table {
display: table;
}
.display-tr {
display: table-row;
}
.display-td {
display: table-cell;
vertical-align: middle;
width: 61%;
}
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" >
                        <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                        <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
                <form
                role="form"
                action="{{ route('stripe.post') }}"
                method="post"
                class="require-validation"
                data-cc-on-file="false"
                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                id="payment-form">
                @csrf
                <input type="hidden" value="{{ $kelione->id }}" id='keliones_id' name='keliones_id'>
                @if(Auth::check())
                    <input type="hidden" value="{{ Auth::user()->id}}" id='user_id' name='user_id'>
                @endif
                    <input type="hidden" value="patvirtinta" id='patvirt_busena' name='patvirt_busena'>           
                    <!-- uzmokest tipas -->
                    <div class="mt-4">
                        Užmokėščio tipas
                        <select id='uzmokest_tipas'  name="uzmokest_tipas" class='uzmokest_tipas'>
                                <option value = 'Internetu'>Internetu</option>
                                <option value = 'Vietoj'>Vietoje</option>
                        </select>
                    </div>
                    <!-- kaina -->
                    <input type="hidden" id="kainasuaug" value="{{$kelione->kaina_suaug}}">
                    <input type="hidden" id="kainavaikam" value="{{$kelione->kaina_vaikam}}">
                    <div class="mt-4">
                        Keleiviu kiekis<br>
                        Suauge
                        <input id='num-inputs1' value='1' name='suauge' step='1' min='1' max='5' default='1' type='number'></input>
                        Vaikai
                        <input id='num-inputs2' value='0' name='vaikai' step='1' min='0' max='5' default='0' type='number'></input>
                    </div>
                    <div id="keleiviai"></div>
                    <div id = "pay">
                <div class='form-row row'>
                    <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Name on Card</label> <input
                        class='form-control' size='4' type='text'>
                    </div>
                </div>
                <div class='form-row row'>
                    <div class='col-xs-12 form-group card required'>
                        <label class='control-label'>Card Number</label> <input
                        autocomplete='off' class='form-control card-number' size='20'
                        type='text'>
                    </div>
                </div>
                <div class='form-row row'>
                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                    <label class='control-label'>CVC</label> <input autocomplete='off'
                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                    type='text'>
                    </div>
                <div class='col-xs-12 col-md-4 form-group expiration required'>
            <label class='control-label'>Expiration Month</label> <input
        class='form-control card-expiry-month' placeholder='MM' size='2'
        type='text'>
        </div>
        <div class='col-xs-12 col-md-4 form-group expiration required'>
        <label class='control-label'>Expiration Year</label> <input
        class='form-control card-expiry-year' placeholder='YYYY' size='4'
        type='text'>
        </div>
</div>
        </div>
        <div class="row">
        <div class="col-xs-12">
</div>
        <button id="submit-button" class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
        </div>
        </div>
        </form>
        </div>
        </div>        
        </div>
        </div>
    </div>
    </body>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
                const keleiviai = document.getElementById("keleiviai");
                const select = document.querySelector('#uzmokest_tipas');
                const submitButton = document.querySelector('#submit-button');
                const suauge = document.getElementById("suaug");
                const vaikai = document.getElementById("vaikai");
                const kainaSuauge = document.getElementById("kainasuaug");
                const kainaVaikai = document.getElementById("kainavaikam");

                //testing
                const numInputsInput1 = document.getElementById("num-inputs1");
                const numInputsInput2 = document.getElementById("num-inputs2");
                const inputsContainer = document.getElementById("keleiviai");

                function generateInputs() {
                    const numInputs1 = parseInt(numInputsInput1.value);
                    const numInputs2 = parseInt(numInputsInput2.value);

                    const suagkain = kainaSuauge.value;
                    const vaikkain = kainaVaikai.value;
                    
                    const suma = numInputs1*suagkain+numInputs2*vaikkain;
                    submitButton.textContent= 'Moketi: '+suma+"€";

                    // Clear previous inputs
                    inputsContainer.innerHTML = "";

                    // Create new inputs
                    const separator = document.createElement("p");
                    separator.textContent = "Suauge";
                    inputsContainer.appendChild(separator);
                    for (let i = 0; i < numInputs1; i++) {

                        const labelvard = document.createElement("label");
                        labelvard.for = `vardas[]`;
                        labelvard.textContent = `Vardas`;
                        inputsContainer.appendChild(labelvard);
                        const input1 = document.createElement("input");
                        input1.type = "text";
                        input1.name = "vardas[]";
                        inputsContainer.appendChild(input1);

                        const labelpavard = document.createElement("label");
                        labelpavard.for = `pavarde[]`;
                        labelpavard.textContent = `Pavarde`;
                        inputsContainer.appendChild(labelpavard);
                        const input2 = document.createElement("input");
                        input2.type = "text";
                        input2.name = "pavarde[]";
                        inputsContainer.appendChild(input2);
                        
                    }
                    const separator2 = document.createElement("p");
                    separator2.textContent = "Vaikai";
                    inputsContainer.appendChild(separator2);
                    
                    for (let i = 0; i < numInputs2; i++) {

                        const labelvard = document.createElement("label");
                        labelvard.for = `vardas[]`;
                        labelvard.textContent = `Vardas`;
                        inputsContainer.appendChild(labelvard);
                        const input1 = document.createElement("input");
                        input1.type = "text";
                        input1.name = "vardas[]";
                        inputsContainer.appendChild(input1);

                        const labelpavard = document.createElement("label");
                        labelpavard.for = `pavarde[]`;
                        labelpavard.textContent = `Pavarde`;
                        inputsContainer.appendChild(labelpavard);
                        const input2 = document.createElement("input");
                        input2.type = "text";
                        input2.name = "pavarde[]";
                        inputsContainer.appendChild(input2);
                        
                    }
                }

                numInputsInput1.addEventListener("input", generateInputs);
                numInputsInput2.addEventListener("input", generateInputs);
                // Call generateInputs initially to create the initial set of inputs
                generateInputs();

                const pay = document.querySelector('#pay')
                select.addEventListener('change', () => {
                    if(select.value === "Vietoj"){
                       pay.style.display='none';
                    }
                    else
                    {
                        pay.style.display='block';
                    }
                });
                const paytype = document.querySelector('#uzmokest_tipas');
                const option = paytype.value;
                $(function() {
                    var $form = $(".require-validation");
                    $('form.require-validation').bind('submit', function(e)
                    {
                        if(option === "Internetu"){
                            var $form = $(".require-validation"),
                            inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'].join(', '),
                            $inputs = $form.find('.required').find(inputSelector),
                            $errorMessage = $form.find('div.error'),
                            valid = true;
                            $errorMessage.addClass('hide');
                            $('.has-error').removeClass('has-error');
                            $inputs.each(function(i, el) 
                            {
                                var $input = $(el);
                                if ($input.val() === '') 
                                {
                                    $input.parent().addClass('has-error');
                                    $errorMessage.removeClass('hide');
                                    e.preventDefault();
                                }
                            });
                            if (!$form.data('cc-on-file')) 
                            {
                                e.preventDefault();
                                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                                Stripe.createToken({
                                    number: $('.card-number').val(),
                                    cvc: $('.card-cvc').val(),
                                    exp_month: $('.card-expiry-month').val(),
                                    exp_year: $('.card-expiry-year').val()
                                }, stripeResponseHandler);
                            }
                        }
                    });
                    function stripeResponseHandler(status, response) 
                    {
                        if(option === "Internetu"){
                            if (response.error){
                                $('.error')
                                .removeClass('hide')
                                .find('.alert')
                                .text(response.error.message);
                            } 
                            else 
                            {
                                /* token contains id, last4, and card type */
                                var token = response['id'];
                                $form.find('input[type=text]').empty();
                                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                                $form.get(0).submit();
                            }
                        }
                        $form.get(0).submit();
                    }
                });
    </script>
</html>