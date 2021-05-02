<tr>
    <td>{{ ++$key }}</td>
    <td>{{ $news->type }}</td>
    <td class="text-right">
        <a href="{{ route('popup.edit', $news->id) }}" class="btn btn-flat btn-primary">
            Edit
        </a>
        <a role="button" href="javascript:void(0);"
           data-url="{{ route('popup.destroy', $news->id) }}"
           class="btn btn-primary btn-flat btn-xs item-delete">
            Delete
        </a>
    </td>
</tr>
