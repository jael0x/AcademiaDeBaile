let numHoras = 0;
let horarios = document.getElementById('horarios');
let asignaturas = document.getElementById('asignaturas');
let dias = ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'];
let auxString = "";

function addAsig(event){
    event.preventDefault();
    
    let asig_titulo = $('input[name=asig_titulo]')
    let docente_id = $('select[name=docente_id] option:selected')

    if( !(asig_titulo.val() && docente_id.val() && horarios.hasChildNodes()) ) {
        if(!asig_titulo.val()){
            $("#asig_titulo").addClass("invalid");
            $("#masig_titulo").text("Ingrese un nombre para la asignatura");
        }else{
            $("#asig_titulo").removeClass("invalid");
            $("#masig_titulo").text("");
        }
        if(!docente_id.val()){
            $("#docente_id").css({"border": "2px solid #F44336"});
            $("#mdocente_id").text("Seleccione un docente");
        }else {
            $("#docente_id").css({"border": "1px solid #9e9e9e"});
            $("#mdocente_id").text("");
        }
        if(!horarios.hasChildNodes()){
            $("#mhoras").text("Ingrese al menos un horario");
        }else{
            $("#mhoras").text("");
        }
    }else{

        let card = document.createElement("div");
        card.classList.add("card");

        asignaturas.append(card);

        let cardContent = document.createElement("div");
        cardContent.classList.add("card-content");

        card.append(cardContent);

        let row1 = document.createElement("div");
        row1.classList.add("row");
        row1.classList.add("mg-b0");

        cardContent.append(row1);

        let col1 = document.createElement("div");
        col1.classList.add("col");
        col1.classList.add("s5");

        row1.append(col1);

        let inputItem = document.createElement("input");
        inputItem.setAttribute("type", "text");
        inputItem.setAttribute("name", "asigTitulos[]");
        inputItem.value = asig_titulo.val();
        inputItem.setAttribute("onfocus", "inInput(this);");
        inputItem.setAttribute("onblur", "outInput(this);");

        col1.append(inputItem);

        let col2 = document.createElement("div");
        col2.classList.add("col");
        col2.classList.add("s5");

        row1.append(col2);

        let selectItem = document.createElement("select");
        selectItem.classList.add("browser-default");
        selectItem.style.border = "1px solid #9e9e9e";
        selectItem.setAttribute("name", "asigDocentes[]");

        col2.append(selectItem);

        docentes.forEach(element => {
            let option = document.createElement("option");
            option.value = element["id"];
            option.textContent = element["nombre"];
            if (parseInt(option.value) == parseInt(docente_id.val())) {
                option.setAttribute("selected", true);
            }
    
            selectItem.append(option);
        });

        let col3 = document.createElement("div");
        col3.classList.add("col");
        col3.classList.add("s2");

        row1.append(col3);

        let button = document.createElement("button");
        button.classList.add("btn");
        button.classList.add("red");
        button.classList.add("deleteAsig");
        button.setAttribute("title", "Borrar Asignatura");

        col3.append(button);

        let icon = document.createElement("i");
        icon.classList.add("far");
        icon.classList.add("fa-trash-alt");

        button.append(icon);

        let cardAction = document.createElement("div");
        cardAction.classList.add("card-action");
        cardAction.classList.add("pd-b0");

        cardContent.append(cardAction);

        $(".deleteHora").first().remove();

        cardAction.append(horarios.cloneNode(true));

        let horas = document.createElement("input");
        horas.setAttribute("type", "number");
        horas.setAttribute("readonly", true);
        horas.setAttribute("name", "numHoras[]");
        horas.value = numHoras;
        horas.hidden = true;

        cardAction.append(horas);
        
        while (horarios.firstChild) {
            horarios.removeChild(horarios.firstChild);
        }
        
        numHoras = 0;

        $("#asig_titulo").removeClass("invalid");
        $("#masig_titulo").text("");
        $("#docente_id").css({"border": "1px solid #9e9e9e"});
        $("#mdocente_id").text("");
        $("#mhoras").text("");

        asig_titulo.val('');
        $("select[name=docente_id]").val('').prop('selected', true);
    }
}

function addHora(event){
    event.preventDefault();
    let inputdias = [$('input[name=lunes]'), $('input[name=martes]'), $('input[name=miercoles]'), $('input[name=jueves]'), $('input[name=viernes]'), $('input[name=sabado]'), $('input[name=domingo]')];
    let horaini = $('input[name=hora_ini]');
    let horafin = $('input[name=hora_fin]');

    if (!(horaini.val() && horafin.val() && (inputdias[0].is(':checked') || inputdias[1].is(':checked') || inputdias[2].is(':checked') || inputdias[3].is(':checked') || inputdias[4].is(':checked') || inputdias[5].is(':checked') || inputdias[6].is(':checked')))){
        if (!(inputdias[0].is(':checked') || inputdias[1].is(':checked') || inputdias[2].is(':checked') || inputdias[3].is(':checked') || inputdias[4].is(':checked') || inputdias[5].is(':checked') || inputdias[6].is(':checked'))){
            $("#mhoras").text("Seleccione al menos un día");
        } else if (!(horaini.val() && horafin.val())){
            $("#mhoras").text("Ingrese hora de entrada y de salida");
        }
    }else{
        $("#mhoras").text("");

        let row = document.createElement("div");
        row.classList.add("row");
        row.classList.add("mg-b0");
        
        horarios.append(row);

        let col1 = document.createElement("div");
        col1.classList.add("col");
        col1.classList.add("s12");
        col1.classList.add("m7");
        col1.classList.add("bet");

        row.append(col1);

        for (let i = 0; i < dias.length; i++) {
            let diai = document.createElement("input");
            diai.setAttribute("type", "checkbox");
            diai.classList.add("filled-in");
            diai.checked = inputdias[i].is(':checked');
            diai.setAttribute("onchange", "checkIt(this);");
    
            let diah = document.createElement("input");
            diah.setAttribute("type", "number");
            diah.setAttribute("readonly", true);
            diah.setAttribute("name", "hora"+dias[i]+"[]");
            if (inputdias[i].is(':checked')){
                diah.value = 1;    
            } else {
                diah.value = 0;    
            }
            diah.hidden = true;
    
            let diaf = document.createElement("label");
            diaf.append(dias[i]);
            diaf.append(document.createElement("br"));
            diaf.append(diai);
            diaf.append(document.createElement("span"));
            diaf.append(diah);
    
            col1.append(diaf);
        }
        
        //Horas
        let col2 = document.createElement("div");
        col2.classList.add("col");
        col2.classList.add("s6");
        col2.classList.add("m3");
        col2.classList.add("bet");

        row.append(col2);

        let horai = document.createElement("input");
        horai.setAttribute("type", "time");
        horai.setAttribute("name", "horaIniciales[]");
        horai.classList.add("mg-b0");
        horai.classList.add("center");
        horai.value = horaini.val();
        horai.setAttribute("onfocus", "inInput(this);");
        horai.setAttribute("onblur", "outInput(this);");

        col2.append(horai);

        let span = document.createElement("span");
        span.style.marginTop = "10px";
        span.append(" - ");

        col2.append(span);

        let horaf = document.createElement("input");
        horaf.setAttribute("type", "time");
        horaf.setAttribute("name", "horaFinales[]");
        horaf.classList.add("mg-b0");
        horaf.classList.add("center");
        horaf.value = horafin.val();
        horaf.setAttribute("onfocus", "inInput(this);");
        horaf.setAttribute("onblur", "outInput(this);");

        col2.append(horaf);
        
        //Button
        let col3 = document.createElement("div");
        col3.classList.add("col");
        col3.classList.add("s3");
        col3.classList.add("m2");
        col3.classList.add("right");

        row.append(col3);

        let icon = document.createElement("i");
        icon.classList.add("fas");
        icon.classList.add("fa-times");

        let delHora = document.createElement("button");
        delHora.classList.add("btn-floating");
        delHora.classList.add("btn-small");
        delHora.classList.add("red");
        delHora.classList.add("deleteHora");
        delHora.style.marginTop = "10px";
        delHora.setAttribute("title", "Borrar Horario");

        col3.append(delHora);
        delHora.append(icon);

        numHoras++;
        horaini.val("");
        horafin.val("");
        inputdias.forEach(element => {
            element.prop("checked", false);
        });
    }
}

$(function () {
    $(document).on('click', '.deleteHora', function(event){
    event.preventDefault();
    $(this).closest('.row').remove();
    })
});

$(function () {
    $(document).on('click', '.deleteAsig', function(event){
    event.preventDefault();
    $(this).closest('.card').remove();
    })
});

function checkIt(input){
    let valor = $(input).siblings('input');
    if (parseInt(valor.val())) {
        let other = $(input).parent().siblings('label');
        let count = 0;
        for (let i = 0; i < other.length; i++) {
            if(parseInt(other[i].lastChild.value)){
                count++;
            }
        }
        if (!count) {
            input.checked = true;
            valor.val("1");
        } else {
            valor.val("0");
        }
    } else {
        valor.val(1);
    }
}

function inInput(input){
    auxString = $(input).val();
}

function outInput(input){
    if(!$(input).val()){
        input.value = auxString;
    }
}