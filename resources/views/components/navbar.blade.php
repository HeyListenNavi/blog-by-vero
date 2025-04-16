<x-window title="sailing boat" class="navbar">
  <div class="content">
      <div class="title">
          <h3>navi-gation</h3>
      </div>
      <ul>
          <li>
            <a href="{{ route('home') }}">
              Home
            </a>
          </li>
          <li>
            <a href="{{ route('about-me') }}">
              About me
            </a>
          </li>
          <li>
            <a href="{{ route('journal') }}">
              Journal
            </a>
          </li>
          <li>
            <a href="{{ route('camera-roll') }}">
              Cameraroll
            </a>
          </li>
      </ul>
  </div>
</x-window>