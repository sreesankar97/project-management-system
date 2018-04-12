<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project Management System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
         <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-image: url('images/image1.jpg');
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                 right: 10px;
                /* padding:20%;         */
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .btn{
                color: #fff;
                text-decoration: none;
                border: #ccc 1px solid;
                padding: 10px 15px;
                border-radius: 8px;
                line-height: 4em;

            }
        </style>
        
    </head>
    <body>
        <h1><center>Project Management System<center></h1>
     {{-- <div id="particles --}}
     <!-- <div id="particles-js" class="flex-center position-ref full-height" >  -->

        <div class="flex-center position-ref full-height">

            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="panel" >
                  @if(Auth::check())
                <div >
                         <a class="btn" align="center" style="color:white;font-size:20px" href="{{ url('/home') }}">Home</a>
                </div>
           @else
           <div style="color:#fff;">
                        <a class="btn" style="color:white;font-size:20px" href="{{ url('/login') }}">Team Login</a>
            &nbsp;
                        <a class="btn" style="color:white;font-size:20px" href="{{ url('admin/login') }}">Admin Login</a>
            &nbsp;
                        <a class="btn" style="color:white;font-size:20px" href="{{ url('/faculty/login') }}">Guide Login</a>
                        </div>
            @endif
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
         <!-- <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>   -->
        <!-- <script>
        particlesJS.load('particles-js', 'js/particles.json',
        function(){
            console.log('particles.json loaded...')
        })
    </script> -->
    </body>
</html>
