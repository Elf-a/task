
@extends('credit.layout')

@section('content')

<style>


</style>

@include('credit.partials._flash_and_error_messages')

<div class="cnt-cta-credit-forms">
    <a class="cta-open-form" href="{{ route('home.new_credit') }}">Създаване на нов кредит</a>
    <a class="cta-open-form" href="{{ route('home.new_payment') }}">Ново плащане по кредит</a>
</div>

    
    <div id="wrapper">
      <h1>Списък на кредити</h1>
      
      <table id="keywords" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
          <th><span>ID</span></th>
            <th><span>Име кредитополучател</span></th>
            <th><span>Размер на кредит BGN</span></th>
            <th><span>Обща дължима сума кредит BGN</span></th>
            <th><span>Период на кредита - месеци</span></th>
            <th><span>Месечна вноска BGN</span></th>
          </tr>
        </thead>
        <tbody>

    @if(!empty($data))

        @foreach ($data as $d)
            
            <tr>
            <td class="lalign">{{ $d->unique_credit_id }}
              <td class="lalign">{{ $d->credit_borrower_name }}</td>
              <td>{{ $d->credit_amount }}</td>
              <td>@if($d->credit_total_repayment_amount === '0.00') Кредита е изплатен  @else  {{ $d->credit_total_repayment_amount }} @endif</td>
              <td>{{ $d->credit_period }}</td>
              <td>{{ $d->credit_interest }}</td>
            </tr>

        @endforeach

    @endif

        </tbody>
      </table>
    </div>


 @endsection

