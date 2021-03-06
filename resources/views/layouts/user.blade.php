
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">

<nav class="navbar navbar-default navbar-static-top">
<a class="navbar-brand" href="{{ url('/') }}">
                        Project Management System
                    </a>
                </div>
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    </ul>
                                    </nav>
                                    @php
                                    $count =10;
                                    @endphp
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="{{ url('users/attendence') }}" class="w3-bar-item w3-button">View Attendence</a>
  <a href="{{ url('users/marks') }}" class="w3-bar-item w3-button">View Marks</a>
   <a href="{{ url('/viewmsg') }}" class="w3-bar-item w3-button">Messages</a>
  <a href="{{ url('/proformaupload') }}" class="w3-bar-item w3-button">Submit Documents</a>
  <a href="{{ url('/changeteampass') }}" class="w3-bar-item w3-button">Change Password</a>
</div>

                    <script src="{{ asset('js/app.js') }}"></script>    
<!-- Page Content -->
<div style="margin-left:15%">
  
<div class="w3-container w3-teal">
  <h1>User Dashboard</h1>
</div>  
<p>
@include('layouts.validation')
 @yield('content')
</p>