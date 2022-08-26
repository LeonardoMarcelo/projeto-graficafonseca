@extends('layouts.main')
@section('title', 'Gráfica Fonceca | Tecnologia e qualidade em seus impressos')
@section('content')

    <section class="carousel">
        <div id="voltar" class="btn">
            <img class="left-icon" src="/icons/left-btn.svg" alt="">
        </div>
        <div id="next" class="btn">
            <img class="rigth-icon" src="/icons/next-btn.svg" alt="">
        </div>
        <div class="slide">
            <div class="slides" id="teste">
                @foreach ($services as $event)
                    <div id="atual" class="image">
                        <img src="/img/events/{{ $event->img }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="balls">
        </div>
    </section>
    <section class="call-section container">
        <div class="call_main-text">
            <h2 class="call_title">
                Vida, Poder e Beleza para suas ideias
            </h2>
            <p class="call_description">
 
            @foreach ($pages as $item)
                {{$item->history}}
            @endforeach

                {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatem animi quidem nesciunt
                officia distinctio quia dolores maiores repudiandae molestias vitae tempore, iusto alias quasi eum
                adipisci? Fuga, accusantium veritatis! --}}

            </p>
            <a href="/listService " class="call_btn">
            <button class="call_btn">
                Ver
                </button>
            </a>
        </div>
        <div class="call_image">
            <img src="/img/image-content/sabri-tuzcu-wunVFNvqhfE-unsplash.jpg" alt="">
        </div>
    </section>





@endsection
