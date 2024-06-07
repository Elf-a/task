@extends('credit.layout')

@section('content')


<div class="cnt-cta-credit-forms">
    <a class="cta-open-form" href="{{ route('home.index') }}">НАЗАД</a>
</div>

@include('credit.partials._flash_and_error_messages')

    <div id="registration-form">
      <div class='fieldset'>
        <legend>Формуляр за ново плащане по кредит</legend>
        <form action="{{ route('home.new_payment.store') }}" method="post" data-validate="parsley">
        @csrf
          
          <div class='row'>
            <label>Име и кредит на кредитополучателя</label>
              <select name="unique_credit_id">
              <option>Изберете от списъка с кредити</option>
                @foreach($data as $d)
                  <option value="{{ $d->unique_credit_id}}">{{ $d->credit_borrower_name }} - {{ $d->unique_credit_id}} - ( {{ $d->credit_amount }}лв.)</option>
                @endforeach

              </select>
          </div>


          <div class='row'>
            <label for="transaction_amount">Сума за плащане в BGN:</label>
            <input type="text" placeholder="Сума"  name='transaction_amount'>
          </div>

          

          <input type="submit" value="ПЛАТИ ВНОСКА">
        </form>
      </div>
    </div>


@endsection