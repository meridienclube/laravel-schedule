<table class="table table-striped table-hover" id="schedules_datatable">
    <thead>
    <tr>
        <th width="">Titulo</th>
        <th width="">O que</th>
        <th width="">Onde</th>
        <th width="">Quando</th>
        <th width="">Criado por</th>
        <th width="">Criado quando</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($schedules as $schedule)
        <tr>
            <td>{{ $schedule->title }}</td>
            <td>{{ $schedule->what }}</td>
            <td>{{ $schedule->where }}</td>
            <td>{{ $schedule->when }}</td>
            <td>{{ $schedule->user->name }}</td>
            <td>{{ $schedule->created_at->format('d/m/Y') }}</td>
            <td>
                <div class="btn-group btn-group-sm float-right" role="group" aria-label="...">
                    @permission('schedules.show')
                    <a href="{{ route('admin.schedules.show', $schedule->id) }}" class="btn btn-clean btn-icon btn-label-primary btn-icon-md " title="View">
                        <i class="la la-eye"></i>
                    </a>
                    @endpermission
                    @permission('schedules.edit')
                    <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-clean btn-icon btn-label-success btn-icon-md " title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @endpermission
                    @permission('schedules.destroy')
                    <a href="javascript:void(0);" onclick="event.preventDefault();if(!confirm('Tem certeza que deseja deletar este item?')){ return false; }document.getElementById('delete-role-{{ $schedule->id }}').submit();" class="btn btn-clean btn-icon btn-label-danger btn-icon-md " title="Deletar">
                        <i class="la la-remove"></i>
                    </a>
                    <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" id="delete-role-{{ $schedule->id }}">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                    </form>
                    @endpermission
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
