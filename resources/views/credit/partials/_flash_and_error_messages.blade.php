 @if (session('error'))
    <div class="alert alert-error alert-white rounded">
        <div class="icon"><i class="fa fa-check"></i></div>
        {{ session('error') }}
    </div>
  @endif

  @if (session('info'))
    <div class="alert alert-info alert-white rounded">
        <div class="icon"><i class="fa fa-check"></i></div>
        {{ session('info') }}
    </div>
  @endif


  @if (session('success'))
    <div class="alert alert-success alert-white rounded">
        <div class="icon"><i class="fa fa-check"></i></div>
        {{  session('success')  }}
    </div>
  @endif

@if ($errors->any())
  <div class="cnt-cta-credit-forms">
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
  </div>
@endif