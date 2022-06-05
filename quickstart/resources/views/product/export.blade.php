<table>
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>Danh mục</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <th>{{ $loop->index+1 }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->img }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>