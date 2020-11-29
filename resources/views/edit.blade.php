@extends('index')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Редактировать контакт</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('contact.update', $contact) }}" method="POST">
                <input type="hidden" name="_method" value="put">
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" placeholder="Имя"
                           value="{{ $contact->name }}" class="form-control @error('name') is-invalid @enderror"
                           required autofocus autocomplete="name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Номер телефона</label>

                    @foreach($contact->getPhones() as $phone)
                        <input type="tel" name="phone[]" id="phone" value="{{ $phone->phone }}" placeholder="Телефон"
                               class="form-control mb-2 @error('phone') is-invalid @enderror" maxlength="13"
                               required autocomplete="phone">
                    @endforeach
                    <div id="phoneBlock">
                    </div>

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

                    @foreach($contact->getEmails() as $email)
                    <input type="email" name="email[]" id="email" placeholder="Email"
                           value="{{ $email->email }}" class="form-control mb-2 @error('email') is-invalid @enderror"
                           required autocomplete="email">
                    @endforeach
                    <div id="emailBlock">
                    </div>

                    <div class="text-right mt-2">
                        <button class="btn btn-primary" id="addEmailButton">Добавить email</button>
                    </div>

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
