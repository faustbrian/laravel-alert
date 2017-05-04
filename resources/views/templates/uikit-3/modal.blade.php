<div id="uk-alert-vendor" uk-modal="center: true">
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">{!! $title !!}</h2>
        <p>{!! $body !!}</p>
    </div>
</div>
@push('package-scripts')
<script>
    UIkit.modal('#uk-alert-vendor').toggle();
</script>
@endpush
