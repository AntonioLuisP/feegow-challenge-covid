<div class="row">
    <div class="col-sm-5 col-md-5">
        <div class="dataTables_info" id="responsive-datatable_info" role="status" aria-live="polite">
            @if ($items->count() != 0)
                Exibindo {{ $items->firstItem() }} a {{ $items->lastItem() }} de {{ $items->total() }}.
            @else
                Nenhum dado encontrado.
            @endif
        </div>
    </div>
    <div class="col-sm-7 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="responsive-datatable_paginate">
            {{ $links->links() }}
        </div>
    </div>
</div>
