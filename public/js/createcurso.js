let numHoras = 0;
let horarios = document.getElementById('horarios');
let asignaturas = document.getElementById('asignaturas');


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
        inputItem.setAttribute("readonly", true);
        inputItem.style.border = "none";
        inputItem.setAttribute("type", "text");
        inputItem.setAttribute("name", "asigTitulos[]");
        inputItem.value = asig_titulo.val();

        col1.append(inputItem);

        let col2 = document.createElement("div");
        col2.classList.add("col");
        col2.classList.add("s5");

        row1.append(col2);

        let selectItem = document.createElement("select");
        // selectItem.setAttribute("disabled", true);
        selectItem.classList.add("browser-default");
        selectItem.classList.add("clean-insert");
        selectItem.setAttribute("name", "asigDocentes[]");

        col2.append(selectItem);

        let option = document.createElement("option");
        option.setAttribute("selected", true);
        option.value = docente_id.val();
        option.textContent = docente_id.text();

        selectItem.append(option);

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

        $(".deleteHora").remove();

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
    let lun = $('input[name=lunes]');
    let mar = $('input[name=martes]');
    let mie = $('input[name=miercoles]');
    let jue = $('input[name=jueves]');
    let vie = $('input[name=viernes]');
    let sab = $('input[name=sabado]');
    let dom = $('input[name=domingo]');
    let horaini = $('input[name=hora_ini]');
    let horafin = $('input[name=hora_fin]');

    if (!(horaini.val() && horafin.val() && (lun.is(':checked') || mar.is(':checked') || mie.is(':checked') || jue.is(':checked') || vie.is(':checked') || sab.is(':checked') || dom.is(':checked')))){
        if (!(lun.is(':checked') || mar.is(':checked') || mie.is(':checked') || jue.is(':checked') || vie.is(':checked') || sab.is(':checked') || dom.is(':checked'))){
            $("#mhoras").text("Seleccione al menos un día");
        } else if (!(horaini.val() && horafin.val())){
            $("#mhoras").text("Ingrese hora de entra y de salida");
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

        //Dias
        //Lunes
        let luni = document.createElement("input");
        luni.setAttribute("type", "checkbox");
        luni.classList.add("filled-in");
        luni.checked = lun.is(':checked');
        luni.setAttribute("disabled", true);

        let lunh = document.createElement("input");
        lunh.setAttribute("type", "text");
        lunh.setAttribute("readonly", true);
        lunh.setAttribute("name", "horaLunes[]");
        lunh.value = lun.is(':checked');
        lunh.hidden = true;

        let lunf = document.createElement("label");
        lunf.append("Lun");
        lunf.append(document.createElement("br"));
        lunf.append(luni);
        lunf.append(document.createElement("span"));
        lunf.append(lunh);

        col1.append(lunf);

        //Martes
        let mari = document.createElement("input");
        mari.setAttribute("type", "checkbox");
        mari.classList.add("filled-in");
        mari.checked = mar.is(':checked');
        mari.setAttribute("disabled", true);

        let marh = document.createElement("input");
        marh.setAttribute("type", "text");
        marh.setAttribute("readonly", true);
        marh.setAttribute("name", "horaMartes[]");
        marh.value = mar.is(':checked');
        marh.hidden = true;

        let marf = document.createElement("label");
        marf.append("Mar");
        marf.append(document.createElement("br"));
        marf.append(mari);
        marf.append(document.createElement("span"));
        marf.append(marh);

        col1.append(marf);

        //Miercoles
        let miei = document.createElement("input");
        miei.setAttribute("type", "checkbox");
        miei.classList.add("filled-in");
        miei.checked = mie.is(':checked');
        miei.setAttribute("disabled", true);

        let mieh = document.createElement("input");
        mieh.setAttribute("type", "text");
        mieh.setAttribute("readonly", true);
        mieh.setAttribute("name", "horaMiercoles[]");
        mieh.value = mie.is(':checked');
        mieh.hidden = true;

        let mief = document.createElement("label");
        mief.append("Mie");
        mief.append(document.createElement("br"));
        mief.append(miei);
        mief.append(document.createElement("span"));
        mief.append(mieh);

        col1.append(mief);

        //Jueves
        let juei = document.createElement("input");
        juei.setAttribute("type", "checkbox");
        juei.classList.add("filled-in");
        juei.checked = jue.is(':checked');
        juei.setAttribute("disabled", true);

        let jueh = document.createElement("input");
        jueh.setAttribute("type", "text");
        jueh.setAttribute("readonly", true);
        jueh.setAttribute("name", "horaJueves[]");
        jueh.value = jue.is(':checked');
        jueh.hidden = true;

        let juef = document.createElement("label");
        juef.append("Jue");
        juef.append(document.createElement("br"));
        juef.append(juei);
        juef.append(document.createElement("span"));
        juef.append(jueh);

        col1.append(juef);

        //Viernes
        let viei = document.createElement("input");
        viei.setAttribute("type", "checkbox");
        viei.classList.add("filled-in");
        viei.checked = vie.is(':checked');
        viei.setAttribute("disabled", true);

        let vieh = document.createElement("input");
        vieh.setAttribute("type", "text");
        vieh.setAttribute("readonly", true);
        vieh.setAttribute("name", "horaViernes[]");
        vieh.value = vie.is(':checked');
        vieh.hidden = true;

        let vief = document.createElement("label");
        vief.append("Vie");
        vief.append(document.createElement("br"));
        vief.append(viei);
        vief.append(document.createElement("span"));
        vief.append(vieh);

        col1.append(vief);

        //Sabado
        let sabi = document.createElement("input");
        sabi.setAttribute("type", "checkbox");
        sabi.classList.add("filled-in");
        sabi.checked = sab.is(':checked');
        sabi.setAttribute("disabled", true);

        let sabh = document.createElement("input");
        sabh.setAttribute("type", "text");
        sabh.setAttribute("readonly", true);
        sabh.setAttribute("name", "horaSabados[]");
        sabh.value = sab.is(':checked');
        sabh.hidden = true;

        let sabf = document.createElement("label");
        sabf.append("Sab");
        sabf.append(document.createElement("br"));
        sabf.append(sabi);
        sabf.append(document.createElement("span"));
        sabf.append(sabh);

        col1.append(sabf);

        //Domingo
        let domi = document.createElement("input");
        domi.setAttribute("type", "checkbox");
        domi.classList.add("filled-in");
        domi.checked = dom.is(':checked');
        domi.setAttribute("disabled", true);

        let domh = document.createElement("input");
        domh.setAttribute("type", "text");
        domh.setAttribute("readonly", true);
        domh.setAttribute("name", "horaDomingos[]");
        domh.value = dom.is(':checked');
        domh.hidden = true;

        let domf = document.createElement("label");
        domf.append("Dom");
        domf.append(document.createElement("br"));
        domf.append(domi);
        domf.append(document.createElement("span"));
        domf.append(domh);

        col1.append(domf);
        
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
        horai.style.border = "none";
        horai.setAttribute("readonly", true);
        horai.value = horaini.val();

        col2.append(horai);

        let horaf = document.createElement("input");
        horaf.setAttribute("type", "time");
        horaf.setAttribute("name", "horaFinales[]");
        horaf.classList.add("mg-b0");
        horaf.classList.add("center");
        horaf.style.border = "none";
        horaf.setAttribute("readonly", true);
        horaf.value = horafin.val();

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
        lun.prop("checked", false);
        mar.prop("checked", false);
        mie.prop("checked", false);
        jue.prop("checked", false);
        vie.prop("checked", false);
        sab.prop("checked", false);
        dom.prop("checked", false);
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