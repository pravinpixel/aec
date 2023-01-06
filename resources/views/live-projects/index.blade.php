@extends('layouts.admin')

@section('admin-content')
    <div class="content-page">
        @include('admin.includes.top-bar')
        <div class="card border my-3 "> 
            <div class="card-header bg-light">
                <nav class="nav nav-pills nav-fill">
                    @foreach ($wizard_menus as $menu)
                        <a href="{{ route('live-project.menus-index',["menu_type" => $menu['slug']]) }}" class="nav-link {{ request()->route()->menu_type === $menu['slug'] ? 'active' : ''}}"> 
                            {!! $menu['icon'] !!} 
                            {{ $menu['name'] }}
                        </a>
                    @endforeach
                </nav> 
            </div>
            @foreach ($wizard_menus as $key =>  $menu)
                @if(request()->route()->menu_type === $menu['slug'])
                    <form action="{{ route('live-project.menus-store',["menu_type" => $menu['slug']]) }}" method="post"> 
                        @csrf
                        <div class="card-body">
                            @include('live-projects.views.'.$menu['view'])
                        </div>
                        <div class="card-footer px-2 text-end">
                            @if(($key - 1) !== -1 )
                                <a href="{{ route('live-project.menus-index',["menu_type" => $wizard_menus[$key - 1]['slug']]) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-chevron-left"></i>
                                    Prev
                                </a>
                            @endif 
                            @if(count($wizard_menus) > $key + 1) 
                                <input type="hidden" name="menu_type" value="{{ $wizard_menus[$key + 1]['slug'] }}">
                                <button type="submit" class="btn btn-sm btn-primary ">
                                    Next <i class="bi bi-chevron-right"></i> 
                                </button>
                            @endif 
                            @if($key + 1 === count($wizard_menus))
                                <button type="submit" href="{{ route('live-project.menus-index',["menu_type" => $wizard_menus[$key]['slug']]) }}" class="btn btn-sm btn-success ">
                                    <i class="bi bi-upload"></i> Submit
                                </button>
                            @endif
                        </div>
                    </form>
                @endif
            @endforeach
        </div>
    </div>
@endsection