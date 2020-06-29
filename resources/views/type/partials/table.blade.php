<tr>
    <td>{{ ++$key }}</td>
    <td>{{ $type->name }}</td>
    <td>{{ $type->visible == 1 ? 'Visible in Homepage' : 'Not Visible in Homepage' }}</td>
    <td class="text-right">
        <a href="{{ route('types.edit', $type->id) }}" class="btn btn-flat btn-primary">
            Edit
        </a>
        <a role="button" href="javascript:void(0);"
           data-url="{{ route('types.destroy', $type->id) }}"
           class="btn btn-primary btn-flat btn-xs item-delete">
            Delete
        </a>
    </td>
</tr>
