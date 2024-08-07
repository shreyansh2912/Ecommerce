@extends('layouts.admin')


@section('admin')

<table class="table" border="1">
    <thead>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Image</th>
        <th>Visible</th>
    </thead>
    <tbody id="tbody">
    </tbody>
</table>
    <script>
        $(document).ready(()=>{
            let tbody = document.getElementById("tbody");
            let data  = "";
            $.ajax({
                url:"http://127.0.0.1:8000/admin/show_products",
                type:"GET",
                success:(res)=>{
                    for (let i = 0; i < res.length; i++) {
                        data +=`
                        <tr>
                            <td>${res[i].product_name}</td>    
                            <td>${res[i].product_name}</td>    
                            <td>${res[i].product_name}</td>    
                            <td>${res[i].product_name}</td>    
                            <td>${res[i].product_name}</td>    
                            <td><img src="" /></td>    
                            <td>${res[i].product_name}</td>    
                        </tr>
                        `
                    }
                        tbody.innerHTML = data;
                }
            })
        })

    </script>
@endsection