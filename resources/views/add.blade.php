@extends('index')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 badge-primary">
        <h6 class="m-0 font-weight-bold">Добавить контакт</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('addContact') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required autofocus autocomplete="name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="tel" name="phone[]" id="phone" value="{{ old('phone') }}"
                       class="form-control @error('phone') is-invalid @enderror" maxlength="13"
                       required autocomplete="phone">

                <div class="text-right mt-2">
                    <button class="btn btn-primary" id="addPhoneButton">Добавить номер</button>
                </div>


                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email-адрес</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>



            <input type="submit" class="btn btn-success btn-block" value="Сохранить">

        </form>
    </div>
</div>
@endsection
