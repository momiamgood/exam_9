<x-base>
    <x-slot:title>
        Парковки
    </x-slot:title>

    @if($data->isNotEmpty())
        <ul class="list-group">
            @foreach($data as $ticket)
                <a class="list-group-item">{{$ticket->car}}</a>
            @endforeach
        </ul>
    @else
        <h2>Нет информации</h2>
    @endif
</x-base>
