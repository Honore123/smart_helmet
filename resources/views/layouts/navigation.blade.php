<nav class="navbar navbar-expand-lg custom_navbar">
    <div class="container">
      <a class="navbar-brand" href="#">Smart Helmet</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item px-4">
            <a class="nav-link {{setActive('dashboard')}} {{setActive('helmet')}} {{setActive('helmet/*')}} {{setActive('miner/*')}}" aria-current="page" href="{{route('dashboard')}}">Miner Data</a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link {{setActive('site')}}" href="{{route('site_data')}}">Site Data</a>
          </li>
         
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{Auth()->user()->name}}
                </a>
                <ul class="dropdown-menu dropdown-menu-light">
                  <li><a class="dropdown-item" href="{{route('change_password')}}">Change Password</a></li>
                  <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a></li>
                  </form>
                </ul>
              </li>
        </ul>
      </div>
    </div>
  </nav>