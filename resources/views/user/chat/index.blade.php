@extends('layouts.website')

@section('content')
<div class="body-content">
	<div class="container">
        <div class="sign-in-page mt-4 mb-4">
         <div class="row">
            <div class="col-md-4 ">
                @include('user.includes.profile-sidebar')
            </div>
            <div class="col-md-8 mt-1">
              <div class="card">
                    <div class="card-body">
                        <div id="app">
                            <chat-component></chat-component>
                        </div>
                    </div>
              </div>
            </div>
          </div>
	</div>
</div>
</div>

<script src="{{ asset('js/app.js') }}" defer></script>
@endsection
