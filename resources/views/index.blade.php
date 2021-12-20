<x-app-layout>
    @section('title', 'SISTEMA DE TRÁMITES DE PRACTICAS Y TESIS')
    
{{-- <!-- Cover Page --> --}}
    <div>
        <section class="bg-cover" style="background-image: url(https://images.pexels.com/photos/1370296/pexels-photo-1370296.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940)" style="height: 100px;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <!-- Title -->
                    <h1 class="text-white font-bold text-6xl filter drop-shadow-xl">SISTEMA DE PRACTICAS Y TESIS</h1>
                    <p class="text-white text-lg mt-2 mb-4 filter drop-shadow-xl">Sistema de Tramites de Practicas y Tesis Preprofesionales de la Escuela de Ingenieria de Sistemas de la Universidad Nacional de Trujillo. <br> Grupo 03.</p>
                </div>
            </div>    
        </section>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- ULTIMAS NOTICIAS --}}
        <section>
            <h1 class="font-bold text-3xl mt-6 text-gray-800">ULTIMAS<span style="color:#E6AD09"> NOTICIAS</span></h1>
            <div class="mb-5" style="border-color: #E6AD09; border-bottom-style: solid; border-bottom-width: 3px; width: 40px; "></div>
            <div class="p-5 mb-3">
                <div class="glider-contain">
                    <div class="glider">
                        <img src="{{asset('img/noticias/noticia1.jpg')}}" alt="" class="object-center px-20">
                        <img src="{{asset('img/noticias/noticia2.jpg')}}" alt="" class="object-center px-20">
                        <img src="{{asset('img/noticias/noticia3.jpg')}}" alt="" class="object-center px-20">
                        <img src="{{asset('img/noticias/noticia4.jpg')}}" alt="" class="object-center px-20">
                        <img src="{{asset('img/noticias/noticia5.jpg')}}" alt="" class="object-center px-20">
                        <img src="{{asset('img/noticias/noticia6.jpg')}}" alt="" class="object-center px-20">
                    </div>
                    <button aria-label="Previous" class="glider-prev">«</button>
                    <button aria-label="Next" class="glider-next">»</button>
                    <div role="tablist" class="dots"></div>
                </div>
            </div>
        </section>   
        {{-- FIN ULTIMAS NOTICIAS --}}     
    </div>
    @push('scripts')
        <script>
                new Glider(document.querySelector('.glider'), {
                slidesToShow: 3,
                slidesToScroll: 1,
                draggable: true,
                dots: '.dots',
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                }
                }); 
        </script>        
    @endpush
 </x-app-layout>