@extends('admin.template')

@section('title', 'Biolinks - '.$page->op_title.' - Links')
    
@section('content')

    <div class="preheader">
        Página: {{ $page->op_title }}
    </div>
    <!-- preheader -->

    <div class="area">
        <div class="leftside">
            <header>
                <ul>
                    <li @if ($menu == 'links') class="active" @endif><a href="{{ url('admin/'.$page->slug.'/links') }}">Links</a></li>
                    <li @if ($menu == 'design') class="active" @endif><a href="{{ url('admin/'.$page->slug.'/design') }}">Aparência</a></li>
                    <li @if ($menu == 'stats') class="active" @endif><a href="{{ url('admin/'.$page->slug.'/stats') }}">Estatísticas</a></li>
                </ul>
            </header>

            @yield('body')
        </div>
        <!-- leftside -->
        <div class="rightside">
            <iframe src="{{ url('/'.$page->slug) }}" frameborder="0"></iframe>
        </div>
        <!-- rightside -->
    </div>
    <!-- area -->

@endsection