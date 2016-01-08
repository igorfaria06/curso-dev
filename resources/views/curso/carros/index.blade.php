<h1> Index do Carros </h1>


@forelse ($carros as $carro)
<p> <b>Nome:</b> {{$carro->nome}}  ({{$carro->placa}})</p>
@empty <p> Nenhum carro cadastrado </p>
@endforelse