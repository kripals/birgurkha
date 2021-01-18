<tr>
    <td>{{ ++$key }}</td>
    <td>{{ $type->section }}</td>
    <td>{{ $type->name ?: '-' }}</td>
    <td>{{ $type->is_landing ? '-' : $type->position }}</td>
    <td>{{ $type->type }}</td>
    <td>{{ $type->visible == 1 ? 'Visible' : 'Not Visible' }}</td>
    <td>{{ $type->is_landing ? '-' : $type->view_all_buttons == 1 ? 'Has Button' : 'No Button' }}</td>
    <td>{{ $type->is_landing == 1 ? 'Yes' : 'No' }}</td>
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
