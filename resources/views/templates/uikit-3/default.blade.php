@if (session()->has('alert.messages'))
    @foreach (session()->pull('alert.messages') as $message)
        @if ($message['overlay'])
            @include('alert::templates.uikit-3.modal', [
                'title' => $message['title'],
                'body'  => $message['message']
            ])
        @else
        <div class="uk-alert-{{ $message['level'] }}" uk-alert>
                @if (is_a($message['message'], 'Illuminate\Support\MessageBag'))
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul class="uk-list uk-list-bullet">
                        @foreach ($message['message']->all('<li>:message</li>') as $error)
                            {!! $error !!}
                        @endforeach
                    </ul>
                @else
                    <a class="uk-alert-close" uk-close></a>

                    @if ( isset($message['title']) )
                        <strong>{!! $message['title'] !!}</strong>
                    @endif

                    <p>{!! $message['message'] !!}</p>
                @endif
            </div>
        @endif
    @endforeach
@endif
