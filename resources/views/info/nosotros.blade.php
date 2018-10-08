@extends('layout') 
@section('title', "Bienvenido") 
@section('content') {{--
<h3>Docentes</h3> --}} {{-- Curriculum --}} {{--
<h3>Instalaciones</h3> --}} {{-- Descripción de las instalaciones donde se impartirán los cursos --}}
<div class="container" style="margin-top: 50px;">
    <blockquote class="blockquote">
        <h3>Metodología y Características de la Escuela Cubana de Ballet</h3>
    </blockquote>
    <img class="right" src="{{asset('img/acerca.png')}}" alt="" width="40%" style="min-height: 250px; min-width: 167px; margin-left: 10px;">
    <p class="justify">
        El método de la Escuela Cubana tuvo características muy particulares desde sus inicios, que a lo largo de los años han ido
        perfeccionándose con un pensamiento pedagógico, metodológico y multidisciplinario. Algunos de sus principales elementos
        pueden sintetizarse de la siguiente forma:
    </p>
    <p class="justify">
        El estudio de los principales movimientos de la danza académica con el incremento gradual de las dificultades, así como,
        analizar casuísticamente los pasos, sus fases y etapas de aprendizaje, la metodología a seguir, hasta lograr de la
        habilidad primaria un hábito son objetivos obligatorios en esta especialización.
    </p>
    <p class="justify">
        La asignatura de ballet en la escuela cubana tiene un programa donde se presenta el contenido para cada año teniendo en cuenta
        la sucesión lógica de los pasos ya que un movimiento interviene en la ejecución del otro. La dosificación por unidades
        posibilita un enfoque por fases y etapas de aprendizaje lo que hace que nuestro método de enseñanza esté encaminado
        a propiciar el desarrollo de hábitos técnicos en forma concéntrica de primero a octavo año.
    </p>
    <p class="justify">
        Cada programa está constituido por nueve unidades de estudio y a su vez cada una de ellas se corresponde con un mes del curso
        escolar. En dichas unidades están los nuevos contenidos a estudiar en barra, centro, allegro y puntas y otros que,
        por ejemplo, cambian de I a II fase o se complejizan con la ejecución a relevé o con giro, o pasan de la barra al
        centro. Cada una de las posiciones y pasos básicos se estudian separadamente y solo cuando han sido asimilados es
        posible combinarlos. La clase es concebida con una estructura formativa y un carácter de entrenamiento donde se preste
        esencial cuidado a la limpieza y calidad del movimiento.
    </p>
    <p class="justify">
        La estructura de clase de la escuela cubana de ballet tiene como característica alternar ejercicios que desarrollen la fuerza
        y control con otro que desarrolle la velocidad y agilidad con el fin de una respuesta muscular optima.
    </p>
    <p class="justify">
        Este método de enseñanza de la escuela cubana de ballet lo hace único en el mundo, de ahí que esta forma de enseñar se sitúe
        en la actualidad entre las más reconocidas internacionalmente y con gran demanda para la formación de bailarines
        en diferentes países. Se considera que las características de la clase en la escuela cubana de ballet son:
    </p>
    <div class="row">
        <ul class="col s12 m6 justify mg-0">
            <li class="list">
                Va de las formas más simples a las más complejas con la utilización de fases, etapas de aprendizaje y diferentes conteos
                musicales.
            </li>
            <li class="list">
                No es fija, sino que el maestro la crea de acuerdo al programa de estudio, a las particularidades individuales y a las características
                del colectivo de alumnos
            </li>
            <li class="list">
                Los grupos se conforman por sexos.
            </li>
            <li class="list">
                En el primer ejercicio de la barra no se realizan los grands pliés.
            </li>
            <li class="list">
                La consecución de los ejercicios, uno legato y otro staccato.
            </li>
            <li class="list">
                La repetición del paso que el maestro se propone trabajar en cada variación y de esta en su totalidad.
            </li>
            <li class="list">
                El trabajo del en dehors de las piernas y los pies en un ángulo de 180º.
            </li>
            <li class="list">
                La pureza académica, la limpieza, el preciosismo en la ejecución de cada movimiento.
            </li>
            <li class="list">
                La importancia del trabajo intensivo del pie para lograr que sea flexible, fuerte y expresivo.
            </li>
            <li class="list">
                El entrenamiento del relevé a ¾ de media punta.
            </li>
            <li class="list">
                La ejecución de ejercicios de control para lograr la correcta colocación del eje perpendicular.
            </li>
            <li class="list">
                La presencia de los equilibrios durante toda la lección.
            </li>
            <li class="list">
                El trabajo encaminado a alcanzar la coordinación de los movimientos, la expresividad, el gusto, el disfrute de la actividad
                corporal.
            </li>
            <li class="list">
                La realización de distintos port de bras en los que el movimiento de la cabeza esté en correspondencia con el de los brazos
                y las manos.
            </li>
            <li class="list">
                La utilización de los diferentes ángulos del salón y de los pasos de enlace para lograr el sentido del baile.
            </li>
            <li class="list">
                El estudio del passé por encima de la rodilla.
            </li>
            <li class="list">
                El uso de los giros dentro de las variaciones desde la barra, incluso los saltos con giros y los giros en los ejercicios
                de salto. Además el entrenamiento de los giros lentos y rápidos así como de los giros en posiciones cerradas
                y abiertas con sus respectivas características.
            </li>
        </ul>
        <ul class="col s12 m6 justify mg-0">
            <li class="list">
                La inclusión de los pasos en los diferentes niveles de ejecución.
            </li>
            <li class="list">
                La manera en que se definen los ronds de jambes en l´air simples y dobles: en dehors y en dedans.
            </li>
            <li class="list">
                La realización de los adagios mostrando la correcta colocación de las caderas y de las direcciones de las piernas en l´air.
            </li>
            <li class="list">
                La insistencia en el alargamiento de las posiciones para lograr hermosas líneas de piernas y brazos.
            </li>
            <li class="list">
                La ejecución de los ejercicios en dehors y en dedans.
            </li>
            <li class="list">
                La importancia que se le concede a los saltos battus dentro de las variaciones del allegro.
            </li>
            <li class="list">
                El entrenamiento de los saltos buscando la sustentación en el aire con la ayuda de la adecuada coordinación de los brazos
                y la cabeza, así como el correcto descenso manteniendo las posiciones, la acentuación es siempre arriba,
                insistiendo en los demi-plies, el balón, la sustentación del torso y el uso de los pies.
            </li>
            <li class="list">
                Los brazos se trabajan redondeados y en línea descendente con el codo sostenido.
            </li>
            <li class="list">
                Muy importante el demi-plié como principio y fin de todo movimiento.
            </li>
            <li class="list">
                Los giros son lentos y rápidos pero exactos con un relevé muy alto.
            </li>
            <li class="list">
                La gestualidad es muy amplia y está dada por las características propias del cubano y el latinoamericano en general.
            </li>
            <li class="list">
                El salto sobre las puntas en las muchachas.
            </li>
            <li class="list">
                El baile es hacia arriba y muy activo.
            </li>
            <li class="list">
                El attitude es cuadrado.
            </li>
            <li class="list">
                Trabajo de comunicación entre la pareja.
            </li>
            <li class="list">
                Gran atención a la musicalidad y al ritmo.
            </li>
            <li class="list">
                La carrerita de las muchachas es hacia arriba con pasos cortos a ¾ de ½ punta, y los muchachos corren con pasos alargados
                sin perder el sentido hacia arriba.
            </li>
        </ul>
    </div>

    {{--
    <h3>Perspectiva de la Carrera</h3> --}} {{-- Descripción del perfil de la carrera, si es vocacional o profesional --}} {{--
    <h3>Ambato</h3> --}} {{-- Descripción de la ciudad de Ambato --}}
@endsection