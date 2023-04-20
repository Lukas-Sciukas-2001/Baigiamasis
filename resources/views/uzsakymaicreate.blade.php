
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    @if(Auth::check())
        @if(Auth::user()->tipas > 2)
            <div>
                <form method="POST" action="{{route('uzsakymai.store')}}" role="form"
                class="require-validation"
                data-cc-on-file="false"
                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                id="payment-form">>
                    @csrf
                    <!-- vardas -->
                    <div class="mt-4">
                        <x-input-label for="vardas" :value="__('Keleivio vardas')" />
                        <x-text-input id="vardas" class="block mt-1 w-full" type="text" name="vardas" value="" required />
                    </div>
                    <!-- pavarde -->
                    <div class="mt-4">
                        <x-input-label for="pavarde" :value="__('Keleivio pavarde')" />
                        <x-text-input id="pavarde" class="block mt-1 w-full" type="text" name="pavarde" value="" required />
                    </div>

                    <!-- uzmokest tipas -->
                    <div class="mt-4">
                        <x-input-label for="uzmokest_tipas" :value="__('Užmokeščio tipas')" />
                        <x-text-input id="uzmokest_tipas" class="block mt-1 w-full" type="text" name="uzmokest_tipas" :value="old('uzmokest_tipas')" required />
                    </div>
                    <!-- kaina -->
                    <div class="mt-4">
                        <select id='kaina' name="kaina" class='kaina'>
                                <option value = '{{$kelione->kaina_suaug}}'>Suaugės</option>
                                <option value = '{{$kelione->kaina_vaikam}}'>Vaikas</option>
                        </select>
                    </div>
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
        <div class="row">
        <div class="col-xs-12">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
        </div>
        </div>
                    <input type="hidden" value="{{ $kelione->id }}" id='keliones_id' name='keliones_id'>
                    <input type="hidden" value="{{ Auth::user()->id}}" id='user_id' name='user_id'>
                    <input type="hidden" value="patvirtinta" id='patvirt_busena' name='patvirt_busena'>
                    <div>
                        <input type="submit">
                    </div>
                </form>
            </div>
        @else
        <div>
                <form method="POST" action="{{route('uzsakymai.store')}}">
                    @csrf
                    <!-- vardas -->
                    <div class="mt-4">
                        <x-input-label for="vardas" :value="__('Keleivio vardas')" />
                        <x-text-input id="vardas" class="block mt-1 w-full" type="text" name="vardas" value="{{Auth::user()->name}}" required />
                    </div>
                    <!-- pavarde -->
                    <div class="mt-4">
                        <x-input-label for="pavarde" :value="__('Keleivio pavarde')" />
                        <x-text-input id="pavarde" class="block mt-1 w-full" type="text" name="pavarde" value="{{Auth::user()->pavarde}}" required />
                    </div>
                    <!-- uzmokest tipas -->
                    <div class="mt-4">
                        Užmokėščio tipas
                        <select id='uzmokest_tipas' name="uzmokest_tipas" class='uzmokest_tipas'>
                                <option value = 'Vietoj'>Vietoje</option>
                                <option value = 'Internetu'>Internetu</option>
                        </select>
                    </div>
                    <!-- kaina -->
                    <div class="mt-4">
                        Keleivio amžius
                        <select id='kaina' name="kaina" class='kaina'>
                                <option value = '{{$kelione->kaina_suaug}}'>Suaugės</option>
                                <option value = '{{$kelione->kaina_vaikam}}'>Vaikas</option>
                        </select>
                    </div>
                    <input type="hidden" value="{{ $kelione->id }}" id='keliones_id' name='keliones_id'>
                    <input type="hidden" value="patvirtinta" id='patvirt_busena' name='patvirt_busena'>
                    <div>
                        <input type="submit">
                    </div>
                </form>
            </div>
        @endif
    @else
        <div>
                <form method="POST" action="{{route('uzsakymai.store')}}" role="form"
                class="require-validation"
                data-cc-on-file="false"
                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                id="payment-form">
                    @csrf
                    <!-- vardas -->
                    <div class="mt-4">
                        <x-input-label for="vardas" :value="__('Keleivio vardas')" />
                        <x-text-input id="vardas" class="block mt-1 w-full" type="text" name="vardas" :value="old('vardas')" required />
                    </div>
                    <!-- pavarde -->
                    <div class="mt-4">
                        <x-input-label for="pavarde" :value="__('Keleivio pavarde')" />
                        <x-text-input id="pavarde" class="block mt-1 w-full" type="text" name="pavarde" :value="old('pavarde')" required />
                    </div>
                    <!-- uzmokest tipas -->
                    <div class="mt-4">
                        Užmokėščio tipas
                        <select id='uzmokest_tipas'  name="uzmokest_tipas" class='uzmokest_tipas'>
                                <option value = 'Vietoj'>Vietoje</option>
                                <option value = 'Internetu'>Internetu</option>
                        </select>
                    </div>
                    <!-- kaina -->
                    <div class="mt-4">
                        Keleivio amžius
                        <select id='kaina' name="kaina" class='kaina'>
                                <option value = '{{$kelione->kaina_suaug}}'>Suaugės</option>
                                <option value = '{{$kelione->kaina_vaikam}}'>Vaikas</option>
                        </select>
                    </div>
                    <input type="hidden" value="{{ $kelione->id }}" id='keliones_id' name='keliones_id'>
                    <input type="hidden" value="patvirtinta" id='patvirt_busena' name='patvirt_busena'>
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
        <div class="row">
        </div>
                    <div>
                        <input type="submit">
                    </div>
                </form>
            </div>
    @endif
</x-app-layout>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
            <script type="text/javascript">
            $(function() {
            var $form         = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
            var $form         = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
            'input[type=text]', 'input[type=file]',
            'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid         = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
            }
            });
            if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
            }
            });
            function stripeResponseHandler(status, response) {
            if (response.error) {
            $('.error')
            .removeClass('hide')
            .find('.alert')
            .text(response.error.message);
            } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
            }
            }
            });
        </script>