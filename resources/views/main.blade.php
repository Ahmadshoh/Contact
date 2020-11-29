@extends('index')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 badge-primary">
        <h6 class="m-0 font-weight-bold">Все контакты</h6>
    </div>

    <div class="card-body">
    <div class="mb-3">
        <a href="{{ route('contact.create') }}"><button class="btn btn-primary">Добавить новый контакт</button></a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Номера телефонов</th>
                    <th>Emails</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>
                            @foreach($contact->getPhones() as $items)
                                <p>{{ $items->phone }}</p>
                            @endforeach
                        </td>

                        <td>
                            @foreach($contact->getEmails() as $items)
                                <p>{{ $items->email }}</p>
                            @endforeach
                        </td>

                        <td>
                            <form action="{{ route('contact.destroy', [$contact->id]) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <a href="{{ route('contact.edit', [$contact->id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center"><h3>Данные отсутсвуют</h3></td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6">
                    <ul class="pagination fa-pull-right">
                        {{ $contacts->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
</div>
@endsection
