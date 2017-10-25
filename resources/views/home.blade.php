@extends('layouts.app')

@section('content')
<div class="uk-container">
    <div class="uk-section-small">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
<!--         <div class="uk-offcanvas-content">

    <button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-overlay">Open</button>

    <div id="offcanvas-overlay" uk-offcanvas="overlay: true">
      <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>


        <h3>Title</h3>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

    </div>
</div>

    </div> -->
</div>
</div>
@endsection
