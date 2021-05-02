<tr>
    <td>{{ ++$key }}</td>
    <td>{{ $news->type }}</td>
    <td>{{ $news->title ?: '-' }}</td>
    <td class="text-right">
        <a href="{{ route('slider.edit', $news->id) }}" class="btn btn-flat btn-primary">
            Edit
        </a>
        <a role="button" href="javascript:void(0);"
           data-url="{{ route('slider.destroy', $news->id) }}"
           class="btn btn-primary btn-flat btn-xs item-delete">
            Delete
        </a>
    </td>
</tr>
