<button class="btn btn-sm btn-default" data-toggle="modal" data-target="#search">
    Filtrar
</button>

<div class="modal fade" id="search" style="display: none;" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filtrar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="GET" action="{{ $route }}">
                <div class="modal-body">
                    @yield('form')
                </div>
                <div class="modal-footer">
                    <a href="{{ $route }}" class="btn btn-default">Limpar Busca</a>
                    @include('utils.layout.submitButton', ['text' => 'Pesquisar'])
                </div>
            </form>
        </div>
    </div>
</div>
