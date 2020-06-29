<div class="sidebar" data-color="purple" data-background-color="black"
data-image="{{ asset('/dashboard_files/img/sidebar-2.jpg') }}">

  <div class="logo">
    <a href="" class="simple-text logo-normal">
      Yasser
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
        {{-- {{ is_active('Home') }} --}}
        {{-- {{ route('admin.home') }} --}}
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('index') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item  ">
        <a class="nav-link" href="{{ route('Myblog') }}">
          <i class="material-icons">done</i>
          <p>Blog</p>
        </a>
      </li>
      <!-- your sidebar here -->
      {{-- {{ is_active('users') }} --}}
      <li class="nav-item   ">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons">person</i>
          <p>Users</p>
        </a>
      </li>
      <li class="nav-item   ">
        <a class="nav-link" href="{{ route('posts.index') }}">
          <i class="material-icons">content_paste</i>
          <p>Posts</p>
        </a>
      </li>
      <li class="nav-item   ">
        <a class="nav-link" href="{{ route('categories.index') }}">
            {{-- {{ route('categories.index') }} --}}
          <i class="material-icons">bubble_chart</i>
          <p>Categories</p>
        </a>
      </li>

      <li class="nav-item   ">
          {{-- {{ route('tags.index') }} --}}
        <a class="nav-link" href="{{ route('tags.index') }}">
          <i class="material-icons">Tags</i>
          <p>Tags</p>
        </a>
      </li>
      {{-- <li class="nav-item  ">
        <a class="nav-link" href="">
          <i class="material-icons">Pages</i>
          <p>Pages</p>
        </a>
      </li>--}}
      <li class="nav-item  ">
        <a class="nav-link" href="{{ route('comments.index') }}">
          <i class="material-icons">Comments</i>
          <p>Comments</p>
        </a>
      </li>



    </ul>
  </div>
</div>

