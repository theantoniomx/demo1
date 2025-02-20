@include('header')

<h2>Services</h2>

<ul>
    @foreach ($services as $service)
    <li>{{$service->name}} ({{$service->description}})</li>
    @endforeach
</ul>

@forelse ($products as $product)
    <li>{{ $product->name }}</li>
@empty
    <p>No products</p>
@endforelse

@include('footer')
