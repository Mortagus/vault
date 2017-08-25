@section('complement-css')
    @parent
    <style>
        #ex1_conteneur {
            border: solid black 2px;
            text-align: center;
        }

        .element {
            width: 90px;
            height: 60px;
            font-weight: bold;
            color: black;
            line-height: 60px;
        }

        .element span {
            display: inline-block;
            vertical-align: middle;
        }

        #ex1_el1 {
            background-color: #f8a242;
        }

        #ex1_el2 {
            background-color: #0054f4;
        }

        #ex1_el3 {
            background-color: #aadb72;
        }
    </style>
@endsection

<h5>Un Conteneur avec 3 éléments. No Flex !</h5>

<div id="ex1_conteneur">
    Conteneur
    <div class="element" id="ex1_el1"><span>Elément 1</span></div>
    <div class="element" id="ex1_el2"><span>Elément 2</span></div>
    <div class="element" id="ex1_el3"><span>Elément 3</span></div>
</div>