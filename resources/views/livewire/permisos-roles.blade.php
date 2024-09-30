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
                <th scope="row">{{ $NamePermiso }}</th>
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
    {{-- <h3>PERMISO</h3>
    <p>({{ $NamePermiso }})</p>
    <div class="container-form">
        <p>ROLES ASIGNADOS</p>
        <form wire:submit.prevent='submits'>

            @foreach ($Roles as $item)
                <p>
                    {{ $item->name }}
                    <input type="checkbox" name="roles[]" value="{{ $item->id }}" wire:model="roles"
                        @foreach ($rolesConPermisos as $items)
                            @if ($item->name === $items->name)
                                checked
                            @endif @endforeach>
                </p>
            @endforeach
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">GUARDAR</button>
            </div>
        </form>
    </div>
    <form wire:submit.prevent='submit'>
        @foreach ($Roles as $item)
            <p>{{$item->name}}</p>
            <input type="checkbox" name="" id="">
        @endforeach
    </form> --}}
    <a href="{{ route('permisos.index') }}">
        <button type="button" class="btn btn-secondary">REGRESAR</button>

    </a>
</div>
