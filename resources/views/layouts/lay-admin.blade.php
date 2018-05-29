<style>#index #menu .index, #page1 #menu .page1{
    font-weight: bold;
}</style>
<script>
    function myAccFunc() {
     var x = document.getElementById("demoAcc");
     if (x.className.indexOf("w3-show") == -1) {
     x.className += " w3-show";
     x.previousElementSibling.className += " w3-green";
     } else { 
     x.className = x.className.replace(" w3-show", "");
     x.previousElementSibling.className = 
     x.previousElementSibling.className.replace(" w3-green", "");
     }
    }
    
    </script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%" id="menu">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="{{ url('admin/importexport') }}" class="w3-bar-item w3-button">Team Formation</a>
  <a href="{{ url('viewproforma') }}" class="w3-bar-item w3-button">Proforma</a>
  <a href="{{ url('createfaculty') }}" class="w3-bar-item w3-button">Add Guide</a>
  <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">Attendence</button>
 <div id="demoAcc" class="w3-bar-block w3-hide w3-white w3-card-4">
 <a href="{{ url('addtotclass') }}" class="w3-bar-item w3-button">Total attendence</a>
 <a href="{{ url('addatt') }}"  class="w3-bar-item w3-button">Enter attendence</a>
 </div>

  <a href="{{ url('/select') }}" class="w3-bar-item w3-button">Sent Message</a>
  <a href="{{ url('/adminfileselectgroup') }}" class="w3-bar-item w3-button">View Files</a>
</div>

                    <script src="{{ asset('js/app.js') }}"></script>
<!-- Page Content -->
<div style="margin-left:15%">

<div class="w3-container w3-teal">
  <h1>Admin Dashboard</h1>
</div>
<p>
 @include('layouts.validation')
 @yield('content')
</p>
