<!DOCTYPE html>
<html>
  <head>
    <title>Turkimark</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      body {
        display: flex;
        flex-direction: column;
        background-color: #00cc66;
        color: #000000;
      }

      header {
        background-color: #00cc66;
        color: #ffffff;
        padding: 1rem;
      }

      nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      nav ul {
        list-style: none;
        display: flex;
      }

      nav ul li {
        margin-right: 1rem;
      }

      a {
        color: #000000;
        font-size: 1.2rem;
      }

      main {
        flex-grow: 1;
        margin: 2rem;
        text-align: center;
      }

      h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
      }

      h2 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
      }

      p {
        font-size: 1rem;
        margin-bottom: 2rem;
      }

      footer {
        background-color: #00cc66;
        color: white;
        text-align: center;
        padding: 1rem;
      }
      
      .login-register {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
      }
      
      .login-register-box {
        display: inline-block;
        background-color: #00cc66;
        color: #000000
        padding: 1rem;
        margin-right: 1rem;
      }

    </style>
  </head>
  <body>
    <header>
      <nav>
        <ul>
        </ul>
      </nav>
    </header>
    <main> 
      <img src="{{'/storage/imagenes/logo.png'}}" class="card-img-top">
      <h2>Encuentra los mejores productos tecnológicos al mejor precio.</h2>
      <div class="login-register">
        <div class="login-register-box">
          @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
              @auth
              @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar sesión</a>
              @endauth
            </div>
          @endif
        </div>
        <div class="login-register-box">
          @if (Route::has('register'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
              <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registro</a>
            </div>
          @endif
        </div>
      </div>
   
    </main>
    <footer>
      <p>Derechos reservados Turkimark &copy; 2023</p>
    </footer>
  </body>
</html>

