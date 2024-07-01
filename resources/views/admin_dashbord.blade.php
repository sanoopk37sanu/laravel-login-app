welcome Admin user {{auth()->guard('admin')->user()->name}}

<a href="{{route('admin.logout')}}"> logout </a>