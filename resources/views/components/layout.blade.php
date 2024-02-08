<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <title>AS - Challenge</title>
</head>

<body class="mb-48">
  <nav class="flex justify-between items-center my-8 mr-16">
    <ul>
        <li>
            <a href="/contacts" class="hover:text-blue-800">
                <span class="font-bold uppercase ml-16">
                  AS Challenge
                </span>
            </a>
        </li>
    </ul>
    <ul class="flex space-x-6 mr-6 text-lg">
      @auth
      <li>
        <a href="/contacts/create" class="hover:text-blue-600 border rounded p-1 bg-slate-100 shadow"><i class="fa-solid fa-plus"></i> Create</a>
      </li>
      <li>
        <a href="/manage" class="hover:text-blue-600 border rounded p-1 bg-slate-100 shadow"><i class="fa-solid fa-gear"></i> Manage</a>
      </li>
      <li>
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit">
            <i class="fa-solid fa-door-closed"></i>  Logout
          </button>
        </form>
      </li>
      @else
      <li>
        <a href="/register" class="hover:text-blue-600"><i class="fa-solid fa-user-plus"></i> Register</a>
      </li>
      <li>
        <a href="/login" class="hover:text-blue-600"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
      </li>
      @endauth
    </ul>
</nav>
    @auth
        <div class="ml-16 mb-4">
            <small>
                Welcome, {{auth()->user()->name}}.
            </small>
        </div>
    @endauth

    <x-alert-message></x-alert-message>
    <main class="mx-16">
        {{$slot}}
    </main>

</body>

</html>
