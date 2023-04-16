@extends('welcome')
@section('about')
    <header class="masthead p-4">
        <div class="container">
            <div class="table-responsive">
                <h3 style="color:black;"><b>ACERCA DE</b></h3><br>
                <p><img src="{{asset('img/about/imagen local.jpg')}}" id="img-about"></p><br>
                <p class="text-muted" style="font-size: 25px"> Pañalera de Pau Uno A es un establecimiento comercial
                    enfocado y especializado en artículos para bebé. Acompañamos a los padres de hoy en el cuidado,
                    crianza y desarrollo de sus hijos de 0-3 años de edad. Contamos con la más amplia variedad de
                    productos de estimulación, cuidado e higiene, habitación y ropa, brindando un servicio especializado
                    en esta etapa tan importante de cada familia. Abrimos nuestras puertas en el 2002 y actualmente
                    contamos con una tienda física en la ciudad de Sogamoso.
                    <br>Visitanos para tener el gusto de atenderte, te esperamos!</p><br>

                <h3 style="color: black"><b>POLÍTICAS DE DEVOLUCIÓN</b></h3><br>
                <table>
                    <thead class="text-center" style="background: #d78aea; color: black">
                    <tr>
                        <th>Devoluciones</th>
                        <th>Reembolso</th>
                        <th>Artículos en oferta</th>
                        <th>Artículos defectuosos</th>
                    </tr>
                    </thead>
                    <tbody class="text-center align-middle" style="background-color: white">
                    <tr>
                        <td style="color: #6c757d; text-align: justify; border: 2px solid #d78aea; padding: 10px;">
                            <ul>
                                <li>Los clientes pueden devolver cualquier artículo no utilizado y en su embalaje
                                    original dentro de los 30 días posteriores a la recepción del pedido.
                                </li>
                                <li>Los clientes deben contactar al servicio al cliente de la tienda en línea para
                                    obtener una autorización de devolución antes de enviar el artículo.
                                </li>
                                <li>La tienda proporcionará una etiqueta de envío prepagada para los artículos
                                    elegibles para la devolución.
                                </li>
                            </ul>
                        </td>
                        <td style="color: #6c757d; text-align: justify; border: 2px solid #d78aea; padding: 10px;">
                            <ul>
                                <li>Los reembolsos se emitirán a la forma original de pago una vez que la tienda
                                    haya recibido el artículo devuelto.
                                </li>
                                <li>Los gastos de envío originales no son reembolsables.</li>
                            </ul>
                        </td>
                        <td style="color: #6c757d; text-align: justify; border: 2px solid #d78aea; padding: 10px;">
                            <ul>
                                <li>Los artículos en oferta no son elegibles para devoluciones o intercambios, a
                                    menos que estén defectuosos.
                                </li>
                            </ul>
                        </td>
                        <td style="color: #6c757d; text-align: justify; border: 2px solid #d78aea; padding: 10px;">
                            <ul>
                                <li>Si un artículo es defectuoso, los clientes deben contactar al servicio al
                                    cliente de la tienda en línea dentro de las 48 horas posteriores a la recepción
                                    del artículo para solicitar un reemplazo o un reembolso.
                                </li>
                                <li>Si el artículo es defectuoso debido a un error de fabricación, la tienda cubrirá
                                    los gastos de envío de devolución y el envío del artículo de reemplazo.
                                </li>
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div><br>
    </header>
@endsection
