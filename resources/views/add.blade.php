@extends('index')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 badge-primary">
        <h6 class="m-0 font-weight-bold">Добавить контакт</h6>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Имя товара</label>
                <input type="text" name="title" class="form-control" placeholder="Имя товара" value="" required>
            </div>

            <div class="form-group">
                <label for="alias">Ссылка</label>
                <input type="text" name="alias" class="form-control" placeholder="Автоматическая генерация" value="" readonly>
            </div>


            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" name="price" class="form-control" placeholder="Цена" pattern="^[0-9.]{1,}$" value="" required>
            </div>


            <input type="submit" class="btn btn-success btn-block" value="Сохранить">

        </form>
    </div>
</div>
@endsection
