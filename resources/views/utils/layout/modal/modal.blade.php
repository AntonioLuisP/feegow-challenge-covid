<button class="btn {{ $btn_class }}" data-toggle="modal" data-target="#{{ $id }}">
    <i class="{{ $btn_icon }}"></i>
    {{ $btn_name ?? 'Modal' }}
</button>

<div class="modal fade" id="{{ $id }}" style="display: none;" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modal_title }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @yield('modal-body-footer')
        </div>
    </div>
</div>
