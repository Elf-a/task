@extends('credit.layout')

@section('content')


<div class="cnt-cta-credit-forms">
    <a class="cta-open-form" href="{{ route('home.index') }}">НАЗАД</a>
</div>


@include('credit.partials._flash_and_error_messages')


    <div id="registration-form">
      <div class='fieldset'>
        <legend>Формуляр за създаване на кредит</legend>
        <form action="{{ route('home.new_credit.store') }}" method="post" data-validate="parsley">
        @csrf
          
          <div class='row'>
            <label for='credit_borrower_name'>Име на кредитополучателя:</label>
            <input type="text" placeholder="Име" name='credit_borrower_name' id='credit_borrower_name' />
          </div>

          <div class='row'>
            <label for="credit_amount">Сума на кредита в BGN:</label>
            <input type="text" placeholder="Сума"  name='credit_amount' data-required="true" data-type="credit_amount" data-error-message="Amount is required" />
          </div>

          <div class='row'>
            <label>Период на кредита в месеци:</label>
              <select name="credit_period">

                @for($i = 3; $i <= 120; $i++)
                  <option value="{{ $i }}">{{ $i }} месеца</option>
                @endfor

              </select>
          </div>

          <input type="submit" value="СЪЗДАЙ">
        </form>
      </div>
    </div>


@endsection