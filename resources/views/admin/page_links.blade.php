@extends('admin.page')

@section('body')

<a class="bigbutton" href="{{ url('/admin/'.$page->slug.'/newlink') }}">Novo link</a>
<!-- bigbutton -->

<ul id="links">
    @foreach ($links as $link)
    <li class="link--item" data-id="{{ $link->id }}">
        <div class="link--item-order">
            <i class="fas fa-sort" style="font-size: 22px"></i>
        </div>
        <!-- link--item-order -->
        <div class="link--item-info">
            <div class="link--item-title">{{ $link->title }}</div>
            <!-- link--item-title -->
            <div class="link--item-href">{{ $link->href }}</div>
            <!-- link--item-href -->
        </div>
        <!-- link--item-info -->
        <div class="link--item-buttons">
            <a href="{{ url('/admin/'.$page->slug.'/editlink/'.$link->id) }}">Editar</a>
            <a href="{{ url('/admin/'.$page->slug.'/dellink/'.$link->id) }}">Excluir</a>
        </div>
        <!-- link--item-buttons -->
    </li>
    <!-- link--item -->
    @endforeach
</ul>
<!-- links -->

<!-- biblioteca js sortable para fazer a ordenação dos links -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script>
    new Sortable(document.querySelector('#links'), {
        animation: 150,
        onEnd: async (e) => {
            // qual item foi reordenado
            let id = e.item.getAttribute('data-id');
            // a nova posição do item
            let link = `{{ url('/admin/linkorder/${id}/${e.newIndex}') }}`;
            await fetch(link);
            // atualiza a página
            window.location.href = window.location.href;
        }
    });
</script>

@endsection
