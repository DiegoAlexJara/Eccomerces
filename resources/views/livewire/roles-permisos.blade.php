<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">PERMISO</th>
                <th scope="col">ROLES ASIGNADOS</th>
                <th scope="col">ROLES NO ASIGNADOS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $NameRole }}</th>
                <td>
                    @foreach ($rolesConPermisos as $item)
                        <p>{{ $item->name }} <button type="button" class="btn btn-danger"
                                wire:click='delete({{ $item->id }})'>-</button></p>
                    @endforeach
                </td>
                <td>
                    @foreach ($rolesSinPermiso as $item)
                        <p>{{ $item->name }} <button type="button" class="btn btn-success"
                                wire:click='submit({{ $item->id }})'>+</button></p>
                    @endforeach
                </td>

            </tr>

        </tbody>
    </table>
</div>
