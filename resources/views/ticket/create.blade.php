<x-base>
    <x-slot:title>Добавление тикета</x-slot:title>

    <h1>Добавление тикета</h1>
    <form method="post" action="{{ route('tickets.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название машины</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="car">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Дата и время</label>
            <input type="datetime-local" class="form-control" id="exampleInputEmail1" name="time">
        </div>
        <label> Выбор пользователя
            <select class="form-select">
                @if($users->isNotEmpty())
                    @foreach($users as $user)
                        <option name="user_id" value="{{$user->id}}">{{ $user->login }}</option>
                    @endforeach
                @endif
            </select>
        </label>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Цена</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="price">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Скидка</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="discount">
        </div>
        <label> Статус
            <select class="form-select">
                @if($statuses->isNotEmpty())
                    @foreach($statuses as $status)
                        <option name="status_id" value="{{$status->id}}">{{ $status->title }}</option>
                    @endforeach
                @endif
            </select>
        </label>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</x-base>
