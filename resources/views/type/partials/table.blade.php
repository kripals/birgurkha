<tr>
    <td>{{++$key}}</td>
    <td>{{$type->name}}</td>
    <td class="text-right">
        <a href="{{route('type.edit', $type->id)}}" class="btn btn-flat btn-primary">
            Edit
        </a>
        <a role="button" href="javascript:void(0);" data-url="{{ route('type.destroy', $type->id) }}"
           class="btn btn-flat btn-primary item-delete">
            Delete
        </a>
    </td>
    </td>
</tr>
