<div>

    {{session()->get('sucess')}}
</div>

<table border="1">

@foreach ($categories as $category)
<tr>
    <td>{{$category->id}}</td>
    <td>{{$category->name}}</td>
    <td> <a href="{{route('category.edit',$category->id)}}">Editar</a> </td>
    <td> <a href="{{route('category.destroy',$category->id)}}">Apagar</a> </td>
</tr>

@endforeach

</table>
