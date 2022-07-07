<div class="py-3 mb-3 custom-page-tittle border-bottom">
    <div class="container-sm">
        <div class="row justify-align-center flex-nowrap">
            <div class="col">
                <h1 class="m-0">@yield('title')</h1>
                {{-- <h1 class="m-0"><span class="text-bca">A</span>bout <span class="text-bca">U</span>s</h1> --}}
            </div><!-- /.col -->
            <div class="col pt-2">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    @yield('page-title')
                    @yield('subtitle')
                    @yield('subtitlesub')
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
