<x-appadmin-layout>
    <div class="container mt-5">
        <h1>products list</h1>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">tambah product</a>
    <table class="table">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->kode_barang }}</td>
                <td>{{ $product->nama_barang }}</td>
                <td>{{ $product->harga }}</td>
                <td>{{ $product->satuan }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-appadmin-layout>