@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
    <h2 style="text-align:center">Profile inFo</h2>

<div class="card">
            <img src="{{ asset('images/avatar.jpg') }}" alt="John" style="width:100%">
                <h1>{{ Auth::user()->name }}</h1>
                <p class="title">{{ Auth::user()->category }}</p>
                         <p>Skills: {{ Auth::user()->skills }}</p>
                         <p>{{ Auth::user()->experience }} Year experience</p>
                        <div style="margin: 10px 0;">
                        
                        <p><button>Edit</button></p>
                        </div>
    </div>
    </div>

    <div class="col-sm-9">
    @if(Auth::user()->category =='freelencer')         
    <h4><small>Employeer list</small></h4>       
    @else
    <h4><small>Freelencer list</small></h4>           
    @endif
     
      <hr>


      
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/avatar.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{Auth::user()->name}}</h5>
                            <p class="card-text">Skills : {{Auth::user()->skills}}</p>
                            <p class="card-text">{{Auth::user()->experience}} Year experience</p>
                            <a href="#" class="btn btn-primary">Hire</a>
                </div>
         </div>     
    </div>
  </div>
</div>

@endsection
