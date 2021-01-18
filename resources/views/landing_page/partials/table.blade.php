<tr>
    <td>{{ ++$key }}</td>
    <td>{{ $landingPage->name }}</td>
    <td>{{ $landingPage->position ? 'Show' : 'Dont Show' }}</td>
    <td>{{ $landingPage->type_name }}</td>
    <td class="text-right">
        <a href="{{ route('landingPage.edit', $landingPage->id) }}" class="btn btn-flat btn-primary">
            Edit
        </a>
        <a role="button" href="javascript:void(0);"
           data-url="{{ route('landingPage.destroy', $landingPage->id) }}"
           class="btn btn-primary btn-flat btn-xs item-delete">
            Delete
        </a>
    </td>
</tr>
