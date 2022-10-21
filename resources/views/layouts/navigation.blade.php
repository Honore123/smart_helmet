<nav class="navbar navbar-expand-lg custom_navbar">
    <div class="container">
      <a class="navbar-brand" href="#">Smart Miner</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item px-4">
            <a class="nav-link {{setActive('/')}} {{setActive('helmet')}} {{setActive('helmet/*')}} {{setActive('miner/*')}}" aria-current="page" href="{{route('dashboard')}}">Miner Data</a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link {{setActive('site')}}" href="{{route('site_data')}}">Site Data</a>
          </li>
          @if(auth()->user()->user_type == 'admin')
          <li class="nav-item px-4">
            <a class="nav-link {{setActive('site/managers')}}" href="{{route('site.managers')}}">Managers</a>
          </li>
          @endif
          @if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'manager')
          <li class="nav-item px-4">
            <a class="nav-link {{setActive('report')}} {{setActive('report/*')}}" href="{{route('report.index')}}">Report</a>
          </li>
          @endif
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{setActive('change_password')}} {{setActive('change_password/*')}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{Auth()->user()->name}}
                </a>
                <ul class="dropdown-menu dropdown-menu-light">
                  <li><a class="dropdown-item" href="{{route('user.index')}}">Change Password</a></li>
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