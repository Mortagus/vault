@section('complement-css')
    @parent
    <style>
        #ex6_conteneur {
            width: 270px;
            border: solid black 2px;
            text-align: center;
            display: flex;
            flex-wrap: wrap;
        }

        .element {
            width: 95px;
            height: 60px;
            font-weight: bold;
            color: black;
            line-height: 60px;
        }

        .element span {
            display: inline-block;
            vertical-align: middle;
        }

        #ex6_el1 {
            background-color: #f8a242;
        }

        #ex6_el2 {
            background-color: #0054f4;
        }

        #ex6_el3 {
            background-color: #aadb72;
        }
    </style>
@endsection

<h5>Un Conteneur avec 3 éléments. Flex-wrap = wrap !</h5>

<div id="ex6_conteneur">
    <div class="element" id="ex6_el1"><span>Elément 1</span></div>
    <div class="element" id="ex6_el2"><span>Elément 2</span></div>
    <div class="element" id="ex6_el3"><span>Elément 3</span></div>
</div>