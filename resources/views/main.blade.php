@extends('index')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 badge-primary">
        <h6 class="m-0 font-weight-bold">Все контакты</h6>
    </div>

    <div class="card-body">
    <div class="mb-3">
        <a href="{{ route('add') }}"><button class="btn btn-primary">Добавить новый контакт</button></a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Ahmadshoh</td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <a href=""><i class="fa fa-eye"></i></a>
                        {{--                                <button type="submit" class="btn "><i class="fa fa-trash"></i></button>--}}
                    </form>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Ahmadshoh</td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <a href=""><i class="fa fa-eye"></i></a>
                        {{--                                <button type="submit" class="btn "><i class="fa fa-trash"></i></button>--}}
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="text-center"><h3>Данные отсутсвуют</h3></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6">
                    <ul class="pagination pull-right">

                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
</div>
@endsection
